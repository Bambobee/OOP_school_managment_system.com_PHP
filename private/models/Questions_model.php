<?php

/*
*Questions Model
*/

class Questions_model extends Model{

    protected $table = 'test_questions';

  protected $allowedColumns = [
    'question',
    'comment',
    'date',
    'test_id',
    'question_type',
    'answer',
    'choices',
    'image',
];

  protected $beforeInsert = [
    'make_user_id'
];

    protected $afterSelect = [
      'get_user',
    ];

  public function validate($DATA){

    $this->errors = [];
    //check for question
    if(empty($DATA['question'])){
        $this->errors['question'] = "Please add a valid question";
    }
    
    if(isset($DATA['answer'])){ 
    if(empty($DATA['answer'])){
        $this->errors['answer'] = "Please add a valid answer";
    }
  }
    if(count($this->errors) == 0){
        return true;
    }
    return false;
  }

  public function make_user_id($data){
    if(isset($_SESSION['USER']->user_id)){
      $data['user_id'] = $_SESSION['USER']->user_id;
    }
   
    return $data;
  }
    
  public function get_user($data){

    $user = new User();
    foreach ($data as $key => $row){
      $result = $user->where('user_id',$row->user_id);
      $data[$key]->user = is_array($result) ? $result[0] : false; 
    }

    return $data;
  }
}
?>