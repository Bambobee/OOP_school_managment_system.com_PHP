<?php

/*
* Single test controller
*/
class Single_test extends Controller{

 public function index($id = ''){

        $errors = [];

         if(!Auth::logged_in()){
            $this->redirect('login');
        }

        $tests = new Tests_model();

        $row = $tests->first('test_id',$id);
       

        $crumbs[] = ['Dashboard',''];
       $crumbs[] = ['Tests','tests'];

       if($row){
        $crumbs[] = [$row->test,''];
       }

       $limit = 10;
       $pager = new pager($limit);
       $offset = $pager->offset;
       
       $page_tab = 'view'; 

       $results = false;
       $quest = new Questions_model();
       $questions = $quest->where("test_id",$id);
       $total_questions = count($questions);
            $data['row'] = $row;
            $data['crumbs'] = $crumbs;
            $data['page_tab'] = $page_tab;
            $data['results'] = $results;
            $data['questions'] = $questions;
            $data['total_questions'] = $total_questions;
            $data['errors'] = $errors;
            $data['pager'] = $pager;
       
      
     $this->view('single-test',$data); 
    }

    public function addsubjective($id = ''){

        $errors = [];

         if(!Auth::logged_in()){
            $this->redirect('login');
        }

        $tests = new Tests_model();

        $row = $tests->first('test_id',$id);
       

        $crumbs[] = ['Dashboard',''];
       $crumbs[] = ['Tests','tests'];

       if($row){
        $crumbs[] = [$row->test,''];
       }

       $limit = 10;
       $pager = new pager($limit);
       $offset = $pager->offset;

       $errors = [];
       $quest = new Questions_model();
       if(count($_POST) > 0){
           
           if($quest->validate($_POST)){
            if($myImage = upload_image($_FILES)){
                $_POST['image'] = $myImage;
             }

             if(isset($_GET['type']) && $_GET['type'] == "objective"){
                $_POST['question_type'] = 'objective';
             }else{
                $_POST['question_type'] = 'subjective';
             }
            
            $_POST['test_id'] = $id;
            $_POST['date'] = date("Y-m-d H:i:s");

               $quest->insert($_POST);
               $this->redirect('single_test/'.$id);
           }else{
               $errors = $quest->errors;
           }
       }
      
       $page_tab = 'add-subjective'; 

       $results = false;
   

            $data['row'] = $row;
            $data['crumbs'] = $crumbs;
            $data['page_tab'] = $page_tab;
            $data['results'] = $results;
            $data['errors'] = $errors;
            $data['pager'] = $pager;
       
      
     $this->view('single-test',$data); 
    }
}