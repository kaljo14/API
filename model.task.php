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
    
    $query ='SELECT 
        ts.task_id,
        ts.task_name,
        tg.name,
        tg.id
        FROM tasks ts 
        JOIN task_relationship tsr ON ts.task_id = tsr.task_id 
        JOIN tags tg ON tsr.id=tg.id
        WHERE ts.task_id = ? LIMIT 0,1;';
    
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(1,$this->task_id);
        $stmt->execute();
        
        
        


        return $stmt;

}
}
