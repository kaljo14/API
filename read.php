<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include 'Dbh.php';
include 'model.task.php';
$database = new Dbh();
  $db = $database->connect();

  $task = new Task($db);

  $result = $task->select_all();
  
  $num = $result->rowCount();

  // proverka dali ima task 

  if($num > 0) {
            
            $tasks_arr = array();
            // $tasks_arr['data'] = array();

            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $task_item = array(
                'id' => $id,
                'task_id' => $task_id,
                'task_name'=> $task_name,
                'tag_name'=>$name
            );



            array_push($tasks_arr, $task_item);

            }


            echo json_encode($tasks_arr);

  } else {
    
    echo json_encode(
      array('message' => 'No Tasks Found')
    );
  }
