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
<!-- ////////////////////////////////////////////////// -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-8 col-xs-12 col-md-offset-3 col-sm-offset-2">
                <!-- ส่วนที่ทำให้กรอบของ form  อยู่ตรงกลางของหน้าจอ (formสีเขียวทั้งหมด) -->
                <div class="register-form">

                    <form action="registration.php" method="post">
                        <h2 class="text-center">Registration</h2>
                        <p class="hint-text">Create your account. It's free and takes just a minute.</p>
                        <div class="row">
                            <!-- แบ่งแถว -->
                            <div class="col-md-6 col-xs-12">
                                <!-- ส่วนที่ทำให้ form ของ ชื่อ กับ นามสกุล อยู่บรรทัดเดียวกัน -->
                                <div class="form-group">
                                <input type="text" name="username" class="form-control"
                                        placeholder="Enter username"  required="required">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                <input type="email" name="email" class="form-control"
                                        placeholder="email"  required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- แบ่งแถว -->
                            <div class="col-md-6 col-xs-12">
                            <input type="password" name="c" class="form-control"
                                        placeholder="password"  required="required">
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                
                            </div>
                            <div class="col-md-6 col-xs-12">
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                
                            </div>
                            <div class="col-md-6 col-xs-12">
                                
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