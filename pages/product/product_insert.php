<?php	
      ini_set('display_errors', 1);
	 error_reporting(~0);
	
	include('db.php'); 

	// =========================================== upload image ================================================== 

	// upload image
	// $image = $_POST['image'];

	$img = pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION);  //ดึงนามสกุลของไฟล์ที่เราดึงมา เพื่อเช็คว่านามสกุลอะไร ?
	$new_image_name = 'img_'.time().".".	$img;     //ชื่อไฟล์ใหม่ ขึ้นต้นด้วน img_ และทำการสุ่มชื่อด้วย fn uniqid ##new name file ตามด้วยนามสกุลจากตัวแปร ext
	$image_path = "image/";							//กำหนด path upload แล้วเก็บที่ไหนใน project เรา
	$upload_path = $image_path.$new_image_name;		//path ของการ upload

	// uploading   //บรรทัดที่อัฟโหลดไฟล์ image  
	$success = move_uploaded_file($_FILES['image']['tmp_name'],$upload_path);//จะ move tmp_name ตรงนี้ในระบบปฏิบัติการของเรา ให้เข้าไปอยู่ในตัว $upload_path
	if ($success == FALSE){
		 echo "Upload รูปภาพไม่สำเร็จ";   
		exit();
	}
	// =========================================== insert data ================================================== 


	$sql = "INSERT INTO product 
                (
				product_name,  
				genre_product_id,
                product_price,
                image 
				) 
		VALUES  (
		'".$_POST["product_name"]."',
		'".$_POST["genre_product_id"]."',
        '".$_POST["product_price"]."',
        '".$new_image_name."')";

	$query = mysqli_query($conn,$sql);

	if($query) {
		echo "Record add successfully";
		header( "location:product_show.php" );
	}
	else{
        echo "Unable to save data";
    }

	mysqli_close($conn);
?>
