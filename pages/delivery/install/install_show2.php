<!DOCTYPE html>
<html>
<?php  include("../libs/db.php");?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ร้านสหายอลูมิเนียมกระจก</title>
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
                <span class="logo-mini">สหายอลูมิเนียมกระจก</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">สหายอลูมิเนียมกระจก</span>
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
                    <center>
                        <h3>
                            รายการที่ต้องติดตั้ง
                        </h3>
                    </center>

                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Default box -->
                    <div class="box">
                        <div class="box-header with-border">
                            <!-- <a href="manufacture_form.php" class="btn btn-warning pull-right"> <i class="fa fa-cogs"></i> เพิ่มการผลิต</a>  -->

                            <?php 
                                    $sql = "SELECT * FROM install 
                                    INNER JOIN manufacture  ON manufacture.manufacture_id = install.manufacture_id 
                                    INNER JOIN sale_details ON sale_details.sale_details_id = manufacture.sale_details_id 
                                    INNER JOIN product      ON product.product_id = sale_details.product_id 
                                    INNER JOIN sale         ON sale.sale_id =install.sale_id 
                                    INNER JOIN login        ON login.user_id =sale.user_id";
                                    $query =mysqli_query($conn,$sql)
                              ?>
                            <!-- **************************************************************************************************************** -->

                            <table class="table table-striped">
                                <thead>

                                    <tr>
                                        <th scope="col">รหัสการติดตั้ง</th>
                                        <!-- <th scope="col">รหัสสั่งทำ</th> -->
                                        <th scope="col">วันที่ติดตั้ง</th>
                                        <th scope="col">ชื่อลูกค้า</th>
                                        <!-- <th scope="col">รูปแบบสินค้า</th> -->
                                        <th scope="col">สถานะ</th>
                                        <!-- <th scope="col">สถานะผลิต</th> -->
                                        <th scope="col">รายละเอียด</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if($sql)
                                    {
                                        while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                                        {
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['install_id']; ?></th>
                                        <td><?php echo $row['install_date']; ?></td>
                                        <td><?php echo $row['name']; ?>&nbsp; <?php echo $row['lastname']; ?></td>
                                        <!-- <td><?php echo $row['product_name']; ?></td> -->
                                        <td>
                                            <?php if($row['status_install']=="ยังไม่ติดตั้ง"){ ?>
                                            <a href="#" class="btn btn-danger btn-sm"><i class=""></i>ยังไม่ติดตั้ง</a>
                                            <?php }else { ?>
                                            <a class="btn btn-warning btn-sm"><i class=""></i>ติดตั้งแล้ว</a>
                                            <?php } ?>
                                            <button
                                                class="btn btn-warning btn-sm"><?php echo $row['status_m']; ?></button>
                                        </td>
                                        <td>
                                            <a href="shop_show_cus.php"
                                                class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                            <!-- รายการสินค้า -->
                                            <a href="install_form_update.php?txtid=<?php echo $row['install_id'];?>"
                                                class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                                            <!-- แก้ไข -->
                                            <!--<a href="manufacture_del.php?r=delete&id=1" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a> ลบ -->
                                        </td>
                                    </tr>

                                </tbody>
                                <?php } 
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