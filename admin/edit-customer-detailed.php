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
					<h1>Update Customer</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">update customer</li>
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
							<h3 class="card-title">Update Customer</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form method="post" action="" role="form" enctype="multipart/form-data">
							<div class="card-body">
								
								<p style="font-size:16px; color:red" align="center"> <?php if($msg){
									echo $msg;
								}  ?> 
							</p>
							<?php
							$cid=$_GET['editid'];
							$ret=mysqli_query($con,"select * from  tblcustomers where ID='$cid'");
							$cnt=1;
							while ($row=mysqli_fetch_array($ret)) {

								?> 


								<div class="form-group"> <label for="exampleInputEmail1">Name</label> <input type="text" class="form-control" id="name" name="name"  value="<?php  echo $row['Name'];?>" required="true"> </div> <div class="form-group"> <label for="exampleInputPassword1">Email</label> <input type="text" id="email" name="email" class="form-control"  value="<?php  echo $row['Email'];?>" required="true"> </div>
								<div class="form-group"> <label for="exampleInputPassword1">Mobile Number</label> <input type="text" id="mobilenum" name="mobilenum" class="form-control"  value="<?php  echo $row['MobileNumber'];?>" required="true"> </div>
								<div class="form-group"> <label for="exampleInputPassword1">Gender</label> <?php if($row['Gender']=="Male")
								{?>
									<input type="radio" id="gender" name="gender" value="Male" checked="true">Male
									<input type="radio" name="gender" value="Female">Female
									<input type="radio" name="gender" value="Other">Other
								<?php } ?>
								<?php if($row['Gender']=="Female")
								{?>
									<input type="radio" id="gender" name="gender" value="Male" >Male
									<input type="radio" name="gender" value="Female" checked="true">Female
									<input type="radio" name="gender" value="Other">Other
								<?php } 

								else {?>
									<input type="radio" id="gender" name="gender" value="Male" >Male
									<input type="radio" name="gender" value="Female" >Female
									<input type="radio" name="gender" value="Other" checked="true">Other
								<?php }?>
								<div class="form-group"> 
									<label for="exampleInputEmail1">Details</label> 
									<textarea type="text" class="form-control" id="details" name="details" value="<?php  echo $row['Details'];?>" required="true" rows="3" cols="4"><?php  echo $row['Details'];?></textarea>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Creation Date</label> 
									<input type="text" id="" name="" class="form-control"  value="<?php  echo $row['CreationDate'];?>" readonly='true'> 
								</div>

							<?php } ?>
							<button type="submit" name="submit" class="btn btn-primary">Update</button>
						</div>
					</form>
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