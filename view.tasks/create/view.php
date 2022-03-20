
<?php
require "../../include/header.html" ;
?>

<h1>Create Task</h1>
  <form method="POST" action="create.php">
        <label for="name">Task Name:</label>
        <input type="text" name="task_name" id="task_name" <?= htmlspecialchars($task_name) ?>>
        <label for="name">Tag ID:</label>
        <input type="text" name="tag_id" id="tag_id" <?= htmlspecialchars($tag_id) ?>>
        
        
        
        <button>Submit</button>
    </form>
              
    
    <a href="../tasks.php">Back To Task Options</a><br>
    <a href="../../index.php">Back To Options Menu</a>
    <?php require "../../include/footer.html" ;
    ?>