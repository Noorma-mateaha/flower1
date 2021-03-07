<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
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
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="../../css/product_add.css">
    <title>นารีประดิษฐ์</title>
</head>
<?php
include('../bar/nav_cus.php');
?>
<body>
    <br> <br> <br>
    <span align="center">
        <h2></h2>
    </span>
    <div class="table-reponsive">
        <form action="payment_cus_insert.php" method="post" enctype="multipart/form-data">
            <div class="container">
            <a href="detail_order_cus.php"
            class="btn btn-success "><i class="glyphicon glyphicon-tasks"></i> รายการสั่งทำ</a>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-5" style="background-color:#f4f4f4">
                        <h3 align="center" style="color:green">
                            <span class=""></span>
                            ชำระ</h3>
                        <h4 align="center" style="color:#FF00FF">
                            <span class=""></span>
                            ผ่านธนาคาร ไทยพาณิชย์ เท่านั้น <br>
                            เลขบัญชี : 704-2762979 <br>
                            ชื่อบัญชี : นารีประดิษฐ์ (วิสาหกิจชุมชนนารีประดิษฐ์)<br></h4>

                            <?php  
                                include("db.php");
                                $order_product_id = $_REQUEST["txtid"];
                                $sql = "SELECT * FROM order_product WHERE order_product.order_product_id='$order_product_id'";
                                $query = mysqli_query($conn,$sql);  
                                $row=mysqli_fetch_assoc($query);  
                            ?>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="order_product_id">รหัสการสั่งซื้อ</label>
                                <input type="text" id="order_product_id" name="order_product_id" value="<?php echo $row['order_product_id']; ?>" />
                            </div><br><br>
                                                         
                            <div class="col-sm-12">
                                <label for="payment_date">วันที่ชำระ</label>
                                <input type="date" id="date" name="payment_date" />
                            </div>
                        </div> <br>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="pay">จำนวนเงิน</label>
                                <input type="text" class="form-control" name="pay" value="" require=""
                                    placeholder="จำนวนเงิน" />
                            </div>
                        </div> <br><br><br>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="pay_image">สลิปธนาคาร</label>
                                <input type="file" name="pay_image" class="form-control-file">
                            </div>
                        </div><br><br><br>
                    </div>
                </div><br>
                <div class="col-sm-12" align="center">
                    <button type="submit" class="btn btn-info" id="btn"> ยืนยันการชำระ</button>
                </div>
            </div>
    </div>
    </form>
    </div>
</body>

</html>



<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>
$(document).ready(function() {
    $('.menu-toggle').click(function() {
        $('nav').toggleClass('active')
    })
})
</script>