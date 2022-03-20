
<?php
require "../../include/header.html" ;
?>

<h1>View one Tag</h1>
  <form method="POST" action="read.one.php">
        
        
        
        <label for="name">Tag ID:</label>
        <input type="text" name="tag_id" id="tag_id" <?= htmlspecialchars($tag_id) ?>>
        
        
        
        <button>Submit</button>
    </form>
              
    
  
    <a href="../tags.php">Back To Tag Options</a><br><br>
    <a href="../../index.php">Back To Options Menu</a>
    <?php require "../../include/footer.html" ;
    ?>