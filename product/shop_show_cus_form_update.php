<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>นารีประดิษฐ์</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="../admin/admin.php" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">นารีประดิษฐ์</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">นารีประดิษฐ์</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <?php
            include('../bar/navbar.php');
            include('../bar/sidebar.php');
            ?>

            <?php 
            include("db.php"); 
            // error_reporting(error_reporting() & ~E_NOTICE);
            $order_details_id = $_REQUEST['txtid'];
            $sql = "SELECT  *  FROM order_details 
            INNER JOIN order_product ON order_details.order_product_id = order_product.order_product_id 
            INNER JOIN product ON order_details.product_id = product.product_id 
            WHERE order_details_id = '$order_details_id' ";
            $result = $conn->query($sql);
            $row = mysqli_fetch_assoc($result); 
            ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <center>
                        <h3>แก้ไขข้อมูลสั่งทำสินค้า</h3>
                    </center>
                </section>
                <!-- Main content -->
                <section class="content">
                    <i class="fa fa-arrow-circle-o-left" style="font-size:36px" onClick="history.go(-1);"></i>
                    <!-- Default box -->
                    <div class="box">
                        <div class="box-header with-border">
                            <?php  date_default_timezone_set('Asia/Bangkok'); 
                            $date_sale = date("Y-m-d");
                            ?>
                            <!-- ---------------------------------------------------------------------------------------- -->
                            <form action="shop_show_cus_update.php?txtid=<?php echo $sale_details_id; ?>" method="post"
                                enctype="multipart/form-data">
                                <label for="date">ชื่อสินค้า &nbsp;:&nbsp;</label>
                                <input autocomplete="off" type="text" name="size" class="form-control" required
                                    value="<?php echo  $row['product_name']; ?> " />
                                <table class="table table-bordered">
                                    <!-- <div class="form-group">
                                        <label for="size">ขนาด</label>
                                        <input autocomplete="off" type="text" name="size" class="form-control"
                                            placeholder="Enter size" required />
                                    </div> -->
                                    <div class="form-group">
                                        <label>ราคา</label>
                                        <input autocomplete="off" type="text" name="price" class="form-control" required
                                            value="<?php echo $row["price"]?>" />
                                    </div>
                                    <!-- </?php } ?> -->

                                    <!-- ----------------------------------------------------------------------------------------------- -->
                                </table>
                                <button type="submit" name="update" class="btn btn-primary">แก้ไขข้อมูล</button>
                            </form>
                            <!-- <a href="shop_show_cus.php"> <button type="submit" name="delete" class="btn btn-danger">ยกเลิก </button></a> -->
                        </div>
                        footer
                    </div>
                    <!-- /.box -->

                </section>
                <!-- /.content -->
            </div>

            <!-- /.content-wrapper -->

</body>

</html>

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script>
$(document).ready(function() {
    $('.sidebar-menu').tree()
})
</script>