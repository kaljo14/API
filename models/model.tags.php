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
public function check_duplicate_name(){
    $this->tag_id=null;
    $query ='SELECT name,id FROM tags WHERE name=:tag_name;';
    $stmt = $this->conn->prepare($query);
    $this->tag_name = htmlspecialchars(strip_tags($this->tag_name));
    $stmt->bindParam(':tag_name', $this->tag_name);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);


    if (isset($row['id'])){
        $this->tag_id=$row['id'];
    }

}
public function create_name(){
    $this->check_duplicate_name();

    if(isset($this->tag_id)){return false;}
    $query = 'INSERT INTO  tags 
    SET name = :tag_name;';
    $stmt = $this->conn->prepare($query);
    $this->task_name = htmlspecialchars(strip_tags($this->tag_name));
    $stmt->bindParam(':tag_name', $this->tag_name);
    
    if($stmt->execute() ) {return true;}
    else{
        printf("Error: %s.\n", $stmt->error);
        return false;
    }
}
public function create_color(){
    $query = 'UPDATE tags 
    SET tag_color = :tag_color
    WHERE name=:tag_name;';
    $stmt = $this->conn->prepare($query);
    $this->task_name = htmlspecialchars(strip_tags($this->tag_color));
    $stmt->bindParam(':tag_color', $this->tag_color);
    $stmt->bindParam(':tag_name', $this->tag_name);
    
    if($stmt->execute() ) {return true;}
    else{
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

}
public function delete(){

    $query = 'DELETE FROM tags WHERE id = :tag_id';
    $stmt = $this->conn->prepare($query);

    $this->task_id = htmlspecialchars(strip_tags($this->tag_id));
    $stmt->bindParam(':tag_id', $this->tag_id);
    if($stmt->execute()) {
            return true;
      }
      printf("Error: %s.\n", $stmt->error);

      return false;



}
public function check_duplicate_name_update(){
    $query ='SELECT name,id FROM tags WHERE name=:tag_name;';
    $stmt = $this->conn->prepare($query);
    $this->tag_name = htmlspecialchars(strip_tags($this->tag_name));
    $stmt->bindParam(':tag_name', $this->tag_name);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);


    if (isset($row['id'])){
    return $row['id'];
    }
}
 public function update_name(){
      $ifExists=$this->check_duplicate_name();
    //print_r($ifExists);

    if(isset($ifExists)){return false;}

    $query = 'UPDATE  tags 
    SET name = :tag_name 
    WHERE id =:tag_id
    ';
    $stmt = $this->conn->prepare($query);

    $this->task_name = htmlspecialchars(strip_tags($this->tag_name));
    $this->task_id = htmlspecialchars(strip_tags($this->tag_id));

    $stmt->bindParam(':tag_name', $this->tag_name);
    $stmt->bindParam(':tag_id', $this->tag_id);

     if($stmt->execute()) {
            return true;
      }
      printf("Error: %s.\n", $stmt->error);

      return false;
 }

}