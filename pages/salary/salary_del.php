<?php
include("db.php");
$salary_id = $_REQUEST['txtid'];

$sql = "DELETE FROM salary WHERE salary_id = $salary_id";
if (mysqli_query($conn, $sql)) {
    //echo "Record deleted successfully";
    header ("Location:salary_show.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>