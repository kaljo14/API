<?php
ini_set("display_errors", "1");
  error_reporting(E_ALL);
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods');

include '../Connection/Dbh.php';
include '../models/model.tags.php';
$database = new Dbh();
$DB = $database->connect();

$tag = new Tags($DB);

$info = json_decode(file_get_contents("php://input"));

try{
for($i=0;$i<sizeof($info);$i++){
    if (isset($info[$i]->tag_id)){
    $tag->tag_id =$info[$i]->tag_id;
    if(isset($info[$i]->tag_name)){
    $tag->tag_name=$info[$i]->tag_name;
    if($tag->update_name()){
        $note_arr=array('note'=>'Tag Updated');
    }
    else{
        echo json_encode(array('note'=>'Name Not Updated Already Exists'));}
       
    }

    if(isset($info[$i]->tag_color)){
        $tag->tag_color=$info[$i]->tag_color;
        if($tag->create_color()){
           $note_arr['note']=$note_arr['note'] .' And Tag Updated';}
        
        else{
            echo json_encode(array('note'=>'Tag Not Updated'));}
            
        }
        if(isset($note_arr))
  echo json_encode($note_arr);
    }
    else {echo json_encode(array('note'=>'Task ID not given can not preform update '));}
 }
 
}
catch(TypeError){
    
 if (isset($info->tag_id)){
    $tag->tag_id =$info->tag_id;
    if(isset($info->tag_name)){
    $tag->tag_name=$info->tag_name;
    if($tag->update_name()){
       $note_arr=array('note'=>'Tag Updated');
    }
    else{
        echo json_encode(array('note'=>'Name Not Updated Already Exists'));}
    
    
}

    if(isset($info->tag_color)){
        $tag->tag_color=$info->tag_color;
        if($tag->create_color()){
           $note_arr['note']=$note_arr['note'] .' And Tag Color Also Updated';}
        else{
            echo json_encode(array('note'=>'Tag Not Updated'));}
        }
        if(isset($note_arr))
  echo json_encode($note_arr);
    }
    else {echo json_encode(array('note'=>'Task ID not given can not preform update '));}
     
}

 
        
        


