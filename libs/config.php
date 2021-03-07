<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aluminium";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn,'utf8');  //เซตให้รองรับภาษาไทย
if(!$conn){
    die('Connection fail: '.mysql_connect_error());
}
    // else{
//     echo "suscess";
// }
?> 

