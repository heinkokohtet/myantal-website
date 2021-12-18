<?php 

//Connect with db
          include("../config.php");


            $name=$_POST["name"];

            $photo=$_FILES["photo"]["name"];
            $photo_size=$_FILES["photo"]["size"];
            $photo_type=$_FILES["photo"]["type"];
            $photo_temp_name=$_FILES["photo"]["tmp_name"];

            $link=$_POST["link"];

            //Upload Photo on server
            $target_dir = "./photo/";
            $target_file = $target_dir . basename($photo);

            if ( $photo_size > 500000) 
              {
                echo "<script> alert('Sorry, your file is too large.'); </script>";
              }

            else if ($photo_type != "image/jpeg") 
              {
                echo "<script> alert('Sorry, only JPG allowed.'); </script>";
                
              }
            else 
              {
                $upload=move_uploaded_file($photo_temp_name, $target_file);

                if($upload){
                  echo "<script> alert('The file has been uploaded.'); </script>";
                }
                else {
                  echo "<script> alert('Sorry, there was an error uploading your file.'); </script>";
                }
          


              // insert data to database
              $insert_query=mysqli_query($conn, "INSERT INTO training (name,photo,link) VALUES ('$name','$photo','$link')");

              if(!$insert_query)
              {
                echo mysqli_error($conn);
              } else{
                echo "Successful!";
                header("location:training_list.php");
              }
            }  

?>