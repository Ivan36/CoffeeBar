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
							<form method="post" name="bwdatesreport"  action="sales_reports_details.php" enctype="multipart/form-data">
								<p style="font-size:16px; color:red" align="center"></p>

								<div class="form-group">
									<label for="exampleInputEmail1">From Date</label> 
									<input type="date" class="form-control" name="fromdate" id="fromdate" value="" required='true'>
								</div> 
								<div class="form-group"> 
									<label for="exampleInputPassword1">To Date</label>
									<input type="date" class="form-control" name="todate" id="todate" value="" required='true'>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Request Type</label>
									<input type="radio" name="requesttype" value="mtwise" checked="true">Month wise
									<input type="radio" name="requesttype" value="yrwise">Year wise 
								</div>



								<button type="submit" name="submit" class="btn btn-default">Submit</button> 
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
