<?php
include("db.php");

$material_id = $_REQUEST['txtid']; /////รับtxtid มาจาก form action ไฟล์ meterial_form_update 

//echo  "meterial_id:".$meterial_id ;

            $material_name      = $_REQUEST['material_name'];
            $Import_amount      = $_REQUEST['Import_amount'];

             
 $sql = "UPDATE  material SET material_name='$material_name ' , Import_amount='$Import_amount' 
 WHERE material_id='$material_id' ";
            $query = mysqli_query($conn,$sql);

        //   if($conn->query($sql) === TRUE)
        if(mysqli_query($conn,$sql) )
          {
            // echo '<scirpt> alert ("บันทึกข้อมูลสำเร็จ");</scirpt>';
            header ("Location:meterial_show.php");
          }
          else
          {
            echo  "บันทึกข้อมูลไม่สำเร็จ" .$conn->error;
          }
          mysqli_close($conn);
      
?>