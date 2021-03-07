<?php 
  include("db.php");
  $sql = "SELECT * FROM product";
  $result= mysqli_query($conn,$sql);
  ?>

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

<body>
    <br>
    <div class="container" style="width:700px">
        <h3 align="center"> ระบบตะกร้าสินค้า </h3>
        <br>
        <?php
        while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        ?>
        <div class="col-md-4">
            <form method="post" action="index.php?action=add&id=<?php echo $row['product_id'];?>">
                <div style="border:1px solid #333;background-color:white;border-radius:5px;padding:1px;margin:1px">
                    <img src="<?php echo $row['product_name'];?>" class="img-responsive" /><br>
                    <h4 class="text-info">สินค้า :<?php echo $row['product_name'];?> </h4>
                    
                    <h4 class="text-info">ขนาด :<?php echo $row['size'];?> </h4>
                    <h4 class="text-danger">ราคา :<?php echo number_format($row['price'],2);?> บาท</h4>
                    <input type="text" name="quantity" class="form-control" value="1" />
                    <input type="hidden" name="product_name" value="<?php echo $row['product_name'];?>" />
                    
                    <input type="hidden" name="size" value="<?php echo $row['size'];?>" />
                    <input type="hidden" name="price" value="<?php echo $row['price'];?>" />
                    <input type="submit" name="add_product" style="margin-top:5px;" class="btn btn-success"
                        value="เพิ่มลงตะกร้า">

                </div>
            </form>
        </div>

        <?php } ?>
    </div>
    <br><br><br>
    <div align="center">
        <div class="product_drag_area">วางสินค้าบริเวณนี้</div>
    </div>
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