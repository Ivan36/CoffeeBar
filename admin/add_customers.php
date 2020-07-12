<?php
require_once 'includes/header.php';
require_once 'includes/sidebar.php';
?>
<?php 

if(!isset($_SESSION['user'])) {
	header("location: logout.php");
}

$msg = "";

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	
	$name=$_POST['name'];
	$email=$_POST['email'];
	$mobilenum=$_POST['mobilenum'];
	$gender=$_POST['gender'];
	$details=$_POST['details'];


	$query=mysqli_query($connect, "INSERT into  tblcustomers(Name,Email,MobileNumber,Gender,Details) value('$name','$email','$mobilenum','$gender','$details')");
	if ($query) {
		echo "<script>alert('Customer has been added.');</script>"; 
		echo "<script>window.history.back()</script>"; 
	} else {
		echo "<script>alert('Something Went Wrong. Please try again.');</script>";  	
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
					<h1>Add Food to Menu</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Add food</li>
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
				<div class="col-md-6">
					<!-- general form elements -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">add Customers<a href="customer_list.php" class="btn btn-secondary btn-sm"> view customers</a></h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form method="post" action="" role="form" enctype="multipart/form-data">
							<div class="card-body">
								<p style="font-size:16px; color:red" align="center"> <?php if($msg){
									echo $msg;
								}  ?> </p>


								<div class="form-group">
									<label for="exampleInputEmail1">Name</label> 
									<input type="text" class="form-control" id="name" name="name" placeholder="Full Name" value="" required="true"> 
								</div> 
								<div class="form-group">
									<label for="exampleInputPassword1">Email</label> <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="" required="true">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Mobile Number</label>
									<input type="text" class="form-control" id="mobilenum" name="mobilenum" placeholder="Mobile Number" value="" required="true" maxlength="10" pattern="[0-9]+"> 
								</div>
								<div class="radio">

									<p style="padding-top: 20px; font-size: 15px"> <strong>Gender:</strong> <label>
										<input type="radio" name="gender" id="gender" value="Female" checked="true">
										Female
									</label>
									<label>
										<input type="radio" name="gender" id="gender" value="Male">
										Male
									</label>
									<label>
										<input type="radio" name="gender" id="gender" value="Other">
										Other
									</label></p>
								</div>
								<div class="form-group"> 
									<label for="exampleInputEmail1">Details</label> 
									<textarea type="text" class="form-control" id="details" name="details" placeholder="Details" required="true" rows="4" cols="4"></textarea> 
								</div>

								<button type="submit" name="submit" class="btn btn-primary">Add</button> 
							</div>
						</form>
					</div>
					<!-- /.card -->	

				</div>
				<!--/.col (left) -->
				<!-- right column -->
				<div class="col-md-6">
					<div class="card card-success">
						<div class="card-header">
							<h3 class="card-title">Table with a list of customers</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example3" class="table table-bordered table-striped">
								<thead>
									<tr> 
										<th>#</th> 
										<th>Name</th> 
										<th>Mobile</th> 
										<th>Creation Date</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sql = "SELECT * FROM tblcustomers ORDER BY ID DESC";
									$result = mysqli_query($connect, $sql); 
									if(mysqli_num_rows($result) > 0)  
										{  $cnt=1;
											while ($row=mysqli_fetch_array($result)) {

												?>

												<tr> 
													<th scope="row"><?php echo $cnt;?></th> 
													<td><?php  echo $row['Name'];?></td>
													<td><?php  echo $row['MobileNumber'];?></td>
													<td><?php  echo $row['CreationDate'];?></td> 
												</tr> 
												<?php 
												$cnt=$cnt+1;
											}}?>
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