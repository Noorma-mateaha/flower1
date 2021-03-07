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
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
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
      <br> <br>  <br>   
      <h3 align="center" style="color:black"> <span class=""></span> รายการสั่งทำ</h3>
<?php 
            include("db.php"); 
            $user_id = $_SESSION["user_id"];
           
            $sql = "SELECT      order_product.order_product_id,
                                order_product.date_order,
                                order_product.o_status,
                                order_product.user_id  
                                FROM order_product 
                                INNER JOIN login ON order_product.user_id = login.user_id 
                                WHERE  login.user_id = '$user_id' ";
              $query = mysqli_query($conn,$sql);

            $sql1 = "SELECT * FROM payment ";
            $query1 = mysqli_query($conn,$sql1);
            $row1=mysqli_fetch_array($query1);  

 ?>
<!-- ************************************************************************* -->
    <span align="center">
        <h2></h2>
    </span>
    <?php  date_default_timezone_set('Asia/Bangkok'); 
        $date_sale = date("Y-m-d");?>
      
    <div class="table-reponsive">
       
        <table class="content-table ">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <thead>
                <tr>
                    <th>วันที่สั่งทำ</th>
                    <th>รหัสการขาย</th>
                    <th>สถานะ</th>
                    <th>ดำเนินการ</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    $total = 0;
                    if($query)
                    {
                    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)) { 
            ?>
                 <tr>
                        <th><?php echo $row['date_order'];?></th>
                        <td><?php echo $row['order_product_id']; ?></td>
                        <td><?php echo $row['o_status']; ?></td>
                        
                    <td>
                        <a href="detail_item_payment.php?txtid=<?php echo $row['order_product_id'];?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> รายการสินค้า</a> 
                        <a href="payment_form_cus.php?txtid=<?php echo $row['order_product_id'];?>" class="btn btn-success btn-sm"> 
                        <i class="glyphicon glyphicon-qrcode"></i> ชำระ</a>
                        <a href="detail_item_del.php?txtid=<?php echo $row['order_product_id'];?>" onclick="return confirm('คุณจะลบข้อมูลนี้ใช่หรือไม่?')"
                                                class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> ลบ</a>
                    </td>
                </tr>
        </tbody>
        <?php
        }
    }
    else
    {
    echo "No Recoer Found";
    }
        ?>
        </table> <br>
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