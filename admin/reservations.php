<?php
require_once 'includes/header.php';
require_once 'includes/sidebar.php';

if(isset($_GET['delete'])) {

	$delete = preg_replace("#[^0-9]#", "", $_GET['delete']);

	if($delete != "") {

		$sql = $db->query("DELETE FROM reservation WHERE reserve_id='".$delete."'");
		
		if($sql) {

			echo "<script>alert('Successfully deleted')</script>";
			echo "<script>location.href='reservations.php'</script>";

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
					<h1>Table Reservations</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">table reservations</li>
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
							<h3 class="card-title">Table with Table Reservations</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example3" class="table table-bordered table-striped">
								<thead>
									<tr>  
										<th>S/N</th>
										<th>No of Guests</th>
										<th>Email</th>
										<th>Phone</th>
										<th>Date</th>
										<th>Time</th>
										<th>Suggestions</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sql = "SELECT * FROM reservation";
									$result = mysqli_query($connect, $sql); 
									if(mysqli_num_rows($result) > 0)  
									{  
										$x = 1;
										while($row = mysqli_fetch_array($result))  
										{ 
											$reserve_id = $row['reserve_id'];
											$no_of_guest = $row['no_of_guest'];
											$email = $row['email'];
											$phone = $row['phone'];
											$date_res = $row['date_res'];
											$time = $row['time'];
											$suggestions = $row['suggestions'];
											?>
											<tr>
												<td><?php echo $x; ?></td>
												<td><?php echo $no_of_guest; ?></td>
												<td><?php echo $email; ?></td>
												<td><?php echo $phone; ?></td>
												<td><?php echo $date_res; ?></td>
												<td><?php echo $time; ?></td>
												<td><?php echo $suggestions; ?></td>
												<td>
													<a href="reservations.php?delete=<?php echo $reserve_id ?>" class="btn btn-info btn-sm"><i class='fa fa-eye'></i> view</a>
													<a href="reservations.php?delete=<?php echo $reserve_id ?>" onclick='return check();' class="btn btn-danger btn-sm"><i class='fa fa-trash'></i> del</a></td>
												</tr>
											<?php }} ?>
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
