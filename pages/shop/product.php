<?php 
  include("db.php");
  error_reporting(error_reporting() & ~E_NOTICE);
  ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
    <link rel="stylesheet" href="style_product.css">
    <title>นารีประดิษฐ์</title>
    <?php 
    include('../bar/nav_cus.php');    
    ?>
</head>
<br><br><br>
<body class="wrapper">
    <div class="pricing_wrapper">
    <?php                             
        $sql = "SELECT * FROM product
        INNER JOIN genre_product ON product.genre_product_id = genre_product.genre_product_id  
        ";
        $query = mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){
    ?>
        <form method="post" action="product_add.php?action=add&id=<?php echo $row['product_id'];?>">
                <div class="pricing_item"> 
                    <h4 >รูปแบบสินค้า :<br><?php echo $row['product_name'];?><?php echo $row['stylepro_name'];?> </h4><br>
                    <h4>ประเภท :<?php echo $row['genre_product_name'];?>  </h4>
                    <img src="../product/image/<?php echo $row["image"];?>" width="200px" height="200px" ?><br>
                    <p class="money"><?php echo number_format($row['product_price'],2);?>฿ <br></p>
                    

                    <h5>จำนวน<input type="number" name="quantity" class="form-control" value="1" /></h5>
                    <input type="hidden" name="product_name" value="<?php echo $row['product_name'];?>" />
                    <input type="hidden" name="product_id" value="<?php echo $row['product_id'];?>" />
                    <input type="hidden" name="product_price" value="<?php echo $row['product_price'];?>" />
                    <input type="hidden" name="genre_product_name" value="<?php echo $row['genre_product_name'];?>" /><br>
                     <input type="submit" name="add_product" stylepro="margin-top:5px;" class="btn btn-info"
                        value="สั่งทำ"> 
                </div>
           
        </form>
    <?php } ?>
    </div>
</body>

</html>