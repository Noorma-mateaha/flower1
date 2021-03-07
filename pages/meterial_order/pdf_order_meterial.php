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
                    ระบบจัดการร้านสหายอลูมิเนียม

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
                                    // include("../libs/db.php");
                                    $order_material_id = $_GET['txtid'];                   
                                    $sql1 = "SELECT    
                                    employee.employee_name,
                                    employee.employee_lastname,
                                    supplier.supplier_name,
                                    supplier.supplier_address,
                                    supplier.supplier_tel,
                                    order_material.order_material_id,
                                    order_material.status,
                                    order_material.order_material_date
                                    FROM
                                    order_material
                                    INNER JOIN employee ON order_material.employee_id =  employee.employee_id
                                    INNER JOIN supplier ON supplier.supplier_id = order_material.supplier_id
                                    WHERE order_material. order_material_id = '$ order_material_id' ";
                                    $query1 = $conn->query($sql1);
                                    $row1=mysqli_fetch_assoc($query1); 
                        
// *****************************************************************************************************************************
                         
                                    $sql2 = "SELECT  
                                    order_details_material.odm_id,
                                    order_details_material.amount,
                                    order_details_material.price,
                                    order_details_material.sum_price,
                                    material.meterial_name,
                                    order_material. order_material_id
                                    FROM
                                    order_details_material
                                    INNER JOIN material ON order_details_material.material_id = materrial.material_id
                                    INNER JOIN order_material ON order_details_material. order_material_id = order_material. order_material_id
                                    WHERE order_material. order_material_id = '$ order_material_id'";
                                    $query2 = mysqli_query($conn,$sql2);   
                                ?>

    <h2 align="center">ใบสั่งซื้อวัตถุดิบ</h2>
    <div class="container">
        <label for="om_id">รหัสสั่งซื้อ :&nbsp; </label><?php echo $row1['om_id']; ?> <br>
        <label for="date">วันที่สั่งซื้อ : &nbsp; </label><?php echo $row1['date']; ?> <br>
        <label for="supplier_name">ชื่อร้าน :&nbsp;
        </label><?php echo $row1['supplier_name']; ?><br>
        <label for="address">ที่อยู่ : &nbsp;</label> <?php echo $row1['address']; ?><br>
        <label for="tel">เบอร์ : &nbsp; </label><?php echo $row1['tel']; ?><br>
        <label for="employee_name">ชื่อพนักงาน :&nbsp;
        </label><?php echo $row1['employee_name']; ?>&nbsp;
        <?php echo $row1['employee_surname']; ?><br>
        <label for="status">สถานะ : &nbsp; </label><?php echo $row1['status']; ?> <br><br>
    </div>

    <table width="770" border="1" cellpadding="0" cellspacing="0" class="table table-condensed">
        <tr>
            <th width="15%">ลำดับ</th>
            <th width="17%">ชื่อวัตถุดิบ</th>
            <th width="10%">จำนวน</th>
            <th width="10%">ราคาต่อหน่วย</th>
            <th width="10%">ราคารวม</th>

        </tr>
        <?php
             $i = 1;
             $total =0;
             while($row=mysqli_fetch_array($query2,MYSQLI_ASSOC))
           {
        ?>
        <tr>
            <td>
                <h2><?php echo $i?></h3>
            </td>
            <td>
                <h3><?php echo $row['meterial_name']?></h3>
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
        </tr>
        <?php
        $i++;
       } ?>
    </table>
    <!-- <td colspan="5" aling="right">ราคารวมทั้งหมด</td>
    <td align="left">฿<?php echo number_format($total, 2); ?></td>
</tr> -->
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