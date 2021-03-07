<!DOCTYPE html>
<html lang="en">
<head>
  <title>Signup</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link href="assets/css/jumbotron.css" rel="stylesheet">
</head>

<body>
<style>
/* body {
  background-color: #999966;
} */
body{
  background-color: #eee;
}
.form-signup {
  max-width: 500px;
  padding: 15px;
  margin: 0 auto;
}
</style>
<div class="container">
  <center>
  <h2>Signup</h2>
  <h6 class="card-subtitle mb-2 text-muted">สมัครสมาชิก</h6>
  </center>

  <div class="card form-signup">
  <div class="card-body">
    <div class="card-text">
      <form action="test-register.php" method="POST">
        <div class="form-group">
          <label for="username">ชื่อ</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="name">
          <div class="invalid-feedback"></div>
        </div>
        <div class="form-group">
          <label for="password">นามสกุล</label>
          <input type="text" class="form-control" id="lastname" name="lastname" placeholder="lastname">
          <div class="invalid-feedback"></div>
        </div>
        <div class="form-group">
          <label for="password">ที่อยู่</label>
          <input type="text" class="form-control" id="address" name="address" placeholder="address">
          <div class="invalid-feedback"></div>
        </div>
        <div class="form-group">
          <label for="password">เบอร์โทรศัพท์</label>
          <input type="text" class="form-control" id="tel" name="tel" placeholder="tel">
          <div class="invalid-feedback"></div>
        </div>
        <div class="form-group">
          <label for="email">ชื่อผู้ใช้</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="username" >
          <div class="invalid-feedback"></div>
        </div>
        <div class="form-group">
          <label for="email">รหัสผ่าน</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="password" >
          <div class="invalid-feedback"></div>
        </div>
        <button type="submit" class="btn btn-primary">Sign up</button>

      </br>
      </form>
    </div>
    <hr />
    <!-- <a href="index.php" class="card-link"><i class="fa fa-home" aria-hidden="true"></i> Home</a> &nbsp;&nbsp; | &nbsp;&nbsp; -->
    <a href="login.php" class="card-link"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
  </div>
</div>

</body>
</html>
