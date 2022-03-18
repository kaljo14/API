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

$task->task_id =$info->task_id;
if(isset($info->tag_name)){
$task->task_name=$info->task_name;
if($task->updateName()){
    echo json_encode(array('note'=>'Name Updated'));
}
else{
    echo json_encode(array('note'=>'Name Not Updated'));}
}

if(isset($info->tag_id)){
    $task->tag_id=$info->tag_id;
    if($task->updateTag()){
        echo json_encode(array('note'=>'Tag Updated'));
    }
    else{
        echo json_encode(array('note'=>'Tag Not Updated'));}
    }
    exit();







        
        


