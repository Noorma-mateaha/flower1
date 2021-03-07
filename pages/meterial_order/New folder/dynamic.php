<?php 
include("../libs/db.php");

// $connect = new PDO("mysql:host=localhost;dbname=jewelry_db", "root", "");
// $connect->exec("set names utf8");

function fill_unit_select_box($conn)
{ 
 $output = '';
 $sql = "SELECT * FROM material ORDER BY material_id ASC";
 $result = $conn->query($sql); 

//  $statement = $connect->prepare($query);
//  $statement->execute();
//  $result = $statement->fetchAll();
//  foreach($result as $key=>$row)

//  foreach($result as $row) 

 foreach($result as $key=>$row)
 {
  $output .= '<option value="'.$row["material_id"].'">'.$row["material_id"].' '.$row["material_name"].'</option>';
 }
 return $output;
}

?>

<html>

<head>
    <!-- *********************************************************************************************************** -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <br />
        <br />
        <h2 align="center">สั่งซื้อวัตถุดิบ</h2>
        <div class="form-group">
            <form name="add_name" id="add_name">
                <!-- -------------------------------Auto Key----------------------------------- -->
                <!-- <?php
                $om_id = 0 ;
                $sql1 =  mysqli_query($conn, "SELECT * FROM oder_meterial ORDER BY om_id DESC LIMIT 1");
                while($row1 = mysqli_fetch_array($sql1)){
                $om_id = $row1['om_id'];
                }
                $om_id += 1 ;
                ?>                           -->
                <!-- ------------------------------------------------------------------------- -->
                <div class="form-group">
                    <label for="om_id">รหัสสั่งซื้อ</label>
                    <input type="text" name="om_id" class="form-control" placeholder="รหัสสั่งซื้อ" />
                </div>
                <p>
                    <label for="date">วันที่สั่งซื้อ</label><input type="date" name="date">
                </p>
                <div class="form-group">
                    <label for="employee_id">ชื่อพนักงาน</label>
                    <input type="text" name="employee_id" class="form-control" placeholder="ชื่อพนักงาน" list='list3'>
                </div>
                <?php $sql = "SELECT * FROM employee"; $result = $conn->query($sql); ?>
                <datalist id='list3'>
                    <?php while($row = mysqli_fetch_assoc($result)) {?>
                    <option
                        value="<?php echo $row["employee_id"]?>&nbsp;&nbsp;&nbsp;-->&nbsp; <?php echo $row["employee_name"]?>">
                    </option>
                    <?php } ?>
                </datalist>

                <label for="supplier_id">ซัพพลายเออร์</label>
                <input autocomplete="off" type="text" name="supplier_id" class="form-control" list='list1' required>
                <?php $sql = "SELECT * FROM supplier"; $result = $conn->query($sql); ?>

                <datalist id='list1'>
                    <?php while($row = mysqli_fetch_assoc($result)) {?>
                    <option
                        value="<?php echo $row["supplier_id"]?>&nbsp;&nbsp;&nbsp;-->&nbsp;<?php echo $row["supplier_name"]?>">
                    </option>
                    <?php } ?>
                </datalist>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dynamic_field">
                        <tr>
                            <th>ชื่อวัตถุดิบ</th>
                            <th>สี</th>
                            <th>ขนาด</th>
                            <th>จำนวน</th><br>
                            <!-- <td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>   -->
                            <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                        </tr>
                    </table>
                    <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
                </div>
            </form>
        </div>
    </div>
</body>

</html>
<script>
$(document).ready(function() {
    var i = 1;
    $('#add').click(function() {
        i++;
        $('#dynamic_field').append('<tr id="row' +i+
            '"><td><input type="text" name="meterial_id[]" id="meterial_id" placeholder="ชื่อวัตถุดิบ" class="form-control name_list"/></td><td><input type="text" name="color[]" id="color" placeholder="สี" class="form-control name_list"/></td><td><input type="text" name="size[]" id="size" placeholder="ขนาด" class="form-control name_list"/></td><td><input type="text" name="amount[]" id="amount" placeholder="จำนวน" class="form-control name_list"/></td><td><button name="remove" id="' 
        +i+ '" class="btn btn-danger btn_remove">X</button></td></tr>');
    });
    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });
    $('#submit').click(function() {
        $.ajax({
            url: "dynamic_name.php",
            method: "POST",
            data: $('#add_name').serialize(), //add_name มาจาก id ใน form
            success: function(data) {
                alert(data);
                $('#add_name')[0].reset();
            }
        });
    });
});
</script>