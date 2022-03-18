<?php
ini_set("display_errors", "1");
  error_reporting(E_ALL);
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods');

include '../Connection/Dbh.php';
include '../models/model.task.php';
$database = new Dbh();
$DB = $database->connect();

$task = new Task($DB);

$info = json_decode(file_get_contents("php://input"));


$task->task_id=$info->task_id;
 if(isset($info->tag_name)){
    $task->tag_name=$info->tag_name;
    if($task->updateName()){
        echo json_encode(array('note'=>'Post Updated'));
    }
    else{
        echo json_encode(array('note'=>'Post Updated'));}
    }


