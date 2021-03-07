<?php
 include("db.php");

//  $username = $email = $password = $pwd '';
 $name      = $_POST['name'];
 $lastname  = $_POST['lastname'];
 $sex       = $_POST['sex'];
 $tel       = $_POST['tel'];
 $address   = $_POST['address'];
 $password  = $_POST['password'];
 $username  = $_POST['username'];




 $sql = "INSERT INTO login (name,lastname,sex,tel,address,username,password) 
         VALUES (' $name','$lastname','$sex','$tel','$address','$username','$password ')";
$query = mysqli_query($conn,$sql);
if($query) {
    header("Location: login.php");
}
else{
    echo "Error :" .$sql;
}


 ?>