<?php
include("db.php");
$product_id = $_REQUEST['txtid'];

$sqldel = "SELECT image FROM product WHERE product_id = $product_id";
$p_image = mysqli_fetch_assoc($sqldel,MYSQLI_NUM);
$filename = $image[0];
@unlink('image/'.$filename); //@unlinkคำสั่งลบไฟล์ในระบบ


$sql = "DELETE FROM product WHERE product_id = $product_id";

if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
    header ("Location:product_show.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>