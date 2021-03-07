<?php
include("db.php");
$payment_id = $_REQUEST['txtid'];

$sqldel = "SELECT papy_image FROM payment WHERE payment_id = $payment_id";
$p_image = mysqli_fetch_assoc($sqldel,MYSQLI_NUM);
$filename = $p_image[0];
@unlink('image/'.$filename); //@unlinkคำสั่งลบไฟล์ในระบบ


$sql = "DELETE FROM payment WHERE payment_id = $payment_id";

if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
    header ("Location:ad_payment_show.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>