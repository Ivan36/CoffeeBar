  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="http://adminlte.io">Coffee bar online food ordering system </a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="vendor/DataTables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="js/jquery-1.12.4.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<!-- <script src="js/bootstrap-datepicker.js"></script> -->
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
<script>
    //paste this code under head tag or in a seperate js file.
    // Wait for window load
    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");;
    });
</script>

<script>
    // AJAX code to check input field values when onblur event triggerd.
    function validate(field, query) {
        var xmlhttp;
        if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(field).innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "lib/validation.php?field=" + field + "&query=" + query, false);
        xmlhttp.send();
    }
</script>
<script type="text/javascript">
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        title: {
            text: "Sub County Results division 1 (%)"
        },
        subtitles: [{
            text: ""
        }],
        data: [{
            type: "pie",
            showInLegend: "true",
            legendText: "{label}",
            indexLabelFontSize: 16,
            indexLabel: "{label} - #percent%",
            yValueFormatString: "#,##0",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });

    chart.render();
</script>
<!-- page script -->
<script>
  $(function () {
    $("#example4").DataTable();
    $('#example5').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
    $('#example6').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
    });
     $('#example7').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });
  });
</script>
</body>
</html>
