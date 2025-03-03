<?php
//helps on the input element to keep the current data  wen submitted
function get_var($key,$default = ""){

    if(isset($_POST[$key])){
        return $_POST[$key];
    }
    return $default;
}
//helps on the select element to keep the current data  wen submitted
function get_select($key,$value){
    if(isset($_POST[$key])){
        if($_POST[$key] == $value){
            return 'selected';
        }
    }
    return "";
}
//this function helps in the escaping of injections
function esc($var){

    return htmlspecialchars($var, ENT_QUOTES, 'UTF-8');  
}

// function for generating id
 function random_string($length){
    $array = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
    $text = "";

    for($x=0; $x < $length; $x++){
      $random = rand(0,61);
      $text .= $array[$random];
    }
    return $text;
  }
//returns the date in the following formart
  function get_date($date)
  {
    return date("jS M, Y",strtotime($date));
  }
//helps at debugging
  function show($data){
    echo '<pre>';
    print_r($data);
    echo '</pre>';   
  }
//for the image weather male or female
  function get_image($image,$gender = 'male'){
    if(!file_exists($image)){
      $image = ASSETS . '/img/user_female.jpg';
      if($gender == 'male'){
          $image = ASSETS . '/img/user_male.jpg';
      }
  }

  return $image;
  }

  function views_path($view){
    if(file_exists("../private/views/" . $view . ".inc.php")){
      return ("../private/views/" . $view . ".inc.php");
  }
  else{
      return ("../private/views/404.view.php");
  }
  }
?>