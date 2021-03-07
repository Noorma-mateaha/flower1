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

            <?php 
                include("db.php");
                // $salary_id = $_REQUEST['txtid']; ///รับtxtid มาจากcustomer_showบรรทัดที่ 116
                // $sql = "SELECT * FROM salary where salary_id = '$salary_id' ";
                // $result = $conn->query($sql);
                // $row1 = mysqli_fetch_assoc($result);
             ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <center>
                        <h3>แก้ไขรายการสั่งซื้อวัตถุดิบ</h3>
                    </center>
                </section>

                <?php 
                    $order_material_id = $_REQUEST['txtid'];
                    $sql = "SELECT * FROM order_material WHERE order_material_id='$order_material_id' ";
                    $result = $conn->query($sql);
                    $row = mysqli_fetch_assoc($result); 
                ?>
                <!-- Main content -->
                <section class="content">
                    <i class="fa fa-arrow-circle-o-left" style="font-size:36px" onClick="history.go(-1);"></i>
                    <!-- Default box -->
                    <div class="box">
                        <div class="box-header with-border">
                            <form action="order_meterial_update.php?txtid=<?php echo $order_material_id; ?>" method="post"
                                novalidate="novalidate">
                                <div>
                                    <p>
                                        <label for="order_material_date">วันที่สั่งซื้อ</label>
                                        <input type="date" id="date" name="order_material_date" Readonly value="<?php echo $row['order_material_date']?>">
                                    </p>
                                </div>

                                <label for="supplier_id">ซัพพลายเออร์</label>
                                <input autocomplete="off" type="text" name="supplier_id" class="form-control" Readonly
                                    list='list1' required value="<?php echo $row["supplier_id"]?>">
                                <?php $sql2 = "SELECT * FROM supplier"; $result2 = $conn->query($sql2); ?>

                                <datalist id='list1'>
                                    <?php while($row2 = mysqli_fetch_assoc($result2)) {?>
                                    <option
                                        value="<?php echo $row2["supplier_id"]?>&nbsp;&nbsp;&nbsp;-->&nbsp;<?php echo $row2["supplier_name"]?>">
                                    </option>
                                    <?php } ?>
                                </datalist>

                                <div class="form-group">
                                    <label for="employee_id">ชื่อพนักงาน</label>
                                    <input type="text" name="employee_id" class="form-control" placeholder="ชื่อพนักงาน" Readonly
                                        list='list3' value="<?php echo $row["employee_id"]?>" />
                                    <?php $sql = "SELECT * FROM employee"; $result = $conn->query($sql); ?>
                                    <datalist id='list3'>
                                        <?php while($row = mysqli_fetch_assoc($result)) {?>
                                        <option
                                            value="<?php echo $row["employee_id"]?>&nbsp;&nbsp;&nbsp;-->&nbsp; <?php echo $row["employee_name"]?>">
                                        </option>
                                        <?php } ?>
                                    </datalist>

                                    <div class="form-group">
                                        <label for=	"status">สถานะ</label>
                                        <select type="text" name="status" class="form-control">
                                        <option><?php echo $row['status']?></option>
                                        <option class="bg-success"></option>
                                        <option >อนุมัติ</option>
                                        <option >ยังไม่อนุมัติ</option>
                                    </select><br>
                                    </div>

                                    <button type="submit" name="update" class="btn btn-primary">แก้ไขข้อมูล</button>
                                    <button type="submit" name="delete" class="btn btn-danger">ยกเลิก </button>
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

<script src="../../js/jquery-3.4.1.min.js"></script>

<!-- <script>
$(document).ready(function() {
    console.log("calculate");
    $('#amount_work').keyup(function(){
        var amount_work = $('#amount_work').val();
        var money = $('#money').val();
        // console.log(price);
        var  amount_money = Number(amount_work) * Number(money);
        console.log(amount_money);
        $('#amount_money').val(amount_money);
    });
    $('#money').keyup(function(){
        var amount_work = $('#amount_work').val();
        var money = $('#money').val();
        // console.log(price);
        var  amount_money = Number(amount_work) * Number(money);
        console.log(amount_money);
        $('#amount_money').val(amount_money);
    });
});
</script> -->