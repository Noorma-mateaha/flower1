<?php 
  include("db.php"); //เชื่อม Data Base

  $sql = "INSERT INTO genre_product (genre_product_id,genre_product_name) 
		VALUES ('".$_POST["genre_product_id"]."','".$_POST["genre_product_name"]."')";
//ตัวแปรใน VALUES ชื่อต้องเหมือนใน name form

$query = mysqli_query($conn,$sql);

if($query) {
   // echo "Record add successfully";
   header('Location:genre_show.php');
}

mysqli_close($conn);
  ?>
