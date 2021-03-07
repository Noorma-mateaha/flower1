<?php
include("db.php");
$customer_id = $_REQUEST['txtid'];

$sql = "DELETE FROM customer WHERE customer_id = $customer_id";
if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
    header ("Location:customer_show.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>