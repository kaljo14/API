<?php
ini_set("display_errors", "1");
  error_reporting(E_ALL);
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods');

include '../Connection/Dbh.php';
include '../models/model.task.php';
$database = new Dbh();
$DB = $database->connect();

$task = new Task($DB);

$info = json_decode(file_get_contents("php://input"));

 for($i=0;$i<sizeof($info);$i++){
if(isset($info[$i]->task_name)){
$task->task_name =$info[$i]->task_name;
//print_r($task);


if(isset($info[$i]->tag_id)){
$task->tag_id=$info[$i]->tag_id;}

if($task->create()){
    echo json_encode(array('note'=>'Task Created'));
}
else{
    echo json_encode(array('note'=>'Task  Not Created May already exist at task_id'.$task->task_id));}
}
else{
  echo json_encode(array('note'=>'No name added not possible to create a task'));
}
 }
