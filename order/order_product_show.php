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

                            <!-- Main content -->
               
                           <?php  

                           
                        //    $sql = "SELECT * 
                        //         FROM order_product 
                        //         INNER JOIN login ON login.user_id = order_product.user_id
                        //         ORDER BY `order_product`.`order_product_id` ASC";
                        //                 $query = mysqli_query($conn,$sql);   
                            $sql = "SELECT * FROM product 
                            INNER JOIN genre_product ON product.genre_product_id = genre_product.genre_product_id
                                        
                             ";
                                        
                            $result = mysqli_query($conn, $sql);            
                            ?>


                <thead>
                    <tr>
                        <th scope="col">รูปแบบสินค้า</th>
                        <th scope="col">ประเภท</th>
                        <!-- <th>ขนาด</th> -->
                        <th scope="col">จำนวน</th>
                        <th>ราคา</th>
                        <th>ราคารวม</th>
                        <th>ดำเนินการ</th>
                        <th></th>
                    </tr>
                </thead>
                <?php
                if (!empty($_SESSION["shop"])) { //ถ้ามีข้อมูลใน $_SESSION ให้แสดง
                    $total = 0;
                    foreach ($_SESSION['shop'] as $key => $value) { ?>
                        <tr>
                            
                            <!-- <td><?php echo $value['item_id']; ?></td> -->
                            <td><?php echo $value['item_product_name']; ?></td>
                            <td><?php echo $value['item_genre_product_name']; ?></td>
                            <td><?php echo $value['item_quantity']; ?></td>
                            <td><?php echo number_format($value['item_product_price'], 2); ?></td>
                            <td><?php echo number_format($value['item_quantity'] * $value['item_product_price'], 2); ?></td>
                            <!-- <td><a href="product_add.php?action=delete&id=<?php echo $value['item_id']; ?>">ลบสินค้า</td>
                            <td><a href="../payment/detail_order_cus.php?id=<?php echo $value['item_id']; ?>">ชำระเงิน</td> -->
                            <td><a href="../product/shop_show_cus.php?txtid=<?php echo $value['item_id'];?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>  <!-- รายการสินค้า --></td>
                            <!-- <td><a href="order_product_edit.php?txtid=<?php echo $value['item_id'];?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a> </td> แก้ไข -->
                        </tr>
                    <?php
                            $total = $total + ($value['item_product_price'] * $value['item_quantity']);
                        }
                        ?>
                    <tr>
                        <td colspan="4" aling="right">ราคารวมทั้งหมด</td>
                        <td align="left">฿<?php echo number_format($total, 2); ?></td>
                        <td></td>
                        <td></td>
                    <?php } ?>
                    </tr>
            </table> <br>
           

    <!-- ---------------------------------------------------------------------------------------- -->
            
        </div>
                                        
                                
                          footer     
                            </table>
                        </div>
                        
                    </div>
                    <!-- /.box -->

                <!-- </section> -->
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
