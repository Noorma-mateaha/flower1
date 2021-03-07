<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>นารีประดิษฐ์</title>
    <?php 
  include("../libs/db.php");
  ?>
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
            <a href="../admin/admin.php" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">นารีประดิษฐ์</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">นารีประดิษฐ์</span>
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
                    <center>
                        <h3>ข้อมูลการชำระ</h3>
                    </center>
                </section>
                <!-- Main content -->
                <section class="content">
                    <!-- Default box -->
                    <div class="box">
                        <div class="box-header with-border">
                            <form action="ad_payment_insert.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="payment_date">วันที่ชำระ</label>
                                    <input type="date" id="	payment_date" name="payment_date" />
                                </div>
                                <div class="form-group">
                                    <label for="order_product_id">รหัสการสั่งซื้อ</label>
                                    <input type="text" id="order_product_id" name="order_product_id" value="" />
                                </div>
                                <div class="form-group">
                                    <label for="pay">จำนวนเงิน</label>
                                    <input type="text" name="pay" 
                                        placeholder="จำนวนเงิน" required="required">
                                </div>

                                <div class="form-group">
                                    <label for="pay_image">สลิปธนาคาร</label>
                                    <input type="file" name="pay_image" class="form-control-file">
                                </div>

                                <!-- <div class="form-group">
                                    <label for="stale">ค้างชำระ</label>
                                    <input type="text" name="stale" class="form-control" placeholder="Enter stale"  required="required">
                                </div> -->
                                <button type="submit" class="btn btn-primary">บันทึก</button>
                                <button type="submit" class="btn btn-danger">ยกเลิก </button>
                            </form>
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