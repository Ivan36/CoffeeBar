<?php
require_once 'includes/db.php';
error_reporting(0);
require_once 'includes/header.php';
require_once 'includes/sidebar.php';
?>
<?php 

if(!isset($_SESSION['user'])) {
	header("location: logout.php");
}

$msg = "";

if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$mobilenum=$_POST['mobilenum'];
	$gender=$_POST['gender'];
	$details=$_POST['details'];

	$eid=$_GET['editid'];

	$query=mysqli_query($con, "update  tblcustomers set Name='$name',Email='$email',MobileNumber='$mobilenum',Gender='$gender',Details='$details' where ID='$eid' ");
	if ($query) {
		$msg="Customer Detail has been Updated.";
	}
	else
	{
		$msg="Something Went Wrong. Please try again";
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
					<h1>View and Print customer Receipt</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">print invoice</li>
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
					<!-- general form elements -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Receipt Details</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<div class="card-body" id="div_print">

							<?php
							$invid=intval($_GET['invoiceid']);
							$ret=mysqli_query($con,"SELECT DISTINCT  tblinvoice.PostingDate,basket.customer_name,basket.id,basket.email,basket.contact_number,basket.payment from  tblinvoice join basket on basket.id=tblinvoice.Userid where tblinvoice.BillingId='$invid'");
							$cnt=1;
							while ($row=mysqli_fetch_array($ret)) {
								$order_id=$row['id'];
								?>				

								<div class="table-responsive bs-example widget-shadow">
									<h4>Receipt No: <?php echo $invid;?><a class="" style="font-size: 20px" onClick="printdiv('div_print')"><i class="fa fa-print pull-right"></i> </a></h4>
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
										<tr> 
											<th>Payment Mode</th> 
											<td><?php echo $row['payment']?></td> 
											<th>Invoice Date</th> 
											<td colspan="3"><?php echo $row['PostingDate']?></td> 
										</tr> 
									<?php }?>
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
										WHERE items.order_id='$order_id'");
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
								<table class="table table-bordered" width="100%" border="1">									
									<tr>
										<th colspan="5" style="text-align: center;color: black;font-family: arial;">Thank you our esteemed customer....Great friends... Great fun...!</th>
									</tr>
								</table>


							</div>
						</div>
						<!-- /.card -->	

					</div>
					<!--/.col (left) -->
				</div>
				<!-- /.row -->
			</div><!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>

	<?php require_once 'includes/footer.php' ?>