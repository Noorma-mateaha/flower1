<?php
error_reporting(error_reporting() & ~E_NOTICE);
session_start();?>

<?php
include("db.php");

$number = count($_POST["material_id"]);

if($number > 0)
{
	for($i=0; $i<$number; $i++)
	{
		if(trim($_POST["material_id"][$i] != ''))
		{
            $material_id = $_POST["material_id"][$i];

            $sql = "SELECT * FROM material 
                    WHERE material.material_id = '$material_id' " ;

            $query = mysqli_query($conn,$sql);
            $result = mysqli_fetch_assoc($query); 

      // ******************************* INSERT table manufacture_details ************************************
      // if เช็คว่าจำนวนที่เราป้อนนั้นมีค่า มากกว่าหรือเท่ากับ จำนวนที่อยู่ในดาต้าเบสมั้ย
                if($_POST["amount"][$i] <= $result['Import_amount']) 
                {
                            $sql1 = "INSERT INTO manufacture_details(
                                             manufacture_id,
                                             material_id,
                                             amount) 
                                VALUES
                            ( 
                                    '".mysqli_real_escape_string($conn, $_POST["manufacture_id"])."',
                                    '".mysqli_real_escape_string($conn, $_POST["material_id"][$i])."',
                                    '".mysqli_real_escape_string($conn, $_POST["Import_amount"][$i])."'
                            )";
                            mysqli_query($conn,$sql1);

// ************************************* ตัดสต็อกวัตถุดิบ *****************************************************

                    $sql2 = " UPDATE material 
                              SET    Import_amount = Import_amount - '".$_POST["Import_amount"][$i]."'
                              WHERE material.material_id = '".$_POST["material_id"][$i]."' ";
                    mysqli_query($conn,$sql2);

// ************************************* loop else จะแจ้งเตือน เวลาของหมด **************************************
                }else{?>
                
                จำนวนวัตถุดิบไม่เพียงพอ

                <?php 
                    exit();
            }
        }
    }   

// *************************** insert table manufacture ***********************************
$sql = "INSERT INTO manufacture (order_details_id,date,employee_id) 
VALUES  (  '".$_POST["order_details_id"]."',
            '".$_POST["date"]."',
            '".$_POST["employee_id"]."')";
mysqli_query($conn, $sql);

// ****************************** insert table delivery  ***********************************
$manufacture_id = mysqli_insert_id($conn);

$sql = "INSERT INTO delivery (manufacture_id) 
        VALUES  (  '$manufacture_id ')";
        mysqli_query($conn, $sql);

// *************************** UPDATE table order_details ***********************************
$sql3 = "  UPDATE    order_details
SET       status_sd = 'ผลิตเสร็จแล้ว'
WHERE     order_details.order_details_id = '".$_POST["order_details_id"]."' ";

mysqli_query($conn, $sql3);
	
	echo "Data Inserted";
}
else
{
	echo "Please Enter Name";
}
?>