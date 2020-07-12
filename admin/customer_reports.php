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
					<h1>Manage Customer Invoices</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">invoices</li>
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
							<h3 class="card-title">Table with Customers Complete Orders Information</h3>
						</div>
						<!-- /.card-header -->
						
						<div class="card-body" id="div_print">
							
							<?php
							$sql = "SELECT * FROM items
							LEFT JOIN food
							ON food.food_name = items.food
							LEFT JOIN basket
							ON basket.customer_name = items.customer 
							GROUP by basket.customer_name ";
							$cnt=1;
							$gtotal=0;
							$result = mysqli_query($connect, $sql);

							if(mysqli_num_rows($result) > 0)  
								{  $cnt=1;
									while ($row=mysqli_fetch_array($result)) {

										$customer = $row['customer_name'];
										?>				

										<div class="table-responsive bs-example widget-shadow" style="border: 1px dotted green;padding: 10px;">
											<!-- <h4>Receipt No: <a class="" style="font-size: 20px" onClick="printdiv('div_print')"><i class="fa fa-print pull-right"></i> </a></h4> -->
											<table class="table table-bordered" width="100%" border="1"> 
												<tr>
													<th colspan="6">Customer Details</th>	
												</tr>
												<tr> 
													<th>Name</th> 
													<td><?php echo $row['customer_name']?></td> 
													<th>Contact no.</th> 
													<td><?php echo $row['contact_number']?></td>
													<th>Email </th> 
													<td><?php echo $row['email']?></td>
												</tr>

											</table> 

											<table class="table table-bordered" width="100%" border="1"> 

												<tr>
													<th colspan="5">Order Details</th>	
												</tr>
												<tr>
													<th>#</th>	
													<th>Food</th>
													<th>Qnty</th>
													<th>unit price</th>
													<th>total cost</th>
												</tr>

												<?php
												$ret=mysqli_query($con,"SELECT * FROM items 
													LEFT JOIN food ON food.food_name=items.food 
													WHERE items.customer='$customer'");
												$cnt=1;
												while ($row=mysqli_fetch_array($ret)) {
													$qnt = $row["qty"];
													$price = $row["food_price"];
													?>

													<tr>
														<th><?php echo $cnt;?></th>
														<td><?php echo $row["food"]; ?></td>  
														<td><?php echo $row["qty"]; ?></td> 
														<td><?php echo $row["food_price"]; ?></td> 
														<td><?php echo $subtotal = $qnt*$price; ?></td>
													</tr>
													<?php 
													$cnt=$cnt+1;
													$gtotal+=$subtotal;
												} ?>

												<tr>
													<th colspan="4" style="text-align:center">Grand Total</th>
													<th colspan="1"><?php echo $gtotal?>/-</th>	

												</tr>

											</table>

										</div>
										<?php $gtotal=0; } }?>

									</div>
								</div>
								<!-- /.card-body -->


							</div>
							<!--/.col (right) -->
						</div>
						<!-- /.row -->
					</div><!-- /.container-fluid -->
				</section>
				<!-- /.content -->
			</div>

			<?php require_once 'includes/footer.php' ?>
