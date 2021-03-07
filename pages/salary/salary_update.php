<?php
include("db.php");

 /////รับtxtid มาจาก salary_form_update 

//echo  "salary_id:".$salary_id ;

            $salary_id    = $_REQUEST['txtid'];
            $payment_date = $_REQUEST['payment_date'];
            $user_id      = $_REQUEST['user_id'];
            $amount_work  = $_REQUEST['amount_work'];
            $money        = $_REQUEST['money'];
            $amount_money = $_REQUEST['amount_money'];
            $status       = $_REQUEST['status'];
            
    
            $sql = "UPDATE salary SET 
                                      status='$status'
            WHERE salary_id='$salary_id' ";
            $query = mysqli_query($conn,$sql);

        //   if($conn->query($sql) === TRUE)
        if(mysqli_query($conn,$sql) )
          {
            //echo '<scirpt> alert ("บันทึกข้อมูลสำเร็จ");</scirpt>';
            header ("Location:salary_show.php");
          }
          else
          {
            echo  "บันทึกข้อมูลไม่สำเร็จ" .$conn->error;
          }
          mysqli_close($conn);
      
?>