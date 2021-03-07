
<?php
//insert.php;

if(isset($_POST["meterial_id"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=aluminium", "root", "");
//  $order_id = uniqid(); 
 for($count = 0; $count < count($_POST["meterial_id"]); $count++)
 {  
    $query = "INSERT INTO order_meterial
    (employee_id, supplier_id, date) 
    VALUES (:employee_id, :supplier_id, :date)
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
     array(
      ':employee_id'   => $_POST["employee_id"], 
      ':supplier_id'  => $_POST["supplier_id"], 
      ':date' => $_POST["date"][$count]
     )
    );

    $query = "INSERT INTO order_details_meterial
    (meterial_id, color, size, amount) 
    VALUES (:meterial_id, :color, :size, :amount)
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
    array(
        ':meterial_id'   => $_POST["meterial_id"][$count], 
        ':color'  => $_POST["color"][$count], 
        ':size' => $_POST["size"][$count], 
        ':amount'  => $_POST["amount"][$count]
    )
    );
 }
 $result = $statement->fetchAll();
 if(isset($result))
 {
  echo 'บันทึกเสร็จสื้น';
 }
}else{
    echo 'กรุณาใส่ข้อมูล';
}
?>
