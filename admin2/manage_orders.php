<?php require_once 'includes/header.php'; ?>

<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title" style="text-align: center; background: #2abccc; color: #fff; border-right: 2px solid #fff;">Order List</h4><br>
					</div>

					<div class="row" style="padding-left: 10px;padding-right: 10px;">
						<div class="col-md-12 col-lg-12">
							<div class="container">   
								<div id="live_data"></div>                 
							</div>  
							
						</div>
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
				url:"select_orders.php",  
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
					url:"delete_orders.php",  
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