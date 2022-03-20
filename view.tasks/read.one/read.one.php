<?php
require "../../include/header.html" ;
ini_set("display_errors", "1");
error_reporting(E_ALL);
$full_name ="read.one.php?id=".$_POST['task_id'];

$ch=curl_init();
$url="http://localhost/API/tasks/$full_name";
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



<h1>View One Tasks</h1>
    
 
    <p>
        Task Name:  <?= htmlspecialchars($data[0]["task_name"]) ?>&emsp;&emsp;
        Task ID:  <?= htmlspecialchars($data[0]["task_id"]) ?> </p>

    <table>
        <thead>
            <tr>
                
                <th>Tag ID</th>
                <th>Tag Name</th>
                <th>Tag Color</th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach ($data as $value): ?>
                
                <tr>


                    <td><?= htmlspecialchars($value["tag_id"]) ?></td>
                    <td><?= htmlspecialchars($value["tag_name"]) ?></td>
                    <?php if(isset($data[0]["tag_color"])){ ?>
                    <td><?= htmlspecialchars($value["tag_color"]) ?></td><?php } ?>

                </tr>
                
             <?php endforeach; ?> 
            
        </tbody>
    </table>
    
    
    <a href="../tasks.php">Back To Task Options</a><br>
    <a href="../../index.php">Back To Options Menu</a>
    
<?php require "../../include/footer.html" ?>
<?php }?>