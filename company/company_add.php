<?php 

//Connect with db
          include("../config.php");


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
            $role_id=$_POST["role_id"];

            //Upload Photo on server
            $target_dir = "./photo/";
            $target_file = $target_dir . basename($logo);

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
              $insert_query=mysqli_query($conn, "INSERT INTO company (company_name,logo,email,phone_no, password,company_type,company_website,role_id ) VALUES ('$company_name','$logo','$email','$phone_no','$password','$company_type','$company_website','$role_id')");

              if(!$insert_query)
              {
                echo mysqli_error($conn);
              } else{
                echo "Successful!";
                header("location:company_list.php");
              }
            }  
            
          
