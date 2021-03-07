<?php
    include("../libs/db.php");

            $payment_id = $_REQUEST['txtid']; /////รับtxtid มาจาก form_update บรรทัดที่ 67
            //echo  "payment_id:".$payment_id ;          
            $sale_id       = $_REQUEST['order_product_id'];
            $amount_money  = $_REQUEST['amount_money'];
            $pay           = $_REQUEST['pay'];
            $stale         = $_REQUEST['stale'];
      
            $sql = "UPDATE  payment SET amount_money='$amount_money ', pay ='$pay ', stale='$stale' ";
            $query = mysqli_query($conn,$sql);

        //   if($conn->query($sql) === TRUE)
        if(mysqli_query($conn,$sql) )
          {
            // echo '<scirpt> alert ("บันทึกข้อมูลสำเร็จ");</scirpt>';
            header ("Location:payment_show.php");
          }
          else
          {
            echo  "บันทึกข้อมูลไม่สำเร็จ" .$conn->error;
          }
          mysqli_close($conn);
      
?>
