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
                include("db.php");
            ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                <center><h3>รายการสั่งทำสินค้า</h3></center>
                </section> 
                <!-- Main content -->
                <section class="content">
                    <!-- Default box -->
                     <div class="box">  
                        <div class="box-header with-border">
                        <!-- <a href="../shop/shop_form.php" class="btn btn-warning pull-right"> <i class="fa fa-plus"></i> เพิ่ม</a> -->
                            <table class="table table-striped">
                           <?php  

                           
                           $sql = "SELECT * FROM order_product
                           INNER JOIN login ON login.user_id = order_product.user_id
                           INNER JOIN payment ON payment.order_product_id = order_product.order_product_id
                                ORDER BY `order_product`.`order_product_id` ASC";
                                        $query = mysqli_query($conn,$sql);   
                            ?>

                                <thead>
                                    <tr>
                                        <th scope="col">ลำดับ</th>
                                        <th scope="col">วันที่</th>
                                        <th scope="col">ชื่อลูกค้า</th>
                                        <th scope="col">สถานะ</th>
                                        <!-- <th scope="col">วันที่สั่งสินค้า</th>  -->
                                        <!-- <th scope="col">รายการสินค้า</th>  -->

                                        <!-- <th scope="col">วันที่ผลิต</th> -->
                                        <th scope="col">รายละเอียด</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                  $i = 1;
                                    if($query)
                                    {
                                        while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                                        {
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <th scope="row"><?php echo $row['date_order']; ?></th>
                                        <td><?php echo $row['name']; ?> <?php echo $row['lastname']; ?></td>   
                                        <td><?php echo $row['status_pay']; ?></td>                                        
                                        <!-- <td><?php echo $row['apointment_date']; ?></td> -->
                                        <!-- <td><?php echo $row['product_name']; ?></td> -->
                                        <!-- <td><?php echo $row['date']; ?></td> -->
                                        
                                        <td><a href="shop_show_cus.php?txtid=<?php echo $row['order_product_id'];?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>  <!-- รายการสินค้า -->
                                                                               
                                            <!-- <a href="order_product_form_update.php?txtid=<?php echo $row['order_product_id'];?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>  แก้ไข -->
                                            
                                        </td>
                                    </tr>
                                </tbody>
                                <?php   $i++;  } 
                                }
                                else
                                {
                                echo "No Recoer Found";
                                }
                                ?>
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
