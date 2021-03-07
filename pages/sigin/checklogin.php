<?php 
session_start();
        if(isset($_POST['Username'])){
				//connection
                include("../libs/db.php");
				//รับค่า user & password
                  $Username = $_POST['Username'];
                  $Password = md5($_POST['Password']);
				//query  เอาUsernameกับPassword มาเช็คว่ามีอยู่ไม่
                  $sql="SELECT * FROM user 
                  WHERE Username='".$Username."'
                  AND Password='".$Password."' ";
//  echo $sql;
//  exit;
                  $result = mysqli_query($conn,$sql);
                  
        // 1 หมายถึงUsernameกับPasswordถูกต้อง -----  0 หมายถึงUsernameกับPasswordไม่มีในระบบ
                  //  echo mysqli_num_rows($result);
                  //  exit;

                  if(mysqli_num_rows($result)==1){  

                      $row = mysqli_fetch_array($result);

                      $_SESSION["ID"] = $row["ID"];
                      $_SESSION["Username"] = $row["Firstname"]." ".$row["Lastname"];
                      $_SESSION["Userlevel"] = $row["Userlevel"];

                      if($_SESSION["Userlevel"]=="A"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php
                         //echo "R U Admin";
                          Header("Location: ../admin/admin.php");

                      }

                      if ($_SESSION["Userlevel"]=="M"){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php

                        //echo "R U Member";
                        Header("Location: ../shop/show_product_cus.php");

                      }

                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";

                  }

        }else{


             Header("Location: login.php"); //user & password incorrect back to login again

        }
?>