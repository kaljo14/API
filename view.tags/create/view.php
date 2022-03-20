
<?php
require "../../include/header.html" ;
?>

<h1>Create Tag</h1>
  <form method="POST" action="create.php">
        <label for="name">Tag Name:</label>
        <input type="text" name="tag_name" id="tag_name" <?= htmlspecialchars($tag_name) ?>>
        <label for="name">Tag Color:</label>
        <input type="text" name="tag_color" id="tag_color" <?= htmlspecialchars($tag_color) ?>>
        
        
        
        <button>Submit</button>
    </form>
              
    
    <a href="../tags.php">Back To Tags Options</a><br>
    <a href="../../index.php">Back To Options Menu</a>
    <?php require "../../include/footer.html" ;
    ?>