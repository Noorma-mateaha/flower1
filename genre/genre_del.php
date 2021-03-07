<?php
include("db.php");
$genre_product_id = $_REQUEST['txtid'];

$sql = "DELETE FROM genre_product WHERE genre_product_id = $genre_product_id";
if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
    header ("Location:genre_show.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>