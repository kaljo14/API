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
                    elseif($singupCheck == 'char'){
                        echo "<p class = 'error' > Please entere only characters as your name!<p>";
                        exit();
                    }
                    elseif($singupCheck == 'success'){
                        echo "<p class = 'success' > You have added the item successfuly!<p>";
                        exit();
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