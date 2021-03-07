<?php 
  include("../libs/db.php"); //เชื่อม Data Base

  $sql = "INSERT INTO order_meterial (om_id, imployee_id,supplier_id,date) 
		VALUES ('".$_POST["om_id"]."',
            '".$_POST["imployee_id"]."',
            '".$_POST["supplier_id"]."',
            '".$_POST["date"]."'";
//ตัวแปรใน VALUES ชื่อต้องเหมือนใน name form

$query = mysqli_query($conn,$sql);

if($query) {
   // echo "Record add successfully";
  //  echo '<scipt> alert("บันทึกข้อมูลสำเร็จ"); </scipt>';
   header('location:order_meterial_show.php');
}

mysqli_close($conn);
  ?>
