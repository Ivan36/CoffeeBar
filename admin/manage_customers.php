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
					<h1>Manage customers</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">customers</li>
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
							<h3 class="card-title">Table online orders customers information</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example" class="table table-bordered table-striped">
								<thead>
									<tr> 
										<th>#</th> 
										<th>Name</th> 
										<th>Mobile</th> 
										<th>current Order No</th>
										<th>Creation Date</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sql = "SELECT * FROM tblcustomers where order_id!=0 ORDER BY ID DESC";
									$result = mysqli_query($connect, $sql); 
									if(mysqli_num_rows($result) > 0)  
										{  $cnt=1;
											while ($row=mysqli_fetch_array($result)) {

												?>

												<tr> 
													<th scope="row"><?php echo $cnt;?></th> 
													<td><?php  echo $row['Name'];?></td>
													<td><?php  echo $row['MobileNumber'];?></td>
													<td>ORD-<?php  echo $row['order_id'];?></td>
													<td><?php  echo $row['CreationDate'];?></td> 
													<td>
														
														<?php if ($row['invoice']=='no') {

															?>  
															<a href="customer_invoices.php?orderID=<?php echo $row['order_id'];?>" class="btn btn-primary btn-sm">invoice customer</a></td>
														<?php } ?>
														<?php if ($row['invoice']=='yes') {
															
															?>  
															<a href="#" class="btn btn-success btn-sm">Invoiced</a></td>
														<?php } ?>
													</tr> 
													<?php 
													$cnt=$cnt+1;
												}}?>
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
