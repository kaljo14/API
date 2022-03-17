<?php
class Task {

    private $conn;
    private $table='tasks' ;
    public $tag_id;
    public $tag_name;
    public $task_id;
    public $task_name;

public function __construct($db){
    $this->conn =$db;
}
 
public function  select_task(){

        $query ='SELECT task_id,task_name FROM tasks
        ';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        //  $row = $stmt->fetch(PDO::FETCH_ASSOC);
        //  $this->task_id =$row['task_id'];
        //  $this->task_name=$row['task_name'];
        return $stmt;
    }
public function  select_tag(){

        $query ='SELECT id,name FROM tags
        ';
        
       $stmt = $this->conn->prepare($query);
        $stmt->execute();
        //  $row = $stmt->fetch(PDO::FETCH_ASSOC);
        //  $this->tag_id =$row['id'];
        //  $this->tag_name=$row['name'];
        return $stmt;
    }
public function  add_tag($task_id,$tag_id){

        $query ='SELECT tsr.task_id,tg.name ,tg.id 
        FROM task_relationship tsr 
        INNER JOIN tags tg ON tsr.id=tg.id 
        WHERE tsr.task_id = ? AND tg.id=?;
        ';
        
       $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(1,$task_id);
        $stmt->bindParam(2,$tag_id);
        $stmt->execute();
        ;
        //  $row = $stmt->fetch(PDO::FETCH_ASSOC);
        //  $this->tag_id =$row['id'];
        //  $this->tag_name=$row['name'];
        return $stmt;
    }


public function  select_all(){

        $query ='SELECT 
        ts.task_id,
        ts.task_name,
        tg.name,
        tg.id
        FROM tasks ts 
        JOIN task_relationship tsr ON ts.task_id = tsr.task_id 
        JOIN tags tg ON tsr.id=tg.id;
        ';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
public function select_one(){
    $query ='SELECT name FROM tags WHERE id = ?;';
    $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(1,$this->tag_id);
        $stmt->execute();
       $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
          $this->tag_name = $row['name'];


    $query ='SELECT tasks.* 
    FROM task_relationship 
    JOIN tasks ON task_relationship.task_id = tasks.task_id
     WHERE task_relationship.id = ?;';
    
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(1,$this->tag_id);
        $stmt->execute();
        
        
        


        return $stmt;

}
}
// public function add_tag($id,$task_id){
//     $query ='SELECT ts.task_id,tg.name ,tg.id 
//     FROM tasks ts 
//     JOIN task_relationship tsr ON ts.task_id = tsr.task_id 
//     JOIN tags tg ON tsr.id=tg.id 
//     WHERE ts.task_id = ? 
//     AND tg.id=?;';
    
//         $stmt = $this->conn->prepare($query);
        
//         $stmt->bindParam(1,$id,2,$task_id);
//         $stmt->execute();
//       return $stmt;


// }
// }
