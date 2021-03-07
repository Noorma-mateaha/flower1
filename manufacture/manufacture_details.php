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
                    <a href="pdf.php?txtid=<?php echo $_GET['txtid'] ?>" class="btn btn-warning pull-right">
                        <i class="glyphicon glyphicon-print"></i> ปริ้น</a>

                    <a href="detail_form_update.php?txtid=<?php  echo $_GET['txtid'];?>"
                        class="btn btn-success  pull-right"><i class="fa fa-pencil"></i>  แก้ไข</a> -->

                    <div class="box">
                        <!--  พื้นหลังสีขาวในส่วนของข้อมูล   -->
                        <div class="box-header with-border">
                            <!-- Default box -->

                            <div class="box-header with-border">
                                <span align="center">
                                    <h2>รายละเอียดการใช้วัตถุดิบ</h2>
                                </span>
                                <?php 
                                    $manufacture_id = $_REQUEST['txtid']; 
                                    $sql1 = "SELECT * FROM manufacture 
                                    INNER JOIN order_details ON order_details.order_details_id = manufacture.order_details_id 
                                    INNER JOIN order_product ON order_product.order_product_id = order_details.order_product_id 
                                    INNER JOIN login ON login.user_id = order_product.user_id 
                                    INNER JOIN product ON order_details.product_id = product.product_id
                                    INNER JOIN employee ON employee.employee_id = manufacture.employee_id
                                    WHERE manufacture.manufacture_id = '$manufacture_id'";
                                   $query1 = $conn->query($sql1);                           
                                   $row1=mysqli_fetch_assoc($query1); 

                                                     
// **************************************************************************************************************
                                    $sql2 = "SELECT manufacture_details.amount, 
                                                    material.material_name 
                                    FROM manufacture_details 
                                    INNER JOIN manufacture ON manufacture.manufacture_id = manufacture_details.manufacture_id 
                                    INNER JOIN material ON manufacture_details .material_id = material.material_id 
                                    WHERE manufacture.manufacture_id = '$manufacture_id'";
                                    $query2 = mysqli_query($conn,$sql2); 
                                    // $row=mysqli_fetch_assoc($query2);   
                                ?>
                                <div class="container">
                                    <label >รหัสการผลิต&nbsp; :</label>&nbsp;&nbsp;&nbsp; &nbsp;
                                    <?php echo $row1['manufacture_id']; ?> <br>
                                    <label >ชื่อพนักงาน&nbsp; :</label>&nbsp;&nbsp;&nbsp; &nbsp;
                                    <?php echo $row1['employee_name']; ?> <br>
                                    <label >รหัสสั่งทำ  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :  </label>&nbsp;&nbsp; &nbsp;
                                    <?php echo $row1['order_details_id']; ?> <br>
                                    <label >วันที่ผลิต  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  :
                                    &nbsp;</label>&nbsp;&nbsp; &nbsp;<?php echo $row1['date']; ?><br> 
                                    <label>ชื่อลูกค้า  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  :
                                    &nbsp;</label>&nbsp;&nbsp; &nbsp;<?php echo $row1['name']; ?>&nbsp; <?php echo $row1['lastname']; ?><br>                               
                                    <label >รูปแบบสินค้า     : </label> 
                                    &nbsp;&nbsp; &nbsp;<?php echo $row1['product_name']; ?><br>
                                    <label >สถานะ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
                                    &nbsp;&nbsp; &nbsp;&nbsp; <?php echo $row1['status_m']; ?><br><br>
                                </div>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">ลำดับ</th>
                                            <th scope="col">ชื่อวัตถุดิบ</th>
                                            <th scope="col">จำนวน</th>
                                            <!-- <th scope="col">จัดการ</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php
                                 $i = 1;
                                 $total=0;
                                        while($row=mysqli_fetch_array($query2,MYSQLI_ASSOC))
                                        {
                                 ?>
                                        <tr>
                                            <td><?php echo $i?></td>
                                            <td><?php echo $row['material_name']?></td>
                                            <td><?php echo $row['amount']?></td>

    <!-- ------------------------------------------------------------------------------------------------------------------- -->
<!-- 
                                            <td><a href="detail_form_update.php?txtid=</?php echo $row['om_id'];?>"
                                                    class="btn btn-success btn-sm">แก้ไข</a>
                                                <a href="detail_del.php?txtid=</?php echo $row['product_id'];?> "
                                                    onclick="return confirm('คุณจะลบข้อมูลนี้ใช่หรือไม่?')"
                                                    class="btn btn-danger btn-sm">ลบ</a>
                                            </td> -->
                                        </tr>

                                    </tbody>
                                    <?php
                                           $total = $total + ($row['amount']);; 
                                    $i++;
                                    } 
                                    ?>
                                     <tr>
                                          <td colspan="2" aling="right">รวมจำนวน</td>
                                          <td align="left"><?php echo number_format($total); ?></td>
                                         <td></td>

                                         </tr>
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