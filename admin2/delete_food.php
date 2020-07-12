<?php  
require_once 'includes/db.php'; 
 $sql = "DELETE FROM food WHERE id = '".$_POST["id"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Deleted';  
 }  
 ?>