<?php
include("db.php");
$payment_id           = $_REQUEST['txtid']; ////รับtxtid มาจาก form action ไฟล์ paymen_form_update ต้องอยู่บน

$sql = "SELECT  *  FROM payment 
INNER JOIN order_product ON order_product.order_product_id = payment.order_product_id
WHERE payment.payment_id = '$payment_id' ";

$result = $conn->query($sql);
// $row = mysqli_fetch_assoc($result); 

            // $payment_id           = $_REQUEST['txtid'];  
            $status_pay           = $_REQUEST['status_pay'];            
            $sql = "UPDATE payment SET   status_pay ='$status_pay' 
                    WHERE payment_id = '$payment_id' ";
            $query1 = mysqli_query($conn,$sql);

// ****************************** Update สถานะในตารางการขาย ********************************
            // $status_pay = $_REQUEST['status_pay'];
            $sql2 = " UPDATE       order_product
                      SET        	o_status = '$status_pay'
                      WHERE      order_product.order_product_id = '$payment_id' ";
            //  mysqli_query($conn,$sql2);

// $status_order_product = 'status_order_product';
$query2 =mysqli_query($conn, $sql2);


        if( $query1 && $query2)
          {
            // echo '<scirpt> alert ("บันทึกข้อมูลสำเร็จ");</scirpt>';
            header ("Location:ad_payment_show.php");
          }
          else
          {
            echo  "บันทึกข้อมูลไม่สำเร็จ" .$conn->error;
          }
          mysqli_close($conn);
      
?>