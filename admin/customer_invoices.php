<?php
require_once 'includes/header.php';
require_once 'includes/sidebar.php';
?>
<?php 


if(isset($_POST['submit'])){


	$uid=intval($_GET['orderID']);
	$or_id = $_POST['or_id'];
	$invoiceid=mt_rand(100000000, 999999999);
	
	$ret=mysqli_query($con,"INSERT into tblinvoice(Userid,BillingId) values('$uid','$invoiceid');");
	 $query = mysqli_query($con,"UPDATE tblcustomers SET invoice='yes' where order_id='$uid'");

if ($query) {
	echo '<script>alert("Invoice created successfully. Invoice number is "+"'.$invoiceid.'")</script>';
	echo "<script>window.location.href ='view-invoice.php?invoiceid=$invoiceid'</script>";
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
					<h1>Generate customer order Invoice</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">generate Invoice</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				
				<!--/.col (left) -->
				<!-- right column -->
				<div class="col-md-12 col-sm-12">
					<div class="card card-success">
						<div class="card-header">
							<h3 class="card-title">Order Details</h3>
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
													<td></td>
													<td></td>
													<?php if ($status=='served') {
														
														?>
														<td><form method="POST" action="">
															<input type="hidden" name="or_id" value="<?php echo $oid; ?>">
															<button name="submit" type="submit" class="btn btn-info  btn-sm">generate invoice</button>

														</form></td>
													<?php } else{ ?>
														<th>Order Status</th>
														<td> <a href="#" style="color: white;background: green;padding: 8px;" onclick='return confirm("The order must be served first and then invoice is generated")'><?php echo $status; ?></a></td>
													<?php } ?>
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
