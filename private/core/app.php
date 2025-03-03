<?php

/*
*Main App file
*/

class App{
    
    protected $controller = "home";
    protected $method = "index";
    protected $params = array();

    public function __construct(){
        //this gets all the URLS
        $URL = $this->getURL();

        //this checks weather the home.php file exits if it exits it makes it the default url
        if(file_exists("../private/controllers/".$URL[0].".php")){
            $this->controller = ucfirst($URL[0]);
            unset($URL[0]);
        }

        require "../private/controllers/".$this->controller.".php";

        //creating a new instance of the controller class
        $this->controller = new $this->controller();

        if(isset($URL[1])){
            //this checks weather the method index exits if it exits it makes it the default method(function)
            if(method_exists($this->controller, $URL[1])){
                $this->method = ucfirst($URL[1]);
                unset($URL[1]);
            }
        }

        //this resets the URL 
        $URL = array_values($URL);
        $this->params = $URL;

        call_user_func_array([$this->controller,$this->method], $this->params);
    }

    // function to get all the URLs
    private function getURL(){
        // print_r($_GET);

        $url = isset($_GET['url']) ? $_GET['url'] : "home";
        return explode('/', filter_var(trim($url, '/')),FILTER_SANITIZE_URL);
    }
}