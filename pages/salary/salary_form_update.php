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
                $salary_id = $_REQUEST['txtid']; ///รับtxtid มาจากcustomer_showบรรทัดที่ 116
                $sql = "SELECT  salary.salary_id,
                                                salary.payment_date,
                                                salary.amount_work,
                                                salary.money,
                                                salary.amount_money,
                                                salary.status,
                                               login.user_id,
                                               login.name,
                                               login.lastname             
                                        FROM    salary
                                        INNER JOIN login ON  salary.user_id = login.user_id 
                                        WHERE salary_id = '$salary_id'  AND login.level = 'E' ";
                $result = $conn->query($sql);
                $row = mysqli_fetch_assoc($result);
             ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <center>
                        <h3>แก้ไขค่าตอบแทน</h3>
                    </center>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Default box -->
                    <!-- <div class="box">
                        <div class="box-header with-border"> -->
                    <form action="salary_update.php?txtid=<?php echo $salary_id; ?>" method="post"
                        novalidate="novalidate">

                        <div>
                            <p>
                                <label for="payment_date">วันที่จ่าย</label>

                                <input type="date" id="payment_date" name="payment_date"
                                    value="<?php echo $row['payment_date']?>">
                            </p>
                        </div>

                        <label for="employee_id">ชื่อ-สกุล</label>
                        <input autocomplete="off" type="text" id="inputIsValid " name="employee_id" class="form-control"
                            list='list1' required value="<?php echo $row["name"]?>  <?php echo $row["lastname"]?>" />

                        <?php $sql1 = "SELECT * FROM login "; $result1 = $conn->query($sql1); ?>

                        <datalist id='list1'>
                            <?php while($row1 = mysqli_fetch_assoc($result1)) {?>
                            <option value="<?php echo $row1["user_id"]?>">
                                <?php echo $row1["name"]?><?php echo $row1["lastname"]?>
                            </option>
                            <?php } ?>
                        </datalist>

                        <div class="form-group">
                            <label for="amount_work">จำนวนเข้างาน</label>
                            <input type="text" id="amount_work" name="amount_work" class="form-control"
                                placeholder="จำนวนเงิน" value="<?php echo $row["amount_work"]?>">
                        </div>

                        <div class="form-group">
                            <label for="money">ค่าจ้าง</label>
                            <input type="text" id="money" name="money" class="form-control" Readonly value="<?php echo $row["money"]?>">
                        </div>

                        <div class="form-group">
                            <label for="amount_money">จำนวนเงิน</label>
                            <input type="text" id="amount_money" name="amount_money" class="form-control"
                            value="<?php echo $row["amount_money"]?>">
                        </div>
                        <div class="form-group">
                            <label for="status">สถานะ</label>
                            <select type="text" name="status" class="form-control">
                                <option><?php echo $row['status']?></option>
                                <option class="bg-success"></option>
                                <option class="bg-success">จ่ายแล้ว</option>
                                <option class="bg-danger">ยังไม่จ่าย</option>
                            </select>
                        </div>

                        <button type="submit" name="update" class="btn btn-primary">แก้ไขข้อมูล</button>
                        <button type="submit" name="delete" class="btn btn-danger">ยกเลิก </button>
                    </form>
                    <!-- </div>
                        footer
                    </div> -->
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