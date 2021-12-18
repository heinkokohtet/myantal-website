<?php

	include('../config.php');

            $company_id=$_POST['company_id'];
            $company_name=$_POST["company_name"];

            $logo=$_FILES["logo"]["name"];
            $photo_size=$_FILES["logo"]["size"];
            $photo_type=$_FILES["logo"]["type"];
            $photo_temp_name=$_FILES["logo"]["tmp_name"];

            $email=$_POST["email"];
            $phone_no=$_POST["phone_no"];
            $password=$_POST["password"];
            $company_type=$_POST["company_type"];
            $company_website=$_POST["company_website"];
            //$role_id=$_POST["role_id"];

            //Upload Photo on server
            $target_dir = "./photo/";
            $target_file = $target_dir . basename($logo);

            if($logo)
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

                    $update_query=mysqli_query($conn, "UPDATE company SET company_name='$company_name',logo='$logo' ,email='$email', phone_no='$phone_no', password='$password', company_type='$company_type', company_website='$company_website' WHERE company_id='$company_id'");

                    if(!$update_query)
                    {
                      echo mysqli_error($conn);
                    } else{
                      echo "Successful!";
                      header("location:company_list.php");
                    }
                  }
                  else {
                    
                    echo "Sorry, there was an error uploading your file.";
                  }
                }
            }
            else 
            {
              
              $update_query=mysqli_query($conn, "UPDATE company SET company_name='$company_name',email='$email', phone_no='$phone_no', password='$password', company_type='$company_type', company_website='$company_website' WHERE company_id='$company_id'");

                if(!$update_query)
                {
                  echo mysqli_error($conn);
                } else{
                  echo "Successful!";
                  header("location:company_list.php");
                }      
            }

          