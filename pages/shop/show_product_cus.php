<?php 
  include("db.php");
  $sql = "SELECT * FROM product";
  $result= mysqli_query($conn,$sql);
/*--------------------เพิ่มสินค้าลงตะกร้า---------------------*/
  if(isset($_POST["add_product"])) /*กดปุ่ม submit*/
  {
    if(isset($_SESSION["shopping_cart"])) /*ตรวจเช็ค session เป็นการสร้างอาร์เรย์ */
    {
          $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
          if(!in_array($_GET["id"], $item_array_id)) /*มีการGET id มา มาเปรี่ยบเทียบ  เพื่อทำการตรวจสอบสินค้า ที่เพิ่มนั้นซ้ำหรือเปล่า*/ 
          {
              $count = count($_SESSION["shopping_cart"]);
              $item_array = array( /*เป็นการบรรจุสินค้าเข้าไปในอาร์เรย์ */
                  'item_id'     => $_GET["id"],
                  'item_category_name'  => $_POST["category_name"],
                  'item_stylepro_name'  => $_POST["stylepro_name"],
                  'item_color'  => $_POST["color"],
                  'item_size'   => $_POST["size"],
                  'item_price'  => $_POST["price"],
                  'item_quantity'  => $_POST["quantity"]
              );
              $_SESSION["shopping_cart"][$count] = $item_array;
          } else{ /*ข้อมูลถูกเพิ่มแล้ว */
              echo '<script>alert("สินค้าถูกเพิ่มแล้ว")</script>';
              echo '<script>window.location="show_product_cus.php"</script>';
                }
    }else{
              $item_array = array(
                'item_id'     => $_GET["id"],
                'item_category_name'  => $_POST["category_name"],
                'item_stylepro_name'  => $_POST["stylepro_name"],
                'item_color'  => $_POST["color"],
                'item_size'   => $_POST["size"],
                'item_price'  => $_POST["price"],
                'item_quantity'  => $_POST["quantity"]
              );
              $_SESSION["shopping_cart"][0] = $item_array;
          }
    }
   
  
// -------------การลบสินค้าที่อยู่ในตะกร้า-------------- */
if(isset($_GET['action'])){
    if($_GET['action'] == "delete"){ /* เช๊ค status เป็น delete หรือเปล่า */
        foreach ($_SESSION['shopping_cart'] as $key => $value){
            if($value['item_id'] == $GET['id']){ /*item_id ตรงกับ id ที่ส่งมาทาง  url  หรือเปล่า */
            unset($_SESSION['shopping_cart']['$key']);
            echo '<script> alert("ลบสินค้าแล้ว")</script>';
            echo '<script> window.location="show_product_cus.php"</script>';
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
    <link rel="stylesheet" href="navbar.css">
    <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>นารีประดิษฐ์</title>
</head>
<body>
    <header>
    <?php 
    include('../bar/nav_cus.php');    
    ?>
    </header>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script> 
    $(document).ready(function(){
       $('.menu-toggle').click(function() {
           $('nav').toggleClass('active')
       })   
})
</script>

<!-------------- ส่วนที่เป็นหน้าสินค้า ----------------->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>นารีประดิษฐ์</title>
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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
    <br> <br> <br>
    <!-- ---------------หน้าระบบตะกร้าสินค้า----------------------- -->
    <div class="container" style="width:700px">
        <h3 align="center"> ระบบตะกร้าสินค้า </h3>
        <br>
        <?php
        while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        ?>
        <div class="col-md-4">
            <form method="post" action="show_product_cus.php?action=add&id=<?php echo $row['product_id'];?>">
                <div style="border:1px solid #333;background-color:white;border-radius:5px;padding:1px;margin:1px">
                    <img src="<?php echo $row['product_id'];?>" class="img-responsive" /><br>
                    <h4 class="text-info">สินค้า :<?php echo $row['category_name'];?> <?php echo $row['stylepro_name'];?></h4>
                    <h4 class="text-info">สี :<?php echo $row['color'];?> </h4>
                    <h4 class="text-info">ขนาด :<?php echo $row['size'];?> </h4>
                    <h4 class="text-danger">ราคา :<?php echo number_format($row['price'],2);?> บาท</h4>
                    <input type="text" name="quantity" class="form-control" value="1" />
                    <input type="hidden" name="product_id" value="<?php echo $row['product_id'];?>" />
                    <input type="hidden" name="color" value="<?php echo $row['color'];?>" />
                    <input type="hidden" name="size" value="<?php echo $row['size'];?>" />
                    <input type="hidden" name="price" value="<?php echo $row['price'];?>" />
                    <input type="submit" name="add_product" style="margin-top:5px;" class="btn btn-info"
                        value="เพิ่มลงตะกร้า">
                </div>
            </form>
        </div>
        <?php } ?>
 <!-- --------ตารางแสดงสินค้า---------------- -->
 <br> <br>
       <div class="table-reponsive">
           <table class="table table-bordered">
               <tr>
                   <th>สินค้า</th>
                   <th>สี</th>
                   <th>ขนาด</th>
                   <th>จำนวน</th>
                   <th>ราคา</th>
                   <th>ราคารวม</th>
                   <th>ดำเนินการ</th>
               </tr>
               <?php 
                 if(!empty($_SESSION["shopping_cart"])){
                     $total=0;
                     foreach ($_SESSION['shopping_cart'] as $key => $value) { ?>
               <tr>
                   <td><?php echo $value['item_id'];?></td>
                   <td><?php echo $value['item_color'];?></td>
                   <td><?php echo $value['item_size'];?></td>
                   <td><?php echo $value['item_quantity'];?></td>
                   <td><?php echo number_format($value['item_price'],2);?></td>                   
                   <td><?php echo number_format($value['item_price']*$value['item_quantity'],2);?></td> 
                   <td><a href="show_product_cus.php?action=delete&id=<?php echo $value ['item_id'];?>">ลบสินค้า</td>              
                </tr>
                <?php 
                $total=$total+($value['item_price']*$value['item_quantity']);
                 }
                ?>
                <tr>
                    <td colspan="3" aling="right">ราคารวมทั้งหมด</td>
                    <td align="right">฿<?php echo number_format($total, 2); ?></td>
                    <td></td>
                <?php } ?>
                </tr>
           </table>   
    </div>
     <?php echo '<pre>' . print_r($_SESSION, TRUE) .'</pre>';?> 
</body>

</html>
