<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include '../Connection/Dbh.php';
include '../models/model.tags.php';

$database = new Dbh();
  $db = $database->connect();

  $task = new Tags($db);

  $result = $task->select_all();
  
  $num = $result->rowCount();

  // proverka dali ima task 

  if($num > 0) {
            
            $tasks_arr = array();
           

            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $task_item = array(
                
                
                'tag_id' => $id,
                'tag_name'=>$name,
                'tag_color'=>$tag_color,
                'task_id' => $task_id,
                'task_name'=> $task_name,
            );



            array_push($tasks_arr, $task_item);

            }


            echo json_encode($tasks_arr);

  } else {
    
    echo json_encode(
      array('message' => 'No Tasks Found')
    );
  }
