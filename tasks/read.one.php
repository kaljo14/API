<?php
ini_set("display_errors", "1");
  error_reporting(E_ALL);
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include '../Connection/Dbh.php';
include '../models/model.task.php';
$database = new Dbh();
$db = $database->connect();

$task = new Task($db);

$task->task_id = isset($_GET['id']) ? $_GET['id'] : die();



  $result = $task->select_one();
  

  $num = $result->rowCount();

  // proverka dali ima task 

if($num > 0) {
  $tasks_arr = array();
  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $task_item = array(
      'task_name'=>$task->task_name,
      'task_id'=>$task->task_id,
        'tag_id'=>$id,
      'tag_name'=>$name,
      'tag_color'=>$tag_color
    );
    array_push($tasks_arr, $task_item);
  }
  echo json_encode($tasks_arr);


}
else{ 
  echo json_encode(array('message' => 'No Tasks Found'));
        
}