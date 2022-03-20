
<?php
require "../include/header.html" ;
?>

<h1>View one task</h1>
  <form method="POST" action="read.one.php">
        
        
        
        <label for="name">Task ID:</label>
        <input type="text" name="task_id" id="task_id" <?= htmlspecialchars($task_id) ?>>
        
        
        
        <button>Submit</button>
    </form>
              
    
    <a href="../index.php">Back</a>
    <?php require "../include/footer.html" ;
    ?>