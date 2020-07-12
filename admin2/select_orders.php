<?php  
$connect = mysqli_connect("localhost", "root", "IvanMata36", "coffee_bar_db"); 
$output = '';  
$sql = "SELECT * FROM basket ORDER BY id DESC";  
$result = mysqli_query($connect, $sql);  
$output .= '  
<div class="table-responsive">  
<table class="table table-hover table-bordered example1">  
<tr>  
<th>Order_id</th>
<th>name</th>
<th>address</th>
<th>Email</th>
<th>Phone</th> 
<th>Delete</th>  
</tr>';  
if(mysqli_num_rows($result) > 0)  
{  
  while($row = mysqli_fetch_array($result))  
  {  
   $output .= '  
   <tr>  
   <td>'.$row["id"].'</td>  
   <td class="first_name" data-id1="'.$row["id"].'" contenteditable>'.$row["customer_name"].'</td>  
   <td class="last_name" data-id2="'.$row["id"].'" contenteditable>'.$row["address"].'</td>
   <td class="first_name" data-id4="'.$row["id"].'" contenteditable>'.$row["email"].'</td>  
   <td class="last_name" data-id5="'.$row["id"].'" contenteditable>'.$row["contact_number"].'</td>  
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