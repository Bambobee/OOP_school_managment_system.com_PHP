<?php

/*
* Database connection
*/

class Database {
    private function connect(){
        $string = DBDRIVER . ":host=".DBHOST.";dbname=".DBNAME;
        if(!$con = new PDO($string, DBUSER,DBPASS)){
            die('Could not connect: '. mysqli_error());
        }

        return $con;
    }

    //this ensures that our data doesn't intervine the query which helps of the hackers with 
    //sql injections


    public function query($query, $data = [], $data_type = "object"){
        $con = $this->connect();
        $stmt = $con->prepare($query);
    
        $result = false;
        if($stmt){
            $check = $stmt->execute($data);
    
            if($check){
                if($data_type == "object"){
                    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
    
               
            }
        }
         //run functions after select
         if(is_array($result)){
            if(property_exists($this, 'afterSelect')){
                foreach($this->afterSelect as $func){
                    $result = $this->$func($result);
                }
            }
        }
        if(is_array($result) && count($result) > 0){
            return $result;
        }

        return false;
    }
}