<?php
require_once 'includes/header.php';
require_once 'includes/sidebar.php';
?>
<?php 

if(!isset($_SESSION['user'])) {
	header("location: logout.php");
}

$msg = "";

if($_SERVER['REQUEST_METHOD'] == 'POST') {

	if(isset($_POST['submit']) && isset($_FILES['file'])) {

		$cat = htmlentities($_POST['category'], ENT_QUOTES, 'UTF-8');
		$subcat = htmlentities($_POST['sub_category'], ENT_QUOTES, 'UTF-8');
		$name = htmlentities($_POST['name'], ENT_QUOTES, 'UTF-8');
		$price = htmlentities($_POST['price'], ENT_QUOTES, 'UTF-8');
		$desc = htmlentities($_POST['desc'], ENT_QUOTES, 'UTF-8');
		$file = $_FILES['file'];
		$allowed_ext = array("jpg", "jpeg", "JPG", "JPEG", "png", "PNG");

		if($cat != "" && $name != "" && $subcat != "" && $price != "" && $desc != "" && empty($file) == false) {

			$ext = explode(".", $_FILES['file']['name']);

			if(in_array($ext[1], $allowed_ext)) {

				$check = $db->query("SELECT * FROM food WHERE food_name='".$name."' LIMIT 1");

				if($check->num_rows) {

					$msg = "<p style='color:red; padding: 10px; background: #ffeeee;'>No duplicate  food name allowed. Try again!!!</p>";

				}else{

					$insert = $db->query("INSERT INTO food(food_name, food_category, food_sub_category, food_price, food_description) VALUES('".$name."', '".$cat."', '".$subcat."', '".$price."', '".$desc."')");

					if($insert) {

						$ins_id = $db->insert_id;

						$image_url = "../image/FoodPics/$ins_id.jpg";

						if(move_uploaded_file($_FILES['file']['tmp_name'], $image_url)) {

							$msg = "<p style='color:green; padding: 10px; background: #eeffee;'>Food record successfully saved to menu.</p>";

						}else{

							$msg = "<p style='color:red; padding: 10px; background: #ffeeee;'>Could not insert record, try again</p>";

						}

					}

				}

			}else{

				$msg = "<p style='color:red; padding: 10px; background: #ffeeee;'>Invalid image file format</p>";

			}

		}else{

			$msg = "<p style='color:red; padding: 10px; background: #ffeeee;'>Incomplete form data</p>";

		}

	}

}

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Add Food to Menu</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Add food</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-md-6">
					<!-- general form elements -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">add food <a href="manage_menu.php" class="btn btn-secondary btn-sm"> view food menu</a></h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form method="post" action="" role="form" enctype="multipart/form-data">
							<div class="card-body">
								
								<div class="row">
									<div class="col-md-12">
										<?php if (isset($msg)) {
											echo $msg; 
										}?>

										<div class="form-group">
											<label style="color: #333">category</label>
											<select name="category" class="form-control" required >
												<option value="">Select food category</option>
												<option value="breakfast">Breakfast</option>
												<option value="lunch">Lunch</option>
												<option value="dinner">Dinner</option>
												<option value="special">Special</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label style="color: #333">Sub category</label>
											<select name="sub_category" class="form-control" required >
												<option value="">Select food sub category</option>
												<option value="drinks">Drinks</option>
												<option value="foods">Foods</option>
												<option value="snacks">Snacks</option>
												<option value="water">Water</option>
												<option value="juice">Juice</option>
											</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label style="color: #333">Food Name</label>
											<input type="text" autofocus name="name" class="form-control" placeholder="Enter food Name" required />
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label style="color: #333" for="price">Price</label>
											<input type="text" name="price" id="price" class="form-control" placeholder="Enter Food Price" required />
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label style="color: #333" for="txtarea">Description</label>
											<textarea id="txtarea" rows="3" class="form-control" placeholder="Enter Food description" name="desc" required></textarea>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="exampleInputFile">Food menu image</label>
									<div class="input-group">
										<div class="custom-file">
											<input type="file" class="custom-file-input" name="file" id="exampleInputFile" required="true">
											<label class="custom-file-label" for="exampleInputFile">Select food Image</label>
										</div>
										<div class="input-group-append">
											<span class="input-group-text" id="">Upload</span>
										</div>
									</div>
								</div>


							</div>
							<!-- /.card-body -->

							<div class="card-footer">
								<button type="submit" name="submit" class="btn btn-primary">Save Food</button>
							</div>
						</form>
					</div>
					<!-- /.card -->	

				</div>
				<!--/.col (left) -->
				<!-- right column -->
				<div class="col-md-6">
					<div class="card card-success">
						<div class="card-header">
							<h3 class="card-title">Table with Saved food menu</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example3" class="table table-bordered table-striped">
								<thead>
									<tr>  
										<th width="1%">S/N</th>
										<th width="2%">name</th>
										<th width="2%">Category</th>
										<th width="2%">price</th>  
									</tr>'
								</thead>
								<tbody>
									<?php
									$sql = "SELECT * FROM food ORDER BY id DESC";
									$result = mysqli_query($connect, $sql); 
									if(mysqli_num_rows($result) > 0)  
									{  
										while($row = mysqli_fetch_array($result))  
										{ 
											?>
											<tr>  
												<td><?php echo $row["id"]; ?></td>  
												<td><?php echo $row["food_name"]; ?></td>  
												<td><?php echo $row["food_category"]; ?></td>
												<td><?php echo $row["food_price"]; ?></td>  
											</tr>
										<?php }} ?>
									</tbody>

								</table>
							</div>
							<!-- /.card-body -->
						</div>

					</div>
					<!--/.col (right) -->
				</div>
				<!-- /.row -->
			</div><!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>

	<?php require_once 'includes/footer.php' ?>