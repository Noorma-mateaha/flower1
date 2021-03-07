<?php                                     
require_once("db.php");
require_once('../../MPDF61/mpdf.php');
ob_start(); // ทำการเก็บค่า html 
?>

<html>

<head>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
</head>

<body>

    <table width="704" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td width="291" align="center"><span class="style2">
                 ระบบจัดการดอกไม้ประดิษฐ์จากผ้าใยบัว ของที่ระลึก
                </span></td>
        </tr>
    </table>
    <tbody>
        <tr>
            <td align="center">&nbsp;</td>
        </tr>
    </tbody>
    </table><br>
    <?php
    $order_product_id = $_REQUEST['txtid']; 
    $sql2    = "SELECT  order_product.order_product_id,
                        order_product.status_order_product,
                        order_product.date_order_product,
                        login.user_id,
                        login.name,
                        login.lastname,
                        login.tel,
                        login.address
    FROM order_product
    INNER JOIN login ON login.user_id = order_product.user_id  
    WHERE  order_product.order_product_id = '$order_product_id' ";
    $query2 = $conn->query($sql2);
    $row2=mysqli_fetch_assoc($query2); 
// **********************************************************
    $sql3 = "SELECT order_details. order_details_id,
                     order_details.amount,
                     order_details.price,
                     order_details.sum_price,
                     order_details.deposit,
                     order_details.status_sd,
                    product.product_name,
                    order_product.order_product_id,
                    order_product.date_order
            FROM     order_details 
            INNER JOIN order_product ON  order_details.order_product_id = order_product.order_product_id 
            INNER JOIN product ON  order_details.product_id = product.product_id 
     WHERE order_product.order_product_id = '$order_product_id' ";
    $query3 = mysqli_query($conn,$sql3); 

    ?>
    <h2 align="center">ใบสั่งทำสินค้า</h2>
    <div class="container">
        <label for="queue">ลำดับคิว &nbsp;:&nbsp;&nbsp;</label><?php echo $row2['order_product_id']; ?><br>
        <label for="date">วันที่สั่งทำ &nbsp;: &nbsp; </label> <?php echo  $row2['date_ order'] ; ?><br>
        <label for="order_product_id">รหัสการขาย &nbsp;:&nbsp;</label><?php echo  $row2['order_product_id']; ?><br>
        <label for="name">ชื่อ &nbsp;:&nbsp;</label><?php echo $row2['name']; ?> &nbsp;
        <?php  echo $row2['lastname']; ?><br>
        <label for="tel">เบอร์ &nbsp;:&nbsp;</label> <?php  echo $row2['tel']; ?><br>
        <label for="tel">ที่อยู่ &nbsp;:&nbsp;</label> <?php  echo $row2['address']; ?><br>
        <label for="date">สถานะ &nbsp;:&nbsp;</label> <?php  echo $row2['o_status']; ?><br><br>
    </div>

    <table width="770" border="1" cellpadding="0" cellspacing="0" class="table table-condensed">
        <tr>
            <th scope="col">IdSaleDetail</th>
            <th scope="col">รูปแบบสินค้า</th>
            <!-- <th scope="col">สี</th>
            <th scope="col">ขนาด</th> -->
            <th scope="col">จำนวน</th>
            <th scope="col">ราคา/หน่วย</th>
            <th scope="col">ราคารวม</th>
            <th scope="col">ค่ามัดจำ</th>
        </tr>
        <?php
            $total = 0;
            $deposit = 0;
            while($row=mysqli_fetch_array($query3,MYSQLI_ASSOC)) { 
        ?>
        <tr>
            <td>
                <h2><?php echo $row[' order_details_id'];?></h3>
            </td>
            <td>
                <h3><?php echo $row['product_name']?></h3>
            </td>
          
            <td>
                <h3><?=$row['amount']?></h3>
            </td>
            <td>
                <h3><?=$row['price']?></h3>
            </td>
            <td>
                <h3><?=$row['sum_price']?></h3>
            </td>
            <td>
                <h3><?=$row['deposit']?></h3>
            </td>
        </tr>
        <?php } ?>
    </table>
    <?php
    mysqli_close($conn);
?>

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