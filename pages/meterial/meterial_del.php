<?php
include("db.php");
$material_id = $_REQUEST['txtid'];

$sql = "DELETE FROM material WHERE material_id = $material_id";
if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
    header ("Location:meterial_show.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>