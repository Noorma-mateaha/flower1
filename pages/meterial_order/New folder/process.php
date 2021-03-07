<?php
include("../libs/db.php");
if(isset($_POST['save'])){
    $date          = $_POST['date'];
    $employee_name = $_POST['employee_name'];
    $supplier_id   = $_POST['supplier_id'];
    $meterial_name = $_POST['meterial_name'];
    $color         = $_POST['color'];
    $size          =  $_POST['size'];
    $amount        =  $_POST['amount'];
    
    $sql = "INSERT INTO order 
                        (date,
                        employee_name,
                        supplier_id ,
                        meterial_id,
                        color,
                        size,
                        amount ) 
            VALUES ('".$_POST["date"]."',
                    '".$_POST["employee_name"]."',
                    '".$_POST["supplier_id"]."',
                    '".$_POST["meterial_name"]."',
                    '".$_POST["color"]."',
                    '".$_POST["size"]."',
                    '".$_POST["amount"]."')";
    $query = mysqli_query($conn,$sql);   
    if ($query) {
        echo "Record add successfully";
        // header( "location:product_show.php" );
    }else{
        echo "Unable to save data";
    }
    mysqli_close($conn);
}





?>