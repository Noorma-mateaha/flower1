<?php
include("db.php");

 /////รับtxtid มาจาก category_form_update 

//echo  "category_id:".$category_id ;

            $genre_product_id    = $_REQUEST['txtid'];
            $genre_product_name  = $_REQUEST['genre_product_name'];
    
            $sql = "UPDATE genre_product 
                    SET genre_product_id='$genre_product_id ',
                        genre_product_name='$genre_product_name'
                    WHERE genre_product_id='$genre_product_id' ";

            $query = mysqli_query($conn,$sql);

        //   if($conn->query($sql) === TRUE)
        if(mysqli_query($conn,$sql) )
          {
            //echo '<scirpt> alert ("บันทึกข้อมูลสำเร็จ");</scirpt>';
            header ("Location:genre_show.php");
          }
          else
          {
            echo  "บันทึกข้อมูลไม่สำเร็จ" .$conn->error;
          }
          mysqli_close($conn);
      
?>