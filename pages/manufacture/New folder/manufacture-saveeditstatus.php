<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>
  
<html> 
<head>
<title>Save</title>
</head> 
<body>  
<?php 

	include('../libs/config.php'); 

	// $sql = "UPDATE production  

  //           SET status = '".$_POST["status"]."

	// 		WHERE production_id = '".$_POST["production_id"]."' ";

    // $query = mysqli_query($conn,$sql);
    
    // ====================================================================================

    // $sql1 = " INSERT INTO "
    // $sql = "INSERT INTO production ( labor_cost ) 
    // VALUES ('".$_POST["labor_cost"]."')
    
    // WHERE     production.production_id = '".$_POST["production_id"]."'";
    
	  // $query = mysqli_query($conn,$sql);

    // ================================================================================

    $sql3 = "  UPDATE    production
                SET       labor_cost = '".$_POST["labor_cost"]."',
                          status = '".$_POST["status"]."'

                WHERE     production.production_id = '".$_POST["production_id"]."' ";
            
    mysqli_query($conn, $sql3);
    $query3 = mysqli_query($conn,$sql3);

    // ===================================================================================== 
 
	if($query3) {
     echo "Record update successfully";
     header( "location: production-index.php" );
	}
	mysqli_close($conn);
?>
</body> 
</html> 