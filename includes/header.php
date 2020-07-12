<header>
	
	<div class="nav_toggle" onclick="toggle_class();">
		
		<span class="toggle_icon"></span>
		
	</div>
	
	<div onclick="remove_class()">

		<div class="main_nav">

			<h2 style="font-size: 22px;font-family: lucida handwriting;">coffee bar food ordering system</h2>

			<ul class="default_links" style="font-family: aclonica; font-size: 20px;">
				<?php if (isset($_SESSION['ID'])) {
					$userid = $_SESSION['ID'];
					$user = $_SESSION['username'];
					$names = $_SESSION['Name'];
					echo '<li><a href="logout.php">Welcome('.$user.')Logout</a></li>';
					echo '<li><a href="my-orders.php">my orders</a></li>';
				} 
				else{
					echo '<li><a href="login.php">Signin</a></li>';
				}

				?>
				
				<li><a href="index.php">Home</a></li>
				<li><a href="menu.php">Menu</a></li>
				<li><a href="reservation.php">Reservation</a></li>
				<li><a href="basket.php">Order</a></li>

			</ul>

			<p class="clear"></p>

		</div>

		<p class="clear"></p>

	</div>
	
</header>

<div class="responive_nav">
	
	<div class="nav_section_img">
		
		<div class="nav_section_div">
			
			<h3>Coffee Bar & Restaurant</h3>
			
		</div>
		
	</div>
	
	<div class="nav_section">
		
		<ul>
			<?php if (isset($_SESSION['ID'])) {
				$userid = $_SESSION['ID'];
				$user = $_SESSION['username'];
				echo '<li><a href="logout.php">Welcome('.$user.')Logout</a></li>';
			} 
			else{
				echo '<li><a href="login.php">Signin</a></li>';
			}

			?>
			
			<li><a href="index.php"><span class="home">Home</span></a></li>
			<li><a href="menu.php"><span class="menu">Menu</span></a></li>
			<li><a href="reservation.php"><span class="reserve">Book Table</span></a></li>
			<li><a href="gallery.php"><span class="gallery">Gallery</span></a></li>
			<li><a href="basket.php"><span class="order">Order</span></a></li>
			
		</ul>
		
	</div>
	
</div>