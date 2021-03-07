<?php
include("../libs/db.php");



            $manufacture_id  = $_REQUEST['txtid'];
            $meterial_id    = $_REQUEST['meterial_id'];
            $amount         = $_REQUEST['amount'];
            $size           = $_REQUEST['size'];
            
            
    
            $sql = "UPDATE manufacture SET  manufacture_id='$manufacture_id ',
                                            meterial_id='$meterial_id ', 
                                            amount='$amount ', 
                                            size='$size'                                     
            WHERE manufacture_id='$manufacture_id' ";
            $query = mysqli_query($conn,$sql);

        //   if($conn->query($sql) === TRUE)
        if(mysqli_query($conn,$sql) )
          {
            //echo '<scirpt> alert ("บันทึกข้อมูลสำเร็จ");</scirpt>';
            header ("Location:manufacture_show.php");
          }
          else
          {
            echo  "บันทึกข้อมูลไม่สำเร็จ" .$conn->error;
          }
          mysqli_close($conn);
      
?>