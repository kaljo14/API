<?php
ini_set("display_errors", "1");
  error_reporting(E_ALL);
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include 'Dbh.php';
include 'model.task.php';
$database = new Dbh();
$db = $database->connect();

$task = new Task($db);

// Get ID
 $task->task_id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get task$task
 
  $result = $task->select_one();
  
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


            // Push to "data"
            array_push($tasks_arr, $task_item);
            // array_push($tasks_arr['data'], $task_item);
            }

            // Turn to JSON & output
            echo json_encode($tasks_arr);

  }