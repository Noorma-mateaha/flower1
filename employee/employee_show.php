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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
                <center><h3>ข้อมูลพนักงาน</h3></center>
                </section>
                <!-- Main content -->
                <section class="content">
                    <!-- Default box -->
                    <div class="box">
                        <!--  พื้นหลังสีขาวในส่วนของข้อมูล   -->
                        <div class="box-header with-border">
                            <!-- <form action="employee_show.php" method="get" enctype="multipart/form-data" class="form-inline mr-auto">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search">
                                <button class="btn btn-outline-success btn-rounded btn-sm my-0" type="submit">Search</button>
                            </form> -->
                            <a href="employee_form.php" class="btn btn-info pull-right"><i class="fa fa-plus"></i>
                                เพิ่ม</a>
                            <?php
                            // $search = isset($_GET['search']) ? $_GET['search'] : '';
                            $sql = "SELECT * FROM login WHERE login.level = 'E'  ";
                            // LIKE '%$search%'
                            $query = mysqli_query($conn,$sql);
                            ?>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">ลำดับ</th>
                                        <th scope="col">ชื่อ</th>
                                        <th scope="col">นามสกุล</th>
                                        <th scope="col">เพศ</th>
                                        <th scope="col">เบอร์โทร</th>
                                        <th scope="col">ที่อยู่</th>
                                        <th scope="col">บัญชีผู้ใช้</th>
                                        
                                        <th scope="col">สถานะ</th>
                                        </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "SELECT * FROM employee";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                ?>   
                                            <tr>
                                                
                                                <td><?php echo $row['employee_id']; ?></td>
                                                <td><?php echo $row['employee_name']; ?></td>
                                                <td><?php echo $row['employee_lastname']; ?></td>
                                                <td><?php echo $row['employee_sex']; ?></td>
                                                <td><?php echo $row['employee_tel']; ?></td>
                                                <td><?php echo $row['employee_address']; ?></td>
                                                <td><?php echo $row['employee_username']; ?></td>
                                                <td><?php echo $row['employee_level']; ?></td>
                                                <td>
                                                <a href="employee_form_update.php?txtid=<?php echo $row['employee_id']; ?>"
                                                class="btn btn-success btn-sm">แก้ไข</a> 
                                                <a href="employee_del.php?txtid=<?php echo $row['employee_id']; ?> " onclick="return confirm('คุณจะลบข้อมูลนี้ใช่หรือไม่?')" class="btn btn-danger btn-sm"> <i class="fa fa-trash-o"></i>ลบ</a>

                                                </td>
                                            </tr>
                                </tbody>
                        <?php
                               
                            }
                        } else {
                            echo "No Recoer Found";
                        }
                        ?>



                            </table>
                        </div>
                        <!-- footer -->
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