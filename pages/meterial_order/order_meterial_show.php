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
                    <!-- <i class="fa fa-arrow-circle-o-left" style="font-size:36px" onClick="history.go(-1);"></i>
                    <a href="pdf_order_meterial.php?txtid=<?php echo $_GET['txtid'] ?>" class="btn btn-warning pull-right">
                        <i class="glyphicon glyphicon-print"></i> ปริ้น</a> -->

                    <div class="box">
                        <!--  พื้นหลังสีขาวในส่วนของข้อมูล   -->
                        <div class="box-header with-border">
                            <!-- Default box -->

                            <div class="box-header with-border">
                                <span align="center">
                                    <h2>ใบสั่งซื้อ</h2>
                                </span>
                                <?php
                                    $order_material_id = $_REQUEST['txtid'];                   
                                    $sql1 = "SELECT    
                                                employee.employee_id,
                                                employee.employee_name,
                                                employee.employee_lastname,
                                                supplier.supplier_name,
                                                supplier.supplier_address,
                                                supplier.supplier_tel,
                                                order_material.order_material_id,
                                                order_material.status,
                                                order_material.order_material_date
                                    FROM
                                    order_material
                                    INNER JOIN employee ON order_material.employee_id =  employee.employee_id
                                    INNER JOIN supplier ON supplier.supplier_id = order_material.supplier_id
                                    WHERE order_material.order_material_id = '$order_material_id'";
                                    $query1 = $conn->query($sql1);                           
                                    $row1=mysqli_fetch_assoc($query1); 
                        
// *****************************************************************************************************************************
                         
                                    $sql2 = "SELECT  
                                                order_details_material.odm_id,
                                                order_details_material.amount,
                                                order_details_material.price,
                                                material.material_name,
                                                order_material.order_material_id
                                    FROM
                                    order_details_material
                                    INNER JOIN material      ON order_details_material.material_id = material.material_id
                                    INNER JOIN order_material ON order_details_material.order_material_id = order_material.order_material_id
                                    WHERE order_material.order_material_id = '$order_material_id'";
                                    $query2 = mysqli_query($conn,$sql2);   
                                    // $row2=mysqli_fetch_assoc($query2);   
                                ?>
                                <div class="container">
                                    <label for="order_material_id">รหัสสั่งซื้อ :&nbsp; </label><?php echo $row1['order_material_id']; ?> <br>
                                    <label for="order_material_date">วันที่สั่งซื้อ : &nbsp; </label><?php echo $row1['order_material_date']; ?> <br>
                                    <label for="supplier_name">ชื่อร้าน :&nbsp;</label><?php echo $row1['supplier_name']; ?><br>
                                    <label for="supplier_address">ที่อยู่ : &nbsp;</label> <?php echo $row1['supplier_address']; ?><br>
                                    <label for="supplier_tel">เบอร์ : &nbsp; </label><?php echo $row1['supplier_tel']; ?><br>
                                    <label for="employee_name">ชื่อพนักงาน :&nbsp;
                                    </label><?php echo $row1['employee_name']; ?>&nbsp;
                                    <?php echo $row1['employee_lastname']; ?><br>
                                    <label for="status">สถานะ : &nbsp; </label><?php echo $row1['status']; ?> <br><br>
                                </div>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">ลำดับ</th>
                                            <th scope="col">ชื่อวัตถุดิบ</th>
                                            <th scope="col">จำนวน</th>
                                            <th scope="col">ราคาต่อหน่วย</th>
                                            <th scope="col">ราคารวม</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $i = 1;
                                        $total_price =0;
                                        while($row=mysqli_fetch_array($query2,MYSQLI_ASSOC))
                                        {
                                 ?>
                                        <tr>
                                            <td><?php echo $i?></td>
                                            <td><?php echo $row['material_name']?></td>
                                            <!-- <td><?php echo $row['color']?></td>
                                            <td><?php echo $row['size']?></td> -->
                                            <td><?php echo $row['amount']?></td>
                                            <td><?php echo number_format ($row['price'])?></td>
                                            <td><?php echo number_format ($row['price'] * $row['amount'])?></td>
                     <!-- ------------------------------------------------------------------------------------------------------------------- -->
                                        </tr>

                                    </tbody>
                                    <?php
                                    $total_price = $total_price + ($row['amount'] * $row['price'] );
                                    $i++;
                                    } 
                                    ?>
                                    <tr>
                                        <td colspan="4" aling="right">ราคารวมทั้งหมด</td>
                                        <td align="left">฿<?php echo number_format($total_price, 2); ?></td>
                                    </tr>
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