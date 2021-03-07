<?php
include("db.php");

            $order_product_id          = $_REQUEST['txtid'];
            // $apointment_date  = $_REQUEST['apointment_date'];
            $o_status     = $_REQUEST['o_status'];
            
            $sql = "UPDATE order_product 
            SET  
                o_status='$o_status'
             WHERE order_product_id='$order_product_id' ";
            $query = mysqli_query($conn,$sql);


        if(mysqli_query($conn,$sql) )
          {
            // echo '<scirpt> alert ("บันทึกข้อมูลสำเร็จ");</scirpt>';
            header ("Location:order_product.php");
          }
          else
          {
            echo  "บันทึกข้อมูลไม่สำเร็จ" .$conn->error;
          }
          mysqli_close($conn);
      
?>