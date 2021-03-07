<?php 
  include("db.php"); //เชื่อม Data Base

  $sql = "INSERT INTO salary 
                    (salary_id,
                    user_id, 
                    payment_date, 
                    amount_work,
                    money,
                    amount_money
                    ) 
		VALUES ('".$_POST["salary_id"]."',
            '".$_POST["user_id"]."',
            '".$_POST["payment_date"]."',
            '".$_POST["amount_work"]."',
            '".$_POST["money"]."',
            '".$_POST["amount_money"]."')";
//ตัวแปรใน VALUES ชื่อต้องเหมือนใน name form

$query = mysqli_query($conn,$sql);

if($query) {
   // echo "Record add successfully";
   header('Location:salary_show.php');
}

mysqli_close($conn);
  ?>
