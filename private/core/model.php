<?php

/*
*Main Model
*/

class Model extends Database{
    public $errors = [];

    public function __construct(){
        if(!property_exists($this, 'table')){
            $this->table = strtolower($this::class) . "s";
        }
    }

    public function where($column,$value,$orderby = 'desc'){
        $column = addslashes($column);
        $query = "select * from $this->table where $column = :value order by id $orderby ";
        $data = $this->query($query,[
            'value' => $value
        ]);

         //run functions after select
         if(is_array($data)){
            if(property_exists($this, 'afterSelect')){
                foreach($this->afterSelect as $func){
                    $data = $this->$func($data);
                }
            }
        }
      

        return $data;
    }

    public function findAll($orderby = 'desc'){
        $query = "select * from $this->table order by id $orderby";
        $data = $this->query($query);

        //run functions after select
        if(is_array($data)){
            if(property_exists($this, 'afterSelect')){
                foreach($this->afterSelect as $func){
                    $data = $this->$func($data);
                }
            }
        }
      

        return $data;
    }

    public function insert($data){

        // remove unwanted columns
        if(property_exists($this, 'allowedColumns'))
        {
            foreach($data as $key => $column) 
             {
                if(!in_array($key, $this->allowedColumns)){
                    unset($data[$key]);
                }   
            }
         }
        // run functions before insert
        if(property_exists($this, 'beforeInsert')){
           foreach($this->beforeInsert as $func)  {
              $data = $this->$func($data);
           }
        }

        $keys = array_keys($data);
        $columns = implode(',',$keys);
        $value = implode(',:',$keys);

        $query = "insert into $this->table ($columns) values (:$value)";

        return $this->query($query,$data);
    }

    public function update($id,$data){

        
        $str = "";
        foreach($data as $key => $value){
            $str.= "$key = :$key,";
        }
        $str = trim($str,',');
        $data['id'] = $id;
        $query = "update $this->table set $str where id = :id";
        return $this->query($query,$data);
        
    }

    public function delete($id){
    

        $query = "delete from $this->table where id = :id";
        $data['id'] = $id;
        return $this->query($query,$data);
    }

    public function first($column,$value,$orderby = 'desc'){
        $column = addslashes($column);
        $query = "select * from $this->table where $column = :value  order by id $orderby";
        $data = $this->query($query,[
            'value' => $value
        ]);

         //run functions after select
         if(is_array($data)){
            if(property_exists($this, 'afterSelect')){
                foreach($this->afterSelect as $func){
                    $data = $this->$func($data);
                }
            }
        }

        if(is_array($data)){
            $data = $data[0];
        }
      

        return $data;
    }
}