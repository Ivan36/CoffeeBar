<?php 

session_start();
require "admin/includes/functions.php";
require "admin/includes/db.php";

$msg = "";

if($_SERVER['REQUEST_METHOD'] == 'POST') {

	if(isset($_POST['register'])) {


		$name=$_POST['name'];
		$email=$_POST['email'];
		$mobilenum=$_POST['mobilenum'];
		$gender=$_POST['gender'];
		$details=$_POST['details'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$pass_hash = md5($password);
		$ins_id=0;

		$cheack = $db->query("SELECT * FROM tblcustomers WHERE Email='$email' AND MobileNumber='$mobilenum'");
		if ($cheack->num_rows>0) {

			$msg = "<p style='padding: 15px; color: red; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>Sorry !! This account is already created You can login</p>";
		}
		else{

			$query= $db->query("INSERT into tblcustomers(Name,Email,MobileNumber,Gender,username,password,Details) VALUES('$name','$email','$mobilenum','$gender','$username','$pass_hash','$details')");
			
			if ($query) {
				$msg = "<p style='padding: 15px; color: green; background: #eeffee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>Account created successfully. Your username is <b style='color:orange'>$username </b> and password is <b style='color:orange'>$password </b>. you can now login</p>";
			} else {
				$msg = "<p style='padding: 15px; color: red; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>Sorry !! Something Went Wrong. Please try again.</p>";	
			} 


		}

	}
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {

	if (isset($_POST['login'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$pass = mysqli_real_escape_string($db, $_POST['password']);
		$password = md5($pass);

		$query = "SELECT * FROM tblcustomers where username = '$username' OR MobileNumber='$username'";
		$result = $db->query($query);
		if ($row = $result->fetch_assoc()) {

			if ($row['password']== $password) {
				session_start();
				$_SESSION['username'] = $row['username'];
				$_SESSION['ID'] = $row['ID'];
				$_SESSION['Name'] = $row['Name'];

				header("location:index.php");

			}
			else{
				$msg1 = "<p style='padding: 15px; color: red; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>Sorry !! Password is incorrect try again or contact administrator.</p>";			}

			}
			else{
				$msg1 = "<p style='padding: 15px; color: red; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>Sorry !! This account doesnot exist please register first or contact administrator.</p>";
			}
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
			/* The message box is shown when the user clicks on the password field */
			#message {
				display:none;
				background: #f1f1f1;
				color: #000;
				position: relative;
				padding: 20px;
				margin-top: 10px;
			}

			#message p {
				padding: 10px 35px;
				font-size: 18px;
			}

			/* Add a green text color and a checkmark when the requirements are right */
			.valid {
				color: green;
			}

			.valid:before {
				position: relative;
				left: -35px;
				content: "✔";
			}

			/* Add a red text color and an "x" when the requirements are wrong */
			.invalid {
				color: red;
			}

			.invalid:before {
				position: relative;
				left: -35px;
				content: "✖";
			}
		</style>

	</head>

	<body>

		<?php require "includes/header.php"; ?>

		<div class="parallax" onclick="remove_class()">

			<div class="parallax_head">

				<h2>New here</h2>
				<h3>Signup | Login</h3>

			</div>

		</div>

		<div class="content" onclick="remove_class()">

			<div class="inner_content">

				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="hr_book_form">

					<div class="left">

						<h2 class="form_head"><span class="book_icon">Signin here</span></h2>

						<?php if (isset($msg1)) {
							echo $msg1;
						} ?>
						<div class="form_group">

							<label>User Name or Phone No</label>
							<input type="text" name="username" placeholder="Enter your username or phone no" required>

						</div>

						<div class="form_group">

							<label>Password</label>
							<input type="password" name="password" placeholder="Enter Password" required>

						</div>

						<div class="form_group">

							<input type="submit" class="submit" name="login" value="Signin" />

						</div>


					</div>


				</form>

				<div class="left">

					<div class="form_group">

						<form method="post" action="" role="form" enctype="multipart/form-data">
							<div class="card-body">
								<h2 class="form_head"><span class="book_icon">Register your Account here</span></h2>
								<?php if (isset($msg)) {
									echo $msg;
								} ?>


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
										<input type="radio" name="gender" id="gender" value="Non">
										Other
									</label></p>
								</div>
								<div class="form-group"> 
									<label for="exampleInputEmail1">Address Details</label> 
									<textarea type="text" class="form-control" id="details" name="details" placeholder="Details" required="true" rows="2" cols="2"></textarea> 
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">User Name</label> 
									<input type="text" class="form-control" id="name" name="username" placeholder="User name" value="" required="true"> 
								</div> 
								<div class="form-group">
									<label for="exampleInputPassword1">Password</label> 
									<input type="password" id="psw" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control" placeholder="Password" value="" required="true">
								</div>
								
							</div>

						</div>

						<div class="form_group">

							<input type="submit" class="submit" name="register" value="Register" />

						</div>
						<div id="message">
							<h3>Password must contain the following:</h3>
							<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
							<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
							<p id="number" class="invalid">A <b>number</b></p>
							<p id="length" class="invalid">Minimum <b>8 characters</b></p>
						</div>

					</div>

					<p class="clear"></p>

				</form>

			</div>
			

			<script>
				var myInput = document.getElementById("psw");
				var letter = document.getElementById("letter");
				var capital = document.getElementById("capital");
				var number = document.getElementById("number");
				var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
	document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
	document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
  	letter.classList.remove("invalid");
  	letter.classList.add("valid");
  } else {
  	letter.classList.remove("valid");
  	letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
  	capital.classList.remove("invalid");
  	capital.classList.add("valid");
  } else {
  	capital.classList.remove("valid");
  	capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
  	number.classList.remove("invalid");
  	number.classList.add("valid");
  } else {
  	number.classList.remove("valid");
  	number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
  	length.classList.remove("invalid");
  	length.classList.add("valid");
  } else {
  	length.classList.remove("valid");
  	length.classList.add("invalid");
  }
}
</script>

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

		<p>&copy; <?php echo strftime("%Y", time()); ?> <span>Coffee Bar & Restaurant</span>. All Rights Reserved</p>

	</div>

</div>

</body>

</html>