<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods');

include '../Connection/Dbh.php';
include '../models/model.task.php';

$database = new Dbh();
$DB = $database->connect();

$task = new Task($DB);

$info = json_decode(file_get_contents("php://input"));
    //echo json_encode($info);
    //print_r($info);
//  echo $info[0]["task_id"];
try{
for($i=0;$i<sizeof($info);$i++){
    if($info[$i]->task_id){
        $task->task_id =$info[$i]->task_id;
        if($task->delete()){
            echo json_encode(array('note'=>'Task Deleted'));
        }
        else{echo json_encode(array('note'=>'Task  Not Deleted'));}

    }
    else{echo json_encode(array('note'=>'No task ID  added not possible to delete a task'));}
}
}
catch(TypeError){
    if($info->task_id){
        $task->task_id =$info->task_id;
        if($task->delete()){
            echo json_encode(array('note'=>'Task Deleted'));
        }
        else{echo json_encode(array('note'=>'Task  Not Deleted'));}
    }
    else{echo json_encode(array('note'=>'No task ID  added not possible to delete a task'));}
}
