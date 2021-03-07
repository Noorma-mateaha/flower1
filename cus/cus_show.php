<?php
    session_start();

    // check login
// if($_SESSION['status'] != A){
//       echo "<meta http-equiv='refresh' content ='1;URL=logout.php'>"; 
//     } else {
?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ร้านสหายอลูมิเนียมกระจก</title>
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
    <link rel="stylesheet" href="shop_show_cus.css">
</head>

<body>
    <?php 
    include('../bar/nav_cus.php');   
    include("db.php"); 
    ?>
    <?php                          
                include("db.php");

                $user_id = $_SESSION["user_id"];
                $sql = "SELECT * FROM login WHERE user_id = '$user_id' ";
                $query = mysqli_query($conn,$sql);
                $result = $query->fetch_assoc();
        ?>
    <!-- <center><a href="cus_form_update.php?txtid=<?php echo $result['user_id']; ?>"
                class="btn3 btn-warning pull-right"><i class=""></i> แก้ไข</a><br></center> -->
    <!-- <div class="card-body"> -->
    <!-- ************************************************************************************************************ -->
    <br>
    <form action="cus_update.php?txtid=<?php echo $result['user_id']; ?>" methop="post">
        <div class="table-reponsive">
            <br><br>
            <div class="container">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-5" style="background-color:#f4f4f4">
                        <h3 align="center" style="color:green">
                            ข้อมูลส่วนตัว</h3>
                        <div class="form-group">
                            ชื่อ
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="name"
                                    value="<?php   echo $result['name']; ?>" require="" placeholder="ชื่อ" /><br>
                            </div>
                        </div><br>
                        <div class="form-group">
                            นามสกุล
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="lastname"
                                    value=" <?php  echo $result['lastname']; ?>" require="" placeholder="นามสกุล" /><br>
                            </div>
                        </div><br>
                        <div class="form-group">
                            เพศ
                            <div class="col-sm-12">
                                <select type="text" name="sex" class="form-control">
                                    <option><?php echo $result['sex']?></option>
                                    <option class="bg-success"></option>
                                    <option>หญิง</option>
                                    <option>ชาย</option>
                                </select><br>
                            </div><br>
                            <div class="form-group">
                                เบอร์โทร
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="tel"
                                        value="<?php  echo $result['tel']; ?>" require="" placeholder="เบอร์โทร" /><br>
                                </div>
                            </div><br>
                            <div class="form-group">
                                ที่อยู่
                                <div class="col-sm-12">
                                    <input name="address" class="form-control"
                                        value="<?php  echo $result['address']; ?>" require=""
                                        placeholder="ที่อยู่" /><br>
                                </div>
                            </div><br>
                            <div class="form-group">
                                บัญชีผู้ใช้
                                <div class="col-sm-12">
                                    <input name="username" class="form-control"
                                        value="<?php  echo $result['username']; ?>" require=""
                                        placeholder=" บัญชีผู้ใช้" /><br>
                                </div>
                            </div><br><br>
                            <div class="form-group">
                                รหัผ่าน
                                <div class="col-sm-12">
                                    <input name="password" class="form-control"
                                        value="<?php  echo $result['password']; ?>" require=""
                                        placeholder="  รหัผ่าน" /><br>
                                </div>
                            </div><br><br>
                            <center><a onclick="return confirm('คุณต้องการแก้ไขข้อมูลนี้ใช่หรือไม่?')"
                                    class="btn btn-success"><i class=""></i> แก้ไข</a><br></center>
                        </div>

                    </div>

                </div>

                <!-- ************************************************************************************************************* -->


                <?php     
              mysqli_close($conn);
            ?>

            </div>
    </form>
</body>

</html>