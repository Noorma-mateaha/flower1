<?php
include("db.php");

$supplier_id = $_REQUEST['txtid']; /////รับtxtid มาจาก supplier_form_update บรรทัดที่ 67

//echo  "customer_id:".$customer_id ;

            $supplier_name    = $_REQUEST['supplier_name'];
            $tel              = $_REQUEST['tel'];
            $facebook         = $_REQUEST['facebook'];
            $line             = $_REQUEST['line'];
            $address          = $_REQUEST['address'];
            
            $sql = "UPDATE  supplier SET 
                                      supplier_name='$supplier_name ',
                                      supplier_tel='$tel',
                                      supplier_facebook='$facebook',
                                      supplier_line='$line',
                                      supplier_address='$address' 

            WHERE supplier_id='$supplier_id' ";
            $query = mysqli_query($conn,$sql);

        //   if($conn->query($sql) === TRUE)
        if(mysqli_query($conn,$sql) )
          {
            // echo '<scirpt> alert ("บันทึกข้อมูลสำเร็จ");</scirpt>';
            header ("Location:supplier_show.php");
          }
          else
          {
            echo  "บันทึกข้อมูลไม่สำเร็จ" .$conn->error;
          }
          mysqli_close($conn);
      
?>