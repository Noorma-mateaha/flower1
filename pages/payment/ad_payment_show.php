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
        <?php 
  include("db.php");
  ?>
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
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                <center><h3>รายการชำระเงิน</h3></center>
                </section> 

                <!-- Main content -->
                <section class="content">
                    <!-- Default box -->
                    <div class="box">
                        <!--  พื้นหลังสีขาวในส่วนของข้อมูล   -->
                        <div class="box-header with-border">
                            <!--  พื้นหลังสีขาวในส่วนของข้อมูล   -->
                            <!-- <a href="ad_payment_form.php" class="btn btn-warning pull-right"><i class="fa fa-plus"></i> เพิ่ม</a> -->

                            <?php  
                                include("db.php");                             
                                $sql = "SELECT payment.payment_id, 
                                payment.payment_date, 
                                payment.pay, 
                                payment.pay_image, 
                                payment.status_pay, 
                                order_product.order_product_id, 
                             
                                login.name, 
                                login.lastname 
                                FROM payment 
                                INNER JOIN order_product ON order_product.order_product_id = payment.order_product_id
                                 INNER JOIN login ON login.user_id = order_product.user_id
                                 ORDER BY `order_product`.`order_product_id` ASC";
                                $query = mysqli_query($conn,$sql);
                            ?>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">รหัสการขาย</th>
                                        <th scope="col">วันที่ชำระ</th>
                                        <th scope="col">ชื่อ-สกุล</th>
                                        <th scope="col">ชำระแล้ว</th>
                                        <th scope="col">สถานะ</th>
                                        <th scope="col">สลิปการโอน</th>
                                        <th scope="col">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){
                                    ?>
                                    <tr>
                                    <td><?php echo $row['order_product_id']; ?></td>
                                        <th><?php echo $row['payment_date']; ?></th>
                                        <td><?php echo $row['name']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['lastname']; ?></td>
                                        <td><?php echo $row['pay']; ?></td>
                                        <td><?php echo $row['status_pay']; ?></td>
                                        <td><img src="image/<?php echo $row["pay_image"];?>" width="50px" height="50px" ?></td> 
                                       
                                        <td>
                                            <!-- <a href="" class="btn btn-info btn-sm"><i class="fa fa-eye"> แสดง</i></a> -->
                                            <a href="ad_payment_form_update.php?txtid=<?php echo $row['payment_id'];?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> แก้ไข</a>
                                            <a href="ad_del.php?txtid=<?php echo $row['order_product_id'];?>" onclick="return confirm('คุณจะลบข้อมูลนี้ใช่หรือไม่?')"
                                                class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> ลบ</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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