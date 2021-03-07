<?php
 include("db.php");

 $username = $_POST['username'];
 $pwd = $_POST['password'];
 $password = MD5($pwd);

 $sql = "SELECT * FORM register WHERE username='$username' AND password='$password'";

 $query = mysqli_query($conn,$sql);
 if(mysqli_num_rows($query) > 0){
     while($row = mysqli_fetch_assoc($query)){
        $regis_id = $row["regis_id"];
        $username    = $row["username"];
        session_start();
        $_SESSION['regis_id'] = $regis_id;
        $_SESSION['username']    = $username;

     }
     header("Location: ../admin/admin.php");
 }
else{
    echo "Invalid Email or password";
}



