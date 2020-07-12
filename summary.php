<?php 

session_start();
error_reporting(0);

require "admin/includes/functions.php";
require "admin/includes/db.php";

$order_id = $_SESSION['order_id'];
$name = $_SESSION['name'];

 unset($_SESSION['order_id']);

 unset($_SESSION['name']);

unset($_SESSION['cart_array']);

if (isset($_POST['submit'])) {
	$orderid = $_SESSION['order_id'];
	$payment = $_POST['payment'];
	$sql = $db->query("UPDATE basket set payment='$payment' where id='$orderid'");
	if ($sql) {
		unset($_SESSION['order_id']);
		unset($_SESSION['name']);
		$msg = "Your order has been recieved and confirm and is now being prepared for you.. Thank you for surpporting coffee bar see you soon!!";
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
		.button{
			background-color: orange;
			width: 10px;
			height: 5px;
			border-radius: 2px;
			padding: 5px;
			color: black;
			text-decoration: none;
		}
	</style>
	
</head>

<body>
	
	<?php require "includes/header.php"; ?>

	<div class="parallax_basket" onclick="remove_class()">

		<div class="parallax_head_basket">

			<h2>Order</h2>
			<h3>Summary</h3>

		</div>

	</div>

	<div class="content remove_pad" onclick="remove_class()">

		<div class="inner_content on_parallax">

			<h2><span class="s_summary">Order Success</span></h2>

			<div class="order_holder">
				<?php if (isset($msg)) {
					echo "<p style='background-color:green; font-family:aclonica;text-align:center;color:white;padding:10px;font-size:20px;margin-top:20px;'> $msg </p>";
				}

				else{ ?>

					<p class="summary_p">Thank you for your love and Support <?php echo $name; ?>. Your <span>Order number</span> is: <?php echo $order_id; ?>. We will ensure that your order is delivered in time and we do hope that you continue loving and Supporting us. Please it is important to take note that your order number should be kept safe</p>

					

				<?php } ?>
			</div>



		</div>

	</div>

	<div class="content" onclick="remove_class()">

		<div class="inner_content">

			<div class="contact">

				<?php require_once 'address.php' ?>

			</div>

		</div>

	</div>

	<div class="footer_parallax" onclick="remove_class()">

		<div class="on_footer_parallax">

			<p>&copy; <?php echo strftime("%Y", time()); ?> <span>MyRestaurant</span>. All Rights Reserved</p>

		</div>

	</div>

</body>

</html>