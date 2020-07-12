<footer class="footer">
	<div class="container-fluid">
		
		<p class="copyright pull-right">
			&copy; <?php echo date('Y'); ?> <a href="index.php" style="color: #FF5722;">Coffee Bar & Restaurant</a>
		</p>
	</div>
</footer>

</div>
</div>


</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		
			/*notice = $("#notify").val();
			
			//alert(notice);
			
        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: notice

            },{
                type: 'danger',
                timer: 7000
            });

        });*/
    </script>
    <script src="vendor/slick/slick.min.js"></script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js"></script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <link type="text/css" href="vendor/datatable/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="vendor/datatable/css/buttons.dataTables.min.css">
    <script type="text/javascript" src="vendor/datatable/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="vendor/datatable/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="vendor/datatable/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="vendor/datatable/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="vendor/datatable/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="vendor/datatable/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="vendor/datatable/js/jszip.min.js"></script>
    <script type="text/javascript" src="vendor/datatable/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="vendor/datatable/js/vfs_fonts.js"></script>
    <script type="text/javascript" src="vendor/datatable/js/dataTables.select.min.js"></script>
    <script type="text/javascript">
    	$(function() {
    		$("#example1").dataTable();
            $(".example1").dataTable();
    		$("#example2").dataTable();
    		$('#example3').dataTable({
    			"bPaginate": true,
    			"bLengthChange": false,
    			"bFilter": false,
    			"bSort": true,
    			"bInfo": true,
    			"bAutoWidth": false

    		});
    	});
    </script>
    <script type="text/javascript">
    	$(document).ready(function() {
    		$('#example').DataTable({
    			retrieve: true,
    			"scrollX": false,
    			scrollY: 600,
    			"scrollCollapse": true,
    			paging: true,
    			dom: 'lBfrtip<"actions">',
    			"aaSorting": [],
    			buttons: [{
    				extend: 'csv',
    				text: window.csvButtonTrans,
    				exportOptions: {
    					columns: ':visible'
    				}
    			},
    			{
    				extend: 'excel',
    				text: window.excelButtonTrans,
    				exportOptions: {
    					columns: ':visible'
    				}
    			},
    			{
    				extend: 'pdf',
    				text: window.pdfButtonTrans,
    				exportOptions: {
    					columns: ':visible'
    				}
    			},

                // {
                //     extend: 'colvis',
                //     text: window.colvisButtonTrans,
                //     exportOptions: {
                //         columns: ':visible'
                //     }
                // },
                // {
                //     extend: 'print',
                //     text: 'Print selected'
                // },
                // {
                //     extend: 'print',
                //     text: 'Print',
                //     exportOptions: {
                //         modifier: {
                //             selected: null
                //         }
                //     }
                // },
                {
                	extend: 'print',
                	text: 'Print',
                	customize: function(win) {
                		$(win.document.body)
                		.css('font-size', '10pt')
                		.prepend(

                			);

                		$(win.document.body).find('table')
                		.addClass('compact')
                		.css('font-size', 'inherit');
                	}
                },
                ],
                select: false,
                initComplete: function() {



                	this.api().columns().every(function() {
                		var column = this;

                		if (column.index() == -1) {

                			input = $('<input type="text" />').appendTo($(column.header())).on('keyup change', function() {
                				if (column.search() !== this.value) {
                					column.search(this.value)
                					.draw();
                				}
                			});
                			return;
                		}

                		var select = $('<select><option value=""> filter</option></select>')
                		.appendTo($("#filters").find("th").eq(column.index()))
                		.on('change', function() {
                			var val = $.fn.dataTable.util.escapeRegex(
                				$(this).val());

                			column.search(val ? '^' + val + '$' : '', true, false)
                			.draw();
                		});

                		console.log(select);

                		column.data().unique().sort().each(function(d, j) {
                			select.append('<option value="' + d + '">' + d + '</option>')
                		});
                	});
                }
            });
    		console.log();
    	});
    </script>

    </html>
