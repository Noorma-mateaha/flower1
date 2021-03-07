<?php
include("db.php");


$employee         =$_REQUEST['employee_id'];
$supplier         =$_REQUEST['supplier_id'];
$order_material   =$_REQUEST['order_material_date'];


$sql = "INSERT INTO order_material (
        employee_id,
        supplier_id,
        order_material_date
        )
        VALUES ('$employee','$supplier','$order_material')";
$query = mysqli_query($conn,$sql);

$number = count($_POST["material_id"]);

if($number > 0)
{
	for($i=0; $i<$number; $i++)
	{
		if(trim($_POST["material_id"][$i] != ''))
		{
            
			$sql = "INSERT INTO order_details_material(
                                             order_material_id,
                                             material_id,
                                             amount,
                                             price,
                                             sum_price
                                             ) 
                        VALUES
               ( 
                    '".mysqli_real_escape_string($conn, $_POST["order_material_id"])."',
                    '".mysqli_real_escape_string($conn, $_POST["material_id"][$i])."',
                    '".mysqli_real_escape_string($conn, $_POST["amount"][$i])."',
                    '".mysqli_real_escape_string($conn, $_POST["price"][$i])."',
                    '".(mysqli_real_escape_string($conn, $_POST["price"][$i]) *  mysqli_real_escape_string($conn, $_POST["amount"][$i]) )."'
                    )";
            mysqli_query($conn, $sql);
            
          
          }

  // ******************************** เพิ่มจำนวนวัตถุดิบในตาราง meterial***************************************
          $sql3 = "UPDATE material SET
                                   Import_amount = Import_amount + '".$_POST["amount"][$i]."'
                                   WHERE material_id = '".$_POST["material_id"][$i]."' " ;
                                   mysqli_query($conn, $sql3);
	}
	echo "Data Inserted";
}
else
{
	echo "Please Enter Name";
}
?>