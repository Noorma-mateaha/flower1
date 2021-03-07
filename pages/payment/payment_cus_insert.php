<?php	
      ini_set('display_errors', 1);
	 error_reporting(~0);
	
	include('db.php'); 

	// =========================================== upload image ================================================== 
	// upload image
	// $image = $_POST['image'];
	// if(isset($_POST ['insert'])) {
	

	$img = pathinfo(basename($_FILES['pay_image']['name']),PATHINFO_EXTENSION);      	//ดึงนามสกุลของไฟล์ที่เราดึงมา เพื่อเช็คว่านามสกุลอะไร ?
	$new_image_name = 'img_'.time().".".$img;        							  	//ชื่อไฟล์ใหม่ ขึ้นต้นด้วน img_ และทำการสุ่มชื่อด้วย fn uniqid ##new name file ตามด้วยนามสกุลจากตัวแปร ext
	$image_path = "image/";									//กำหนด path upload แล้วเก็บที่ไหนใน project เรา
	$upload_path = $image_path.$new_image_name;										//path ของการ upload

	// uploading   //บรรทัดที่อัฟโหลดไฟล์ image  
	$success = move_uploaded_file($_FILES['pay_image']['tmp_name'],$upload_path);    	//จะ move tmp_name ตรงนี้ในระบบปฏิบัติการของเรา ให้เข้าไปอยู่ในตัว $upload_path
	if ($success == FALSE){
		 echo "Upload รูปภาพไม่สำเร็จ";   
		exit();
	}	
	// =========================================== upload image ================================================== 
	// $sale_id = $_REQUEST["txtid"];
	$sql = "INSERT INTO  payment
                ( 
					-- payment_id,
				  order_product_id,                  
                  payment_date,
				  pay, 
                 pay_image) 

			VALUES  (
					
		 			 '".$_POST["order_product_id"]."',
                     '".$_POST["payment_date"]."',
		             '".$_POST["pay"]."',
                    '".$new_image_name."')";


	$query = mysqli_query($conn,$sql);

	$order_product_id = $_POST["order_product_id"];

	$sql2 = "UPDATE order_product SET order_product.o_status = 'กำลังตรวจสอบ' 
			 WHERE order_product.order_product_id = '$order_product_id'";
	$query2 = mysqli_query($conn,$sql2);

	if($query ) {
		// echo "Record add successfully";
		header( "location:detail_order_cus.php" );
	}

	// if ($conn->query($query) === TRUE) {
	// 	$conn->query($query) === TRUE
	// 	echo "New record created successfully";
	// 	//  echo '<scipt> alert("บันทึกข้อมูลสำเร็จ"); </scipt>';
	// 	 header('location:guide_show.php');
	//   }
// }

	mysqli_close($conn);
?>
