<?php
require "../../include/header.html" ;
if (isset($_GET['error'])){
  $singupCheck = $_GET['error'];
  if(isset($singupCheck )){
    echo $singupCheck;
  }
}
?>

<h1> Delete task</h1>
  <form method="POST" action="delete.php">
        
        
        
        <label for="name">Task ID:</label>
        <input type="text" name="task_id" id="task_id"  value="<?= $data["full_name"] ?>">
        
        
        
        <button>Submit</button>
    </form>
              
    
    <a href="../tasks.php">Back To Task Options</a><br>
    <a href="../../index.php">Back To Options Menu</a>
    <?php require "../../include/footer.html" ;
    ?>