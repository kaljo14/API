<?php
ini_set("display_errors", "1");
  error_reporting(E_ALL);
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include 'Connection/Dbh.php';
include 'models/model.task.php';
$database = new Dbh();
$db = $database->connect();

$task = new Task($db);


 //$task->task_id = isset($_GET['id']) ? $_GET['id'] : die();

$result = $task->select_task();
  
  $num = $result->rowCount();
  
  // $task->select_tag();
  // print_r($task);
  //$num = $result->rowCount();

  // proverka dali ima task 

 if($num > 0) {
            
            $tasks_arr = array();
            // $tasks_arr['data'] = array();

            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $task_item = array(
                
                'task_id' => $task_id,
                'task_name'=> $task_name,
                
            );


            // Push to "data"
            array_push($tasks_arr, $task_item);
            // array_push($tasks_arr['data'], $task_item);
            }
            for($i=0;$i<$num;$i++){

            }

            // Turn to JSON & output
            echo json_encode($tasks_arr);

  }
  $result = $task->select_task();
  $numtags = $result->rowCount();
  if($numtags > 0) {
      $tasks_arr_tags = array();
           

            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $task_item_tags = array(
                
                'id' => $task_id,
                'name'=> $task_name,
                
            );


            
            array_push($tasks_arr_tags, $task_item_tags);
            
            }
            print_r($tasks_arr_tags);
  }

  //                        Pravilno !!
  
  // $result=$task->add_tag(1,1);
  // $numtags = $result->rowCount();
  // if($numtags > 0) {
  //     $tasks_arr_tags = array();
           

  //           while($row = $result->fetch(PDO::FETCH_ASSOC)) {
  //           extract($row);

  //           $task_item_tags = array(
                
  //               'id' => $task_id,
  //               'name'=> $task_name,
                
  //           );


            
  //           array_push($tasks_arr_tags, $task_item_tags);
            
  //           }
  //           print_r($tasks_arr_tags);
  // }

  for($i=0;$i<$num;$i++){
    $result1=$task->add_tag(1,$tasks_arr_tags[$i]['id']);
    $numtags = $result1->rowCount();
    echo $i;

  if($numtags > 0) {
      $tasks_arr_ad_tags = array();
           

            while($row = $result1->fetch(PDO::FETCH_ASSOC)) {
             
            extract($row);

            $task_item_tags = array(
                
                'id' => $task_id,
                'name'=> $name,
                
            );
            

              if($tasks_arr['id'] = $task_item_tags['id'])
              {echo "-------------------";
                $tasks_arr['task_name'] = $tasks_arr['task_name'].$task_item_tags['name'];}
            
            array_push($tasks_arr_ad_tags, $task_item_tags);
            
            }
            echo"<br><br>";
            print_r($tasks_arr_ad_tags);
            //$tasks_arr_ad_tags[0]['name'] =$tasks_arr_ad_tags[0]['name'].", ".$tasks_arr_ad_tags[1]['name'];
            
           echo json_encode($tasks_arr);
           
  }

 
  }

  echo "HEREEEEE----".sizeof($tasks_arr_ad_tags);