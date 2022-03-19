<?php
ini_set("display_errors", "1");
  error_reporting(E_ALL);
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods');

include '../Connection/Dbh.php';
include '../models/model.tags.php';
$database = new Dbh();
$DB = $database->connect();

$tag = new Tags($DB);

$info = json_decode(file_get_contents("php://input"));
try{
    for($i=0;$i<sizeof($info);$i++){
    if(isset($info[$i]->tag_name)){
        $tag->tag_name =$info[$i]->tag_name;
        if($tag->create_name()){echo json_encode(array('note'=>'Tag Created'));
            if(isset($info[$i]->tag_color)){
                $tag->tag_color=$info[$i]->tag_color;
                if($tag->create_color()){echo json_encode(array('note'=>'Color Added'));}
            }
        }
        else{echo json_encode(array('note'=>'Tag '.$tag->tag_name.' Not Created already exists at tag_id '.$tag->tag_id));}
    }
    else{echo json_encode(array('note'=>'No name added not possible to create a tag'));}
    }  
}
catch(TypeError){
    if(isset($info->tag_name)){
        $tag->tag_name =$info->tag_name;
        if($tag->create_name()){echo json_encode(array('note'=>'Tag Created'));
            if(isset($info->tag_color)){
                $tag->tag_color=$info->tag_color;
                if($tag->create_color()){echo json_encode(array('note'=>'Color Added'));}
            }
        }
        else{echo json_encode(array('note'=>'Tag '.$tag->tag_name.' Not Created already exists at tag_id '.$tag->tag_id));}
    }
    else{echo json_encode(array('note'=>'No name added not possible to create a tag'));}
    

}


 
