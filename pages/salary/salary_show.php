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
                    <center>
                        <h3>ค่าตอบแทน</h3>
                    </center>
                </section>
                <!-- Main content -->
                <section class="content">
                    <!-- Default box -->
                    <div class="box">
                        <!--  พื้นหลังสีขาวในส่วนของข้อมูล   -->
                        <div class="box-header with-border">
                            <!--  พื้นหลังสีขาวในส่วนของข้อมูล   -->
                            <a href="salary_form.php" class="btn btn-warning pull-right"><i class="fa fa-plus"></i>
                                เพิ่ม</a>

                            <?php                               
                                $sql = "SELECT  salary.salary_id,
                                                salary.payment_date,
                                                salary.amount_work,
                                                salary.money,
                                                salary.amount_money,
                                                salary.status,
                                               login.name,
                                               login.lastname             
                                        FROM    salary
                                        INNER JOIN login ON  salary.user_id = login.user_id 
                                        WHERE login.level = 'E' ";
                                $query = mysqli_query($conn,$sql);
                            ?>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">ลำดับ</th>
                                        <th scope="col">วันที่จ่าย</th>
                                        <th scope="col">ชื่อ-สกุล </th>
                                        <th scope="col">จำนวนเข้างาน</th>
                                        <th scope="col">ค่าจ้าง</th>
                                        <th scope="col">จำนวนเงิน</th>
                                        <th scope="col">สถานะ</th>
                                        <th scope="col">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i =1;
                                    if($sql)
                                    {
                                        while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                                        {
                                    ?>
                                    <tr>
                                        <th><?php echo $i; ?></th>
                                        <th><?php echo $row['payment_date']; ?></th>
                                        <th><?php echo $row['name'];?> <?php echo $row['lastname']; ?>
                                        </th>
                                        <td><?php echo $row['amount_work']; ?></td>
                                        <td><?php echo $row['money']; ?></td>
                                        <td><?php echo $row['amount_money']; ?></td>
                                        <td><?php echo $row['status']; ?></td>
                                        <td>
                                           
                                            <!-- <a href="salary_details.php?txtid=<?php echo $row['salary_id'];?>"
                                                class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a> -->
                                            <!-- รายการสินค้า -->
                                            <a href="salary_form_update.php?txtid=<?php echo $row['salary_id'];?>"
                                                class="btn btn-success btn-sm">แก้ไข</a>
                                            <a href="salary_del.php?txtid=<?php echo $row['salary_id'];?>"
                                                onclick="return confirm('คุณจะลบข้อมูลนี้ใช่หรือไม่?')"
                                                class="btn btn-danger btn-sm">ลบ</a>
                                        </td>
                                    </tr>
                                    <?php                                                                       
                                        $i ++; }
                                   
                                    }

                                    else
                                {
                                echo "No Recoer Found";
                                }
                                     ?>
                                 
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