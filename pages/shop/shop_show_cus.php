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
    <link rel="stylesheet" href="shop_show_cus.css">
</head>
<?php  include("../bar/nav_cus.php");  ?>

<body>
    <?php 
        include("db.php"); 
        error_reporting(error_reporting() & ~E_NOTICE);
        $user_id = $_SESSION["user_id"];
        $sql1 = "SELECT * FROM login WHERE user_id = '$user_id' ";
        $query1 = mysqli_query($conn,$sql1);
        $result1 = $query1->fetch_assoc();

// **************************************************************************************************
        $sql2 = "SELECT * FROM product 
        ";
        $result2 = mysqli_query($conn, $sql2); 

        $sql3 = "SELECT * FROM order_product";
        $result = mysqli_query($conn, $sql3);

    ?>
    <br><br>
    <span align="center">
        <h2>ข้อมูลสั่งทำสินค้า</h2>
    </span><br>
    <div class="box-header with-border">
        <!-- Search form -->
        <?php  date_default_timezone_set('Asia/Bangkok');  $date_order = date("Y-m-d");?>
        <form name="product" action="shop_show_cus_insert.php?user_id=<?php echo $user_id ?>" method="POST" id="product"
            class="form-horizontal">
            
            <center>
                <label for="date">วันที่สั่งทำ : &nbsp; </label> <?php echo $date_order ?><br></center>
            
            <div class="table-reponsive">
                <!-- ----------------------------------------------------------------------------------------------------- -->
                
 <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
                <center>
                    <table class="content-table ">
                        <thead>
                            <tr>
                                <th scope="col">รหัสสินค้า</th>
                                <th scope="col">รูปแบบสินค้า</th>
                                <th scope="col">ประเภท</th>
                                <th scope="col">จำนวน</th>
                                <th scope="col">ราคา</th>
                                <th scope="col">ราคารวม</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                if (!empty($_SESSION["shop"])) { //ถ้า $_SESSION มีข้อมูล (ไม่ว่าง) 
                    $total = 0;
                   
                    foreach ($_SESSION['shop'] as $key => $value) { ?>
                            <?php
                                $total = $total + ($value['item_product_price'] * $value['item_quantity']); 
                                
                            }?>
                            
                            <tr>
                                <th scope="row"><?php echo $value['item_id']; ?></th>
                                <td><?php echo $value['item_product_name']; ?></td>
                                <td><?php echo $value['item_genre_product_name']; ?></td>
                                <td><?php echo $value['item_quantity']; ?></td>
                                <td><?php echo number_format($value['item_product_price'], 2); ?></td>
                                <td><?php echo number_format($value['item_product_price'] * $value['item_quantity'], 2); ?></td>

                            </tr>
                            
                            <tr>
                                <td colspan="5" aling="right">ราคารวมทั้งหมด</td>
                                <td align="left">฿<?php echo number_format($total, 2); ?></td>
                                <td></td>
                            </tr>
                           
                            </tr>
                            <?php } ?>



                            </tr>
                        </tbody>
                    </table>
                </center>
                <!-- ********************************************************************************************************************* -->
                <!-- <center><a href="../payment/payment_form_cus.php?txtid=<?php echo $row['order_product_id'];?>"> <button
                            class="btn btn-success" type="submit">ชำระเงิน</button></a></center> -->
                    <center><a href="detail_order_cus?txtid=<?php echo $row['order_product_id'];?>"> <button
                    class="btn btn-success" type="submit">ยืนยันการสั่งสินค้า</button></a></center>
                   
        </form>
    </div>
</body>

</html>