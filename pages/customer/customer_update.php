<?php
include("db.php");

$customer_id = $_REQUEST['txtid']; /////รับtxtid มาจาก form_update บรรทัดที่ 67

//echo  "user_id:".$user_id ;

            $name             = $_REQUEST['name'];
            $lastname         = $_REQUEST['lastname'];
            $sex              = $_REQUEST['sex'];
            $tel              = $_REQUEST['tel'];
            $address          = $_REQUEST['address'];
            $username         = $_REQUEST['username'];
            $password         = $_REQUEST['password'];

            $sql = "UPDATE  login SET 
                                    customer_name='$name ', 
                                    customer_lastname='$lastname' , 
                                    customer_sex='$sex', 
                                    customer_tel='$tel',
                                    customer_address='$address',
                                    customer_username='$username',
                                    customer_password='$password' 
            WHERE customer_id='$customer_id' ";
            $query = mysqli_query($conn,$sql);

        //   if($conn->query($sql) === TRUE)
        if(mysqli_query($conn,$sql) )
          {
            // echo '<scirpt> alert ("บันทึกข้อมูลสำเร็จ");</scirpt>';
            header ("Location:customer_show.php");
          }
          else
          {
            echo  "บันทึกข้อมูลไม่สำเร็จ" .$conn->error;
          }
          mysqli_close($conn);
      
?>