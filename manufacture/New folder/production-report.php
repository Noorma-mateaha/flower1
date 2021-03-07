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
    <!-- <link rel="stylesheet" href="style/customerstyle.css"> -->

    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/favicon.ico">

    <title> Report </title>
</head> 
<style>

body {background-color: #000000;}

</style>
ิ<body>

    <?php
        include('../libs/config.php');
        // $order_product_id = $_REQUEST['order_product_id'];

        $production_id = $_REQUEST['production_id'];

        $sql = "SELECT * 
                FROM
                    production

                INNER JOIN order_product ON order_product.order_product_id = production.order_product_id
                INNER JOIN employee ON employee.employee_id = production.employee_id
                INNER JOIN customer ON customer.customer_id = order_product.customer_id
                INNER JOIN gem_type ON gem_type.gem_type_id = order_product.gem_type_id
                INNER JOIN metal_type ON metal_type.metal_type_id = order_product.metal_type_id
                INNER JOIN model_product ON model_product.model_product_id = order_product.model_product_id
                INNER JOIN type_product ON type_product.type_product_id = model_product.type_product_id

                WHERE production.production_id = '$production_id'";

        $query = $conn->query($sql);
        $result = mysqli_fetch_assoc($query);

        // -------------------------------------------------------------------------------------------------------
    ?>

    <!-- <div class="has-success form-group"> -->
    <div class="container">
        <br><br>

        <a><button type="button" class="btn btn-warning btn-lg btn-block" >รายละเอียดการผลิต</i></button></a>

        <!-- <br><br>  -->
        <br>

        <div class="card">
            <!-- <div class="card-header">
                <h5 class="card-title" align="center">รายละเอียดการผลิต</h5>
            </div> -->
            <div class="card-body">

                <div class="container">

                    <div class="row">
                        <div class="col-2">
                            รหัสการผลิต
                        </div>
                        <div class="col-5">
                            <?php echo $result['production_id'] ?>
                        </div>

                        <div class="col-2">
                            วันที่
                        </div>
                        <div class="col-2">
                            <?php echo $result['date_order'] ?>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-2">
                            รหัสพนักงาน
                        </div>
                        <div class="col-5">
                            <?php echo $result['employee_id'] ?>
                        </div>

                        <div class="col-2">
                            รหัสการสั่งทำ
                        </div>
                        <div class="col-2">
                            <?php echo $result['order_product_id'] ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2">
                            ชื่อพนักงาน
                        </div>
                        <div class="col-5">
                            <?php echo $result['firstname'] ?> <?php echo $result['lastname'] ?>
                        </div>

                        <div class="col-2">
                            ชื่อผู้สั่ง
                        </div>
                        <div class="col-2">
                            <?php echo $result['c_firstname'] ?> <?php echo $result['c_lastname'] ?>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-2">
                            ชื่อแบบสินค้า
                        </div>
                        <div class="col-5">
                            <?php echo $result['model_product_name'] ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2">
                            ประเภทสินค้า
                        </div>
                        <div class="col-5">
                            <?php echo $result['type_product_name'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            ประเภทโลหะ
                        </div>
                        <div class="col-5">
                            <?php echo $result['metal_type_name'] ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2">
                            ประเภทอัญมณี
                        </div>
                        <div class="col-5">
                            <?php echo $result['gem_type_name'] ?>
                        </div>

                        <!-- <div class="col-3">
                
                        </div>
                        <div class="col-2">
                            
                        </div> -->
                    </div>
                   
                    <!-- <br> -->

                </div>   
            </div>
        </div>
        <br><br>

        <?php
            
            $sql1 = "   SELECT * 
                        FROM
                            raw_material_usage_production

                        -- INNER JOIN raw_material_usage_production ON raw_material_usage_production.raw_material_usage_production_id = production.raw_material_usage_production_id

                        INNER JOIN production ON production.production_id = raw_material_usage_production.production_id
                        INNER JOIN raw_material ON raw_material.raw_material_id = raw_material_usage_production.raw_material_id
                        INNER JOIN order_product ON order_product.order_product_id = production.order_product_id
                        INNER JOIN employee ON employee.employee_id = production.employee_id
                        INNER JOIN customer ON customer.customer_id = order_product.customer_id
                        INNER JOIN gem_type ON gem_type.gem_type_id = order_product.gem_type_id
                        INNER JOIN metal_type ON metal_type.metal_type_id = order_product.metal_type_id
                        INNER JOIN model_product ON model_product.model_product_id = order_product.model_product_id
                        INNER JOIN type_product ON type_product.type_product_id = model_product.type_product_id

                        WHERE production.production_id = '$production_id'";

                    $query1 = mysqli_query($conn,$sql1);
        ?>


        <table class="table table-bordered">
            <thead  class="thead-dark table-bordered">
                <tr>
                    <th class="text-center" colspan="6">วัตถุดิบที่ใช้ในการผลิต</th>
                </tr>
                <tr>
                    <th class="text-center" scope="col">ลำดับ</th>
                    <th class="text-center" scope="col">ชื่อวัตถุดิบ</th>
                    <th class="text-center" scope="col">น้ำหนักรวม(กรัม)</th>
                </tr>
            </thead>

            <?php
            $i = 1;
            // $sum_price = 0;
            // $total_price = 0;
            while($result1=mysqli_fetch_array($query1,MYSQLI_ASSOC))
            {
            ?>
                <tr>
                    <td><?php echo $i?></td>
                    <td><?php echo $result1['raw_material_name']?></td>
                    <td><?php echo $result1['total_weigth']?></td>
                </tr>

            <?php
                $i++;
            }
            ?>
            
        </table>

        <div class="row">
            <div class="col-10">   <!-- col-8 -->
            </div>
            <div class="col-2">
                <a href="production-index.php"><button type="button" class="btn btn-warning btn-block" ><i class="fas fa-arrow-circle-left"> กลับ | Back</i></button></a>
            </div>
            <!-- <div class="col-2">
            <a href="#"><button type="button" class="btn btn-light btn-block" ><i class="fas fa-print"> พิมพ์ | Print</i></button></a>
            </div> -->
        </div>
        
    </div>
    
    <?php
    mysqli_close($conn);
    ?>

    </body>
</html>