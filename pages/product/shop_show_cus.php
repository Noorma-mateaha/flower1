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
    error_reporting(error_reporting() & ~E_NOTICE);
    session_start();
    $user_id = $_SESSION["user_id"];
    $sql1 = "SELECT * FROM login  ";
    $query1 = mysqli_query($conn,$sql1);
    $result1 = $query1->fetch_assoc();
    $user_id = $row2['user_id'];

// ********************************************************* 
    // $result = $query->fetch_assoc(); 
    $order_product_id = $_REQUEST['txtid']; 
    $sql2    = "SELECT  order_product.order_product_id,
                        order_product.o_status, 
                        order_product.date_order,
                        login.user_id,
                        login.name,
                        login.lastname,
                        login.tel,
                        login.address,
                        payment.status_pay

    FROM order_product
    INNER JOIN login ON login.user_id = order_product.user_id  
    INNER JOIN payment ON payment.order_product_id = order_product.order_product_id

    WHERE  order_product.order_product_id = '$order_product_id' ";
    $query2 = $conn->query($sql2);
    $row2=mysqli_fetch_assoc($query2); 
// **********************************************************
    $sql3 = "SELECT order_details.order_details_id,
                    order_details.order_amount,
                    order_details.price,
                    order_details.sum_price,
                    order_details.deposit,
                    genre_product.genre_product_id,
                    genre_product.genre_product_name,
                    order_details.status_sd,
                    product.product_name,
                    order_product.order_product_id,
                    payment.status_pay
            FROM    order_details 
            INNER JOIN order_product ON order_details.order_product_id = order_product.order_product_id 
            INNER JOIN payment ON payment.order_product_id = order_product.order_product_id
            INNER JOIN product ON order_details.product_id = product.product_id 
            INNER JOIN genre_product ON genre_product.genre_product_id = product.genre_product_id
            
     WHERE order_product.order_product_id = '$order_product_id' ";
    $query3 = mysqli_query($conn,$sql3); 

?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <center>
                        <h3>ข้อมูลสั่งทำสินค้า</h3>
                    </center>
                </section>
                <!-- Main content -->
                <section class="content">
                    <!-- <i class="fa fa-arrow-circle-o-left" style="font-size:36px" onClick="history.go(-1);"></i>
                    <a href="pdf_shop_show_cus.php?txtid=<?php echo $_GET['txtid'] ?>" class="btn btn-warning pull-right">
                        <i class="glyphicon glyphicon-print"></i> ปริ้น</a> -->
                    <!-- Default box -->
                    <div class="box">
                        <div class="box-header with-border">
                            <?php  date_default_timezone_set('Asia/Bangkok'); 
                            $date_order = date("Y-m-d");
                            ?>

                            <label for="queue">ลำดับสั่งทำ &nbsp;:&nbsp;&nbsp;</label><?php echo $row2['order_product_id']; ?><br>
                            <label for="date">วันที่สั่งทำ &nbsp;: &nbsp; </label> <?php echo  $date_order ; ?><br>
                            <label for="order_product_id">รหัสการขาย &nbsp;:&nbsp;</label><?php echo  $row2['order_product_id']; ?><br>
                            <label for="name">ชื่อ &nbsp;:&nbsp;</label><?php echo $row2['name']; ?> &nbsp;
                            <?php  echo $row2['lastname']; ?><br>
                            <label for="tel">เบอร์ &nbsp;:&nbsp;</label> <?php  echo $row2['tel']; ?><br>
                            <label for="tel">ที่อยู่ &nbsp;:&nbsp;</label> <?php  echo $row2['address']; ?><br>
                         
                            <label for="date">สถานะ &nbsp;:&nbsp;</label> <?php  echo $row2['status_pay']; ?><br><br>
                            <!-- <a href="../working/working_form.php" class="btn btn-info pull-right"><i class="fa fa-plus"></i> เพิ่ม</a> -->
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">IdSaleDetail</th>
                                        <th scope="col">รูปแบบสินค้า</th>
                                        <th scope="col">ประเภท</th>
                                        <!-- <th scope="col">ขนาด</th> -->
                                        <th scope="col">จำนวน</th>
                                        <th scope="col">ราคา/หน่วย</th>
                                        <th scope="col">ราคารวม</th>
                                        <!-- <th scope="col">ค่ามัดจำ</th> -->
                                        <th scope="col">รายละเอียด</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            $total = 0;
                                            $total1 =0;
                                            while($row=mysqli_fetch_array($query3,MYSQLI_ASSOC)) { 
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['order_details_id']; ?></th>
                                        <td><?php echo $row['product_name']; ?></td>
                                        <td><?php echo $row['genre_product_name']; ?></td>
                                        
                                        <td><?php echo $row['order_amount']; ?></td>
                                        <td><?php echo number_format($row['price'], 2); ?></td>
                                        <td><?php echo number_format($row['sum_price'] , 2); ?></td>
                                        <!-- <td><?php echo number_format(  $row['deposit'], 2); ?></td> -->

                                        <td>
                                            <!-- <a href="shop_show_cus_form_update.php?txtid=<?php echo $row['order_details_id'];?>"
                                                class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                                            <a href="../manufacture/manufacture_form.php?txtid=<?php echo $row['order_details_id'];?>"
                                                class="btn btn-warning btn-sm"><i class="fa fa-cogs"></i>   ผลิต</a> -->

                                            <?php if($row['status_sd']=="ยังไม่ผลิต"){ ?>
                                            <a href="../manufacture/manufacture_form2.php?txtid=<?php echo $row['order_details_id'];?>"
                                                class="btn btn-danger btn-sm"><i class=""></i>ยังไม่ผลิต</a>
                                            <?php }else { ?>
                                            <a class="btn btn-success btn-sm"><i class=""></i>ผลิตเสร็จแล้ว</a>
                                            <?php } ?>

                                            <!-- ผลิต<a href="" class="btn btn-danger btn-sm">ลบ</a> -->
                                        </td>
                                    </tr>
                                </tbody>
                                <?php
                                        $total = $total + ($row['price'] * $row['order_amount']); 
                                        // $total1 = $total1 + ($row['price']);
                                    }
                                    ?>
                                    <!-- <tr>
                                          <td colspan="4" aling="right">ราคารวมต่อหน่วย</td>
                                          <td align="left">฿<?php echo number_format($total1, 2); ?></td>
                                         <td></td>

                                         </tr> -->
                                <tr>
                                    <td colspan="5" aling="right">ราคารวมทั้งหมด</td>
                                    <td align="left">฿<?php echo number_format($total, 2); ?></td>
                                    <td></td>

                                </tr>
                               
                                <tr>
                                        <td colspan="5" aling="right">ราคาที่ต้องชำระ</td>
                                        <td align="left">฿<?php echo number_format($total, 2); ?></td>
                                    <td></td>
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