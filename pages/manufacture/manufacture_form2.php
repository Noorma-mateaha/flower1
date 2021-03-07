<!DOCTYPE html>
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
    <!------------------------------------------------------------------------------------------------- -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!------------------------------------------------------------------------------------------------- -->
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
            <!-- Header Navbar: style can be found in header.less -->
            <?php  
                include('../bar/navbar.php');    
                include('../bar/sidebar.php');
            ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                </section>
                <!-- Main content -->
                <section class="content">
                    <i class="fa fa-arrow-circle-o-left" style="font-size:36px" onClick="history.go(-1);"></i>
                    <!-- Default box -->
                    <div class="box">
                        <span align="center">
                            <h3>ข้อมูลการผลิต / Productionการผลิตสินค้า </h3>
                        </span><br>
                        <?php 
                             error_reporting(error_reporting() & ~E_NOTICE);
                             $order_details_id = $_REQUEST['txtid']; 
                             $sql2 = "SELECT * FROM `order_details` 
                             INNER JOIN product ON  product.product_id =  order_details.product_id
                             WHERE  order_details.order_details_id = '$order_details_id'";
                            $query2 = $conn->query($sql2);
                            $row2=mysqli_fetch_assoc($query2); 
                            ?>
                        <div class="form-group">
                            <form  method="post" name="add_name" id="add_name">
                               <!-- &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<label> รูปแบบสินค้า &nbsp;:</label> </?php echo $row2['product_name'] ?> <br> -->
                               &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<label> รูปแบบสินค้า &nbsp;:</label>
                                <?php echo $row2['product_name'] ?> <br>
                                <!-- &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<label> สี &nbsp;:</label>
                                <?php echo $row2['color']; ?><br> -->

                                <!-- &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<label> ขนาด &nbsp;: &nbsp; </label>
                                <?php echo $row2['size']; ?><br> -->

                                &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<label> จำนวน &nbsp;: &nbsp; </label>
                                <?php echo $row2['order_amount']; ?><br><br>
                                &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                <labal for="date">วันที่สั่งซื้อ</label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="date" name="date"><br><br>

                                <?php                                       
                                        $order_details_id = 0;
                                        $sql = "SELECT * FROM `order_details` ORDER BY `order_details`.`order_details_id` ASC";
                                        $query = mysqli_query($conn,$sql);                               
                                        while ( $row= mysqli_fetch_array($query)){
                                            $order_details_id = $row['order_details_id'];
                                        }
                                        $order_details_id ;
                                ?>
                            
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                            
                                <label for="order_details_id">รหัสรายละเอียดสั่งทำ &nbsp;:</label> 
                                &nbsp;&nbsp;
                                <input type="text" name="order_details_id" placeholder="รหัสสั่งทำ"
                                    value="<?php echo $row2['order_details_id']?>&nbsp;&nbsp; <?php echo $row2['product_name']?> " /> <br>

                                <?php                                       
                                        $manufacture_id = 0;
                                        $sql = "SELECT * FROM manufacture ORDER BY manufacture_id DESC LIMIT 1";
                                        $query = mysqli_query($conn,$sql);                               
                                        while ( $row= mysqli_fetch_array($query)){
                                            $manufacture_id = $row['manufacture_id'];
                                        }
                                        $manufacture_id += 1;
                                ?>
                                <br>
                                &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<label for="manufacture_id">รหัสการผลิต &nbsp;:</label>
                                &nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="text" name="manufacture_id" placeholder="รหัสการผลิต"
                                    value="<?php echo $manufacture_id ;?>" />
                                <br><br>

                                &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<label for="employee_id">ชื่อพนักงาน</label>
                                <input type="text" name="employee_id"  placeholder="ชื่อพนักงาน"
                                    list='list3'>
                                <?php $sql = "SELECT * FROM employee"; $result = $conn->query($sql); ?>
                                <datalist id='list3'>
                                    <?php while($row = mysqli_fetch_assoc($result)) {?>
                                    <option
                                        value="<?php echo $row["employee_id"]?>&nbsp;&nbsp;&nbsp;-->&nbsp; <?php echo $row["employee_name"]?>&nbsp;<?php echo $row["employee_lastname"]?>">
                                    </option>
                                    <?php } ?>
                                </datalist>
                                <br><br>
                                <!-- ************************************************************************************************************* -->

                                <?php                                    
                                            $sql = "SELECT * FROM  material";
                                            $result = $conn->query($sql);
                                            $total=0;
                                           
                                         ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dynamic_field">
                                        <tr>
                                            <td><input type="text" name="material_id[]" placeholder="ชื่อวัตถุดิบ"
                                                    class="form-control name_list" list='list2' /></td>
                                            <td><input type="text" name="Import_amount[]" placeholder="จำนวน"
                                                    class="form-control name_list" /></td>
                                            <td><button type="button" name="add" id="add" class="btn btn-success">Add
                                                    More</button></td>
                                        </tr>
                                        <datalist id='list2'><?php while($row = mysqli_fetch_array($result)) {?>
                                            <option
                                                value="<?php echo $row["material_id"]?> &nbsp;&nbsp;&nbsp;>>&nbsp;<?php echo $row["material_name"]?>">
                                            </option><?php }?> </datalist>


                                    </table>

 
                                    <center><input type="submit" name="submit" id="submit" class="btn btn-info"
                                            value="Submit" /></center> <br>

                                </div>
                        </div>

                        <!-- ------------------------------------------------------------------------------------------------------------- -->
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
<!-- -------------------------------------------Dynaimc----------------------------------------------------------------- -->
<script>
$(document).ready(function() {
    var i = 1;
    $('#add').click(function() {
        i++;
        $('#dynamic_field').append('<tr id="row' + i +'"><td> <input type="text" name="material_id[]" list="list2" placeholder="ชื่อวัตถุดิบ" class="form-control name_list" /></td><td><input type="number" name="Import_amount[]" placeholder="จำนวน" class="form-control name_list" /></td><td><button type="button" name="remove" id="' +
            i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
    });

    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });
    $('#submit').click(function() {
        $.ajax({
            url: "manufacture_insert2.php",
            method: "POST",
            data: $('#add_name').serialize(),
            success: function(data) {
                alert(data);
                $('#add_name')[0].reset();
            }
        });
    });

});
</script>