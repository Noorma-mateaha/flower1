<?php
  include("../libs/db.php");
  $name = $_POST['name'];
  $lastname = $_POST['lastname'];
  $address = $_POST['address'];
  $tel = $_POST['tel'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $level = 2 ;
  mysqli_set_charset($conn,"utf8");
  $sql = "INSERT INTO login(name, lastname , address, tel, username, password, level )
          VALUES ('$name', '$lastname', '$address', '$tel', '$username', '$password', '$level')";

  if ($conn->query($sql) === TRUE) {  $message = 'สมัครสมาชิกสำเร็จ';
                                       echo "<SCRIPT type='text/javascript'> //not showing me this
                                       alert('$message');
                                       window.location.replace(\"test-login.php\");
                                       </SCRIPT>";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
// ปิดการเชื่อมฐานข้อมูล ไม่ปิดก็ได้ แต่ปิดดีกว่า
 ?>
