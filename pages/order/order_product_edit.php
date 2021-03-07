
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
                $order_product_id = $_REQUEST['txtid']; ///รับtxtid มาจากproduct_showบรรทัดที่ 116
                $sql = "SELECT * FROM order_product where order_product_id = '$order_product_id' ";
                $result = $conn->query($sql);
                $row = mysqli_fetch_assoc($result);
             ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <center>
                        <h3>แก้ไขข้อมูลการสั่งทำสินค้า</h3>
                    </center>
                </section>
                
                <!-- Main content -->
                <section class="content">
                    <i class="fa fa-arrow-circle-o-left" style="font-size:36px" onClick="history.go(-1);"></i>
                    <!-- Default box -->
                    <div class="box">
                        <div class="box-header with-border">
                            <form action="order_product_saveedit.php?txtid=<?php echo $order_product_id; ?> " method="post" enctype="multipart/form-data">
                                <div class="form-group">

                                <label for="order_product_id">รหัสการสั่งทำสินค้า</label>
                                    <input type="text" name="txtid" class="form-control" id="product_name"
                                        placeholder="Enter  product" value="<?php echo $row['order_product_id']?>"><br>

                                <div class="form-group">
                                <label for="date_order" class="lb">วันที่สั่ง</label>
                                    <input type="date" name="date_order" class="form-control" id="date_order"
                                        value="<?php echo $row['date_order'];?>">
                                </div>
                        </div>

                                <div class="form-group">
                                <label for="order_product_details" class="lb">รายละเอียดการสั่งสินค้า</label>
                                    <input type="text" name="order_product_details" class="form-control" id="order_product_details"
                                        value="<?php echo $row['order_product_details'];?>">
                                </div>

                                <div class="form-group">
                                <label for="customer_id" class="lb">รหัสลูกค้า</label>
                                    <select class="form-control" name="customer_id">
                                <?php 
                                    $sql = "SELECT * FROM customer"; 
                                    $result = $conn->query($sql);
                                        foreach($result as $key=>$row) {
                                    $selected = "";
                                        if( $data["customer_id"]==$row["customer_id"] ) $selected = "selected";
                                        echo '
                                            <option value="'.$row["customer_id"].'" '.$selected.'>'.$row["customer_id"].' '.$row["customer_name"].'</option>
                                        ';
                                        }
                                ?>
                                            </select>
                                </div>

                                
                                <label for="product_id" class="lb">รหัสแบบสินค้า</label>
                                <select class="form-control" name="product_id">
                                    <?php 
                                        $sql = "SELECT * FROM product"; 
                                        $result = $conn->query($sql);
                                            foreach($result as $key=>$row) {
                                                $selected = "";
                                                if( $data["product_id"]==$row["product_id"] ) $selected = "selected";
                                                echo '
                                                    <option value="'.$row["product_id"].'" '.$selected.'>'.$row["product_id"].' '.$row["product_name"].'</option>
                                                ';
                                            } 
                                        ?>
                                        </select> <br>
                                
           
                                
                                <label for="genre_product_id" class="lb">รหัสประเภทสินค้า</label>
                                <select class="form-control" name="genre_product_id">
                                    <?php 
                                        $sql = "SELECT * FROM genre_product"; 
                                        $result = $conn->query($sql);
                                            foreach($result as $key=>$row) {
                                                $selected = "";
                                                if( $data["genre_product_id"]==$row["genre_product_id"] ) $selected = "selected";
                                                echo '
                                                    <option value="'.$row["genre_product_id"].'" '.$selected.'>'.$row["genre_product_id"].' '.$row["genre_product_name"].'</option>
                                                ';
                                            }
                                    ?>
                                </select><br>
                                <div class="form-group">
                                <label for="status">สถานะ</label>
                                <select type="text" name="o_status" class="form-control">
                                    
                                    <option class="bg-success"></option>
                                    <option class="bg-danger">กำลังตรวจสอบ</option>
                                    <option class="bg-danger">ชำระแล้ว</option>
                                    <option class="bg-danger">มัดจำแล้ว</option>
                                </select>
                                </div><br>
                    
                                <button type="submit" class="btn btn-primary" nama="save">แก้ไขข้อมูล</button>
                                <button type="submit" class="btn btn-danger"  onClick="history.go(-1);">ยกเลิก</button>
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
