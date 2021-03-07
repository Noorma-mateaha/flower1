
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

    <title>ข้อมูลการสั่งซื้อวัตถุดิบ / Ordering raw materials</title>
    
</head>

<body>

    <!-- </?php include('../libs/config.php'); ?> -->

    <div class="contact-section">
        <!-- <div class="containner">  -->

        <h3>ข้อมูลการสั่งซื้อวัตถุดิบ / Ordering raw materials</h3>
        <div class="border-form"></div>
        <form name="add_name" id="add_name" > <!-- action="./?page=test_dnm1" -->

        <?php
                $om_id = 0 ;
                $sql1 =  mysqli_query($conn, "SELECT * FROM order_material ORDER BY om_id DESC LIMIT 1");
                while($row1 = mysqli_fetch_array($sql1)){
                $om_id = $row1['om_id'];
                }
                $om_id += 1 ;
                ?>
                <!-- ======================================= -->
                <label>การสั่งซื้อ</label>
                <input type="text" name="om_id" class="form-control om_id" required value=" <?php echo $om_id; ?>" /><br>
                <!-- ======================================= -->

                <!-- ======================================= -->
                <label>การซัพพลายเออร์</label>
                <input type="text" name="supplier_id" class="form-control supplier_id" required /><br>
                <!-- ======================================= -->

            <table class="table table-dark" id="dynamic_field"> 
                <tr>
                    <th class="text-center">
                        ชื่อวัตถุดิบ
                    </th>
                    <th class="text-center">
                        จำนวน
                    </th>
                    <th class="text-center">
                        น้ำหนักรวม
                    </th>
                    <th class="text-center">
                        ราคา(กรัม)
                    </th>
                    <th class="text-center">
                        ราคารวม
                    </th>
                    <!-- <th><input type="text" name="product_type_name[]" id="product_type_name" plecaholder="Enter Name" class="form-control name" /></th> -->
                    <th><button type="button" name="add" id="add" class="btn btn-success">Add More</button></th>
                </tr>
            </table>
            <input type="button" name="submit" id="submit" value="Submit" class="btn btn-primary" />
        </form>
            
        <!-- ================================================ -->

</body>
</html>

<script>
    $(document).ready(function(){
        var i = 1;
        $('#add').click(function(){
            i++;
            $('#dynamic_field').append('<tr id="row'
            +i+'"><td><select name="raw_material_id[]" class="form-control raw_material_id"><option value="">Select Raw Material </option><?php echo fill_unit_select_box($conn); ?></select></td>'
            // +i+'"><td><input type="text" name="ordering_raw_materials_details_id[]" plecaholder="Ener ordering_raw_materials_details_id" class="form-control name" id="ordering_raw_materials_details_id'
            // +i+'"/></td><td><input type="text" name="raw_material_name[]" plecaholder="Ener raw_material_name" class="form-control name" id="raw_material_name'
            +i+'" /></td><td><input type="number" name="amount[]" placeholder="0" step="0" min="0" max="1000" class="form-control amount" id="amount'
            +i+'" /></td><td><input type="number" name="total_weigth[]" placeholder="0.00" step="0.01" min="0.01" max="1000" class="form-control total_weigth" id="total_weigth'
            +i+'" /></td><td><input type="text" name="price_per_gram[]" placeholder="00.00" class="form-control price_per_gram" id="price_per_gram'
            +i+'" /></td><td><input type="text" name="sum_price[]" placeholder="00.00" class="form-control sum_price" id="sum_price'
            +i+'" /></td><td><button name="remove" id="'+i+'"class="btn btn-danger btn_remove">x</button></td></tr>');
        });
        $(document).on('click','.btn_remove',function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();    
        });

        $('#submit').click(function(){
            $.ajax({
                url:"conn.php",
                method:"POST",
                data:$('#add_name').serialize(),
                success:function(data)
                {
                    alert(data);
                    $('#add_name')[0].reset();
                }
            });
        });
        
    });
</script>
