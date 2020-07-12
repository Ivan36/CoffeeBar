<?php 

session_start();
require "admin/includes/functions.php";
require "admin/includes/db.php";

$msg = "";


if(isset($_GET['cancel_order'])) {
	$ordId = mysqli_real_escape_string($connect, $_GET['cancel_order']);
	$sql_cancel = mysqli_query($connect, "UPDATE basket SET status='canceled' where id='$ordId'");

	if ($sql_cancel) {
		echo "<script>window.alert('Order cancelled')</script";
		
	}
	else{
		echo "<script>window.alert('Cancelling order failed try again')</script";
		
	}


}

?>

<!Doctype html>

<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<meta name="description" content="" />

<meta name="keywords" content="" />

<head>

	<title>coffeebar</title>

	<link rel="stylesheet" href="css/main.css" />

	<script src="js/jquery.min.js" ></script>

	<script src="js/myscript.js"></script>
	<style type="text/css">

		table {
			border-spacing: 0;
			border-collapse: collapse;
		}
		td,
		th {
			padding: 13px;
		}

		thead {
			display: table-header-group;
		}

		.table {
			border-collapse: collapse !important;
		}
		.table td,
		.table th {
			background-color: #fff !important;
		}
		.table-bordered th,
		.table-bordered td {
			border: 1px solid #ddd !important;
		}
		.button{
			background-color: blue;
			width: 10px;
			height: 5px;
			border-radius: 2px;
			padding: 5px;
			margin-left: 5px;
			color: black;
			text-decoration: none;
		}
		.button1{
			background-color: lightblue;
			width: 10px;
			height: 5px;
			border-radius: 2px;
			margin-left: 5px;
			padding: 5px;
			color: black;
			text-decoration: none;
		}
		.button2{
			background-color: red;
			width: 10px;
			height: 5px;
			border-radius: 2px;
			margin-left: 5px;
			padding: 5px;
			color: black;
			text-decoration: none;
		}

	</style>
	<script>

		function check() {

			return confirm("Are you sure you want to cancel this Order");

		}
	</script>

</head>

<body>

	<?php require "includes/header.php"; ?>

	<div class="parallax" onclick="remove_class()">

		<div class="parallax_head">

			<h2>Your orders </h2>
			<h3>Information</h3>

		</div>

	</div>

	<div class="content" onclick="remove_class()">

		<div class="inner_content">
			<h2 style="text-align: center;">Your Orders information</h2>
			<h3 style="text-align: center;">Name: <?php echo $names; ?></h3><br>

			<table id="example3" class="table table-bordered table-striped">
				<thead>
					<tr>  
						<th width="1%">ORDID</th>
						<th width="1%">Contact</th> 
						<th width="1%">Status</th>  
						<th width="1%">action</th> 
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = "SELECT * FROM basket where customer_name='$names' ORDER BY id ASC LIMIT 20";
					$result = mysqli_query($connect, $sql); 
					if(mysqli_num_rows($result) > 0)  
					{  
						while($row = mysqli_fetch_array($result))  
						{ 
							?>
							<tr>  
								<td style="text-align: center;"><?php echo $row["id"]; ?></td>    
								<td style="text-align: center;"><?php echo $row["contact_number"]; ?></td>
								<td style="text-align: center; padding-left: 55px;padding-right: 55px;">
									<?php if ($row["status"]=='pending') {
										echo "<p style='background-color:orange;text-align:center;'>Pending</p>";
									}else if ($row["status"]=='accepted') {
										echo "<p style='background-color:blue;text-align:center;color:white;'>Accepted</p>";
									}
									else if ($row["status"]=='served') {
										echo "<p style='background-color:green;text-align:center;color:white;'>Served</p>";
									}
									else if ($row["status"]=='canceled') {
										echo "<p style='background-color:red;text-align:center;color:white;'>Canceled</p>";
									}

									?></td> 
									<td style="text-align: center; padding-left: 55px;padding-right: 55px;">

										<?php if ($row["status"]=='pending') {
											echo '<a href="?cancel_order='.$row["id"].'" onclick="return check();" class="button2">cancel</a>';
											echo '<a href="?orderID='.$row["id"].'" class="button">Details</a>';
										}else if ($row["status"]=='accepted') {
											echo '<a href="?orderID='.$row["id"].'" class="button">Details</a>';
											echo '<a href="#?cancel_order='.$row["id"].'" class="button2">cancel</a>';
										}
										else if ($row["status"]=='served') {
											echo '<a href="?orderID='.$row["id"].'" class="button">Details</a>';
											echo '<a href="#?cancel_order='.$row["id"].'" class="button2">cancel</a>';
										}
										else if ($row["status"]=='canceled') {
											echo '<a href="?orderID='.$row["id"].'" class="button">Details</a>';

										}

										?></td> 


									</tr>
								<?php }} ?>
							</tbody>

						</table>


					</div>

					<!-- /.card-header -->
					<?php if (isset($_GET['orderID'])) {
						$ordId = mysqli_real_escape_string($connect, $_GET['orderID']);
						$sql = "SELECT * FROM basket where id='$ordId'";

						?>
						<div class="card-body" style="margin-left: 12%;margin-right: 12%;margin-top: 20px;">
							<table id="example3" class="table table-bordered table-striped">

								<tr>  
									<th width="1%">ORDID</th>
									<th width="2%">Customer</th>
									<th width="2%">Contact</th>
									<th width="2%">Date Made</th>  
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
											<td><?php echo $row["date_made"]; ?></td>  
											<td><?php echo $row["address"]; ?></td> 
										</tr>
									<?php }} }
									?>
								</table>									
								<table id="example3" class="table table-bordered table-striped">
									<?php if (isset($_GET['orderID'])) {
										?>

										<tr></tr>
										<tr>
											<th width="5%">Item Name</th>
											<th width="2%">Quantity</th>
											<th width="5%">unit price</th>
											<th width="2%">total Cost</th>

										</tr>
										<?php
											// $sql = "SELECT * FROM items where order_id='$ordId'";
										$oid = intval($_GET['orderID']);
											// $sql = "SELECT items.food,items.qty,food.food_price from items join food on food.food_name=items.food ";

										$result = mysqli_query($connect,"SELECT * FROM items 
											LEFT JOIN food ON food.food_name=items.food 
											WHERE items.order_id='$oid' ORDER BY items.item_id DESC");


											// $result = mysqli_query($connect, $sql); 

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
									<?php } ?>

									<tr>
										<th>Grand Total</th>
										<td></td>
										<td>=</td>
										<td> <?php echo $total; ?>/-</td>
									</tr>
									<tr>
										<th>Order Status</th>
										<td style="padding-top: 15px;">
											<a href="" style="color: white;background: blue;padding: 8px;"><?php echo $status; ?>

										</a>
									</td>


								</tr>

							<?php } ?>

						</table>
					</div>
					<!-- /.card-body -->



				</div>

				<div class="footer_parallax" onclick="remove_class()">

					<div class="on_footer_parallax">

						<p>&copy; <?php echo strftime("%Y", time()); ?> <span>Coffee Bar & Restaurant</span>. All Rights Reserved</p>

					</div>

				</div>

			</body>

			</html>