<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>นารีประดิษฐ์</title>
    <?php 
  include("db.php");
  ?>
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
            <a href="../admin/admin.php" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">นารีประดิษฐ์</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">นารีประดิษฐ์</span>
            </a>
            <!-- Logo -->
            <!-- Header Navbar: style can be found in header.less -->
            <?php 
                 include('../bar/navbar.php');    
                    include('../bar/sidebar.php');
            ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                <center>
                    <h3>ข้อมูลการสั่งทำสินค้า / Order Product</h3>
                </center>
                </section>
                <!-- Main content -->
                <section class="content">
                <i class="fa fa-arrow-circle-o-left" style="font-size:36px" onClick="history.go(-1);"></i>
                    <!-- Default box -->
                    <div class="box">
                        <div class="box-header with-border">

                            <form action="order_product_insert.php" method="post">
                                <div class="form-group">
                                     <label for="date_order" class="lb">วันที่สั่ง</label>
                                     <input type="date" name="date_order" class="form-control" id="date_order"
                                     placeholder="Enter date_order">
                                </div>

                                <div class="form-group">
                                    <label for="customer_id">รหัสลูกค้า</label>
                                    <input autocomplete="off"  type="text" class="form-control" name="customer_id" id="inputIsValid"
                                    list='list2' required>

                                    <?php           // $result = $conn->query("SELECT * FROM customer");
                                 $sql = "SELECT * FROM customer"; 
                                 $result = $conn->query($sql); // while($row = $result->fetch_assoc()){ ?>
                                     <datalist id='list2'>
                                        <?php foreach($result as $key=>$row) {
                                    echo '
                                         <option value="'.$row["customer_id"].'">'.$row["customer_name"]." ".$row["customer_lastname"].'</option>
                                     ';
                                     } ?>
                                    </datalist>
                                </div>

                                <div class="form-group">
                                   <label for="product_id" class="lb">รหัสแบบสินค้า</label>
                                    <input autocomplete="off" type="text" id="inputIsValid " name="product_id"
                                         class="form-control" list='list3' required>
                                    <?php
                                    $sql = "SELECT * FROM product"; 
                                    $result = $conn->query($sql); 
                                ?>
                                     <datalist id='list3'>
                                        <?php foreach($result as $key=>$row) {
                                     echo '
                                        <option value="'.$row["product_id"].'">'.$row["product_name"].'</option>
                                    ';
                                    } ?>
                                    </datalist>
                                </div>

                                <div class="form-group">
                                    <label for="genre_product_id">รหัสประเภทสินค้า</label>
                                    <input autocomplete="off"  type="text" class="form-control" name="genre_product_id" id="inputIsValid"
                                    list='list4' required>

                                    <?php           // $result = $conn->query("SELECT * FROM genre_product");
                                 $sql = "SELECT * FROM genre_product"; 
                                 $result = $conn->query($sql); // while($row = $result->fetch_assoc()){ ?>
                                     <datalist id='list4'>
                                        <?php foreach($result as $key=>$row) {
                                    echo '
                                         <option value="'.$row["genre_product_id"].'">'.$row["genre_product_name"].'</option>
                                     ';
                                     } ?>
                                    </datalist>
                                </div>

                                <div class="form-group">
                                    <label for="order_product_details" class="lb">รายละเอียดการสั่งสินค้า</label>
                                    <input type="text" name="order_product_details" class="form-control" id="order_product_details"
                                        placeholder="รายละเอียดขนาด เพิ่มเติม">
                                </div>

                                <div class="form-group">
                                    <label for="date_completion" class="lb">วันที่ผลิตเสร็จ</label>
                                    <input type="date" name="date_completion" class="form-control" id="date_completion"
                                        placeholder="Enter date_completion">
                                </div>
                                <div class="form-group">
                                <label for="status">สถานะ</label>
                                <select type="text" name="o_status" class="form-control">
                                    <option><?php echo $row['o_status']?></option>
                                    
                                </select>
                                </div>

                                <button type="submit" class="btn btn-primary" nama="save">บันทึก</button>
                                <button type="submit" class="btn btn-danger">ยกเลิก </button>
                            </form>
                        </div>
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