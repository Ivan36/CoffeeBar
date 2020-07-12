<?php 

session_start();
require "includes/db.php";
require "includes/functions.php";

if(!isset($_SESSION['user'])) {
	header("location: logout.php");
}

$msg = "";

if($_SERVER['REQUEST_METHOD'] == 'POST') {

	if(isset($_POST['submit']) && isset($_FILES['file'])) {

		$cat = htmlentities($_POST['category'], ENT_QUOTES, 'UTF-8');
		$subcat = htmlentities($_POST['sub_category'], ENT_QUOTES, 'UTF-8');
		$name = htmlentities($_POST['name'], ENT_QUOTES, 'UTF-8');
		$price = htmlentities($_POST['price'], ENT_QUOTES, 'UTF-8');
		$desc = htmlentities($_POST['desc'], ENT_QUOTES, 'UTF-8');
		$file = $_FILES['file'];
		$allowed_ext = array("jpg", "jpeg", "JPG", "JPEG", "png", "PNG");

		if($cat != "" && $name != "" && $subcat != "" && $price != "" && $desc != "" && empty($file) == false) {

			$ext = explode(".", $_FILES['file']['name']);

			if(in_array($ext[1], $allowed_ext)) {

				$check = $db->query("SELECT * FROM food WHERE food_name='".$name."' LIMIT 1");

				if($check->num_rows) {

					$msg = "<p style='color:red; padding: 10px; background: #ffeeee;'>No duplicate  food name allowed. Try again!!!</p>";

				}else{

					$insert = $db->query("INSERT INTO food(food_name, food_category, food_sub_category, food_price, food_description) VALUES('".$name."', '".$cat."', '".$subcat."', '".$price."', '".$desc."')");

					if($insert) {

						$ins_id = $db->insert_id;

						$image_url = "../image/FoodPics/$ins_id.jpg";

						if(move_uploaded_file($_FILES['file']['tmp_name'], $image_url)) {

							$msg = "<p style='color:green; padding: 10px; background: #eeffee;'>Food record successfully saved</p>";

						}else{

							$msg = "<p style='color:red; padding: 10px; background: #ffeeee;'>Could not insert record, try again</p>";

						}

					}

				}

			}else{

				$msg = "<p style='color:red; padding: 10px; background: #ffeeee;'>Invalid image file format</p>";

			}

		}else{

			$msg = "<p style='color:red; padding: 10px; background: #ffeeee;'>Incomplete form data</p>";

		}

	}

}

?>

<?php require_once 'includes/header.php'; ?>


<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="header">
						<h4 class="title" style="text-align: left;padding-left: 10px; background: #2abccc; color: #fff; border-right: 2px solid #fff;">Food Add Form</h4>
					</div>
					<div class="content">
						<form method="post" action="food_add.php" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-12">

									<?php echo $msg; ?>

									<div class="form-group">
										<label style="color: #333">category</label>
										<select name="category" class="form-control" required >
											<option value="">Select food category</option>
											<option value="breakfast">Breakfast</option>
											<option value="lunch">Lunch</option>
											<option value="dinner">Dinner</option>
											<option value="special">Special</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label style="color: #333">Sub category</label>
										<select name="sub_category" class="form-control" required >
											<option value="">Select food sub category</option>
											<option value="drinks">Drinks</option>
											<option value="foods">Foods</option>
											<option value="snacks">Snacks</option>
											<option value="water">Water</option>
											<option value="juice">Juice</option>
										</select>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label style="color: #333">Food Name</label>
										<input type="text" autofocus name="name" class="form-control" placeholder="Enter food Name" required />
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label style="color: #333" for="price">Price</label>
										<input type="text" name="price" id="price" class="form-control" placeholder="Enter Food Price" required />
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label style="color: #333" for="txtarea">Description</label>
										<textarea id="txtarea" class="form-control" placeholder="Enter Food description" name="desc" required></textarea>
									</div>
								</div>
							</div>

							<div class="row">

								<div class="col-md-12">
									<div class="form-group">
										<label style="display: block; border-radius: 5px; letter-spacing: 2px; background: #fff; color: #333; padding: 10px; border: 1px solid #ccc; cursor: pointer; text-align: center; font-size: 15px; font-weight: bold;" for="file" class="file_lbl"><i style="font-weight: bold; font-size: 19px;" class="pe-7s-upload"></i>Select Image<input type="file"  style="display: none;" id="file" name="file" required /></label>
									</div>
								</div>

							</div>

							<input type="submit" name="submit" style="background: #FF5722; border: 1px solid #FF5722" value="Save Food" class="btn btn-info btn-fill pull-right" />
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>

			<div class="col-md-6 col-lg-6">
				<div class="card">
					<div class="header">
						<h4 class="title text-center" style="text-align: center; background: #2abccc; color: #fff; border-right: 2px solid #fff;">Food List</h4><br>
					</div>

					<div class="container" style="width: 550px;">   
						<div id="live_data"></div>                 
					</div> 
				</div>
			</div>

		</div>
	</div>
</div>


<?php require_once 'includes/footer.php'; ?>
<script>  
	$(document).ready(function(){  
		function fetch_data()  
		{  
			$.ajax({  
				url:"food_live.php",  
				method:"POST",  
				success:function(data){  
					$('#live_data').html(data);  
				}  
			});  
		}  
		fetch_data();  




		$(document).on('click', '.btn_delete', function(){  
			var id=$(this).data("id3");  
			if(confirm("Are you sure you want to delete this?"))  
			{  
				$.ajax({  
					url:"delete_food.php",  
					method:"POST",  
					data:{id:id},  
					dataType:"text",  
					success:function(data){  
						alert(data);  
						fetch_data();  
					}  
				});  
			}  
		});  
	});  
</script>