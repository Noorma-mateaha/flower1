<?php
include("db.php");
$order_product_id = $_REQUEST['txtid'];

$sql = "DELETE FROM order_product WHERE order_product_id = $order_product_id";

if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
    header ("Location:detail_order_cus.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>