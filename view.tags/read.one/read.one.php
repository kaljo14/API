<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
require "../../include/header.html" ;
$full_name ="read.one.php?id=".$_POST['tag_id'];

$ch=curl_init();
$url="http://localhost/API/tags/$full_name";
//$url="http://localhost/API/tasks/read.one.php?id=2";

curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

$resp = curl_exec($ch);


$data =json_decode($resp,true);






curl_close($ch);?>
<?php if(isset($data['message'])){

 $error=$data['message'];
    header("Location: view.php?error=$error");
}
else{?>

<?php

?>

<h1>View One Tag</h1>
    
    <p>
        Table Name:  <?= htmlspecialchars($data[0]["tag_name"]) ?>&emsp;&emsp;
        Table ID:  <?= htmlspecialchars($data[0]["tag_id"]) ?> &emsp;&emsp;
     <?php if(isset($data[0]["tag_color"])){ ?>
         Table Color:  <?= htmlspecialchars($data[0]["tag_color"]) ?></p> <?php } ?>
    <table>
        <thead>

            <tr>
                
                <!-- <th>Tag ID</th>
                <th>Tag Name</th>
                <th>Tag Color</th> -->
                <th>Task Name</th>
                <th>ID</th>
            </tr>
        </thead>
        <tbody>

                    
            <?php foreach ($data as $value): ?>
                <tr>
                
                    <td><?= htmlspecialchars($value["task_name"]) ?></td>
                   <td><?= htmlspecialchars($value["task_id"]) ?></td>

                </tr>
                
             <?php endforeach; ?> 
            
        </tbody>
    </table>
    
    
    <a href="../tags.php">Back To Tag Options</a><br>
    <a href="../../index.php">Back To Options Menu</a>
    
<?php require "../../include/footer.html" ?>
<?php }?>