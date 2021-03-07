<?php 
session_start();
// 1 admin
// 2 user

$username = $_POST['username'];
$password = ($_POST['password']);

if($username == ''){
    echo "Check Username";
    // header("Location: login.php");
    // exit();
  }else if($password == ''){
    echo "Check Password";
  }else

  $sql="SELECT * FROM login 
                  WHERE username='".$username."'
                  AND password='".$password."' ";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) <= 0 ){
    echo "<meta http-equiv='refresh' content ='1;URL=login.php'>"; 
} else {
  while($cust = mysqli_fetch_array($result)) {
   

?>