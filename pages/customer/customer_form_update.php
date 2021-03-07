<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
            <?php 
        include('../bar/navbar.php');    
        include('../bar/sidebar.php');
        ?>
            <?php 
                include("db.php");
                $customer_id = $_REQUEST['txtid']; ///รับtxtid มาจากcustomer_showบรรทัดที่ 116
                $sql = "SELECT * FROM customer where customer_id = '$customer_id' ";
                $result = $conn->query($sql);
                $row = mysqli_fetch_assoc($result);
             ?>
            <!-- Header Navbar: style can be found in header.less -->

            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                <center><h3>แก้ไขข้อมูลลูกค้า </h3></center>
                </section>
                <!-- Main content -->
                <section class="content">
                <i class="fa fa-arrow-circle-o-left" style="font-size:36px" onClick="history.go(-1);"></i>
                    <!-- Default box -->
                    <div class="box">
                        <!--  พื้นหลังสีขาวในส่วนของข้อมูล   -->
                        <div class="box-header with-border">
                            <!-- action ส่งผ่านฟอร์ม -->
                            <form action="customer_update.php?txtid=<?php echo $customer_id; ?>" method="post" novalidate="novalidate">
                                <div class="form-group">
                                    <label for="name">ชื่อ</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Enter firstname" required="required"
                                        value="<?php  echo $row['name']?>">
                                </div>
                                <div class="form-group">
                                    <label for="lastname">นามสกุล</label>
                                    <input type="text" name="lastname" class="form-control"
                                        placeholder="Enter lastname" required="required"
                                        value="<?php  echo $row['lastname']?>">
                                </div>

                                <div class="form-group">
                                    <label for="sex">เพศ</label>
                                    <select class="form-control" name="sex" value="<?php  echo $row['sex']?>"
                                        required="required">
                                        <option>-</option>
                                        <option>ชาย</option>
                                        <option>หญิง</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tel">เบอร์</label>
                                    <input type="text" name="tel" class="form-control" placeholder="Enter tel"
                                        required="required" value="<?php  echo $row['tel']?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">ที่อยู่</label>
                                    <input type="text" name="address" class="form-control" placeholder="Enter address"
                                        required="required" value="<?php  echo $row['address']?>">
                                </div>
                                <div class="form-group">
                                    <label for="username">ชื่อผู้ใช้</label>
                                    <input type="username" name="username" class="form-control" placeholder="Enter username"
                                        required="required" value="<?php  echo $row['username']?>">
                                </div>
                                <div class="form-group">
                                    <label for="password">รหัสผ่าน</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password"
                                        required="required" value="<?php  echo $row['password']?>">

                                </div>
                                <button type="submit" name="update" class="btn btn-primary">แก้ไขข้อมูล</button>
                                <button type="submit" name="delete" class="btn btn-danger"><a href="customer_show.php"></a> ยกเลิก </button>
                            </form>
                            </tbody>
                            </table>
                        </div>
                        <!-- footer -->
                    </div>
                    <!-- /.box -->
                </section>
                </form>
            </div>
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