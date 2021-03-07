<?php
include("../libs/db.php");
session_start();
$username = $_POST["username"];//ประกาศตัวแปรเพื่อที่จะรับข้อมูลมาเก็บไว้
$password = md5($_POST["password"]);//เขียนโค้ดดึงค่าจากlogin
// echo $username;
// echo $password;

$sql = "SELECT * FROM login WHERE username = '".$username."'
                           and   password = '".$password."'";
$objQuery = mysqli_query($conn,$sql);
$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
if($objResult)
{
  if($objResult["level"] == "1"){
    $_SESSION["user_id"] = $objResult["user_id"];
    $_SESSION["name"] = $objResult["name"];
    $_SESSION["username"] = $objResult["username"];
    $_SESSION["level"] = $objResult["level"];
    // header("location:index.php");

    $message = 'เข้าสู่ระบบสำเร็จ';
              echo "<SCRIPT type='text/javascript'> //not showing me this
              alert('$message');
              window.location.replace(\"index.php\");
              </SCRIPT>";
  }
   else if($objResult["level"] == "2")
  {
    $_SESSION["user_id"] = $objResult["user_id"];
    $_SESSION["name"] = $objResult["name"];
    $_SESSION["username"] = $objResult["username"];
    $_SESSION["level"] = $objResult["level"];
  // header("login.php"); // ตอนนี้ยังไม่มีหน้าร้าน สำหรับลูกค้า
  $message = 'เข้าสู่ระบบสำเร็จ';
            echo "<SCRIPT type='text/javascript'> //not showing me this
            alert('$message');
            window.location.replace(\"./shop/product.php\");
            </SCRIPT>";
  }
  else if($objResult["level"] == "0")
 {
   $_SESSION["name"] = $objResult["name"];
   $_SESSION["lastname"] = $objResult["lastname"];
   $_SESSION["username"] = $objResult["username"];
   $_SESSION["level"] = $objResult["level"];
 // header("login.php"); // ตอนนี้ยังไม่มีหน้าร้าน สำหรับลูกค้า
 $message = 'เข้าสู่ระบบสำเร็จ';
           echo "<SCRIPT type='text/javascript'> //not showing me this
           alert('$message');
           window.location.replace(\"index.php\");
           </SCRIPT>";
 }
}
else
{         $message = 'ชื่อผู้ใช้ และ รหัสผ่านไม่ถูกต้อง';
          echo "<SCRIPT type='text/javascript'> //not showing me this
          alert('$message');
          window.location.replace(\"test-login.php\");
          </SCRIPT>";
}
mysqli_close($conn);
?>
