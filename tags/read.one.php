<?php
ini_set("display_errors", "1");
  error_reporting(E_ALL);
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include '../Connection/Dbh.php';
include '../models/model.tags.php';
$database = new Dbh();
$DB = $database->connect();

$tag = new Tags($DB);

$tag->tag_id = isset($_GET['id']) ? $_GET['id'] : die();
$result = $tag->select_one();
$num = $result->rowCount();


if($num > 0) {
    $tag_arr = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $tag_item = array(
           'tag_name'=>$tag->tag_name,
             'tag_id'=>$tag->tag_id,
             'tag_color'=>$tag->tag_color,
             'task_id'=>$task_id,
             'task_name'=>$task_name
             
        );
        array_push($tag_arr, $tag_item);

            }
        
    echo json_encode($tag_arr);
        }
  else{
          echo json_encode(
          array('message' => 'No Tasks Found '));
        
  }