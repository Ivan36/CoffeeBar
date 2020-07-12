<?php 

session_start();
require "admin/includes/functions.php";
require "admin/includes/db.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {

	if(isset($_POST['order_info'])) {

		$values = "VALUES";

		$name 		= preg_replace("#[^a-zA-Z ]#", "", $_POST['name']);
		$addr 		= preg_replace("#[^a-zA-Z0-9 ]#", "", $_POST['addr']);
		$email 		= htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');
		$phone 		= preg_replace("#[^0-9]#", "", $_POST['phone']);
		$food 		= htmlentities($_POST['food'], ENT_QUOTES, 'UTF-8');
		$price 		= htmlentities($_POST['price'], ENT_QUOTES, 'UTF-8');

		if($name != "" && $addr != "" && $email != "" && $phone != "" && $food != "" && $price != "") {

			$cSql= $db->query("SELECT * from basket where contact_number='$phone' AND status='pending'");
			if ($cSql->num_rows>0) {
				$row2 = $cSql->fetch_assoc();
				$ins_id = $row2['id'];
				$Price1 = $row2['total'];
				$nPrice = intval($price + $Price1);

				$UpdateBas= $db->query("UPDATE basket SET total='$nPrice' where id='$ins_id'");
				$food_array = explode(",", $food);
				
				foreach($food_array as $key => $value) {

					if(trim($value) != "") {

						$exp = explode("-", $value);

						$values .= "('".$ins_id."', '".TRIM($exp[0])."', '".$exp[1]."', '".TRIM($name)."'),";

					}

				}

				$values = rtrim($values, ",");

				$save_item = $db->query("INSERT INTO items(order_id, food, qty, customer) ".$values." ");

				if($save_item) {

					$_SESSION['order_id'] = "ORD_".$ins_id;
					$_SESSION['name'] = $name;

					echo "success";

				}

			}
			else{


				$insert = $db->query("INSERT INTO basket(customer_name, contact_number, address, email, total, status, date_made) VALUES('".$name."', '".$phone."', '".$addr."', '".$email."', '".$price."', 'pending', NOW())");

			// $stmt = $db->query("SELECT id FROM basket ORDER BY id DESC LIMIT 1");
			// $rowid = $stmt->fetch_assoc();
			// $lastid = $rowid['id'];
			// $gender = 'Non';




				if($insert) {

					$ins_id = $db->insert_id;

					$gender = 'Non';

					$cheack = $db->query("SELECT * FROM tblcustomers WHERE Email='$email' AND MobileNumber='$phone'");
					if ($cheack->num_rows<=0) {

						$query= $db->query("INSERT into  tblcustomers(Name,Email,MobileNumber,Gender,Details,order_id) value('$name','$email','$phone','$gender','$addr','$ins_id')");
					}
					else{
						$query= $db->query("UPDATE tblcustomers SET order_id='$ins_id', invoice='no' WHERE Email='$email' AND MobileNumber='$phone'");
					}

					$food_array = explode(",", $food);

					foreach($food_array as $key => $value) {

						if(trim($value) != "") {

							$exp = explode("-", $value);

							$values .= "('".$ins_id."', '".TRIM($exp[0])."', '".$exp[1]."', '".TRIM($name)."'),";

						}

					}

					$values = rtrim($values, ",");

					$save_item = $db->query("INSERT INTO items(order_id, food, qty, customer) ".$values." ");

					if($save_item) {

						$_SESSION['order_id'] = "ORD_".$ins_id;
						$_SESSION['name'] = $name;

						echo "success";

					}

				}


				else{

					echo "Incomplete Form Data";

				}
			}


		}
	}
	elseif(isset($_POST['item_id_qty']) && $_POST['item_id_qty'] != "") {

		$explode_var = explode("_", htmlentities($_POST['item_id_qty']));

		$item_to_adjust = $explode_var[1];
		$quantity = $explode_var[0];

		if ($quantity >= 100) { $quantity = 99; }
		if ($quantity < 1) { $quantity = 1; }
		if ($quantity == "") { $quantity = 1; }
		$i = 0;
		foreach ($_SESSION["cart_array"] as $each_item) { 
			$i++;
			while (list($key, $value) = each($each_item)) {
				if ($key == "item_id" && $value == $item_to_adjust) {
							  // That item is in cart already so let's adjust its quantity using array_splice()
					array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $item_to_adjust, "quantity" => $quantity)));
						  } // close if condition
					  } // close while loop
					}

					$sql = $db->query("SELECT * FROM food WHERE id='$item_to_adjust' LIMIT 1");
					while ($row = $sql->fetch_assoc()) {

						$price = $row['food_price'];

					}
					$pricetotal = $price * $quantity;

					echo $pricetotal;

				}

			}

			?>