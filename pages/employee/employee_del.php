<?php
include("db.php");
$employee_id = $_REQUEST['txtid'];

$sql = "DELETE FROM employee WHERE employee_id = $employee_id";
if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
    header ("Location:employee_show.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>