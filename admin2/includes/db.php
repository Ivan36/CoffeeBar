<?php 
	
	$db = new mysqli("localhost", "root", "", "coffee_bar_db");
	
	if($db->connect_errno) {
		
		echo "PLEASE BEAR WITH US AS WE ARE CURRENTLY WORKING ON OUR SITE!!!! PLEASE COME BACK LATER";
		
	}
	
	$connect = mysqli_connect("localhost", "root", "", "coffee_bar_db"); 
	
?>