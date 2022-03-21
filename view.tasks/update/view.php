
<?php
require "../../include/header.html" ;
if (isset($_GET['error'])){
  $singupCheck = $_GET['error'];
  if(isset($singupCheck )){
    echo $singupCheck;
  }
}
?>

<h1>Update Task</h1>
  <form method="POST" action="update.php">
    <label for="name">Task ID:</label>
    <input type="text" name="task_id" id="task_id" <?= htmlspecialchars($task_id) ?>>
    <label for="name">Task New Name:</label>
    <input type="text" name="task_name" id="task_name" <?= htmlspecialchars($task_name) ?>>
    <label for="name">Tag ID:</label>
    <input type="text" name="tag_id" id="tag_id" <?= htmlspecialchars($tag_id) ?>>
        
        
        
    <button>Submit</button>
    </form>
              
    
    <a href="../tasks.php">Back To Task Options</a><br>
    <a href="../../index.php">Back To Options Menu</a>
    <?php require "../../include/footer.html" ;
    ?>