<?php
require_once 'includes/header.php';
require_once 'includes/sidebar.php';

if(isset($_GET['delete'])) {

	$delete = preg_replace("#[^0-9]#", "", $_GET['delete']);

	if($delete != "") {

		$sql = $db->query("DELETE FROM basket WHERE id='".$delete."'");
		
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
					<h1>Manage food Orders</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">food orders</li>
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
							<h3 class="card-title">Table with all food orders</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example" class="table table-bordered nowrap table-striped">
								<thead>
									<tr>  
										<th width="1%">ORDID</th>
										<th width="2%">Customer</th>
										<th width="2%">Contact</th>
										<th width="2%">Email</th>  
										<th width="2%">Address</th> 
										<th width="2%">Status</th> 
										<th width="2%">Action</th> 
									</tr>
								</thead>
								<tbody>
									<?php
									$sql = "SELECT * FROM basket ORDER BY id ASC LIMIT 20";
									$result = mysqli_query($connect, $sql); 
									if(mysqli_num_rows($result) > 0)  
									{  
										while($row = mysqli_fetch_array($result))  
										{ 
											?>
											<tr>  
												<td><?php echo $row["id"]; ?></td>  
												<td><?php echo $row["customer_name"]; ?></td>  
												<td><?php echo $row["contact_number"]; ?></td>
												<td><?php echo $row["email"]; ?></td>  
												<td><?php echo $row["address"]; ?></td> 
												<td><?php if ($row["status"]=='pending') {
													echo "<p style='background-color:orange;text-align:center;'>Pending</p>";
												}else if ($row["status"]=='accepted') {
													echo "<p style='background-color:blue;text-align:center;color:white;'>Accepted</p>";
												}
												else if ($row["status"]=='served') {
													echo "<p style='background-color:green;text-align:center;color:white;'>Served</p>";
												}
												else if ($row["status"]=='canceled') {
													echo "<p style='background-color:red;text-align:center;color:white;'>canceled</p>";
												}

												?></td> 

												<td>
													<a href="orde_details.php?orderID=<?php echo $row["id"]; ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> details</a>
													<a href="?del_result=<?php echo $row["id"]; ?>" onclick='return check();' class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> delete</a>
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
