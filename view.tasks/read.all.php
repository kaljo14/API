<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
require "../include/header.html" ;
$ch=curl_init();
$url="http://localhost/API/tasks/read.php";
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

$resp = curl_exec($ch);
$data =json_decode($resp,true);
curl_close($ch);
$sort_data=array();
// Sorting data 
for($i=0;$i<sizeof($data);$i++){
 
if(isset($data[$i]) && isset($data[$i+1])){
if($data[$i]['task_name']==$data[$i+1]['task_name']){

    $data[$i+1]['tag_id']= $data[$i+1]['tag_id'] .", ". $data[$i]['tag_id'];
    $data[$i+1]['tag_name']= $data[$i+1]['tag_name'] .", ". $data[$i]['tag_name'];
    $data[$i+1]['tag_color']= $data[$i+1]['tag_color'] .", ". $data[$i]['tag_color'];
    unset($data[$i]);
}
}
}





?>
 <h1>Tasks</h1>
    
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
    
    
    <a href="tasks.php">Back To Task Options</a>
    <br>
    <a href="../index.php">Back To Options Menu</a>
    
<?php require "../include/footer.html" ?>