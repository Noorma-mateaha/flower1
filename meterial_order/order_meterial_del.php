<?php
include("db.php");
$order_material_id = $_REQUEST['txtid'];

$sql = "DELETE FROM order_material WHERE order_material_id = $order_material_id";
if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
    header ("Location:table_order_meterial.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>