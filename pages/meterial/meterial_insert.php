<?php 
  include("db.php"); //เชื่อม Data Base

  $sql = "INSERT INTO material (material_name,Import_amount) 
		VALUES ( '".$_POST["material_name"]."',
             '".$_POST["Import_amount"]."')";
//ตัวแปรใน VALUES ชื่อต้องเหมือนใน name form

$query = mysqli_query($conn,$sql);

if($query) {
   // echo "Record add successfully";
  //  echo '<scipt> alert("บันทึกข้อมูลสำเร็จ"); </scipt>';
   header('location:meterial_show.php');
}

mysqli_close($conn);
  ?>
