
<?php
require "../../include/header.html" ;
if (isset($_GET['error'])){
  $singupCheck = $_GET['error'];
  if(isset($singupCheck )){
    echo $singupCheck;
  }
}
?>

<h1>View one task</h1>
  <form method="POST" action="read.one.php">
        
        
        
        <label for="name">Task ID:</label>
        <input type="text" name="task_id" id="task_id" <?= htmlspecialchars($task_id) ?>>
        
        
        
        <button>Submit</button>
    </form>
              
    
  
    <a href="../tasks.php">Back To Task Options</a><br><br>
    <a href="../../index.php">Back To Options Menu</a>
    <?php require "../../include/footer.html" ;
    ?>