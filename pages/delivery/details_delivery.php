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
                include("db.php");
                include('../bar/navbar.php');    
                include('../bar/sidebar.php');
            ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                </section>
                <!-- Main content -->
                <section class="content">
                    <i class="fa fa-arrow-circle-o-left" style="font-size:36px" onClick="history.go(-1);"></i>
                    <a href="pdf.php?txtid=<?php echo $_GET['txtid'] ?>" class="btn btn-warning pull-right">
                        <i class="glyphicon glyphicon-print"></i> ปริ้น</a>

                    <a href="detail_form_update.php?txtid=<?php  echo $_GET['txtid'];?>"
                        class="btn btn-success  pull-right"><i class="fa fa-pencil"></i>  แก้ไข</a>

                    <div class="box">
                        <!--  พื้นหลังสีขาวในส่วนของข้อมูล   -->
                        <div class="box-header with-border">
                            <!-- Default box -->

                            <div class="box-header with-border">
                                <span align="center">
                                    <h2>รายการสินค้าที่จัดส่ง</h2>
                                </span>
                                <?php 
                                    $delivery_id = $_REQUEST['txtid']; 
                                    $sql = "SELECT * FROM delivery 
                                    INNER JOIN manufacture  ON manufacture.manufacture_id = delivery .manufacture_id 
                                    INNER JOIN order_details ON order_details.order_details_id = manufacture.order_details_id 
                                    INNER JOIN product      ON product.product_id = order_details.product_id 
                                    INNER JOIN order_product         ON order_product .order_product _id =order_details.order_product _id 
                                    INNER JOIN login        ON login.user_id =order_product .user_id";
                                   $query1 = $conn->query($sql);                           
                                //    $result=mysqli_fetch_assoc($query1);
                                
                                $sql2 = "SELECT * FROM delivery 
                                INNER JOIN manufacture  ON manufacture.manufacture_id = delivery .manufacture_id 
                                INNER JOIN order_details ON order_details.order_details_id = manufacture.order_details_id 
                                INNER JOIN product      ON product.product_id = order_details.product_id 
                                INNER JOIN order_product    ON order_product .order_product _id =order_details.order_product _id 
                                INNER JOIN login        ON login.user_id =order_product .user_id";
                                $query2 = mysqli_query($conn,$sql2);
                                ?>
                <!-- //////////////////////////////////////////////////////////////////////////////////////////////////// -->
                                <div class="container">
                                    <label >รหัสการผลิต&nbsp; :</label>&nbsp;&nbsp;&nbsp; &nbsp;
                                    <?php echo $result['manufacture_id']; ?> <br>
                                    <label >วันที่สั่งทำ  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :  </label>&nbsp;&nbsp; &nbsp;
                                    <?php echo $result['date_order']; ?> <br>
                                    <label >วันที่ผลิต  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  :
                                    &nbsp;</label>&nbsp;&nbsp; &nbsp;<?php echo $result['date']; ?><br> 
                                    <label>ชื่อลูกค้า  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  :
                                    &nbsp;</label>&nbsp;&nbsp; &nbsp;<?php echo $result['name']; ?>&nbsp; <?php echo $result['lastname']; ?><br>                               
                                <br><br>
                                </div>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">ลำดับ</th>
                                            <th scope="col">รูปแบบสินค้า</th>
                                            <th scope="col">จำนวน</th>
                                            <th scope="col">ราคา/หน่วย</th>
                                            <th scope="col">ราคารวม</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php
                                 $i = 1;
                                        while($row=mysqli_fetch_array($query1,MYSQLI_ASSOC))
                                        {
                                 ?>
                                        <tr>
                                            <td><?php echo $i?></td>
                                            <td><?php echo $row['product_name']?></td>
                                            <td><?php echo $row['amount']?></td>
                                            <td><?php echo $row['price']?></td>
                                            <td><?php echo $row['sum_price']?></td>
                                        </tr>

                                    </tbody>
                                    <?php
                                    // $total_price = $total_price + ($row['amount'] * $row['price'] );
                                    $i++;
                                    } 
                                    ?>
                                    <!-- <tr>
                                        <td colspan="6" aling="right">ราคารวมทั้งหมด</td>
                                        <td align="left">฿<?php echo number_format($total_price, 2); ?></td>
                                    </tr> -->
                                </table>

                                <?php
                                    mysqli_close($conn);
                                ?>
                            </div>
                            footer
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