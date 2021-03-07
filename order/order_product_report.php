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
    // $order_product_id = $_REQUEST['order_product_id'];
    $search = isset($_GET['search']) ? $_GET['search']: '';
   

        $order_product_id =$_REQUEST['txtid'];
        $sql1 = "SELECT * FROM `order_product`
        INNER JOIN customer ON customer.customer_id = order_product.customer_id
        INNER JOIN product ON product.product_id = order_product.product_id
        INNER JOIN genre_product ON genre_product.genre_product_id =order_product.genre_product_id

        WHERE order_product.order_product_id = $order_product_id

        ";

        $query1 = $conn->query($sql1);
        $row1=mysqli_fetch_assoc($query1); 

 // **********************************************************
        $sql2 = "SELECT * FROM `order_details`
        INNER JOIN order_product ON order_product.order_product_id = order_details.order_product_id 
        INNER JOIN product ON product.product_id = order_details.product_id 
        INNER JOIN genre_product ON genre_product.genre_product_id =order_product.genre_product_id
        
        
        ";
        $query2 = mysqli_query($conn,$sql2); 
        $row=mysqli_fetch_assoc($query2);

	// $query = mysqli_query($conn,$sql);
?>
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <center>
                        <h3>รายละเอียดการสั่งทำสินค้า</h3>
                    </center>
                </section>
                <!-- Main content -->
                <section class="content">
                    <i class="fa fa-arrow-circle-o-left" style="font-size:36px" onClick="history.go(-1);"></i>
                    <a href="order_product_pdf.php?txtid=<?php echo $_GET['txtid'] ?>" class="btn btn-warning pull-right">
                        <i class="glyphicon glyphicon-print"></i> ปริ้น</a>
                    <!-- Default box -->
                    <div class="box">
                        <div class="box-header with-border">
                            <?php date_default_timezone_set('Asia/Bangkok'); 
                            $date_order = date("Y-m-d");
                            ?>

                            <label for="queue"> รหัสการสั่งทำสินค้า &nbsp;:&nbsp;&nbsp;</label><?php echo $row1['order_product_id']; ?><br>
                            <label for="date_order">วันที่สั่งทำ &nbsp;: &nbsp; </label> <?php echo  $date_order ; ?><br>
                            <label for="sale_id">รหัสลูกค้า &nbsp;:&nbsp;</label><?php echo  $row1['customer_id']; ?><br>
                            <label for="customer_name">ชื่อ &nbsp;:&nbsp;</label><?php echo $row1['customer_name']; ?> <?php echo $row1['customer_lastname']; ?><br>
                            <label for="tel">เบอร์ &nbsp;:&nbsp;</label> <?php  echo $row1['customer_tel']; ?><br>
                            <label for="tel">ที่อยู่ &nbsp;:&nbsp;</label> <?php  echo $row1['customer_address']; ?><br>
                            <label for="date">สถานะ &nbsp;:&nbsp;</label> <?php  echo $row1['o_status']; ?><br><br>
                           <br>
                           <br>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">IdSaleDetail</th>
                                        <th scope="col">ประเภทสินค้า</th>
                                        <th scope="col">รูปแบบสินค้า</th>
                                        <th scope="col">รายละเอียดแบบสินค้า</th>
                                        <th scope="col">รูปแบบ</th>
                                        <th scope="col">จำนวน</th>
                                        <th scope="col">ราคา/หน่วย</th>
                                        <th scope="col">ราคารวม</th>
                                        <th scope="col">ค่ามัดจำ</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            $total = 0;
                                            $deposit = 0;
                                            $a=0;
                                            while($row1=mysqli_fetch_array($query1,MYSQLI_ASSOC)) { 
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $row1['order_details_id']; ?></th>
                                        <td><?php echo $row1['genre_product_name']; ?></td>
                                        <td><?php echo $row1['product_name']; ?></td>
                                        <td><?php echo $row1['order_product_details']; ?></td>
                                        <td><?php echo $row1['image']; ?></td>
                                        <td><?php echo number_format($row['order_amount'], 2); ?></td>
                                        <td><?php echo number_format($row['price'], 2); ?></td>
                                        <td><?php echo number_format($row['sum_price'] , 2); ?></td>
                                        <td><?php echo number_format(  $row['deposit'], 2); ?></td>

                                        <td>
                                            <a href="shop_show_cus_form_update.php?txtid=<?php echo $row['sale_details_id'];?>"
                                                class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                                            <!-- <a href="../manufacture/manufacture_form.php?txtid=<?php echo $row['sale_details_id'];?>"
                                                class="btn btn-warning btn-sm"><i class="fa fa-cogs"></i>   ผลิต</a> -->

                                        </td>
                                    </tr>
                                </tbody>
                                <?php
                                        $total = $total + ($row['price'] * $row['amount']); 
                                        $deposit = $deposit + (0.3 * $row['price']);
                                        $a = $total  -  $deposit;
                                    }
                                    ?>
                                <tr>
                                    <td colspan="6" aling="right">ราคารวมทั้งหมด</td>
                                    <td align="left">฿<?php echo number_format($total, 2); ?></td>
                                    <td></td>

                                </tr>
                                <tr>
                                    <td colspan="7" aling="right">ราคาที่ต้องมัดจำ</td>
                                    <td align="left">฿<?php echo number_format($deposit, 2); ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                        <td colspan="6" aling="right">ราคาที่ต้องชำระ</td>
                                        <td align="left">฿<?php echo   $a; ?></td>
                                    </tr>
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