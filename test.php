;<?php
// ini_set("display_errors", "1");
  error_reporting(E_ALL);
include 'Dbh.php';
include 'model.task.php';
$database = new Dbh();
  $db = $database->connect();
$task = new Task($db);

  $result = $task->select_all();
  
  $num = $result->rowCount();
  if($num > 0) {
            
            $tasks_arr = array();
            // $tasks_arr['data'] = array();
                $i=0;
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $task_item = array(
                'id' => $id,
                'task_id' => $task_id,
                'task_name'=> $task_name,
                'tag_name'=>$name
            );


            // Push to "data"
            array_push($tasks_arr, $task_item); 
        
        }
        echo sizeof($task_item) . "HERE!!!". count($tasks_arr);
        // print_r($task_item);
        // echo '<br>'.$i;
        // echo $task_item['id'];
        print_r($tasks_arr). "<br>";
        echo $tasks_arr[4]['id']."<br><br>";
       // $tasks_arr[0]['tag_name'] = $tasks_arr[0]['tag_name'] .", ". $tasks_arr[4]['tag_name'];
        //unset($tasks_arr[4]);
        print_r($tasks_arr);
        // foreach($tasks_arr as $key=>$val){
        //    echo "Key is: ".$key.", "."Value is: ".$val;
        // echo "<br>";
        // }
         
        $i=1; 
        //  for ($j=0;$j<count($tasks_arr)-1;$j++){
        //     if($tasks_arr[$j]['task_id'] = $tasks_arr[$i]['task_id'] || $tasks_arr[$j]['tag_name'] = $tasks_arr[$i]['tag_name'])
        //      {
        //         // echo "<br> j is :".$j;
        //         $tasks_arr[$j]['tag_name'] = $tasks_arr[$j]['tag_name'] .", ". $tasks_arr[$i]['tag_name'];
        //      }

        //      echo $tasks_arr[$j]['task_id']."----".$tasks_arr[$i]['task_id']."<br>";
        //      //$i++;
        //     echo $j;
        //     $i++;
        //     }
        //     echo"<br>" . $i;
         
         for ($j=0;$j<count($tasks_arr);$j++){
             for ($i=1;$i<count($tasks_arr);$i++){
                // if($tasks_arr[$j]['task_id'] = $tasks_arr[$i]['task_id'] ){
             echo "<br>".$tasks_arr[$j]['task_id']."----".$tasks_arr[$i]['task_id'];
             // $tasks_arr[$j]['tag_name'] = $tasks_arr[$j]['tag_name'] .", ". $tasks_arr[$i]['tag_name'];
                 //}
             }
         }
        //print_r($tasks_arr);

}


Try SELECT ts.task_id, tg.name, tg.id FROM tasks ts JOIN task_relationship tsr ON ts.task_id = tsr.task_id JOIN tags tg ON tsr.id=tg.id WHERE ts.task_id = 1;