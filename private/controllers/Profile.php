<?php

/*
* home controller
*/
class Profile extends Controller{

    function index($id = ''){

        if(!Auth::logged_in()){
            $this->redirect('login');
        }
        
        $user = new User();
        $id = trim($id == '') ? Auth::getUser_id() : $id;
        $row = $user->first('user_id',$id);

        $crumbs[] = ['Dashboard',''];
       $crumbs[] = ['Profile','profile'];
        
       if($row){
        $crumbs[] = [$row->firstname,'profile'];
       }

       //get more information 
       $data['page_tab'] = isset($_GET['tab']) ? $_GET['tab'] : 'infor'; 

       if($data['page_tab'] == 'classes' && $row){

        $class = new Classes_model;
        $mytable = "class_students";

        if($row->rank == "lecturer"){
            $mytable = "class_lecturers";
        }

        
        $query = "select * from $mytable where user_id = :user_id && disabled = 0";
        $data['stud_classes'] = $class->query($query,['user_id'=>$id]);


        $data['student_classes'] = [];
        if($data['stud_classes']){
            foreach($data['stud_classes'] as $key => $value){
                $data['student_classes'][] = $class->first('class_id',$value->class_id);
            }
        }
       }

       $data['row'] = $row;
       $data['crumbs'] = $crumbs;

       if(Auth::access('reception') || Auth::i_own_content($row)){
        echo $this->view('profile',$data);
       }else{
        echo $this->view('access-denied');
       }
        
    }

    function edit($id = ''){

        if(!Auth::logged_in()){
            $this->redirect('login');
        }
        $errors = [];
        $user = new User();
        $id = trim($id == '') ? Auth::getUser_id() : $id;

        if(count($_POST) > 0 && Auth::access('reception')){
            //something was posted 
            // show($_POST);
            //check if password exits
            if(trim($_POST['password']) == ""){
                unset($_POST['password']);
                unset($_POST['password2']); 
            }

            if($user->validate($_POST,$id)){
                 //check for files
                 if($myImage = upload_image($_FILES)){
                    $_POST['image'] = $myImage;
                 }
                
                if($_POST['rank'] == 'super_admin' && $_SESSION['USER']->rank != "super_admin"){
                    $_POST['rank'] = 'admin';
                }
               $myrow = $user->first('user_id',$id);
               if(is_object($myrow)){
                $user->update($myrow->id,$_POST);
               }
                
                $redirect = 'profile/edit/'.$id;
                $this->redirect($redirect);
            }else{
                //errors
                $errors = $user->errors;
            }
        }
        $row = $user->first('user_id',$id);

        $data['row'] = $row;
        $data['errors'] = $errors;
       if(Auth::access('reception') || Auth::i_own_content($row)){
        echo $this->view('profile-edit',$data);
       }else{
        echo $this->view('access-denied');
       }
        
    }
}