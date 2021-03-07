<?php                                     
require_once("db.php");
require_once('../MPDF61/mpdf.php');
ob_start(); // ทำการเก็บค่า html นะครับ
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link href="../../assets/fontawesome/css/all.css" rel="stylesheet">

    <title>Order_product.PDF</title>

    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/favicon.ico">
</head>
<body>

    <?php
        // include('db.php');
        // $order_product_id = $_REQUEST['order_product_id'];
        $order_product_id = $_GET['order_product_id'];
        $sql1 = "SELECT
                order_product.order_product_id,
                order_product.order_product_details,
                order_product.date_order,
                order_product.date_completion,
                customer.customer_id,
                customer.customer_name,
                customer.customer_lastname,
                customer.sex,
                customer.address,
                customer.tel,
                genre_product.genre_product_name,
                product.product_name,
                product.deposit,
                product.image,
                
            FROM
                order_product
            INNER JOIN customer ON customer.customer_id = order.customer_id
            INNER JOIN product ON product.product_id = order_product.product_id
            INNER JOIN genre_product ON genre_product.genre_product_id = product.genre_product_id
            
            WHERE order_product.order_product_id = '$order_product_id'";

        $query1 = $conn->query($sql1);
        $result1 = mysqli_fetch_assoc($query1);

    ?>

    <div class="container">

        <p align="center"><img src="../../assets/images/diamond.png" height="50" width="40" class="img-responsive" alt="image"></p>
        <h5 align="center">BANGDAY JEWELR <br> รายละเอียดการสั่งทำสินค้า</h5>

        <b>วันที่สั่งสินค้า</b> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $result1['date_order'] ?> <br>
    
        <b>รหัสการสั่งทำสินค้า</b> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $result1['order_product_id'] ?> <br>

        <b>รหัสลูกค้า</b> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $result1['customer_id'] ?> <br>
                        
        <b>ชื่อลูกค้า</b> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $result1['c_firstname'] ?> &nbsp;&nbsp; <?php echo $result1['c_lastname'] ?> <br>

        <b>เพศ</b>  &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $result1['gender'] ?> <br>

        <b>ที่อยู่</b> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $result1['address'] ?> <br>

        <b>เบอร์</b> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $result1['tel'] ?> <br><br>
                        

        <b>ชื่อแบบ</b> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $result1['model_product_name'] ?> <br>
        <b>รูปแบบ</b> <br> <img src="../../assets/images_upload/<?php echo $result1['image']; ?>" height="150" width="150"> <br><br>
        <b>ประเภทสินค้า</b> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $result1['type_product_name'] ?> <br>
        <b>รายะละเอียดแบบ</b> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $result1['model_details'] ?> <br>
        <b>ประเภทโลหะ</b> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $result1['metal_type_name'] ?> <br>
        <b>ประเภทอัญมณี</b> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $result1['gem_type_name'] ?> <br>
        <b>ค่ามัดจำ</b> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $result1['deposit'] ?> <br>

        <!-- ========================================================================================= -->

    </div>          <!-- /container -->
    <!-- ========================================================================================= -->
    
</body>
</html>

<?php
$html = ob_get_contents();
ob_end_clean();
define('FPDF_FONTPATH','font/');
$pdf = new mPDF('th', 'A4','0',''); //การตั้งค่ากระดาษถ้าต้องการแนวตั้ง ก็ A4 เฉยๆครับ ถ้าต้องการแนวนอนเท่ากับ A4-L
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output();
?>