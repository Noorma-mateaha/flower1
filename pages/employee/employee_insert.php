<?php
 include("db.php");

//  $username = $email = $password = $pwd '';
 $name      = $_REQUEST['name'];
 $lastname  = $_REQUEST['lastname'];
 $sex       = $_REQUEST['sex'];
 $tel       = $_REQUEST['tel'];
 $address   = $_REQUEST['address'];
 $username  = $_REQUEST['username'];
 $password  = $_REQUEST['password'];
 $level     = $_REQUEST['level'];

 $sql = "INSERT INTO employee (employee_name,employee_lastname,employee_sex,employee_tel,employee_address,employee_username,employee_password,employee_level) 
         VALUES (' $name','$lastname','$sex','$tel','$address','$username','$password ','$level')";
$query = mysqli_query($conn,$sql);
if($query) {
    header("Location: employee_show.php");
}
else{
    echo "Error :" .$sql;
}


 ?>