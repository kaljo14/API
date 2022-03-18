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

$task->task_name =$info->task_name;


if(isset($info->tag_id)){
$task->tag_id=$info->tag_id;}

if($task->create()){
    echo json_encode(array('note'=>'Task Created'));
}
else{
    echo json_encode(array('note'=>'Task  Not Created'));}


