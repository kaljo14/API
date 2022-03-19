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
try{
for($i=0;$i<sizeof($info);$i++){
    if (isset($info[$i]->task_id)){
    $task->task_id =$info[$i]->task_id;
    if(isset($info[$i]->task_name)){


    $task->task_name=$info[$i]->task_name;
    if($task->updateName()){
        echo json_encode(array('note'=>'Name Updated'));
    }
    else{
        echo json_encode(array('note'=>'Name Not Updated Already Exists'));}
    }

    if(isset($info[$i]->tag_id)){
        $task->tag_id=$info[$i]->tag_id;
        if($task->updateTag()){
            echo json_encode(array('note'=>'Tag Updated'));
        }
        else{
            echo json_encode(array('note'=>'Tag Not Updated'));}
        }
    }
    else {echo json_encode(array('note'=>'Task ID not given can not preform update '));}
 }
 
}
catch(TypeError){
    
 if (isset($info->task_id)){
    $task->task_id =$info->task_id;
    if(isset($info->task_name)){


    $task->task_name=$info->task_name;
    if($task->updateName()){
        echo json_encode(array('note'=>'Name Updated'));
    }
    else{
        echo json_encode(array('note'=>'Name Not Updated Already Exists'));}
    }

    if(isset($info->tag_id)){
        $task->tag_id=$info->tag_id;
        if($task->updateTag()){
            echo json_encode(array('note'=>'Tag Updated'));
        }
        else{
            echo json_encode(array('note'=>'Tag Not Updated'));}
        }
    }
    else {echo json_encode(array('note'=>'Task ID not given can not preform update '));}
     
}

 
        
        


