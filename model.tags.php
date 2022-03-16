<?php
class Tags{
private $id;
private $name;
private $tag_color;
private $table ='tags';

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
}