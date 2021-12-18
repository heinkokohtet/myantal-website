<?php

	include('../config.php');

            $t_id=$_POST['t_id'];
            $name=$_POST["name"];

            $photo=$_FILES["photo"]["name"];
            $photo_size=$_FILES["photo"]["size"];
            $photo_type=$_FILES["photo"]["type"];
            $photo_temp_name=$_FILES["photo"]["tmp_name"];

            $link=$_POST["link"];

            //Upload Photo on server
            $target_dir = "./photo/";
            $target_file = $target_dir . basename($photo);

            if($photo)
            {
              if ( $photo_size > 500000) 
                {
                  echo "Sorry, your file is too large.";
                }

              else if ($photo_type != "image/jpeg") 
                {
                  echo "Sorry, only JPG allowed.";
                  
                }
              else
                {
                  $upload=move_uploaded_file($photo_temp_name, $target_file);

                  if($upload) {
                    echo "The file has been uploaded.";

                    $update_query=mysqli_query($conn, "UPDATE training SET name='$name',photo='$photo' , link='$link'WHERE t_id='$t_id'");

                    if(!$update_query)
                    {
                      echo mysqli_error($conn);
                    } else{
                      echo "Successful!";
                      header("location:training_list.php");
                    }
                  }
                  else {
                    
                    echo "Sorry, there was an error uploading your file.";
                  }
                }
            }
            else 
            {
              
              $update_query=mysqli_query($conn, "UPDATE training SET name='$name', link='$link' WHERE t_id='$t_id'");

                if(!$update_query)
                {
                  echo mysqli_error($conn);
                } else{
                  echo "Successful!";
                  header("location:training_list.php");
                }      
            }

          