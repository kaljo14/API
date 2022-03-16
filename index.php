<?php
ini_set("display_errors", "1");
  error_reporting(E_ALL);
echo "Hello";
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
        