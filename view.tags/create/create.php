<?php
require "../../include/header.html" ;

$create['tag_name']=$_POST['tag_name'];
$create['tag_color']=$_POST['tag_color'];

$data=json_encode($create);


$ch=curl_init();
$url="http://localhost/API/tags/create.php";

curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

$resp = curl_exec($ch);
$data =json_decode($resp,true);
curl_close($ch);

if(isset($data['note'])){
     $error=$data['note'];
    header("Location: view.php?error=$error");
}

    
 require "../../include/footer.html" ?>
