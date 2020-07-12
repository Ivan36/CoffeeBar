<?php 
	
	$db = new mysqli("localhost", "root", "IvanMata36", "coffee_bar_db");
	
	if($db->connect_errno) {
		
		echo "PLEASE BEAR WITH US AS WE ARE CURRENTLY WORKING ON OUR SITE!!!! PLEASE COME BACK LATER";
		
	}
	
	$connect = mysqli_connect("localhost", "root", "IvanMata36", "coffee_bar_db");
	$con = mysqli_connect("localhost", "root", "IvanMata36", "coffee_bar_db"); 
	
?>