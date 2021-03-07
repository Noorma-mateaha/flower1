<!DOCTYPE html>
  
<html>
<head>
<link rel="stylesheet" href="style/customerstyle.css">
<title>Delete</title>
</head> 
<body>
<?php  
    
    include('db.php');

	$order_product_id = $_REQUEST["txtid"];
	$sql = "DELETE FROM order_product
			WHERE order_product_id = '".$order_product_id."' ";

	$query = mysqli_query($conn,$sql);

	if(mysqli_affected_rows($conn)) {
         echo "Record delete successfully";
         header( "location: order_product_show.php" );
	}
 
	mysqli_close($conn);
?>
</body>
</html>