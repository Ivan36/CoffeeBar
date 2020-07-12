<?php
require_once 'includes/header.php';
require_once 'includes/sidebar.php';

if(isset($_GET['delete'])) {

	$delete = preg_replace("#[^0-9]#", "", $_GET['delete']);

	if($delete != "") {

		$sql = $db->query("DELETE FROM food WHERE id='".$delete."'");
		
		if($sql) {

			echo "<script>alert('Successfully deleted')</script>";
			echo "<script>location.href='manage_menu.php'</script>";

		}else{

			echo "<script>alert('Operation Unsuccessful. Please try again')</script>";

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
					<h1>Manage food Menu</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">food menu</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- right column -->
				<div class="col-md-12 col-lg-12">
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Table with Saved food menu <a href="food_add.php" class="btn btn-secondary btn-sm"> Add food to menu</a></h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example" class="table table-bordered table-striped">
								<thead>
									<tr>  
										<th width="1%">S/N</th>
										<th width="2%">name</th>
										<th width="2%">Category</th>
										<th width="2%">Sub Category</th>
										<th width="2%">price</th>  
										<th width="2%">Details</th> 
										<th width="2%">Image</th>
										<th width="2%">Action</th> 
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
												<td style="padding-top: 45px;"><?php echo $row["id"]; ?></td>  
												<td style="padding-top: 45px;"><?php echo $row["food_name"]; ?></td>  
												<td style="padding-top: 45px;"><?php echo $row["food_category"]; ?></td>
												<td style="padding-top: 45px;"><?php echo $row["food_sub_category"]; ?></td> 
												<td style="padding-top: 45px;"><?php echo $row["food_price"]; ?></td>
												<td style="padding-top: 15px;"><?php echo $row["food_description"]; ?></td>
												<td><img src="../image/FoodPics/<?php echo$row["id"].".jpg" ?>" style="width: 150px; height: 100px; border-radius: 5px;" ></td>
												<td align="center">
													<a href="update_food.php?food_id=<?php echo $row['id'] ?>" class="btn btn-info btn-sm" style="margin-top: 10px;"><i class="fa fa-edit"></i> edit</a>
													<a href="?delete=<?php  echo $row["id"]; ?>" onclick='return check();' style="margin-top: 10px;" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> delete</a>
												</td>  
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
