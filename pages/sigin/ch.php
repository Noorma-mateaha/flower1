<?php 
session_start();
        // if(isset($_POST['username'])){
				//connection
                include("../libs/db.php");
				//รับค่า user & password
                  $username = $_POST['username'];
                  $password = ($_POST['password']);
				//query  เอาusernameกับPassword มาเช็คว่ามีอยู่ไม่
                  $sql="SELECT * FROM login  WHERE username='".$username."' AND password='".$password."' ";
//  echo $sql;
//  exit;
                  $result = mysqli_query($conn,$sql);
                  
        // 1 หมายถึงUsernameกับPasswordถูกต้อง -----  0 หมายถึงUsernameกับPasswordไม่มีในระบบ
                  //  echo mysqli_num_rows($result);
                  //  exit;

                  if(mysqli_num_rows($result)==1){  
                      $row = mysqli_fetch_array($result);
                      $_SESSION["user_id"] = $row["user_id"];
                      $_SESSION["username"] = $row["name"];
                      $_SESSION["level"] = $row["level"];

                      if($_SESSION["level"]=="A"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page
                         //echo "R U Admin";
                          Header("Location: ../admin/admin.php");
                      }
                      if ($_SESSION["level"]=="M"){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page
                        //echo "R U Member";
                        Header("Location: ../shop/product.php");

                      }
                      if ($_SESSION["level"]=="E"){  //ถ้าเป็น Em ให้กระโดดไปหน้า user_page
                        //echo "R U Member";
                        Header("Location: ../shop/product.php");

                      }
                      
                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";

                  }

        // }else{


        //      Header("Location: login.php"); //user & password incorrect back to login again

        // }
?>