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
if(isset($_POST['submit'])){


	$uid=intval($_GET['addid']);
	$invoiceid=mt_rand(100000000, 999999999);
	$sid=$_POST['sids'];
	$qtn=$_POST['qtn'];
	for($i=0;$i<count($sid);$i++){
		$svid=$sid[$i];
		$sqtn=$qtn[$i];
		$ret=mysqli_query($con,"INSERT into tblinvoice(Userid,ServiceId,BillingId,quantity) values('$uid','$svid','$invoiceid','$sqtn');");


		echo '<script>alert("Invoice created successfully. Invoice number is "+"'.$invoiceid.'")</script>';
		echo "<script>window.location.href ='invoices.php'</script>";
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
							<h3 class="card-title">Table with Saved food menu</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<form method="post">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr> 
											<th>#Select food</th> 
											<th>Food</th> 
											<th>Price</th>
											<th>Quantity</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$sql = "SELECT * FROM food ORDER BY id DESC";
										$result = mysqli_query($connect, $sql); 
										if(mysqli_num_rows($result) > 0)  
											{  $cnt=1;
												while ($row=mysqli_fetch_array($result)) {

													?>

													<tr> 
														<td><input type="checkbox" style="width: 16px;height: 16px;margin-left: 20px;" name="sids[]" value="<?php  echo $row['id'];?>" ></td>
														<td><?php  echo $row['food_name'];?></td>
														<td><?php  echo $row['food_price'];?></td>
														<td><input type="number" class="form-control" style="width: 76px;height: 26px;margin-left: 20px;" name="qtn[]" ></td>

													</tr> 
													<?php 
												}}?>


											</tbody>

										</table>
										<tr>
											<td colspan="4" align="center">
												<button type="submit" style="margin-left: 40%;" name="submit" class="btn btn-primary">Submit</button>		
											</td>

										</tr>
									</form>
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
