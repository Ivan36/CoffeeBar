<?php
require_once 'includes/db.php';
error_reporting(0);
if (isset($_GET['food_id'])) {
	$fid = mysqli_real_escape_string($connect, $_GET['food_id']);
	$query = mysqli_query($connect, "SELECT * from food where id='$fid'");
	if (mysqli_num_rows($query) > 0) {
		$row = mysqli_fetch_array($query);
	}
}
else{
	header('location:manage_menu.php');
}
require_once 'includes/header.php';
require_once 'includes/sidebar.php';
?>
<?php 

if(!isset($_SESSION['user'])) {
	header("location: logout.php");
}

$msg = "";

if($_SERVER['REQUEST_METHOD'] == 'POST') {

	if(isset($_POST['submit'])) {

		$food_id = $_GET['food_id'];
		$cat = htmlentities($_POST['category'], ENT_QUOTES, 'UTF-8');
		$subcat = htmlentities($_POST['sub_category'], ENT_QUOTES, 'UTF-8');
		$name = htmlentities($_POST['name'], ENT_QUOTES, 'UTF-8');
		$price = htmlentities($_POST['price'], ENT_QUOTES, 'UTF-8');
		$desc = htmlentities($_POST['desc'], ENT_QUOTES, 'UTF-8');
		
		$UpdateSql = $db->query("UPDATE food SET food_name='$name', food_category='$cat', food_sub_category='$subcat', food_price='$price', food_description='$desc' where id='$food_id'");


		if($UpdateSql) {

			$msg = "<p style='color:green; padding: 10px; background: #eeffee;'>Food Updated successfully and changed on customer menu.</p>";

		}else{

			$msg = "<p style='color:red; padding: 10px; background: #ffeeee;'>Could not Update food record, try again</p>";

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
					<h1>Update Food</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">update food</li>
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
							<h3 class="card-title">update food</h3>
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
												<option value="<?php echo $row['food_category'] ?>" selected><?php echo $row['food_category'] ?></option>
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
												<option value="<?php echo $row['food_sub_category'] ?>" selected><?php echo $row['food_sub_category'] ?></option>
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
											<input type="text" value="<?php echo $row['food_name'] ?>" autofocus name="name" class="form-control" placeholder="Enter food Name" required />
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label style="color: #333" for="price">Price</label>
											<input type="text" value="<?php echo $row['food_price'] ?>" name="price" id="price" class="form-control" placeholder="Enter Food Price" required />
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label style="color: #333" for="txtarea">Description</label>
											<textarea id="txtarea" value="<?php echo $row['food_description'] ?>" rows="3" class="form-control" placeholder="Enter Food description" name="desc" required><?php echo $row['food_description'] ?></textarea>
										</div>
									</div>
								</div>
								<!-- <div class="form-group">
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
								</div> -->


							</div>
							<!-- /.card-body -->

							<div class="card-footer">
								<button type="submit" name="submit" class="btn btn-primary">Update Food</button>
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
												<td><a href="?food_id=<?php echo $row['id'] ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> edit</a></td>  
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