<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods');

include '../Connection/Dbh.php';
include '../models/model.tags.php';

$database = new Dbh();
$DB = $database->connect();

$tag = new Tags($DB);

$info = json_decode(file_get_contents("php://input"));
    //echo json_encode($info);
    //print_r($info);
//  echo $info[0]["task_id"];
try{
 for($i=0;$i<sizeof($info);$i++){
if(isset($info[$i]->tag_id)){
    $tag->tag_id =$info[$i]->tag_id;
    if($tag->delete()){
        echo json_encode(array('note'=>'Tag Deleted'));
    }
    else{
        echo json_encode(array('note'=>'Tag  Not Deleted'));}

}
else{
      echo json_encode(array('note'=>'No tag ID  added not possible to delete a tag'));

}
}
}
catch(TypeError){
if(isset($info->tag_id)){
$tag->tag_id =$info->tag_id;


if($tag->delete()){
    echo json_encode(array('note'=>'Tag Deleted'));
}
else{
    echo json_encode(array('note'=>'Tag  Not Deleted'));}

}
else{
      echo json_encode(array('note'=>'No tag ID  added not possible to delete a tag'));

}

}