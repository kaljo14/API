<?php
require "../../include/header.html" ;
if (isset($_GET['error'])){
  $singupCheck = $_GET['error'];
  if(isset($singupCheck )){
    echo $singupCheck;
  }
}
?>

<h1> Delete Tag</h1>
  <form method="POST" action="delete.php">
        
        
        
        <label for="name">Tag ID:</label>
        <input type="text" name="tag_id" id="tag_id"  value="<?= $data["full_name"] ?>">
        
        
        
        <button>Submit</button>
    </form>
              
    
    <a href="../tags.php">Back To Tags Options</a><br>
    <a href="../../index.php">Back To Options Menu</a>
    <?php require "../../include/footer.html" ;
    ?>