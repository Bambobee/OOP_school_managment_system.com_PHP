<?php

/*
* Classes controller
*/
class Classes extends Controller{

    public function index(){

        if(!Auth::logged_in()){
            $this->redirect('login');
        }
        $classes = new Classes_model();
        $school_id = Auth::getSchool_id();

        if(Auth::access('admin')){

            $query = "Select * from classes where school_id = :school_id order by id desc";
            $arr['school_id'] = $school_id;
            if(isset($_GET['find'])){
                $find = '%' . $_GET['find'] . '%';
                $query = "Select * from classes where school_id = :school_id && (class like :find) order by id desc ";
                $arr['find'] = $find;
            }

            $data = $classes->query($query, $arr);
        }else{

        $class = new Classes_model;
        $mytable = "class_students";

        if(Auth::getRank() == "lecturer"){
            $mytable = "class_lecturers";
        }

        $query = "select * from $mytable where user_id = :user_id && disabled = 0";
        $arr['stud_classes'] = $class->query($query,['user_id'=>Auth::getUser_id() ]);

        $data = [];
        if($arr['stud_classes']){
            foreach($arr['stud_classes'] as $key => $value){
                $data[] = $class->first('class_id',$value->class_id);
            }
        }
        }
        

        $crumbs[] = ['Dashboard',''];
        $crumbs[] = ['Classes','Classes'];

        $this->view('classes', 
        ['rows' => $data,
        'crumbs' => $crumbs]);
    }

    public function add(){

        if(!Auth::logged_in()){
            $this->redirect('login');
        }

        $errors = [];

        if(count($_POST) > 0){
            $classes = new Classes_model();
            if($classes->validate($_POST)){

                $_POST['date'] = date("Y-m-d H:i:s");

                $classes->insert($_POST);
                $this->redirect('classes');
            }else{
                $errors = $classes->errors;
            }
        }
        $crumbs[] = ['Dashboard',''];
        $crumbs[] = ['Classes','classes'];
        $crumbs[] = ['Add','classes/add'];

        $this->view('classes.add', [
            'errors' => $errors,
            'crumbs' => $crumbs]);
    }

    public function edit($id = null){

        if(!Auth::logged_in()){
            $this->redirect('login');
        }
        $classes = new Classes_model();
        $errors = [];

        if(count($_POST) > 0 && Auth::access('lecturer') && Auth::i_own_content($row)){
           
            if($classes->validate($_POST)){

                $classes->update($id,$_POST);

                $this->redirect('classes');
            }else{
                $errors = $classes->errors;
            }
        }
       $row = $classes->where('id',$id);

       $crumbs[] = ['Dashboard',''];
       $crumbs[] = ['Classes','classes'];
       $crumbs[] = ['Edit','classes/edit'];

       if(Auth::access('lecturer') && Auth::i_own_content($row)){
        $this->view('classes.edit', [
            'row' => $row,
            'errors' => $errors,
            'crumbs' => $crumbs
        ]);
    }else{
        $this->view('access-denied');
       }
    }

    public function delete($id = null){

        if(!Auth::logged_in()){
            $this->redirect('login');
        }
        $classes = new Classes_model();
        $errors = [];

        if(count($_POST) > 0 && Auth::access('lecturer') && Auth::i_own_content($row)){
           

                $classes->delete($id);

                $this->redirect('classes');
           
        }
       $row = $classes->where('id',$id);

       $crumbs[] = ['Dashboard',''];
       $crumbs[] = ['Classes','classes'];
       $crumbs[] = ['Delete','classes/delete'];
       
       if(Auth::access('lecturer') && Auth::i_own_content($row)){
        $this->view('classes.delete', [
            'row' => $row,
            'crumbs' => $crumbs
        ]);
       }else{
        $this->view('access-denied');
       }
        
    }
}