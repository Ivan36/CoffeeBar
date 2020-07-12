<?php 
	
	session_start();
	require "includes/functions.php";
	require "includes/db.php";
    if(!isset($_SESSION['user'])) {
        header("location: logout.php");
    }
	
	$result = "";
	$pagenum = "";
	$per_page = 20;
		
		$count = $db->query("SELECT * FROM food");
		
		$pages = ceil((mysqli_num_rows($count)) / $per_page);
		
		if(isset($_GET['page'])) {
			
			$page = $_GET['page'];
			
		}else{
			
			$page = 1;
			
		}
						
		$start = ($page - 1) * $per_page;
		
		$cat = $db->query("SELECT * FROM food LIMIT $start, $per_page");
		
		if($cat->num_rows) {
			
			$result = "<table class='table table-hover table-striped'>
						<thead>
							<th>S/N</th>
							<th>name</th>
							<th>price</th>
							<th>Category</th>
							<th>Action</th>
						</thead>
						<tbody>";
			
			$x = 1;
			
			while($row = $cat->fetch_assoc()) {
				
				$id = $row['id'];
				$foodName = $row['food_name'];
				$foodCat = $row['food_category'];
				$foodPrice = $row['food_price'];
				$foodDesc = $row['food_description'];
				
				
				$result .=  "<tr>
								<td>$x</td>
								<td>$foodName</td>
								<td>$foodPrice</td>
								<td>$foodCat</td>
								<td><a href='food_list.php?delete=".$id."' onclick='return check();'><i class='pe-7s-close-circle'></i></a></td>
							</tr>";
																
									
				$x++;
			}
			
			$result .= "</tbody>
						</table>";
			
		}else{
			
			$result = "<p style='color:red; padding: 10px; background: #ffeeee;'>No records available in the database yet</p>";
			
		}
						
						
		
	
	if(isset($_GET['delete'])) {
		
		$delete = preg_replace("#[^0-9]#", "", $_GET['delete']);
		
		if($delete != "") {
			
			$sql = $db->query("DELETE FROM food WHERE id='".$delete."'");
		
			if($sql) {
				
				echo "<script>alert('Successfully deleted')</script>";
				
			}else{
				
				echo "<script>alert('Operation Unsuccessful. Please try again')</script>";
				
			}
			
		}
		
		
	}
	
	
	
?>

<?php require 'includes/header.php'; ?>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title" style="text-align: left;padding-left: 10px; background: #2abccc; color: #fff; border-right: 2px solid #fff;">Food List</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                
								<?php echo $result; ?>
								
								<p style="padding: 0px 20px;"><?php if($pages >= 1 && $page <= $pages) {
									for($i = 1; $i <= $pages; $i++) {
										echo ($i == $page) ? "<a href='food_list.php?page=".$i."' style='margin-left:5px; font-weight: bold; text-decoration: none; color: #FF5722;' >$i</a>  "  : " <a href='food_list.php?page=".$i."' class='btn'>$i</a> ";
									}
								} ?></p>

                            </div>
                        </div>
                    </div>                    

                </div>
            </div>
        </div>

        <?php require 'includes/footer.php'; ?>
