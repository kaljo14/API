<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);

$ch=curl_init();
$url="http://localhost/API/tags/read.all.php";
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

$resp = curl_exec($ch);


    $data =json_decode($resp,true);

   

curl_close($ch);
require "../include/header.html" ;
?>
 <h1>All Tags </h1>
    
    <table>
        <thead>
            <tr>
                
                <th>Tag ID</th>
                <th>Tag Name</th>
                <th>Tag Color</th>
                <th>ID</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach ($data as $value): ?>
                
                <tr>
                    
                    <td><?= htmlspecialchars($value["tag_id"]) ?></td>
                    <td><?= htmlspecialchars($value["tag_name"]) ?></td>
                    <td><?= htmlspecialchars($value["tag_color"]) ?></td>
                    <td><?= htmlspecialchars($value["task_id"]) ?></td>
                    <td><?= htmlspecialchars($value["task_name"]) ?></td>
                </tr>
                
            <?php endforeach; ?>
            
        </tbody>
    </table>
    
    
    <a href="tags.php">Back To Tag Options</a>
    <br>
    <a href="../index.php">Back To Options Menu</a>
    
<?php require "../include/footer.html" ?>