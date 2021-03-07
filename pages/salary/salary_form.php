<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>นารีประดิษฐ์</title>
    <?php 
  include("db.php");
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
    <!-- =================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                        <h3>เพิ่มค่าตอบแทน</h3>
                    </center>
                </section>
                <!-- Main content -->
                <section class="content">
                    <!-- Default box -->
                    <i class="fa fa-arrow-circle-o-left" style="font-size:36px" onClick="history.go(-1);"></i>
                    <div class="box">
                        <div class="box-header with-border">
                            <form action="salary_insert.php" method="post">
                                <div class="form-group ">
                                <label>วันที่จ่าย</label>
                                    <input type="date" id="payment_date" name="payment_date" class="form-control">
                                </div>
                                <label for="user_id">ชื่อพนักงาน</label>
                                <input autocomplete="off" type="text" id="user_id " name="user_id"
                                    class="form-control" list='list1' required>
                                <?php $sql = "SELECT * FROM login
                                WHERE login.level = 'E' "; $result = $conn->query($sql); ?>

                                <datalist id='list1'>
                                    <?php while($row = mysqli_fetch_assoc($result)) {?>
                                    <option value="<?php echo $row["user_id"]?> &nbsp;&nbsp;&nbsp; <?php echo $row["name"]?> &nbsp;&nbsp;<?php echo $row["lastname"]?>"> 
                                   
                                    </option>
                                    <?php } ?>
                                </datalist>

                                <div class="form-group">
                                    <label for="amount_work">จำนวนเข้างาน</label>
                                    <input type="text" id="amount_work" name="amount_work" class="form-control" placeholder="จำนวนเงิน">
                                </div>

                                <div class="form-group">
                                    <label for="money">ค่าจ้าง</label>
                                    <input type="text" id="money" name="money" class="form-control" placeholder="ค่าจ้าง">
                                </div>

                                <div class="form-group">
                                    <label for="amount_money">จำนวนเงิน</label>
                                    <input type="text" id="amount_money" name="amount_money" class="form-control" placeholder="จำนวนเงิน">
                                </div>
                                <!-- <div class="custom-select" style="width:500px;"> -->
                                <!-- <div class="form-group">
                                    <label for="status" id="status" name="status">สถานะ</label>
                                    <select type="text" d="status" name="status" class="form-control">
                                        <option>สถานะ</option>
                                        <option class="bg-success">จ่ายแล้ว</option>
                                        <option class="bg-danger">ยังไม่จ่าย</option>
                                    </select>
                                </div><br> -->

                                <!-- <div class="form-group">
                            <label for="period">งวดที่</label>
                            <input type="text" name="period" class="form-control" placeholder="งวด">
                        </div> -->
                                <button type="submit" class="btn btn-primary">บันทึก</button>
                                <button type="submit" class="btn btn-danger">ยกเลิก </button>
                            </form>
                        </div>
                    </div>

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

<script>
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
</script>