<?php
require_once 'includes/header.php';
require_once 'includes/sidebar.php';
?>
<?php 

if (isset($_POST['save_stautus'])) {
	
	$status = $_POST['status'];
	$id = $_GET['orderID'];
	$sql = $db->query("UPDATE basket SET status='$status' WHERE id='$id'");
	if ($sql) {
		echo "<script> window.alert('Order has been ".$status." successfully')</script>";
		echo "<script> window.location.href='confirmed_orders.php'</script>";
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
					<h1>Order Details</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">orders</li>
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
				
				<div class="col-md-12 col-lg-12">
					<div class="card card-success">
						<div class="card-header">
							<h3 class="card-title">Order Details
								<a href="manage_orders.php" class="btn btn-secondary btn-sm"> back to orders</a>
							</h3>
						</div>
						<!-- /.card-header -->
						<?php 
						if (isset($_GET['orderID'])) {
							$ordId = mysqli_real_escape_string($connect, $_GET['orderID']);
							$sql = "SELECT * FROM basket where id='$ordId'";
							
							?>
							<div class="card-body">
								<table id="" class="table table-borderless table-striped">
									<form method="POST" enctype="multipart/form-data">

										<tr>  
											<th width="1%">ORDID</th>
											<th width="2%">Customer</th>
											<th width="2%">Contact</th>
											<th width="2%">Email</th>  
											<th width="2%">Address</th> 
										</tr>

										<?php


										$result = mysqli_query($connect, $sql); 
										if(mysqli_num_rows($result) > 0)  
										{  
											while($row = mysqli_fetch_array($result))  
											{ 
												$total = $row['total'];
												$status = $row['status'];
												?>
												<tr>  
													<td><?php echo $row["id"]; ?></td>  
													<td><?php echo $row["customer_name"]; ?></td>  
													<td><?php echo $row["contact_number"]; ?></td>
													<td><?php echo $row["email"]; ?></td>  
													<td><?php echo $row["address"]; ?></td> 
												</tr>
											<?php }}}
											if (isset($_GET['orderID'])) {
												?>

												<tr></tr>
												<tr>
													<th width="5%">Item Name</th>
													<th width="2%">Quantity</th>
													<th width="5%">unit price</th>
													<th width="2%">total Cost</th>

												</tr>
												<?php
												$oid = intval($_GET['orderID']);
												$sql = "SELECT * FROM items 
												LEFT JOIN food ON food.food_name=items.food 
												WHERE items.order_id='$oid' ORDER BY items.item_id DESC";

												$result = mysqli_query($connect, $sql); 
												if(mysqli_num_rows($result) > 0)  
												{  
													while($row = mysqli_fetch_array($result))  
														{  $qnt = $row["qty"];
													$price = $row["food_price"];
													?>
													<tr>   
														<td><?php echo $row["food"]; ?></td>  
														<td><?php echo $row["qty"]; ?></td> 
														<td><?php echo $row["food_price"]; ?></td> 
														<td><?php echo $qnt*$price; ?></td>
													</tr>
												<?php }} ?>

												<tr>
													<th>Grand Total</th>
													<td></td>
													<td>=</td>
													<td><?php echo $total; ?>/-</td>
												</tr>
												<tr>
													<th>Order Status</th>
													<td> <a href="#" style="color: white;background: green;padding: 8px;"><?php echo $status; ?></a></td>

												</tr>

											<?php } ?>
										</form>

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
