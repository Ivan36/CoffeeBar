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
							<h3 class="card-title">Table with Customer Invoices</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example" class="table table-bordered table-striped">
								<h4>Invoice List:</h4>
								<thead> <tr> 
									<th>#</th> 
									<th>Invoice Id</th> 
									<th>Customer Name</th> 
									<th>Invoice Date</th> 
									<th>Action</th>
								</tr> 
							</thead> <tbody>
								<?php
								$ret=mysqli_query($con,"SELECT distinct tblcustomers.Name,tblinvoice.BillingId,tblinvoice.PostingDate from  tblcustomers   
									join tblinvoice on tblcustomers.ID=tblinvoice.Userid where tblinvoice.ServiceId!=0 order by tblinvoice.ID desc");
								$cnt=1;
								while ($row=mysqli_fetch_array($ret)) {

									?>

									<tr> 
										<th scope="row"><?php echo $cnt;?></th> 
										<td><?php  echo $row['BillingId'];?></td>
										<td><?php  echo $row['Name'];?></td>
										<td><?php  echo $row['PostingDate'];?></td> 
										<td><a href="view-invoices.php?invoiceid=<?php  echo $row['BillingId'];?>" class="btn btn-info btn-sm">view details</a></td> 

										</tr>   <?php 
										$cnt=$cnt+1;
									}?></tbody> </table> 
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
