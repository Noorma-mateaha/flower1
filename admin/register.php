<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> นารีประดิษฐ์</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        background: url(../../img/glass.jpg);
        background-size: cover;
    }

    /* .container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 700px;
        padding: 40px;
        background: rgb(0, 0, 0, .8);
        box-sizing: border-box;
        box-shadow: 0 15px 25px rgba(0, 0, 0, .5);
        border-radius: 10px;

    }   */

    .register-form {
        margin: 50px auto;
        padding: 25px 20px;
        background: rgb(0, 0, 0, .8);
        box-shadow: 2px 2px 4px #EEEEEE;
        border-radius: 5px;
        color: #fff;
    }

    .register-form h2 {
        margin-top: 0px;
        margin-bottom: 15px;
        padding-bottom: 5px;
        border-radius: 10px;
        border: 1px solid #EEEEEE;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-8 col-xs-12 col-md-offset-3 col-sm-offset-2">
                <!-- ส่วนที่ทำให้กรอบของ form  อยู่ตรงกลางของหน้าจอ (formสีเขียวทั้งหมด) -->
                <div class="register-form">

                    <form action="" method="post">
                        <h2 class="text-center">Registration</h2>
                        <p class="hint-text">Create your account. It's free and takes just a minute.</p>
                        <div class="row">
                            <!-- แบ่งแถว -->
                            <div class="col-md-6 col-xs-12">
                                <!-- ส่วนที่ทำให้ form ของ ชื่อ กับ นามสกุล อยู่บรรทัดเดียวกัน -->
                                <div class="form-group">
                                    <input type="text" name="first_name" class="form-control" placeholder="First Name"
                                        required="required">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <input type="text" name="last_name" class="form-control" placeholder="Last Name"
                                        required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- แบ่งแถว -->
                            <div class="col-md-6 col-xs-12">
                                <!-- ส่วนที่ทำให้ form ของ ชื่อ กับ นามสกุล อยู่บรรทัดเดียวกัน -->
                                <div class="form-group">
                                <select class="form-control" name="sex" class="form-control"  placeholder="sex" 
                                required="required">
                                        <option>sex</option>
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
                                    <input type="email" name="email" class="form-control" placeholder="email"
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
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <a href="formlogin.php" class="btn btn-success btn-block btn-lg">Sign In</a>
                                </div>
                            </div>
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