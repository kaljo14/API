
<?php
require "../../include/header.html" ;
?><?php



$create['tag_name']=$_POST['tag_name'];
$create['tag_color']=$_POST['tag_color'];
$create['tag_id']=$_POST['tag_id'];


$data=json_encode($create);

if($data->tag_id ==""){header("Location: view.php?error=NotagId");}

$ch=curl_init();
$url="http://localhost/API/tags/update.php";

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
