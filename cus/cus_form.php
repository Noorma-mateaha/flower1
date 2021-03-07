<html>

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Mali|Marmelad&display=swap" rel="stylesheet">
    <title>นารีประดิษฐ์</title>
    <script>
    $(document).ready(function() {

    });
    </script>

    <link rel="stylesheet" href="../../css/form_insert_cus.css">
</head>

<body>

    <?php 
    include('../bar/nav_cus.php');    
    ?>
    <div class="wrapper">
        <div class="content">
            <h1>กรอกข้อมูล</h1>
            <p>content</p>
        </div>
        <form action="cus_insert.php" method="post">
            <div class="form">
                <div class="top-form">
                    <div class="inner-form">
                        <div class="label">ชื่อ</div>
                        <input type="text" name="customer_name" class="form-control" placeholder="Enter firstname"
                            required="required">
                    </div>
                    <div class="inner-form">
                        <div class="label">นามสกุล</div>
                        <input type="text" name="customer_lastname" class="form-control" placeholder="Enter lastname"
                            required="required">
                    </div>
                    <div class="inner-form">
                        <div class="label">เพศ</div>
                        <select class="form-control" name="customer_sex" required="required">
                            <option>-</option>
                            <option>ชาย</option>
                            <option>หญิง</option>
                        </select>
                    </div>
                </div>

                <div class="middle-form">
                    <div class="inner-form">
                        <div class="label">เบอร์</div>
                        <input type="text" name="customer_tel" class="form-control" placeholder="Enter tel" required="required">
                    </div>
                </div>
                <div class="bottom">
                    <div class="inner-form">
                        <div class="label">ที่อยู่</div>
                        <input type="text" name="customer_address" class="form-control" placeholder="Enter address"
                            required="required">
                    </div>
                </div>
                <div class="bottom">
                    <div class="inner-form">
                        <div class="label">บัญชีผู้ใช้</div>
                        <input type="text" name="customer_username" class="form-control" placeholder="email" required="required">
                    </div>
                </div>
                <div class="bottom">
                    <div class="inner-form">
                        <div class="label">รหัสผ่าน</div>
                        <input type="text" name="customer_password" class="form-control" placeholder="password"
                            required="required">
                    </div>
                </div><br>

                <button type="submit" class="btn btn-primary" onclick="return confirm('บันทึกข้อมูลสำเร็จ')">บันทึก</button>
                <button type="submit" class="btn2 btn-danger">ยกเลิก </button>
            </div>
        </form>
</body>

</html>