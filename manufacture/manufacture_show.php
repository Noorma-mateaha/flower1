<!DOCTYPE html>
<html>
<?php  include("db.php");?>

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
    
    <div class="wrapper">

        <header class="main-header">
           
            <a href="../admin/admin.php" class="logo">
                
                <span class="logo-mini">นารีประดิษฐ์</span>
               
                <span class="logo-lg">นารีประดิษฐ์</span>
            </a>
          
            <?php 
                include('../bar/navbar.php');    
                include('../bar/sidebar.php');
            ?>

            
            <div class="content-wrapper">
                
                <section class="content-header">
                    <center>
                        <h3>
                            รายการผลิต / Production
                        </h3>
                    </center>

                </section>

                
                <section class="content">

                    <div class="box">
                        <div class="box-header with-border">
                            <?php 
                                    $sql = "SELECT * FROM manufacture 
                                    INNER JOIN order_details ON order_details.order_details_id = manufacture.order_details_id 
                                    INNER JOIN order_product ON order_product.order_product_id = order_details.order_product_id 
                                    INNER JOIN login ON login.user_id = order_product.user_id 
                                    INNER JOIN product ON order_details.product_id = product.product_id
                                    INNER JOIN genre_product ON genre_product.genre_product_id = product.genre_product_id
                                    INNER JOIN employee ON employee.employee_id = manufacture.employee_id
                                    ORDER BY `manufacture`.`manufacture_id` ASC";
                                    $query =mysqli_query($conn,$sql)
                              ?>
                            <!-- **************************************************************************************************************** -->

                            <table class="table table-striped">
                                <thead>

                                    <tr>
                                        <th scope="col">รหัสการผลิต</th>
                                        <!-- <th scope="col">รหัสสั่งทำ</th> -->
                                        <th scope="col">วันที่ผลิต</th>
                                        <th scope="col">ชื่อลูกค้า</th>
                                        <!-- <th scope="col">ชื่อพนักงาน</th> -->
                                        <th scope="col">รูปแบบสินค้า</th>
                                        <th scope="col">ประเภทสินค้า</th>
                                        <th scope="col">สถานะ</th>
                                        <th scope="col">ดำเนินการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if($query)
                                    {
                                        while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                                        {
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['manufacture_id']; ?></th>
                                        <!-- <th scope="row"><?php echo $row['order_details_id']; ?></th> -->
                                        <td><?php echo $row['date']; ?></td>
                                        <td><?php echo $row['name']; ?>&nbsp; <?php echo $row['lastname']; ?></td>
                                        <!-- <td><?php echo $row['employee_name']; ?>&nbsp; <?php echo $row['employee_lastname']; ?></td> -->
                                        <td><?php echo $row['product_name']; ?></td>
                                        <td><?php echo $row['genre_product_name']; ?></td>
                                        <td><?php if($row['status_m']=="ยังไม่ผลิต"){ ?>
                                            <a href="#" class="btn btn-danger btn-sm"><i class=""></i>ยังไม่ผลิต</a>
                                            <?php }else { ?>
                                            <a class="btn btn-warning btn-sm"><i class=""></i>ผลิตแล้ว</a>
                                            <?php } ?>
                                        </td>
                                        <td><a href="manufacture_details.php?txtid=<?php echo $row['manufacture_id'];?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>  <!-- รายการสินค้า --></td>
                                    </tr>

                                </tbody>
                                <?php } 
                                }
                                else
                                {
                                echo "No Recoer Found";
                                }
                                ?>
                            </table>
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