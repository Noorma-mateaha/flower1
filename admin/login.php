<?php
session_start();
include('config.php');
$user = $_REQUEST['txtuser'];
$passwd = $_REQUEST['txtpasswd'];

$sql = "SELECT * FROM member where user = '$user' and passwd='$passwd'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        // echo "first name :" . $row["Fname"]. " last name: " . $row["Lname"]. " user :" . $row["user"]. "<br>";
        $_SESSION["user"] = $user;
        $_SESSION["passwd"] = $passwd;
        header('Location:home.php');
    }
} else {
    //echo "0 results";
    header('Location:formLogin.php');
}




 ?>
