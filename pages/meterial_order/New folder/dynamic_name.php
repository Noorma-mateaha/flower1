<?php
include("../libs/db.php");

$sql = "INSERT INTO order_meterial (employee_id, 
                                    supplier_id, 
                                    date) 
          VALUES  ( '".$_POST["employee_id"]."',
                    '".$_POST["supplier_id"]."'
                    '".$_POST["date"]."')";
                mysqli_query($conn, $sql);

$number = count($_POST["meterial_id"]);

if($number > 0)
{
	for($i=0; $i<$number; $i++)
	{
		if(trim($_POST["meterial_id"][$i] != ''))
		{
            
			$sql = "INSERT INTO order_details_meterial(om_id,meterial_id,size,color,amount) VALUES
               ( 
                   '".mysqli_real_escape_string($conn, $_POST["om_id"])."',
                   '".mysqli_real_escape_string($conn, $_POST["meterial_id"][$i])."',
                    '".mysqli_real_escape_string($conn, $_POST["color"][$i])."',
                    '".mysqli_real_escape_string($conn, $_POST["size"][$i])."',
                    '".mysqli_real_escape_string($conn, $_POST["amount"][$i])."')";
            mysqli_query($conn, $sql);
            
          
		}
	}
	echo "Data Inserted";
}
else
{
	echo "Please Enter Name";
}
?>