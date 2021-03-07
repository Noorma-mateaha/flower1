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

    <?php 
        include("db.php"); 
        error_reporting(error_reporting() & ~E_NOTICE);
        $user_id = $_SESSION["user_id"];
        $sql1 = "SELECT * FROM login WHERE user_id = '$user_id' ";
        $query1 = mysqli_query($conn,$sql1);
        $result1 = $query1->fetch_assoc();

// **************************************************************************************************
      // $result = $query->fetch_assoc(); 
    $order_product_id = $_REQUEST['txtid']; 
    $sql2    = "SELECT order_product.order_product_id,
                        order_product.status,
                        order_product.apointment_date,
                        order_product.date_order,
                        login.user_id,
                        login.name,
                        login.lastname,
                        login.tel,
                        login.address
    FROM order_product
    INNER JOIN login ON login.user_id = order_product.user_id  
    WHERE  order_product.order_product_id = '$order_product_id' ";
    $query2 = $conn->query($sql2);
    $row2=mysqli_fetch_assoc($query2); 
// **********************************************************
     $sql3 = "SELECT order_details.order_details_id, 
                     order_details.order_amount, 
                     order_details.price, 
                     order_details.sum_price,
                     order_details.deposit, 
                     genre_product.genre_product_id, 
                     genre_product.genre_product_name, 
                     product.product_name,
                     order_product.order_product_id
      FROM order_details 
      INNER JOIN order_product ON order_details.order_product_id = order_product.order_product_id 
      INNER JOIN product ON order_details.product_id = product.product_id 
      INNER JOIN genre_product ON product.genre_product_id = genre_product.genre_product_id 
      WHERE order_product.order_product_id='$order_product_id'";
    $query3 = mysqli_query($conn,$sql3); 

    ?>
    <br><br>
    <span align="center">
        <h2>รายการสั่งทำสินค้า</h2>
    </span><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-circle-o-left" style="font-size:36px"
        onClick="history.go(-1);"></i>
    <div class="box-header with-border">

        <!-- ----------------------------------------------------------------------------------------------------- -->
        <form action="shop_show_cus.php" methop="post">
            <center>
                <table class="content-table ">
                    <thead>
                        <tr>
                            <th scope="col">รหัสสินค้า</th>
                            <th scope="col">รูปแบบสินค้า</th>
                            <th scope="col">ประเภท</th>
                            <!-- <th scope="col">ขนาด</th> -->
                            <th scope="col">จำนวน</th>
                            <th scope="col">ราคา/หน่วย</th>
                            <th scope="col">ราคารวม</th>
                           
                            <th></th>
                            <!-- <th scope="col">สถานะสินค้า</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          $total = 0;
                          $total1 = 0;
                          while($row3=mysqli_fetch_array($query3,MYSQLI_ASSOC)) { 
                     ?>
                        <tr>
                            <th scope="row"><?php echo $row3['order_details_id']; ?></th>
                            <td><?php echo $row3['product_name']; ?></td>
                            <td><?php echo $row3['genre_product_name']; ?></td>
                            <!-- <td><?php echo $row3['size']; ?></td> -->
                            <td><?php echo $row3['order_amount']; ?></td>
                            <td><?php echo number_format($row3['price'], 2); ?></td>
                            <td><?php echo number_format($row3['sum_price'] , 2); ?></td>
                           

                        </tr>
                    </tbody>
                    <?php  $total = $total + ($row3['price'] * $row3['order_amount']); 
                        //    $total1 = $total1 + ($row3['price']); 
                           
                
                           
                 } ?>
                   
                   
                   <!-- <tr>
                        <td colspan="4" aling="right">ราคารวมต่อหน่วย</td>
                        <td align="left">฿<-?php echo number_format($total1, 2); ?></td>
                        <td></td>

                    </tr> -->
                   
                    <tr>
                        <td colspan="5" aling="right">ราคารวมทั้งหมด</td>
                        <td align="left">฿<?php echo number_format($total, 2); ?></td>
                        <td></td>

                    </tr>
                    <?php   ?>
                    
                </table>
                </table>
            </center>
            <!-- ********************************************************************************************************************* -->
            <!-- <center><a href="detail_payment_form_cus?txtid=<?php echo $row['sale_id'];?>"> <button
                            class="btn btn-info" type="submit">ยืนยันสั่งทำ</button></a></center> -->
            <!-- <div class="form-group">
                <label for="exampleFormControlFile1">สลิป</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div> -->
            <!-- <label for="exampleFormControlFile1">ราคาทั้งหมด :
                <input type="text" name="price"> บาท <br><br>
                <label for="exampleFormControlFile1">ชำระแล้ว :
                    <input type="text" name="pay"> บาท<br><br>
                    <label for="exampleFormControlFile1">ค้างชำระ :
                        <input type="text" name="stale"> บาท<br><br> -->
        </form>
    </div>

</body>

</html>