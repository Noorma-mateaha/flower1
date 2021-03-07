<?php 
  include("db.php"); //เชื่อม Data Base

  $sql = "INSERT INTO supplier (supplier_id, supplier_name, supplier_tel, supplier_facebook, supplier_line, supplier_address) 
		VALUES ('".$_POST["supplier_id"]."',
    '".$_POST["supplier_name"]."',
    '".$_POST["supplier_tel"]."',
    '".$_POST["supplier_facebook"]."',
    '".$_POST["supplier_line"]."',
    '".$_POST["supplier_address"]."')";
//ตัวแปรใน VALUES ชื่อต้องเหมือนใน name form

$query = mysqli_query($conn,$sql);

if($query) {
   // echo "Record add successfully";
  //  echo '<scipt> alert("บันทึกข้อมูลสำเร็จ"); </scipt>';
   header('location:supplier_show.php');
}

mysqli_close($conn);
  ?>
