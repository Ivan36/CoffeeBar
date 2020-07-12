<?php 

session_start();
require "includes/functions.php";
require "includes/db.php";

if(!isset($_SESSION['user'])) {

	header("location: logout.php");

}

$result = "";
$info = "";
$items = "";
$pagenum = "";
$per_page = 5;

$count = $db->query("SELECT * FROM basket where status='pending'");

$pages = ceil((mysqli_num_rows($count)) / $per_page);

if(isset($_GET['page'])) {

	$page = $_GET['page'];

}else{

	$page = 1;

}

$start = ($page - 1) * $per_page;

$orders = $db->query("SELECT * FROM basket where status='pending' LIMIT $start, $per_page");

if($orders->num_rows) {

	$x = 1;

	$info .= "<table class='table table-hover'>
	<thead>
	<th>Order_id</th>
	<th>name</th>
	<th>address</th>
	<th>Email</th>
	<th>Phone</th>
	</thead>
	<tbody>";

	$items .= "<table class='table table-hover'>
	<tbody>
	<tr>
	<th>Name</th>
	<th>Qty</th>
	<td></td>
	</tr>";

	while($row = $orders->fetch_assoc()) {

		$oid    = $row['id'];
		$id    = $row['id']."_ord";

		if($x == 1) {

			$result .=  "<input type='hidden' value='".$id."' 	id='".$id."'><a href='#' style='display: block; background: #efefef; color: #333; border-bottom: 1px solid #ccc; padding: 10px 0px;' onClick=\"func_call('".$id."'); return false\" >ORD_$oid</a>";

			$info .= "<tr>
			<td>ORD_$oid</td>
			<td>".$row['customer_name']."</td>
			<td>".$row['address']."</td>
			<td>".$row['email']."</td>
			<td>".$row['contact_number']."</td>
			</tr>";

			$get_data = $db->query("SELECT * FROM items WHERE order_id='".$oid."'");

			while($data = $get_data->fetch_assoc()) {

				$items .= "<tr>
				<td>".$data['food']."</td>
				<td>".$data['qty']."</td>
				<td></td>
				</tr>";

			}

			$items .= "<tr>
			<th>Total Price</th>
			<th>".$row['total']."</th>
			<th></th>
			</tr>
			";

			if($row['status'] == "pending") {

				$items .= "<tr>
				<th>Status</th>
				<td>
				<select onChange=\"change_stat('".$oid."')\" name='status' id='".$oid."' class='form-control'>
				<option value='pending_$oid' selected>pending</option>
				<option value='confirmed_$oid'>confirmed</option>
				</select>
				</td>
				<th></th>
				</tr>";

			}else{

				$items .= "<tr>
				<th>Status</th>
				<td>
				<select onChange=\"change_stat('".$oid."')\" id='".$oid."' name='status' class='form-control'>
				<option value='pending_$oid' >pending</option>
				<option value='confirmed_$oid' selected>confirmed</option>
				</select>
				</td>
				<th></th>
				</tr>";

			}


		}else{

			$result .=  "<input type='hidden' value='".$id."' 	id='".$id."'><a href='#' style='display: block; background: #efefef; color: #333; border-bottom: 1px solid #ccc; padding: 10px 0px;' onClick=\"func_call('".$id."'); return false\" >ORD_$oid</a>";

		}


		$x++;
	}

	$info .= "</tbody>
	</table>";

	$items .= "</tbody>
	</table>";

}else{

	$result = "No Orders available yet";

	$info = "";

	$items = "";

}



if($_SERVER['REQUEST_METHOD'] == 'GET') {

	if(isset($_GET['delete']) && escape($_GET['delete']) != "") {

		$bird_id = escape($_GET['delete']);

		if($bird_id != "") {

			$query = $db->prepare("DELETE FROM birds WHERE bird_id=? LIMIT 1");
			$query->bind_param('i', $bird_id);

			if($query->execute()) {

				echo "<script>alert('Record deleted successfully')</script>";

			}else{

				echo "<script>alert('Record was not deleted successfully')</script>";

			}

		}

	}

}

?>

<?php require_once 'includes/header.php'; ?>

<script>
	
	function check() {

		return confirm("Are you sure you want to delete this record");

	}

	function func_call(id) {

		var value = document.getElementById(id).value;

		if(value != "") {

			$.ajax({

				url: 'get_item.php',
				type: 'post',
				data: {order_id : value},
				success: function(data) {
						//alert(data);
						$("#details_display").html(data);
					}
				});

		}

	}

	function change_stat(id) {

		var option = document.getElementById(id).value;

		$.ajax({

			url: 'get_item.php',
			type: 'post',
			data: {status : option},
			success: function(data) {
				alert(data);
			}
		});

	}
	
</script>

<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title" style="text-align: center"style="text-align: center"style="text-align: center; background: #2abccc; color: #fff; border-right: 2px solid #fff;">Order List</h4>
					</div>

					<div class="row" style="padding-left: 10px;padding-right: 10px;">

						<div class="col-md-12 col-lg-12" >

							<br/>	

							<div class="col-md-3" style="text-align: center; background: #2abccc; color: #fff; border-right: 2px solid #fff;">

								<h5>ORDER ID</h5>

							</div>

							<div class="col-md-9" style="background: #2abccc; color: #fff;">

								<h5>ORDER DETAILS</h5>

							</div>

						</div>

						<div class="col-md-3" style="text-align: center;">

							<?php echo $result; ?>

						</div>

						<div id="details_display" class="col-md-8 table-responsive" style="padding: 10px;">

							<?php echo $info; ?>

							<?php echo $items; ?>

						</div>

					</div>

					<div class="content table-responsive table-full-width">

						<p style="padding: 0px 20px;"><?php if($pages >= 1 && $page <= $pages) {
							for($i = 1; $i <= $pages; $i++) {
								echo ($i == $page) ? "<a href='pending_orders.php?page=".$i."' style='margin-left:5px; font-weight: bold; text-decoration: none; color: #FF5722;' >$i</a>  "  : " <a href='pending_orders.php?page=".$i."' class='btn'>$i</a> ";
							}
						} ?></p>

					</div>
				</div>
			</div>                    

		</div>
	</div>
</div>


<?php require_once 'includes/footer.php'; ?>