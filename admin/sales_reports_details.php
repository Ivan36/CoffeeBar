<?php
require_once 'includes/header.php';
require_once 'includes/sidebar.php';
// error_reporting(0);

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
					<h1>Manage Sales Reports</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">sales</li>
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
							<h3 class="card-title">Seach Sales reports between dates</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<h3 class="title1">Sales Reports</h3>

							<div class="table-responsive bs-example widget-shadow">

								<?php
								$fdate=$_POST['fromdate'];
								$tdate=$_POST['todate'];
								$rtype=$_POST['requesttype'];
								?>
								<?php if($rtype=='mtwise'){
									$month1=strtotime($fdate);
									$month2=strtotime($tdate);
									$m1=date("F",$month1);
									$m2=date("F",$month2);
									$y1=date("Y",$month1);
									$y2=date("Y",$month2);
									?>
									<h4 class="header-title m-t-0 m-b-30">Sales Report Month Wise</h4>
									<h4 align="center" style="color:blue">Sales Report  from <?php echo $m1."-".$y1;?> to <?php echo $m2."-".$y2;?></h4>
									<hr />

									<table class="table table-bordered"> 
										<thead>
											<tr>
												<th>S.NO</th>
												<th>Month / Year </th>
												<th>Sales</th>
											</tr>
										</thead>
										<?php
										$ret=mysqli_query($con,"SELECT month(PostingDate) as lmonth,year(PostingDate) as lyear,sum(total) as totalprice from  tblinvoice join basket on basket.id= tblinvoice.Userid where tblinvoice.ServiceId=0 AND date(tblinvoice.PostingDate) between '$fdate' and '$tdate' group by lmonth,lyear");
										$ftotal=0;
										$cnt=1;
										while ($row=mysqli_fetch_array($ret)) {

											?>

											<tr>
												<td><?php echo $cnt;?></td>
												<td><?php  echo $row['lmonth']."/".$row['lyear'];?></td>
												<td><?php  echo $total=$row['totalprice'];?></td>

											</tr>
											<?php
											$ftotal+=$total;
											$cnt++;
										}?>
										<tr>
											<td colspan="2" align="center">Total </td>
											<td><?php  echo $ftotal;?></td>



										</tr>
									</table> 
								<?php } else {
									$year1=strtotime($fdate);
									$year2=strtotime($tdate);
									$y1=date("Y",$year1);
									$y2=date("Y",$year2);
									?>
									<h4 class="header-title m-t-0 m-b-30">Sales Report Year Wise</h4>
									<h4 align="center" style="color:blue">Sales Report  from <?php echo $y1;?> to <?php echo $y2;?></h4>
									<hr />
									<table class="table table-bordered"> 
										<thead>
											<tr>
												<th>S.NO</th>
												<th>Year </th>
												<th>Sales</th>
											</tr>
										</thead>
										<?php
										$ret=mysqli_query($con,"SELECT year(PostingDate) as lyear,sum(total) as totalprice from  tblinvoice join basket on basket.id= tblinvoice.Userid where tblinvoice.ServiceId=0 AND date(tblinvoice.PostingDate) between '$fdate' and '$tdate' group by lyear");
										$ftotal=0;
										$cnt=1;
										while ($row=mysqli_fetch_array($ret)) {

											?>

											<tr>
												<td><?php echo $cnt;?></td>
												<td><?php  echo $row['lyear'];?></td>
												<td><?php  echo $total=$row['totalprice'];?></td>

											</tr>
											<?php
											$ftotal+=$total;
											$cnt++;
										}?>
										<tr>
											<td colspan="2" align="center">Total </td>
											<td><?php  echo $ftotal;?></td>



										</tr>
									</table>
								<?php } ?>	
							</div>
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
