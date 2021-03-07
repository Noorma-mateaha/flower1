<?php
 include("../libs/db.php");

//  $username = $email = $password = $pwd '';
 $username = $_POST['username'];
 $email = $_POST['email'];
 $pwd = $_POST['password'];
 $password = MD5($pwd);


 $sql = "INSERT INTO register (username,email,password) 
         VALUES ('$username','$email','$password ')";
$query = mysqli_query($conn,$sql);
if($query) {
    header("Location: login.php");
}
else{
    echo "Error :" .$sql;
}


 ?>