<?php session_start();?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Form Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>

<body>

    <form name="frmlogin" method="post" action="login_code.php">
        <p> </p>
        <p><b> Login Form </b></p>
        <p> ชื่อผู้ใช้ :
            <input type="text" id="username" required name="username" placeholder="Username">
        </p>
        <p>รหัสผ่าน :
            <input type="password" id="password" required name="password" placeholder="Password">
        </p>
        <p>
            <button type="submit">Login</button>
            &nbsp;&nbsp;
            <button type="reset">Reset</button>
            <br>
            <div class="form-group">
                    <a href="form_regis.php">REGISTER</a>          
            </div>
        </p>
    </form>
</body>

</html>