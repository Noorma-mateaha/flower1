<?php
include("db.php");
//echo  "order_meterial_id:".$order_meterial_id ;
            $order_material_id            = $_REQUEST['txtid'];
            $order_material_date          = $_REQUEST['order_material_date'];
            $supplier_id                  = $_REQUEST['supplier_id'];
            $employee_id                  = $_REQUEST['employee_id'];
            $status                       = $_REQUEST['status'];
            
            $sql = "UPDATE  order_material 
                    SET  order_material_date='$order_material_date', 
                    supplier_id ='$supplier_id ', 
                    employee_id='$employee_id',
                    status='$status' 
                    WHERE order_material_id='$order_material_id' ";
            $query = mysqli_query($conn,$sql);

        //   if($conn->query($sql) === TRUE)
        if(mysqli_query($conn,$sql) )
          {
            // echo '<scirpt> alert ("บันทึกข้อมูลสำเร็จ");</scirpt>';
            header ("Location:table_order_meterial.php");
          }
          else
          {
            echo  "บันทึกข้อมูลไม่สำเร็จ" .$conn->error;
          }
          mysqli_close($conn);
      
?>