<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>
  
<!DOCTYPE html>
<html lang="en">  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link href="../../assets/fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="style/indexstyle.css">
    <link rel="stylesheet" href="style/customerstyle.css">

    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/favicon.ico">

    <title> Edit </title>
</head> 

<style>

body {background-color: #000000;}

</style>


    <?php

        $strmanufacture_id = null;

        if(isset($_GET["manufacture_id"]))
        {
            $strmanufacture_id = $_GET["manufacture_id"];
        }

        include('db.php');

        $sql = "SELECT *
                FROM
                manufacture
                    
            INNER JOIN order_product ON order_product.order_product_id = manufacture.order_product_id
            INNER JOIN employee ON employee.employee_id = manufacture.employee_id
            INNER JOIN customer ON customer.customer_id = order_product.customer_id
            -- INNER JOIN supplier ON supplier.supplier_id = manufacture.supplier_id
            
            WHERE manufacture.manufacture_id = '".$strmanufacture_id."' ";

            $query = mysqli_query($conn,$sql);
            $result=mysqli_fetch_array($query,MYSQLI_ASSOC);
            $data = $result;
    ?>
    
    <!-- <div class="has-success form-group"> -->
    <div class="container">
        <br><br><br>
            <a><button type="button" class="btn btn-warning btn-lg btn-block">สถานะการผลิต</i></button></a>
        <br><br>

        <!-- =============================================================================================== -->

        <form class="contact-form" action="manufacture-saveeditstatus.php" method="post">

        <div class="container">
        
            <div class="row">
                
                <label for="manufacture_id" class="lb">รหัสการผลิต</label>
                <input type="text" name="manufacture_id" class="contact-form-text" id="manufacture_id" value="<?php echo $result['manufacture_id'];?>" readonly>
                
               

                <label for="status" class="lb">สถานะการผลิต</label>
                    <select class="contact-form-text" name="status" id="status">
                    <option value="<?php echo $result["status"];?>"><?php echo $result["status"];?></option>
                    <option value="กำลังผลิต">กำลังผลิต</option>
                    <option value="ผลิตเสร็จแล้ว">ผลิตเสร็จแล้ว</option>
                    </select>

            </div>   <!-- /row -->
        </div>  <!-- /container -->
        <br>
            
            <div class="row">
                <div class="col-8">
                </div>
                <div class="col-2">
                    <input type="submit" class="btn btn-warning btn-block" value="Save">
                </div>
                <div class="col-2">
                    <a href="#"><button type="button" class="btn btn-danger btn-block" onClick="history.go(-1);"> Cancel
                        </button></a>
                </div>
            </div>


        </form>
        <!-- ================================================================================================ -->
    </div>
     
    <?php
    mysqli_close($conn);
    ?>