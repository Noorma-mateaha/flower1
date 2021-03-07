<?php 
// error_reporting( error_reporting() & ~E_NOTICE );
session_start();
include("db.php");


$user_id = $_REQUEST['user_id'];


// **************************************************************

    
$sql2= "INSERT INTO order_product (user_id)
        VALUES ('$user_id')";
$query = mysqli_query($conn,$sql2);


$sell_id= mysqli_insert_id($conn);
$date = date_default_timezone_set('Asia/Bangkok'); 
 $date_order = date("Y-m-d");
// $sql2 = "SELECT * FROM product WHERE product_id = '$id'";
foreach ($_SESSION['shop'] as $key => $value) 
{ 
        $racar = $value['item_quantity'] * $value['item_product_price'];
        $madjum = (0.3 * $racar);
  $sql3 = "INSERT INTO order_details (product_id,order_product_id,order_amount,price,sum_price,deposit,date_order) 
           VALUES  ('".$value['item_id']."',
                    '$sell_id',
                    '".$value['item_quantity']."',
                    '".$value['item_product_price']."',
                    '".($value['item_quantity'] * $value['item_product_price'])."',
                    '".(0.3 * $value['item_product_price'])."',
                    '$dat_order'


                    
                     )";

                $query3 = mysqli_query($conn,$sql3);

}


if($query) {
        // echo "Record add successfully";
       //  echo '<scipt> alert("บันทึกข้อมูลสำเร็จ"); </scipt>';
        header('location:../payment/detail_order_cus.php');
     }
     
     ?>