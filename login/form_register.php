<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> ร้านสหายอลูมิเนียมกระจก</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="regis.css">
</head>

<body>

<?php 

include ("db.php");
///ทำการเช็ค เมื่อสมัคร

if(isset($_REQUEST['Username'])){
    //removes backslahes
    $Username = stripslashes($_REQUEST['Username']);
    //เป็นการป้องกันตัวอักษรพิเศษในstring
    $Username = mysqli_real_escape_string($conn,$Username);
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($conn,$username);
    $Password = stripslashes($_REQUEST['Password']);
    $Password = mysqli_real_escape_string($conn,$Password);
    $name = stripslashes($_REQUEST['name']);
    $name = mysqli_real_escape_string($conn,$name);
    $Lastname = stripslashes($_REQUEST['Lastname']);
    $Lastname = mysqli_real_escape_string($conn,$Lastname);

    $query = "INSERT INTO user(Username, username, Password, name, Lastname)
                VALUE('$Username ','$username','".md5($Password)."','$name','$Lastname',)";
               
               $result = mysqli_query($conn, $query);

               if($result){
                   echo "Register successfully <br> Click here to <a href='login.php'>Login</a>";
               
                }else{

                }
}
?>
<!-- ////////////////////////////////////////////////// -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-8 col-xs-12 col-md-offset-3 col-sm-offset-2">
                <!-- ส่วนที่ทำให้กรอบของ form  อยู่ตรงกลางของหน้าจอ (formสีเขียวทั้งหมด) -->
                <div class="register-form">

                    <form action="register.php" method="post">
                        <h2 class="text-center">Registration</h2>
                        <p class="hint-text">Create your account. It's free and takes just a minute.</p>
                        <div class="row">
                            <!-- แบ่งแถว -->
                            <div class="col-md-6 col-xs-12">
                                <!-- ส่วนที่ทำให้ form ของ ชื่อ กับ นามสกุล อยู่บรรทัดเดียวกัน -->
                                <div class="form-group">
                                <input type="text" name="customer_name" class="form-control"
                                        placeholder="Enter firstname"  required="required">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                <input type="text" name="customer_surname" class="form-control"
                                        placeholder="Enter lastname"  required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- แบ่งแถว -->
                            <div class="col-md-6 col-xs-12">
                                <!-- ส่วนที่ทำให้ form ของ ชื่อ กับ นามสกุล อยู่บรรทัดเดียวกัน -->
                                <div class="form-group">
                                <select class="form-control" name="sex"  required="required">
                                        <option>-</option>
                                        <option>ชาย</option>
                                        <option>หญิง</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <input type="text" name="tel" class="form-control" placeholder="Phone Number"
                                        required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <input type="text" name="address" class="form-control" placeholder="Address"
                                        required="required">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Example@domain.com"
                                        required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password"
                                        required="required">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <input type="password" name="confirm_password" class="form-control"
                                        placeholder="confirm Password" required="required">
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" required="required"> You agree to the <a href="#">Terms</a> &
                                <a href="#">Conditions</a>.
                            </label>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <input type="submit" value="Register" class="btn btn-primary btn-block btn-lg"
                                        tabindex="7">
                                </div>
                            </div>
                            <!-- <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <a href="formlogin.php" class="btn btn-success btn-block btn-lg">Sign In</a>
                                </div>
                            </div> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>