<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>

<?php 
include('db.php'); 

function fill_unit_select_box($conn)
{ 
 $output = '';
 $sql = "SELECT * FROM material ORDER BY material_id ASC";
 $result = $conn->query($sql); 
 

 foreach($result as $key=>$row)
 {
  $output .= '<option value="'.$row["material_id"].'">'.$row["material_id"].' '.$row["material_name"].'</option>';
 }
 return $output;
}

?>

<!-- ================================================================================= -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="style/customerstyle.css">
    <script src="../../assets/jquery/jquery-3.4.1.min.js"></script>
    <script src="../../assets/popper.min.js"></script>

    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>

    <!-- ========================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <!-- ============================ -->

    <title>ข้อมูลการผลิต / Production</title>

    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/favicon.ico">
</head>

<body>

    <div class="contact-section">
        <!-- <div class="containner">  -->

        <h3>ข้อมูลการผลิต / Production</h3>
        <div class="border-form"></div>
        <br>

        <form class="contact-form" name="add_name" id="add_name">

            <!-- ========================================================================================================== -->
            <div class="container-fuit">

                <!-- <a href="ordering_raw_materials-form.php" class="btn btn-info"><i class="fas fa-edit"></i> สั่งซื้อวัตถุดิบ</a>
            <br><br><br> -->

                <div class="row">
                    <div class="col-2">
                        <?php
                        $manufacture_id = 0 ;
                        $sql1 =  mysqli_query($conn, "SELECT * FROM manufacture ORDER BY manufacture_id DESC LIMIT 1");
                        while($row1 = mysqli_fetch_array($sql1)){
                        $manufacture_id = $row1['manufacture_id'];
                        }
                        $manufacture_id += 1 ;
                        ?>

                        <label for="" class="lb">รหัสการผลิต</label>
                        <input type="text" name="manufacture_id" class="contact-form-text" required
                            value="<?php echo $manufacture_id; ?>" />


                    </div>

                    <div class="col">
                        <?php $employee_id = $_SESSION['employee_id']; ?>
                        <label for="employee_id" class="lb">รหัสพนักงาน</label>
                        <input autocomplete="off" type="text" id="inputIsValid " name="employee_id"
                            class="contact-form-text" required value="<?php echo $employee_id; ?>">
                    </div>

                    <div class="col">
                        <?php $order_product_id = $_REQUEST['order_product_id']; ?>
                        <label for="order_product_id" class="lb">รหัสการสั่งทำ</label>
                        <input autocomplete="off" type="text" id="inputIsValid " name="order_product_id"
                            class="contact-form-text" required value="<?php echo $order_product_id; ?>">

                    </div>
                </div>

            </div><br>
            <!-- ========================================================================================================== -->

            <table class="table table-dark" id="dynamic_field">
                <tr>
                    <th class="text-center">
                        ชื่อวัตถุดิบ
                    </th>
                    <th class="text-center">
                        น้ำหนักรวม(กรัม)
                    </th>
                    <th><button type="button" name="add" id="add" class="btn btn-success">+</button></th>
                </tr>
            </table>

            <input type="button" name="submit" id="submit" value="Submit" class="btn btn-primary" />
            <button type="button" class="btn btn-danger" onClick="history.go(-1);"><i class="fas fa-arrow-circle-left">
                    กลับ | Back</i></button>
            <a href="ordering_raw_materials-form.php" class="btn btn-success"><i class="fas fa-edit"></i>
                สั่งซื้อวัตถุดิบ</a><br><br>

        </form>
    </div>

    <?php include('indexmenu.php');  ?>

</body>

</html>

<script>
$(document).ready(function() {
    var i = 1;
    $('#add').click(function() {
        i++;
        $('#dynamic_field').append('<tr id="row' +
            i +
            '"><td><select name="raw_material_id[]" class="form-control raw_material_id"><option value=""> Select Raw Material </option><?php echo fill_unit_select_box($conn); ?></select></td>' +
            i +
            '" /></td><td><input type="number" name="total_weigth[]" placeholder="0.00" step="0.01" min="0.01" max="1000" class="form-control total_weigth" id="total_weigth' +
            i + '" /></td><td><button name="remove" id="' +
            i + '"class="btn btn-danger btn_remove">x</button></td></tr>');

    });
    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });

    $('#submit').click(function() {
        $.ajax({
            url: "production_conn.php",
            method: "POST",
            data: $('#add_name').serialize(),
            success: function(data) {
                alert(data);
                $('#add_name')[0].reset();
            }
        });
    });

});
</script>