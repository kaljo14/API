<?php
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
<?php if(isset($data['message'])){echo $data['message'];}
else{?>

<?php
require "../include/header.html" ;
?>

<h1>View One Tasks</h1>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Tag ID</th>
                <th>Tag Name</th>
                <th>Tag Color</th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach ($data as $value): ?>
                
                <tr>
                    <td><?= htmlspecialchars($value["task_id"]) ?></td>
                    <td><?= htmlspecialchars($value["task_name"]) ?></td>
                    <td><?= htmlspecialchars($value["tag_id"]) ?></td>
                    <td><?= htmlspecialchars($value["tag_name"]) ?></td>
                    <td><?= htmlspecialchars($value["tag_color"]) ?></td>

                </tr>
                
             <?php endforeach; ?> 
            
        </tbody>
    </table>
    
    <a href="../index.php">Back</a>
    
<?php require "../include/footer.html" ?>
<?php }?>