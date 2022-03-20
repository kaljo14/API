<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
require "../../include/header.html" ;
$delete['task_id']=$_POST['task_id'];



$data=json_encode($delete);


$ch=curl_init();
$url="http://localhost/API/tasks/delete.php";

curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

$resp = curl_exec($ch);
$data =json_decode($resp,true);
curl_close($ch);
 if(isset($data['note'])){
     $error=$data['note'];
    header("Location: view.delete.php?error=$error");
}
 require "../../include/footer.html" ?>
