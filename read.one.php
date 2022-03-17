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

 //$task->task_id = isset($_GET['id']) ? $_GET['id'] : die();
$task->task_name ="To buy carrots";
if (isset($task->task_name)){
$task->select_task();
echo "-------------------".$task->task_id;
}


  $result = $task->select_one();
  

  $num = $result->rowCount();

  // proverka dali ima task 

  if($num > 0) {
            
            $tasks_arr = array();
            // $tasks_arr['data'] = array();

            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $task_item = array(
                

                'task_name'=>$task->task_name,
                'task_id'=>$task->task_id,
                'tag_id'=>$id,
                'tag_name'=>$name,
                'tag_collor'=>$tag_color
            );
// print_r($task_item);

            // Push to "data"
            array_push($tasks_arr, $task_item);
            // array_push($tasks_arr['data'], $task_item);
            }

            // Turn to JSON & output
           $tasktitle = array('tag_name'=>$task->tag_name,'tag_id'=>$task->tag_id,);
            //echo $task->tag_name;
// print_r ($tasktitle);
  $result=array_merge($tasks_arr,$tasktitle);
  $result2=asort($result);



  //print_r(asort($result));
            //echo json_ecnode ($tasktitle);
            //echo json_encode($result2);
            echo json_encode($tasks_arr);


  }