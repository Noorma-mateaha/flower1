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
            <a href="../../index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">สหายอลูมิเนียมกระจก</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">สหายอลูมิเนียมกระจก</span>
            </a>
            <!-- Logo -->
            <!-- Header Navbar: style can be found in header.less -->
            <?php 
                include('../bar/navbar.php');    
                include('../bar/sidebar.php');
            ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->

                <section class="content-header">
                    <h1>
                        สั่งทำสินค้า
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Default box -->

                    <div class="box">
                        <div class="box-header with-border">
                            <form action="customer/customer_insert.php" method="post">
                                <?php 
                                    include('../calender/calender.php');    
                                ?>
                                <div class="form-group">
                                    <label>ประเภทสินค้า</label>
                                    <select class="form-control select2" style="width: 100%;">
                                        <option selected="selected">-</option>
                                        <option>กระเชา</option>
                                        <option>กรอบรูป</option>
                                        <option>กระถาง</option>
                                        <option>เข็มกลัดติดเสื้อ</option>
                                        <option>ช่อดอกไม้</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="product_name">ชื่อสินค้า</label>
                                    <input type="text" name="product_name" class="form-control" id="product_name"
                                        placeholder="ชื่อสินค้า">
                                </div>
                                
                                <div class="form-group">
                                    <label for="amount">จำนวน</label>
                                    <input type="text" name="amount" class="form-control" id="amount"
                                        placeholder="จำนวน">
                                </div>
                                <!-- <div class="form-group">
                                    <label for="size">ขนาด</label>
                                    <input type="text" name="size" class="form-control" id="size"
                                        placeholder="ขนาด">
                                </div> -->
                                <div class="form-group">
                                    <label>รายละเอียด</label>
                                    <textarea class="form-control" rows="3" placeholder="รายละเอียดเพิ่มเติม"></textarea>
                                </div>
                                <!-- <div class="form-group">
                                    <label>ที่อยู่</label>
                                    <textarea class="form-control" rows="3" placeholder="ที่อยู่ ..."></textarea>
                                </div> -->

                                <button type="submit" class="btn btn-primary">บันทึก</button>
                                <button type="submit" class="btn btn-danger">ยกเลิก</button>
                            </form>
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