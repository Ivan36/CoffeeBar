<?php  
require_once 'includes/db.php';
$output = '';  
$sql = "SELECT * FROM food ORDER BY id DESC";  
$result = mysqli_query($connect, $sql);  
$output .= '  
<div class="table-responsive">  
<table class="table table-hover table-bordered">  
<tr>  
<th width="1%">S/N</th>
<th width="2%">name</th>
<th width="2%">Category</th>
<th width="2%">price</th>  
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