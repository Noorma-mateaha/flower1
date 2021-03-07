<?php
include("db.php");

$employee_id = $_REQUEST['txtid']; /////รับtxtid มาจาก form_update บรรทัดที่ 67

//echo  "user_id:".$user_id ;

            $name             = $_REQUEST['name'];
            $lastname         = $_REQUEST['lastname'];
            $sex              = $_REQUEST['sex'];
            $tel              = $_REQUEST['tel'];
            $address          = $_REQUEST['address'];
            $username         = $_REQUEST['username'];
            $password         = $_REQUEST['password'];
            $level            = $_REQUEST['level'];

            $sql = "UPDATE  employee SET 
                                    employee_name='$name ', 
                                    employee_lastname='$lastname' , 
                                    employee_sex='$sex', 
                                    employee_tel='$tel',
                                    employee_address='$address',
                                    employee_username='$username',
                                    employee_password='$password',
                                    employee_level='$level' 
            WHERE employee_id='$employee_id' ";
            $query = mysqli_query($conn,$sql);

        //   if($conn->query($sql) === TRUE)
        if(mysqli_query($conn,$sql) )
          {
            // echo '<scirpt> alert ("บันทึกข้อมูลสำเร็จ");</scirpt>';
            header ("Location:employee_show.php");
          }
          else
          {
            echo  "บันทึกข้อมูลไม่สำเร็จ" .$conn->error;
          }
          mysqli_close($conn);
      
?>