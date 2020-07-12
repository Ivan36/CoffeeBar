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
					<h1>Confirmed Orders
						<a href="pending_orders.php" class="btn btn-secondary btn-sm"> pending orders</a>
						<a href="served_orders.php" class="btn btn-secondary btn-sm"> served orders</a>
					</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">confirmed orders</li>
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
				<div class="col-md-4">
					<!-- general form elements -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Confirmed Orders List</h3>
						</div>

						<div class="card-body">
							<table id="example4" class="table table-bordered table-striped">
								<thead>
									<tr>  
										
										<th width="2%">OrderId</th>
										<th width="1%">S/N</th>

									</tr>'
								</thead>
								<tbody>
									<?php
									$query = "SELECT * FROM basket where status='accepted'";
									$result = mysqli_query($connect, $query); 
									if(mysqli_num_rows($result) > 0)  
									{  
										while($row = mysqli_fetch_array($result))  
										{ 
											?>
											<tr>  
												<td><?php echo "ORDER-".$row["id"]; ?></td>  
												<td><a href="?orderID=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">Order detalis</a></td>  
											</tr>
										<?php }} ?>
									</tbody>

								</table>
							</div>

						</div>
						<!-- /.card -->	
					</div>
					<!--/.col (left) -->
					<!-- right column -->
					<div class="col-md-8">
						<div class="card card-success">
							<div class="card-header">
								<h3 class="card-title">Order Details</h3>
							</div>
							<!-- /.card-header -->
							<?php 
							if (isset($_GET['orderID'])) {
								$ordId = mysqli_real_escape_string($connect, $_GET['orderID']);
								$sql = "SELECT * FROM basket where id='$ordId' AND status='accepted'";
								
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
														<td> <a href="" style="color: white;background: green;padding: 8px;" onclick='return confirm("Confirm Order as served to remove it form todays list")'><?php echo $status; ?></a></td>

														<td>select option</td>
														<td><select class="form-control" name="status" required="">
															<option value="">--select--</option>
															<option value="served">Served order</option>

														</select>
													</td>
													<td><button type="submit" name="save_stautus" class="btn btn-sm btn-primary">submit</button></td>
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
