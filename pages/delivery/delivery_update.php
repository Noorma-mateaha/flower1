<?php
include("db.php");

$sql = "SELECT  *  FROM order_product ";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result); 

            $delivery_id             = $_REQUEST['txtid'];  /////รับtxtid มาจาก form action ไฟล์ delivery_form_update 
            $delivery_date           = $_REQUEST['delivery_date'];
            $status_delivery           = $_REQUEST['status_delivery'];
            
            $sql = "UPDATE delivery   SET   delivery_date='$delivery_date',status_delivery='$status_delivery'
                    WHERE delivery_id  = '$delivery_id' ";
            $query = mysqli_query($conn,$sql);

        if(mysqli_query($conn,$sql) )
          {
            // echo '<scirpt> alert ("บันทึกข้อมูลสำเร็จ");</scirpt>';
            header ("Location:delivery_show2.php");
          }
          else
          {
            echo  "บันทึกข้อมูลไม่สำเร็จ" .$conn->error;
          }
          mysqli_close($conn);
      
?>