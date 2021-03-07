<?php
include("../libs/db.php");
$sale_details_id = $_REQUEST['txtid']; 
// $sale_details_id = $_REQUEST['txtid'];
$sql = "SELECT  *  FROM sale_details 
INNER JOIN sale ON sale_details.sale_id = sale.sale_id 
INNER JOIN product ON sale_details.product_id = product.product_id 
WHERE sale_details_id = '$sale_details_id' ";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result); 


                      
            $size            = $_REQUEST['size'];
            $price           = $_REQUEST['price'];
            // $amount           = $_REQUEST['amount'];
            $sum_price       = $_REQUEST['sum_price'];

            $total_price = $row['amount'] * $price;
            $sql = "UPDATE  sale_details SET 
                            size      ='$size' ,
                            price     ='$price' ,
                            sum_price = '$total_price'
                   WHERE   sale_details_id ='$sale_details_id'";
            $query = mysqli_query($conn,$sql);

        //   if($conn->query($sql) === TRUE)
        if(mysqli_query($conn,$sql) )
          {
            // echo '<scirpt> alert ("บันทึกข้อมูลสำเร็จ");</scirpt>';
            header ("Location:order_product.php");
          }
          else
          {
            echo  "บันทึกข้อมูลไม่สำเร็จ" .$conn->error;
          }
          mysqli_close($conn);
      
?>