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

    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/favicon.ico">

    <title> Show </title>
</head>

<body>

    <div class="container">

        <?php
	
    include('../libs/config.php');

    $sql = "SELECT *
            FROM
                    production
                    
            INNER JOIN order_product ON order_product.order_product_id = production.order_product_id
            INNER JOIN employee ON employee.employee_id = production.employee_id
            INNER JOIN customer ON customer.customer_id = order_product.customer_id
            -- INNER JOIN supplier ON supplier.supplier_id = production.supplier_id
            
            ORDER BY production.production_id ASC";

	$query = mysqli_query($conn,$sql);

?>

        <div class="contact-section">
            <h4>ข้อมูลการผลิต / Production</h4>

            <!-- <form action="" method="get" enctype="multipart/form-data" class="form-inline mr-auto">
        <a href="production-form.php" class="btn btn-success"><i class="fas fa-plus"></i></a> &nbsp;
    
    </form> -->

        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">รหัสการผลิต</th>
                    <th scope="col">วันที่ผลิต</th>
                    <th scope="col">รหัสสั่งทำ</th>
                    <th scope="col">ชื่อผุู้สั่งทำ</th>
                    <th scope="col">ชื่อพนักงานที่ผลิต</th>
                    <th scope="col">ราคาสินค้า</th>
                    <th scope="col">สถานะ</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>

            <?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>

            <tr>
                <th><?php echo $result['production_id']; ?></th>
                <td><?php echo $result['production_date']; ?></td>
                <td><?php echo $result['order_product_id']; ?></td>
                <td><?php echo $result['c_firstname']; ?> <?php echo $result['c_lastname']; ?></td>
                <td><?php echo $result['firstname']; ?> <?php echo $result['lastname']; ?></td>
                <td><?php echo $result['product_price']; ?></td>
                <!-- <td><button type="button" class="btn btn-warning"></?php echo $result['status']; ?></button></td> -->

                <td>
                    <?php if($result['status']=="กำลังผลิต"){ ?>
                        <a href="production-editstatus.php?production_id=<?php echo $result['production_id'];?>" class="btn btn-warning"><i class=""></i>กำลังผลิต</a>
                    <?php }else { ?>
                            <a class="btn btn-danger"><i class=""></i>ผลิตเสร็จแล้ว</a>
                    <?php } ?>
                </td> 
                
                <td>     

                    <a href="production-calculate.php?production_id=<?php echo $result['production_id'];?>"class="btn btn-success"><i class="fas fa-calculator"></i></a>
                    <a href="production-report.php?production_id=<?php echo $result['production_id'];?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                    <!-- <a href="production-edit.php?production_id=</?php echo $result['production_id'];?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a> -->
                    <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='production-delete.php?production_id=<?php echo $result["production_id"];?>';}"
                        class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                </td>
            </tr>

            <?php
}
?>
        </table>


        <?php
mysqli_close($conn);
?>

    </div>

    <?php include('indexmenu.php');  ?>

</body>

</html>