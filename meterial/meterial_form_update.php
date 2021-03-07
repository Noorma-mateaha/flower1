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
                $material_id = $_REQUEST['txtid']; ///รับtxtid มาจากmeterial_showบรรทัดที่ 116
                $sql = "SELECT * FROM material where material_id = '$material_id' ";
                $result = $conn->query($sql);
                $row = mysqli_fetch_assoc($result);
             ?>
            <!-- Header Navbar: style can be found in header.less -->

            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                <center><h3>  แก้ไขข้อมูลวัตถุดิบ</h3></center>
                </section>
                <!-- Main content -->
                <section class="content">
                <i class="fa fa-arrow-circle-o-left" style="font-size:36px" onClick="history.go(-1);"></i>
                    <!-- Default box -->
                    <div class="box">
                        <!--  พื้นหลังสีขาวในส่วนของข้อมูล   -->
                        <div class="box-header with-border">
                            <!-- action ส่งผ่านฟอร์ม -->
                            <form action="meterial_update.php?txtid=<?php echo $material_id; ?>" method="post" novalidate="novalidate">
                            <div class="form-group">
                                    <label for="material_name">ชื่อวัตถุดิบ</label>
                                    <input type="text" name="material_name" class="form-control" Readonly
                                        placeholder="ชื่อวัตถุดิบ" value="<?php  echo $row['material_name']?>">
                                </div>
                              
                                <div class="form-group">
                                    <label for="Import_amount">จำนวน</label>
                                    <input type="text" name="Import_amount" class="form-control"
                                        placeholder="จำนวนเข้า" value="<?php  echo $row['Import_amount']?>">
                                </div>
                              
                                <button type="submit" name="update" class="btn btn-primary">แก้ไขข้อมูล</button>
                                <button type="submit" name="delete" class="btn btn-danger"><a href="meterial_show.php"></a> ยกเลิก </button>
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