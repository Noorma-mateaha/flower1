<?php
 include("../libs/db.php");

 $customer_name     = $_POST['customer_name'];
 $customer_surname  = $_POST['customer_surname'];
 $sex               = $_POST['sex'];
 $tel               = $_POST['tel'];
 $address           = $_POST['address'];
 $emali             = $_POST['emali'];
 $password           = $_POST['password'];

//  เข้ารหัส รหัสผ่าน
$salt ='tikde78ujuhlaoiksakeidke'; //สร้างสตริงขึ้นมาเพื่อเอาไปต่อกับรหัสผ่านเพิ่มความปลอดภัย
้$has_password = hash_hmac('sha256',$password ,$salt) //สร้างMethodขึ้นมา โดยมีพารามิเตอร์ 3 ตัว คือ sha256 เป็นอัลกอริทึมในการเข้ารหัส  $passwordรหัสที่เราป้อนผ่านฟอร์ม  $saltสตริงที่ต่อเข้ากับรหัสผ่านที่เราป้อนผ่านฟอร์ม

$sql = "INSERT INTO customer (customer_id, customer_name, customer_surname, sex, tel, address, email, password) 
		VALUES ('".$_POST["customer_id"]."',
                '".$_POST["customer_name"]."',
                '".$_POST["customer_surname"]."',
                '".$_POST["sex"]."',
                '".$_POST["tel"]."',
                '".$_POST["address"]."',
                '".$_POST["email"]."',
                '".$has_password."')";

$query = mysqli_query($conn,$sql);
if($query) {
    echo "Record add successfully";
    header( "location:login.php" );
}else{
    echo "เกิดข้อผิดพลาด". mysqli_error($conn);
}

mysqli_close($conn);

?>