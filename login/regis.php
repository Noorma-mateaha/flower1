<?php
 include("../libs/db.php");

 $username  = $_POST['username'];
 $password  = $_POST['password'];
 $emali     = $_POST['emali'];

//  เข้ารหัส รหัสผ่าน
$salt ='tikde78ujuhlaoiksakeidke'; //สร้างสตริงขึ้นมาเพื่อเอาไปต่อกับรหัสผ่านเพิ่มความปลอดภัย
้$hash_password = hash_hmac('sha256',$password ,$salt) //สร้างMethodขึ้นมา โดยมีพารามิเตอร์ 3 ตัว คือ sha256 เป็นอัลกอริทึมในการเข้ารหัส  $passwordรหัสที่เราป้อนผ่านฟอร์ม  $saltสตริงที่ต่อเข้ากับรหัสผ่านที่เราป้อนผ่านฟอร์ม

$sql = "INSERT INTO register (username, password ,email ) 
		VALUES (
    '".$_POST["username"]."',
    '".$hash_password."',
    '".$_POST["email"]."')";

$query = mysqli_query($conn,$sql);
if($query) {
    echo "Record add successfully";
    header( "location:login.php" );
}else{
    echo "เกิดข้อผิดพลาด". mysqli_error($conn);
}

mysqli_close($conn);

?>