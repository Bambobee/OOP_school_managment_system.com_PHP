<?php

/*
* Signup controller
*/
class Signup extends Controller{

    function index(){

        if(!Auth::logged_in()){
            $this->redirect('login');
        }

        $mode = isset($_GET['mode']) ? $_GET['mode'] : '';
        $errors = [];

        if(count($_POST) > 0){
            $user = new User();

            if($user->validate($_POST)){

                $_POST['date'] = date("Y-m-d H:i:s");

                if(Auth::access('reception')){
                    if(Auth::access('super_admin' && $_SESSION['USER']->rank != 'super_admin')){
                        $_POST['rank'] = 'admin';
                    }
                    $user->insert($_POST);
                }
                
                $redirect = $mode == 'students' ? 'students' : 'users';
                $this->redirect($redirect);
            }else{
                $errors = $user->errors;
            }
        }

       if(Auth::access('reception')){
        $this->view('auth/signup',['errors'=>$errors, 'mode'=>$mode]); 
       }else{
        $this->view('access-denied');
       }
        
    }
}