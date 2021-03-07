<?php
include("db.php");

$user_id = $_REQUEST['txtid']; /////รับtxtid มาจาก form_update บรรทัดที่ 67

//echo  "user_id:".$user_id ;

            $name              = $_REQUEST['name'];
            $lastname         = $_REQUEST['lastname'];
            $sex              = $_REQUEST['sex'];
            $tel              = $_REQUEST['tel'];
            $address          = $_REQUEST['address'];
            $username          = $_REQUEST['username'];
            $password         = $_REQUEST['password'];

            $sql = "UPDATE  login SET 
                                    name='$name ', 
                                    lastname='$lastname' , 
                                    sex='$sex', 
                                    tel='$tel',
                                    address='$address',
                                    username='$username',
                                    password='$password' 
            WHERE user_id='$user_id' ";
            $query = mysqli_query($conn,$sql);

        //   if($conn->query($sql) === TRUE)
        if(mysqli_query($conn,$sql) )
          {
            // echo '<scirpt> alert ("บันทึกข้อมูลสำเร็จ");</scirpt>';
            header ("Location:cus_show.php");
          }
          else
          {
            echo  "บันทึกข้อมูลไม่สำเร็จ" .$conn->error;
          }
          mysqli_close($conn);
      
?>