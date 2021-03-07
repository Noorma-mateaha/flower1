<?php
include("db.php");
error_reporting(error_reporting() & ~E_NOTICE);
session_start();

$sql = "SELECT * FROM product 
INNER JOIN genre_product ON product.genre_product_id = genre_product.genre_product_id
 ";

$result = mysqli_query($conn, $sql);
/*----------------------------*/
$sql1 = "SELECT * FROM order_product";
$result = mysqli_query($conn, $sql1);


/*--------------------เพิ่มสินค้าลงตะกร้า---------------------*/
if (isset($_POST["add_product"])) /*กดปุ่ม submit*/ {
    if (isset($_SESSION["shop"])) /*ตรวจเช็ค session เป็นการสร้างอาร์เรย์ */ {
        $item_array_id = array_column($_SESSION["shop"], "item_id");
        if (!in_array($_GET["id"], $item_array_id)) /*มีการGET id มา มาเปรี่ยบเทียบ  เพื่อทำการตรวจสอบสินค้า ที่เพิ่มนั้นซ้ำหรือเปล่า*/ 
        {
            $count = count($_SESSION["shop"]);
            $item_array = array( /*เป็นการบรรจุสินค้าเข้าไปในอาร์เรย์ */
                'item_id'     => $_GET["id"],
                'item_product_name'  => $_POST["product_name"],
                'item_genre_product_name'  => $_POST["genre_product_name"],
                'item_product_price'  => $_POST["product_price"],
                'item_quantity'  => $_POST["quantity"]
            );
            $_SESSION["shop"][$count] = $item_array;
        } else { /*ข้อมูลถูกเพิ่มแล้ว */
            echo '<script>alert("สินค้าถูกเพิ่มแล้ว")</script>';
            echo '<script>window.location="product.php"</script>';
        }
    } else {
        $item_array = array(  //เป็นการสร้างอาร์เรย์มาใหม่
            'item_id'     => $_GET["id"],
            'item_product_name'  => $_POST["product_name"],
            'item_genre_product_name'  => $_POST["genre_product_name"],
            'item_product_price'  => $_POST["product_price"],
            'item_quantity'  => $_POST["quantity"]
        );
        $_SESSION["shop"][0] = $item_array;
    }
}
// -------------การลบสินค้าที่อยู่ในตะกร้า-------------- */
if (isset($_GET['action'])) {
    if ($_GET['action'] == "delete") { /* เช๊ค status เป็น delete หรือเปล่า */
        foreach ($_SESSION['shop'] as $key => $value) {
            if ($value['item_id'] == $_GET['id']) { /*item_id ตรงกับ id ที่ส่งมาทาง  url  หรือเปล่า */
                unset($_SESSION['shop'][$key]);
                echo '<script> alert("ลบสินค้า?")</script>';
                echo '<script> window.location="product_add.php"</script>';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="../../css/product_add.css">
    <title>นารีประดิษฐ์</title>
</head>
<?php
include('../bar/nav_cus.php');
?>

<body>

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script>
        $(document).ready(function() {
            $('.menu-toggle').click(function() {
                $('nav').toggleClass('active')
            })
        })
    </script>
        <br> <br> <br>
        <!-- --------ตารางแสดงสินค้า---------------- -->
        <span align="center">
            <h2>ข้อมูลสินค้าในตะกร้า</h2>
        </span><br>
        
        <div class="table-reponsive">
            <table class="content-table ">
                <thead>
                    <tr>
                        <th>รูปแบบสินค้า</th>
                        <th>ประเภท</th>
                        <!-- <th>ขนาด</th> -->
                        <th>จำนวน</th>
                        <th>ราคา</th>
                        <th>ราคารวม</th>
                        <th>ดำเนินการ</th>
                        <th></th>
                    </tr>
                </thead>
                <?php
                if (!empty($_SESSION["shop"])) { //ถ้ามีข้อมูลใน $_SESSION ให้แสดง
                    $total = 0;
                    foreach ($_SESSION['shop'] as $key => $value) { ?>
                        <tr>
                            
                            <!-- <td><?php echo $value['item_id']; ?></td> -->
                            <td><?php echo $value['item_product_name']; ?></td>
                            <td><?php echo $value['item_genre_product_name']; ?></td>
                            <td><?php echo $value['item_quantity']; ?></td>
                            <td><?php echo number_format($value['item_product_price'], 2); ?></td>
                            <td><?php echo number_format($value['item_quantity'] * $value['item_product_price'], 2); ?></td>
                            <td><a href="product_add.php?action=delete&id=<?php echo $value['item_id']; ?>">ลบสินค้า</td>
                            
                        </tr>
                    <?php
                            $total = $total + ($value['item_product_price'] * $value['item_quantity']);
                        }
                        ?>
                    <tr>
                        <td colspan="4" aling="right">ราคารวมทั้งหมด</td>
                        <td align="left">฿<?php echo number_format($total, 2); ?></td>
                        <td></td>
                        <td></td>
                    <?php } ?>
                    </tr>
            </table> <br>
            <center><a href="product.php" class="btn btn-warning "><i class="fa  fa-cart-plus"></i> เพิ่มสินค้าในตะกร้า</a>
            <a href="shop_show_cus.php" class="btn btn-success "><i class="glyphicon glyphicon-check"></i> ยืนยันสินค้าในตะกร้า</a></center>

    <!-- ---------------------------------------------------------------------------------------- -->
            
        </div>

        <!-- <?php echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>'; ?>  -->
    </body>

</html>