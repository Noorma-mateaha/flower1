<?php
include("db.php");
$supplier_id = $_REQUEST['txtid'];

$sql = "DELETE FROM supplier WHERE supplier_id = $supplier_id";
if (mysqli_query($conn, $sql)) {
    //echo "Record deleted successfully";
    header ("Location:supplier_show.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>