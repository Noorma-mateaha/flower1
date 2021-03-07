<?php 
  include("db.php");
  $sql = "SELECT * FROM product";
  $result= mysqli_query($conn,$sql);
  ?>

<html lang="en">

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
        <link rel="stylesheet" href="style_product.css">
</head>

<body class="wrapper"><br>

    <h1>WELCOME TO </h1><br>
    <h1>SAHAIN ALUMINIUM </h1>
    <p>NBVGFTRREWSAZXVFSSFFETHJOHUFYKUJIFY</p>

    <div class="container">
        <?php
    while($row=mysqli_fetch_array($result)){
    ?>
        <div class="col-md-4">
            <form method="post" action="product.php?action=add&id=<?php echo $row['product_id'];?>"></form>
            <div class="pricing_item">
                <h3 class="text-info">สินค้า :<?php echo $row['product_name'];?> </h3><br>
                <img src="../../img/ประตูบานเลื่อนสี่17900.jpg" width="230" height="170">
                <p class="money"> 17900 ฿ <br>
                    <span>per month</span>
                </p>
                <p>You only live once, but if you “do it right”, “once is enough”.
                    คุณใช้ชีวิตได้เพียงแค่ครั้งเดียว แต่ถ้าใช้อย่างถูกต้อง ครั้งเดียวก็เพียงพอ</p><br>
                <div> <input type="number" name="quantity" min="0" max="100" step="1" value="1"> </div>
                <a href="../shop/shop_form.php" class="btn">สั่งทำ</a>
            </div>

            <div class="pricing_item">
                <h3>ประตูบานเลื่อน</h3><br>
                <img src="../../img/ประตูเลื่อน6750.jpg" width="230" height="170">
                <p class="money"> 6750 ฿ <br>
                    <span>per month</span>
                </p>
                <p>Do it now. Sometimes “later” becomes “never”.
                    จงทำซะตอนนี้ บางครั้งคำว่า “ไว้ทีหลัง” จะกลายเป็นคำว่า “ไม่มีวัน”</p><br>
                <div> <input type="number" name="quantity" min="0" max="100" step="1" value="1"> </div>
                <a href="#" class="btn">สั่งทำ</a>
            </div>

            <div class="pricing_item">
                <h3>หน้าต่างบานกระทุ้ง</h3><br>
                <img src="../../img/หน้าต่างบานกระทุ้ง2400.jpg" width="230" height="170">
                <p class="money"> 2400 ฿ <br>
                    <span>per month</span>
                </p>
                <p>– When nothing is sure, everything is possible.
                    ในเมื่อไม่มีอะไรที่แน่นอน ทุกๆ สิ่งก็เป็นไปได้ทั้งนั้น</p><br>
                <div> <input type="number" name="quantity" min="0" max="100" step="1" value="1"> </div>
                <a href="#" class="btn">สั่งทำ</a>
            </div>

            <div class="pricing_item">
                <h3>หน้าต่างบานช่องแสง</h3><br>
                <img src="../../img/หน้าต่างบานช่องแสง1600.jpg" width="230" height="170">
                <p class="money"> 1600 ฿ <br>
                    <span>per month</span>
                </p>
                <p>Sometimes it”s very hard to move on, but once you move on, you”ll realize it was the best decision
                    you”ve
                    ever made.
                    บางครั้งมันก็เป็นเรื่องยากมากที่จะก้าวเดินต่อไป แต่ถ้าเริ่มก้าวเมื่อใด คุณจะพบว่า
                    มันคือการตัดสินใจที่ดีที่สุด</p><br>
                <div> <input type="number" name="quantity" min="0" max="100" step="1" value="1"> </div>
                <a href="#" class="btn">สั่งทำ</a>
            </div>
        </div>
        </form>
    </div>

    <?php } ?>
    <!-- /สิ้นสุดส่วนที่เป็นหน้าสินค้า -->
</body>

</html>