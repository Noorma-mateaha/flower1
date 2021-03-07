<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>
  
<html>
<head>
<link rel="stylesheet" href="style/customerstyle.css">
<title>Delete</title>
</head> 
<body>
<?php  
    
    include('db.php');

	$strmanufacture_id = $_GET["manufacture_id"];
	$sql = "DELETE FROM manufacture
			WHERE manufacture_id = '".$strmanufacture_id."' ";

	$query = mysqli_query($conn,$sql);

	if(mysqli_affected_rows($conn)) {
         echo "Record delete successfully";
         header( "location: manufacture_show.php" );
	}
 
	mysqli_close($conn);
?>
</body>
</html>