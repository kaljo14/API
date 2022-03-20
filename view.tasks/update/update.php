<?php


$create['task_id']=$_POST['task_id'];
$create['task_name']=$_POST['task_name'];
$create['tag_id']=$_POST['tag_id'];

$data=json_encode($create);


$ch=curl_init();
$url="http://localhost/API/tasks/update.php";

curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

$resp = curl_exec($ch);
$data =json_decode($resp,true);
curl_close($ch);

?>

<?php 
if(isset($data['note'])){echo $data['note'];}

?>

<?php
require "../../include/header.html" ;
?>
 

    <a href="../tasks.php">Back To Task Options</a><br><br>
    <a href="../../index.php">Back To Options Menu</a>
    
<?php require "../../include/footer.html" ?>
