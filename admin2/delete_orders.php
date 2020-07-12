<?php  
require_once 'includes/db.php'; 
 $sql = "DELETE FROM basket WHERE id = '".$_POST["id"]."'";
 $sql = "DELETE FROM items WHERE order_id = '".$_POST["id"]."'";   
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Deleted';  
 }  
 ?>