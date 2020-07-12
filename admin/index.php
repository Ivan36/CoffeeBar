<?php
require_once 'includes/header.php';
require_once 'includes/sidebar.php';
?>
<?Php
if($stmt = $db->query("SELECT food AS food_name, SUM(qty) AS total from items
  GROUP BY food_name 
  ORDER BY total DESC 
  LIMIT 5")){
  $php_data_array = Array(); 
  while ($row = $stmt->fetch_row()) {
   $php_data_array[] = $row;
 }
}else{
  echo $db->error;
}
echo "<script>
var my_2d = ".json_encode($php_data_array)."
</script>";
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard </li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><a href="manage_orders.php"><i class="fas fa-box-open"></i></a></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Orders</span>
              <span class="info-box-number">
                <?php echo $count_orders; ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
           <span class="info-box-icon bg-danger elevation-1"><a href="invoice.php"> <i class="fas fa-comment-dollar"></i></a></span>

           <div class="info-box-content">
            <span class="info-box-text">Total sales</span>
            <span class="info-box-number">No: <?php echo $count_sales; ?> Ugx: <?php echo $all_sales_as; ?>/-</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><a href="invoice.php"><i class="fas fa-shopping-cart"></i></a></span>

          <div class="info-box-content">
            <span class="info-box-text">Today Sales</span>
            <span class="info-box-number">No: <?php echo $count_sales1; ?> Ugx: <?php echo $today_sales_ts; ?>/-</span>

          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><a href="manage_customers.php"><i class="fas fa-copyright"></i></a></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Customers</span>
            <span class="info-box-number"><?php echo $count_customers; ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Monthly Recap Report</h5>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <div class="btn-group">
                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                  <i class="fas fa-wrench"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" role="menu">
                  <a href="#" class="dropdown-item">Action</a>
                  <a href="#" class="dropdown-item">Another action</a>
                  <a href="#" class="dropdown-item">Something else here</a>
                  <a class="dropdown-divider"></a>
                  <a href="#" class="dropdown-item">Separated link</a>
                </div>
              </div>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <p class="text-center">
                  <strong>Best 5 selling Items from <?php echo $first_day_this_month = date('m-01-Y'); ?> to <?php echo $last_day_this_month  = date('m-t-Y'); ?></strong>
                </p>
                <div class="row">
                  <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                    <div id="chart_div1"></div>
                    <br><br>

                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3 col-lg-3"></div>
                  <div class="col-sm-12 col-xs-12 col-md-8 col-lg-8">
                    <div id="chart_div"></div>
                  </div>
                </div>
                <!-- /.chart-responsive -->
              </div>
              <!-- /.col -->
              <div class="col-md-4">

                <!-- /.progress-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- ./card-body -->
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-3 col-6">
                <div class="description-block border-right">
                  <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                  <h5 class="description-header">Ugx 350,210</h5>
                  <span class="description-text">TOTAL REVENUE</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-3 col-6">
                <div class="description-block border-right">
                  <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                  <h5 class="description-header">Ugx 10,390.90</h5>
                  <span class="description-text">TOTAL COST</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-3 col-6">
                <div class="description-block border-right">
                  <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                  <h5 class="description-header">Ugx 24,813.53</h5>
                  <span class="description-text">TOTAL PROFIT</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-3 col-6">
                <div class="description-block">
                  <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                  <h5 class="description-header">1200</h5>
                  <span class="description-text">GOAL COMPLETIONS</span>
                </div>
                <!-- /.description-block -->
              </div>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="col-md-4">

    </div>
    <!-- /.col -->
  </div><!--/. container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
 google.charts.load('current', {'packages':['corechart']});
     // Draw the pie chart when Charts is loaded.
     google.charts.setOnLoadCallback(draw_my_chart);
      // Callback that draws the pie chart
      function draw_my_chart() {
        // Create the data table .
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'food_name');
        data.addColumn('number', 'total');
        for(i = 0; i < my_2d.length; i++)
          data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);
// above row adds the JavaScript two dimensional array data into required chart format
var options = {title:'Best 5 selling Items from <?php echo $first_day_this_month = date('m-01-Y'); ?> to <?php echo $last_day_this_month  = date('m-t-Y'); ?>',
width:650,
height:550};

        // Instantiate and draw the chart
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawChart);
      
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Best 5 selling Items from <?php echo $first_day_this_month = date('m-01-Y'); ?> to <?php echo $last_day_this_month  = date('m-t-Y'); ?>');
        data.addColumn('number', 'Total Quantity ordered');
        // data.addColumn('number', '');
        for(i = 0; i < my_2d.length; i++)
    data.addRow([my_2d[i][0],parseInt(my_2d[i][1])]); //, parseInt(my_2d[i][1])
  var options = {
    title: 'Best 5 selling Items',
    hAxis: {title: 'Best 5 selling Items',  titleTextStyle: {color: '#333'}},
    vAxis: {minValue: 0}
  };

  var chart = new google.charts.Bar(document.getElementById('chart_div1'));
  chart.draw(data, options);
}
</script>
<?php require_once 'includes/footer.php' ?>
