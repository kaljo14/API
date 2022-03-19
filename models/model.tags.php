<?php
class Tags{
private $conn;
public $tag_id;
public $tag_name;
public $tag_color;
public $task_name;
public $task_id;


public function __construct($db){
    $this->conn =$db;
}
public function  select_all(){

        $query ='SELECT ts.task_id,
        ts.task_name, 
        tg.name,
        tg.id,
        tg.tag_color
        FROM tags tg 
        LEFT JOIN task_relationship tsr ON tg.id = tsr.id 
        LEFT JOIN tasks ts ON tsr.task_id=ts.task_id 
        ORDER BY id;
        ';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
public function select_one(){

    $query ='SELECT * FROM tags WHERE id = ?;';
    $stmt = $this->conn->prepare($query);
        
    $stmt->bindParam(1,$this->tag_id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(isset($row['name'])){
    $this->tag_name = $row['name'];
    $this->tag_color = $row['tag_color'];
}


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