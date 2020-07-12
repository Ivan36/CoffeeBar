<?php require 'db.php'; ?>
<?php
if (isset($_GET['del_result'])) {
    $del_result = mysqli_real_escape_string($con, $_GET['del_result']);
    $exp = explode('-', $del_result);
    $id = $exp['0'];
    $table = $exp['1'];
    $table1 = $exp['2'];
    $query=mysqli_query($con,"DELETE  FROM  $table WHERE  id='$id'");
    $query1=mysqli_query($con,"DELETE  FROM  $table1 WHERE  order_id='$id'");
    if ($query && $query1) {
       $del_message = "Field deleted successfully";
       echo "<script> window.alert('Field deleted successfully') </script>";
       echo "<script> window.history.back() </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>coffee bar & Restaurant</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />


    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- Fontfaces CSS-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script> -->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link type="text/css" href="vendor/datatable/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="vendor/datatable/css/buttons.dataTables.min.css">
    <!-- Bootstrap CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

    <style type="text/css">
        .card1{
            background-color: #AA93FB;
            text-align: center;
            color: white !important; 
            font-family: sans-serif;
            font-style: italic !important;
        }
        .card2{
            background-color: orange;
            text-align: center;
            color: white !important; 
            font-family: sans-serif;
            font-style: italic !important;
        }
        .card3{
            background-color: #92D0F9;
            text-align: center;
            color: white !important; 
            font-family: sans-serif;
            font-style: italic !important;
        }
        .card4{
            background-color: #EC867C ;
            text-align: center;
            color: white !important; 
            font-family: sans-serif;
            font-style: italic !important;
        }

        .myform{
            padding: 20px;
        }
    </style>

    <script>

      function check() {

         return confirm("Are you sure you want to delete this record");

     }

 </script>

</head>
<body>

    <div class="wrapper">
        <div class="sidebar" data-color="#000" data-image="assets/img/sidebar-5.jpg">

            <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


            <?php require "side_wrapper.php"; ?>

            <div class="main-panel">
                <nav class="navbar navbar-default navbar-fixed" style="background: #2abccc;">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar" style="background: #fff;"></span>
                                <span class="icon-bar" style="background: #fff;"></span>
                                <span class="icon-bar" style="background: #fff;"></span>
                            </button>
                            <a class="navbar-brand" href="#" style="color: #fff;">FOOD COLLECTION</a>
                        </div>
                        <div class="collapse navbar-collapse">

                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="logout.php" style="color: #fff;">
                                        Log out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>