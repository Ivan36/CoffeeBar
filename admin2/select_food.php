<?php  
require_once 'includes/db.php';
$output = '';  
$sql = "SELECT * FROM food ORDER BY id DESC";  
$result = mysqli_query($connect, $sql);  
$output .= '  
<div class="table-responsive">  
<table class="table table-hover table-bordered example1">  
<tr>  
<th>S/N</th>
<th>name</th>
<th>Category</th>
<th>price</th> 
<th>Description</th> 
<th>Delete</th>  
</tr>';  
if(mysqli_num_rows($result) > 0)  
{  
  while($row = mysqli_fetch_array($result))  
  {  
   $output .= '  
   <tr>  
   <td>'.$row["id"].'</td>  
   <td  data-id1="'.$row["id"].'" contenteditable>'.$row["food_name"].'</td>  
   <td  data-id2="'.$row["id"].'" contenteditable>'.$row["food_category"].'</td>
   <td  data-id4="'.$row["id"].'" contenteditable>'.$row["food_price"].'</td>  
   <td  data-id5="'.$row["id"].'" contenteditable>'.$row["food_description"].'</td>  
   <td><button type="button" name="delete_btn" data-id3="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
   </tr>  
   ';  
 }  

}  
else  
{  
  $output .= '<tr>  
  <td colspan="4">Data not Found</td>  
  </tr>';  
}  
$output .= '</table>  
</div>';  
echo $output;  
?>