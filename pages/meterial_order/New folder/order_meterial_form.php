<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ร้านสหายอลูมิเนียมกระจก</title>
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

        <!-- ***************************เพิ่มเอง******************************* -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">  
    <script rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap.min.js"></script>  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 
 
 <!-- ***************************เพิ่มเอง******************************* -->
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
                    <h1>
                        สั่งซื้อวัตถุดิบ
                    </h1>
                </section>
                <!-- Main content -->
                <section class="content">
                    <!-- Default box -->
                    <div class="box">
                        <div class="box-header with-border">
                            <form action="order_meterial_insert.php" method="post">
                                <a href="#" class="btn btn-info pull-right"><i class="fa fa-plus"></i> เพิ่ม</a><br><br>
                                <div class="row">
                                    <div class="col-md-3 col-xs-12">
                                        <div class="form-group">
                                            <div>
                                                <p>
                                                    <label for="date">วันที่สั่งซื้อ</label>

                                                    <input type="date" id="date" />
                                                </p>
                                            </div>
                                            <!-- <div class="form-group">
                                    <label for="employee_name">ชื่อพนักงาน</label>
                                    <input type="text" name="employee_name" class="form-control"
                                        placeholder="ชื่อพนักงาน">
                                </div> -->

                                            <label for="supplier_id">ชื่อร้าน</label>
                                            <input autocomplete="off" type="text" id="supplier_id" name="supplier_id"
                                                class="form-control" list='list1' required>
                                            <?php $sql = "SELECT * FROM supplier"; $result = $conn->query($sql); ?>
                                            <datalist id='list1'>
                                                <?php while($row = mysqli_fetch_assoc($result)) {?>
                                                <option value="<?php echo $row["supplier_id"]?>">
                                                    <?php echo $row["supplier_name"]?>
                                                </option>
                                                <?php } ?>
                                            </datalist>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-3 col-xs-12">
                                        <div class="form-group">
                                            <label for="password">รูปแบบ</label>
                                            <select class="form-control" name="sex" class="form-control" placeholder="#"
                                                required="required">
                                                <option></option>
                                                <option>ใส</option>
                                                <option>ขาว</option>
                                                <option>ดำ</option>
                                            </select>
                                        </div>
                                    </div>  -->
                                </div><br> 
                                <div class="row">
                                   <!-- แบ่งแถว -->
                                    <div class="col-md-3 col-xs-12">
                                        <!-- ส่วนที่ทำให้ form ของ ชื่อ กับ นามสกุล อยู่บรรทัดเดียวกัน -->
                                        <div class="form-group">
                                        <label for="meterial_name">ชื่อวัตถุดิบ</label>
                                            <input autocomplete="off" type="text" name="meterial_name" id="meterial_name"
                                            class="form-control" list='list2' required>
                                            <?php $sql = "SELECT * FROM meterrial"; $result = $conn->query($sql); ?>

                                            <datalist id='list2'>
                                                <?php while($row = mysqli_fetch_assoc($result)) {?>
                                                    <option value="<?php echo $row["meterial_id"]?>"> <?php echo $row["meterial_name"]?>
                                                    </option>
                                                <?php } ?>
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <div class="form-group">
                                        <label for="meterial_name">สี</label>
                                            <select class="form-control" name="color"  id="color" class="form-control"
                                                placeholder="สี" required="required">
                                                <option>สี</option>
                                                <option>ใส</option>
                                                <option>ขาว</option>
                                                <option>ดำ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <div class="form-group">
                                        <label for="meterial_name">ขนาด</label>
                                            <input type="text" name="size"  id="size" class="form-control" placeholder="ขนาด"
                                                required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <div class="form-group">
                                        <label for="amount">จำนวน</label>
                                            <input type="text" name="amount" id="amount" class="form-control" placeholder="จำนวน"
                                                required="required">
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-3 col-xs-12">
                                        <div class="form-group">
                                        <button type="submit" name="add" id="add" class="btn btn-primary" name="save">Add More</button>
                                        </div>
                                    </div> -->
                                </div>

                                <div class="row">
                                    <button type="submit" class="btn btn-primary" name="save">สั่งซื้อ</button>
                                    <button type="submit" class="btn btn-danger">ยกเลิก </button>

                                </div>
                            </form>




                        </div>
                        footer
                    </div>
                    <!-- /.box

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
<!------------------------------ พิมพ์เอง ---------------------------------->
<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
<script>
$(document).ready(function() {
    $('.sidebar-menu').tree()
})
</script>