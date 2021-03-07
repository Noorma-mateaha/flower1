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

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <center>
                        <h3>แก้ไขรายการใบสั่งซื้อวัตถุดิบ</h3>
                    </center>
                </section>

                <?php 
                 include("db.php");
                 $order_material_id = $_REQUEST['txtid'];    
                 $sql = "SELECT  
                 order_details_material.odm_id,
                --  order_details_material.size,
                --  order_details_material.color,
                 order_details_material.amount,
                 order_details_material.price,
                 material.material_id,
                 material.material_name,
                 order_material.order_material_id
                 FROM
                 order_details_material
                 INNER JOIN material ON order_details_material.material_id = materrial.material_id
                 INNER JOIN order_material ON order_details_material.order_material_id = order_material.order_material_id
                 WHERE  order_material.order_material_id = '$order_material_id'"; 
                 $result = $conn->query($sql);
                 $row = mysqli_fetch_assoc($result);  
             ?>
                <!-- Main content -->
                <section class="content">
                    <i class="fa fa-arrow-circle-o-left" style="font-size:36px" onClick="history.go(-1);"></i>
                    <!-- Default box -->
                    <div class="box">
                        <div class="box-header with-border">
                            <form action="detail_update.php?txtid=<?php echo $om_id; ?>" method="post" novalidate="novalidate">
                                <div class="form-group">
                                    <label for="material_id">ชื่อวัตถุดิบ</label>
                                    <input type="text" name="material_id" class="form-control"
                                    list='list1' value="<?php  echo $row['material_id']?>">
                                </div>
                                <?php $sql = "SELECT * FROM material"; $result = $conn->query($sql); ?>
                                <datalist id='list1'><?php while($row = mysqli_fetch_array($result)) {?>
                                    <option
                                        value="<?php echo $row["material_id"]?>&nbsp;&nbsp;&nbsp;-->&nbsp;<?php echo $row["material_name"]?> ">
                                    </option><?php }?> </datalist>
<!-- 
                                <div class="form-group">
                                    <label for="color">สี</label>
                                    <input type="text" name="color" class="form-control"
                                        placeholder="สี" value="<?php  echo $row['color']?>">
                                </div> 
                                <div class="form-group">
                                    <label for="size">ขนาด</label>
                                    <input type="text" name="size" class="form-control"
                                        placeholder="ขนาด" value="<?php  echo $row['size']?>">
                                </div>  -->
                                <div class="form-group">
                                    <label for="Import_amount">จำนวน</label>
                                    <input type="text" name="Import_amount" class="form-control"
                                        placeholder="จำนวนเข้า" value="<?php  echo $row['amount']?>">
                                </div>
                                <div class="form-group">
                                    <label for="price"> ราคา</label>
                                    <input type="text" name="price" class="form-control"
                                        placeholder="ราคา" value="<?php  echo $row['price']?>">
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

