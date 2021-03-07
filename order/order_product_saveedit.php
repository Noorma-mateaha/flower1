<html>
<head>
<title>Save</title>
</head>
<body>  
<?php 

	include('db.php'); 

	$order_product_id = $_REQUEST['txtid'];

		$customer_id             =$_REQUEST['customer_id'];
		$product_id              =$_REQUEST['product_id'];
		$order_product_details   =$_REQUEST['order_product_details'];
		$genre_product_id        =$_REQUEST['genre_product_id'];
		$date_order              =$_REQUEST['date_order'];
		$o_status                =$_REQUEST['o_status'];
		$date_completion         =$_REQUEST['date_completion'];

		$sql = "UPDATE order_product SET 
									customer_id ='$customer_id ',     
									product_id ='$product_id ',            
									order_product_details  ='$order_product_details ', 
									genre_product_id  ='$genre_product_id ',      
									date_order ='$date_order ',             
									o_status ='$o_status ',               
									date_completion ='$date_completion '
		WHERE order_product_id='$order_product_id' ";


	
	$query = mysqli_query($conn,$sql);
 
	if($query) {
     echo "Record update successfully";
     header( "location: order_product_show.php" );
	}
 
	mysqli_close($conn);
?>
</body> 
</html> 