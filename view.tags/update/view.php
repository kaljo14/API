
<?php
require "../../include/header.html" ;
if (!isset($_GET['error'])){
                 
                 exit();
             }
             else{
                 $singupCheck = $_GET['error'];
                 if(isset($singupCheck )){
                  echo $singupCheck;
                    
                    }
            }
?>

<h1>Update Tag</h1>
  <form method="POST" action="update.php">
    <label for="name">Tag ID:</label>
    <input type="text" name="tag_id" id="tag_id" <?= htmlspecialchars($tag_id) ?>>
    <label for="name">Tag New Name:</label>
    <input type="text" name="tag_name" id="tag_name" <?= htmlspecialchars($tag_name) ?>>
    <label for="name">Tag Color:</label>
    <input type="text" name="tag_color" id="tag_color" <?= htmlspecialchars($tag_color) ?>>
        
        
        
    <button>Submit</button>
    </form>
              
    
    <a href="../tags.php">Back To Tag Options</a><br>
    <a href="../../index.php">Back To Options Menu</a>
    <?php require "../../include/footer.html" ;
    ?>