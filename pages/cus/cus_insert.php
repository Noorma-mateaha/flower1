<?php 
  include("db.php"); //เชื่อม Data Base

  $sql = "INSERT INTO customer (customer_id, customer_name, customer_lastname, customer_sex, customer_tel, customer_address, customer_username, customer_password) 
		VALUES ('".$_POST["customer_id"]."',
    '".$_POST["customer_name"]."',
    '".$_POST["customer_lastname"]."',
    '".$_POST["customer_sex"]."',
    '".$_POST["customer_tel"]."',
    '".$_POST["customer_address"]."',
    '".$_POST["customer_username"]."',
    '".$_POST["customer_password"]."')";
//ตัวแปรใน VALUES ชื่อต้องเหมือนใน name form

$query = mysqli_query($conn,$sql);

if($query) {
   // echo "Record add successfully";
  //  echo '<scipt> alert("บันทึกข้อมูลสำเร็จ"); </scipt>';
   header('location:cus_show.php');
}

mysqli_close($conn);
  ?>
