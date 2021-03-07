<?php
include("db.php");

 /////รับtxtid มาจาก form_update บรรทัดที่ 67


            $product_id         = $_REQUEST['txtid'];
            // echo "txtid:".$product_id ;
            $genre_product_id    =$_REQUEST['genre_product_id'];
            $product_name        = $_REQUEST['product_name'];
            $product_price       = $_REQUEST['product_price'];
           
            $sqlimg = "SELECT * FROM product WHERE product_id  = '$product_id'";
            $resultimg = mysqli_query($conn, $sqlimg);
            $pro_img  = mysqli_fetch_array($resultimg,MYSQLI_NUM);
            $filename = $pro_img[0]; 
            
            $img = pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION);      	//ดึงนามสกุลของไฟล์ที่เราดึงมา เพื่อเช็คว่านามสกุลอะไร ?
            $new_image_name = 'img_'.time().".".	$img;        							  	//ชื่อไฟล์ใหม่ ขึ้นต้นด้วน img_ และทำการสุ่มชื่อด้วย fn uniqid ##new name file ตามด้วยนามสกุลจากตัวแปร ext
            $image_path = "image/";									//กำหนด path upload แล้วเก็บที่ไหนใน project เรา
            $upload_path = $image_path.$new_image_name;	

            // uploading   //บรรทัดที่อัฟโหลดไฟล์ image  
            $success = move_uploaded_file($_FILES['image']['tmp_name'],$upload_path);    	//จะ move tmp_name ตรงนี้ในระบบปฏิบัติการของเรา ให้เข้าไปอยู่ในตัว $upload_path
            if ($success == FALSE){
              echo "Upload รูปภาพไม่สำเร็จ";   
              exit();
            }

            $sql = "UPDATE  product 
                    SET 
                        genre_product_id='$genre_product_id',
                        product_id='$product_id',
                        product_name='$product_name', 
                        product_price='$product_price',
                        image='$new_image_name'
                 
            WHERE  product_id='$product_id' ";
            $query = mysqli_query($conn,$sql);


        //   if($conn->query($sql) === TRUE)
        if(mysqli_query($conn,$sql) )
          {
            // echo '<scirpt> alert ("บันทึกข้อมูลสำเร็จ");</scirpt>';
            @unlink('image/'.$filename);
            header ("Location:product_show.php");
          }
          else
          {
            echo  "บันทึกข้อมูลไม่สำเร็จ" .$conn->error;
          }
          mysqli_close($conn);
?>