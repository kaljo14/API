<?php
require "../include/header.html" ;
?>

<h1> Delete task</h1>
  <form method="POST" action="delete.php">
        
        
        
        <label for="name">Task ID:</label>
        <input type="text" name="task_id" id="task_id"  value="<?= $data["full_name"] ?>">
        
        
        
        <button>Submit</button>
    </form>
              
    
    <a href="../index.php">Back</a>
    <?php require "../include/footer.html" ;
    ?>