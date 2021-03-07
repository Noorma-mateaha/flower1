<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>
  
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);
	
	include('db.php'); 

	$sql = "INSERT INTO order_product (
				 
				product_id, 
				customer_id, 
				order_product_details,
				o_status,
				genre_product_id, 
				date_order, 
				date_completion 
			) 
		VALUES (
				
				'".$_POST["product_id"]."',
				'".$_POST["customer_id"]."',
				'".$_POST["order_product_details"]."',
				'".$_POST["o_status"]."',
				'".$_POST["genre_product_id"]."',
				'".$_POST["date_order"]."',
				'".$_POST["date_completion"]."')";

	$query = mysqli_query($conn,$sql);

	if($query) {
        echo "Record add successfully";
        header( "location: order_product_show.php" );
	}

	mysqli_close($conn);
?>     