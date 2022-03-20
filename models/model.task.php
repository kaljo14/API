<?php
class Task {

    private $conn;
    
    public $tag_id;
    public $tag_name;
    public $task_id;
    public $task_name;
    public $tag_color;
public function __construct($db){
    $this->conn =$db;
}
 
public function  select_task(){

        $query ='SELECT task_id FROM tasks WHERE task_name =?;
        ';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1,$this->task_name);
        $stmt->execute();
         $row = $stmt->fetch(PDO::FETCH_ASSOC);
        //$this->task_id =$row['task_id'];
        if(isset($row['task_id'])){
            //print_r($row);
            $this->task_id = $row['task_id'];
        }
        return $stmt;
}
public function  select_tag(){

        $query ='SELECT id,name FROM tags WHERE id= ?;
        ';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1,$this->tag_id);
        $stmt->execute();
         $row = $stmt->fetch(PDO::FETCH_ASSOC);
        //$this->task_id =$row['task_id'];
        if (!isset($row['id']))
        $this->tag_id = null;
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
        tg.id,
        tg.tag_color
        FROM tasks ts 
         LEFT JOIN task_relationship tsr ON ts.task_id = tsr.task_id 
        LEFT JOIN tags tg ON tsr.id=tg.id
        ORDER BY ts.task_id, ts.task_name;
        ';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
public function select_one(){
    $query ='SELECT task_name FROM tasks WHERE task_id = ?;';
    $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(1,$this->task_id);
        $stmt->execute();
       $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
          if(isset($row['task_name']))
          $this->task_name = $row['task_name'];
          


    $query ='SELECT tags.* 
    FROM task_relationship 
    JOIN tags ON task_relationship.id = tags.id 
    WHERE task_relationship.task_id = ?;';
    
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(1,$this->task_id);
        $stmt->execute();
        
        
        


        return $stmt;
}
public function check_duplicate_task_name_id(){
    $this->task_id=null;
    $query ='SELECT task_name,task_id FROM tasks WHERE task_name=:task_name';
    $stmt = $this->conn->prepare($query);
    $this->task_name = htmlspecialchars(strip_tags($this->task_name));
    $stmt->bindParam(':task_name', $this->task_name);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);


    if (isset($row['task_id'])){
        $this->task_id=$row['task_id'];

    }
    
    return $stmt;

    
}
public function create_name(){
    $this->check_duplicate_task_name_id();
    //print_r($this);
    
    if(isset($this->task_id)){return false;}

    $query = 'INSERT INTO  tasks 
    SET task_name = :task_name ';
    $stmt = $this->conn->prepare($query);
    $this->task_name = htmlspecialchars(strip_tags($this->task_name));
    $stmt->bindParam(':task_name', $this->task_name);
    
    if($stmt->execute() ) {return true;}
    else{
        printf("Error: %s.\n", $stmt->error);
        return false;
    }
}
public function check_duplicate_name(){

    $query ='SELECT task_name,task_id FROM tasks WHERE task_name=:task_name';
    $stmt = $this->conn->prepare($query);
    $this->task_name = htmlspecialchars(strip_tags($this->task_name));
    $stmt->bindParam(':task_name', $this->task_name);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);


    if (isset($row['task_id'])){
        return $row['task_id'];
    }
     
}
    
public function updateName(){
    $ifExists=$this->check_duplicate_name();
    //print_r($ifExists);

    if(isset($ifExists)){return false;}

    $query = 'UPDATE  tasks 
    SET task_name = :task_name 
    WHERE task_id =:task_id
    ';
    $stmt = $this->conn->prepare($query);

    $this->task_name = htmlspecialchars(strip_tags($this->task_name));
    $this->task_id = htmlspecialchars(strip_tags($this->task_id));

    $stmt->bindParam(':task_name', $this->task_name);
    $stmt->bindParam(':task_id', $this->task_id);

     if($stmt->execute()) {
            return true;
      }
      printf("Error: %s.\n", $stmt->error);

      return false;
    }
public function create_tag(){
    
    $this->select_tag();
    $this->select_task();

    if(isset($this->tag_id) && isset($this->task_id)){
        

            $query = 'INSERT INTO  task_relationship
            SET task_id = :task_id ,id =:tag_id';
            $stmt = $this->conn->prepare($query);
            $this->tag_id = htmlspecialchars(strip_tags($this->tag_id));
            $stmt->bindParam(':task_id', $this->task_id);
            $stmt->bindParam(':tag_id', $this->tag_id);
            if($stmt->execute()) {return true;}
            else{
                printf("Error: %s.\n", $stmt->error);
                return false;}
        }

    return true;

}

public function updateTag(){
    
    $query = 'SELECT * From task_relationship WHERE task_id=:task_id LIMIT 0,1;';
    $stmt = $this->conn->prepare($query);
    $this->task_id = htmlspecialchars(strip_tags($this->task_id));
    $stmt->bindParam(':task_id', $this->task_id);
    $stmt->execute();
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if(isset($row['id'])){
    $changeTag =$row['id'];}
    
    $query = 'UPDATE  task_relationship
        SET id =:tag_id
        WHERE task_id =:task_id AND id=:changeTag;
    ';
    $stmt = $this->conn->prepare($query);
    $this->tag_id = htmlspecialchars(strip_tags($this->tag_id));
    //$this->task_id = htmlspecialchars(strip_tags($this->task_id));

    $stmt->bindParam(':tag_id', $this->tag_id);
    $stmt->bindParam(':task_id', $this->task_id);
    $stmt->bindParam(':changeTag',$changeTag);

    if($stmt->execute()) {
            return true;
      }
      printf("Error: %s.\n", $stmt->error);

      return false;
    }
public function delete(){

    $query = 'DELETE FROM tasks WHERE task_id = :task_id';
    $stmt = $this->conn->prepare($query);

    $this->task_id = htmlspecialchars(strip_tags($this->task_id));
    $stmt->bindParam(':task_id', $this->task_id);
    if($stmt->execute()) {
            return true;
      }
      printf("Error: %s.\n", $stmt->error);

      return false;



}

}

