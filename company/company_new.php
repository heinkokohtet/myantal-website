<?php 

//include('../config.php'); 

include('../adminheader.php');

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title></title>


</head>

<body>

  <?php 

  $password_error="";
  $email_error="";

  $company_name=$password=$phone_no="";

  if ($_SERVER['REQUEST_METHOD']=="POST")
  {

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

      if($upload)
      {
        echo "<script> alert('The file has been uploaded.'); </script>";
      }
      else {
        echo "<script> alert('Sorry, there was an error uploading your file.'); </script>";
      }
    }

      

        //Check password
      /*if($password!=$confirm_password){
        $password_error="Password and Confirm Password do not match!";
      }*/

      // Validate email
      if(filter_var($email, FILTER_VALIDATE_EMAIL)===false) {
        $email_error="Please provide valid email address!";
      }

      if(($password_error=="") AND ($email_error==""))
      {
        //insert into database
        //echo "Insert Ready";

      //Connect with db
        include("../config.php");

        $encryptPw = md5($password);

        // insert register user data to database

        $insert_query=mysqli_query($conn, "INSERT INTO company (company_name,logo,email,phone_no, password,company_type,company_website,role_id ) VALUES ('$company_name','$logo','$email','$phone_no','$encryptPw','$company_type','$company_website', 3)");

        if(!$insert_query)
        {
          echo mysqli_error($conn);
        } else{
          echo "<div class='alert alert-success' role='alert'>Your Registeration is Successful! You can login now !</div>";
          $company_name=$password=$phone_no="";

          header("location:company_list.php");

        }

      }

    }

    ?>

    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-12">
          <h4 class="header font-weight-bold text-dark"><center>
          Create New Company</center></h4>
        </div>

      </div>

      <div class="row">

        <div class="col-sm-12">

          <a href="company_list.php">
            <button type="button" class="btn btn-outline-primary"><i class="fas fa-fast-backward"></i> Go Back</button>
          </a>
        </div>

      </div>

      <div class="row">
        <div class="col col-sm-6" id="form">

          <form action="company_new.php" method="post" enctype="multipart/form-data">
            <div class="form-group row">
              <label for="company_name" class="col-sm-4 form-label">Company name</label>
              <input type="text" name="company_name" class="form-control col-sm-8" 
              placeholder="Enter Name"
              required="true">
            </div>

            <div class="form-group row">
              <label for="logo" class="col-sm-4 form-label">Logo</label>
              <input type="file" name="logo" class="form-control col-sm-8" 
              required="true">
            </div>

            <div class="form-group row">
              <label for="email" class="col-sm-4 form-label">Email</label>
              <input type="email" name="email" class="form-control col-sm-8" 
              placeholder="email@gmail.com"
              required="true">
            </div>

            <div class="form-group row">
              <label for="phone_no" class="col-sm-4 form-label">Phone No</label>
              <input type="tel" name="phone_no" class="form-control col-sm-8" 
              placeholder="xxxxxxxxxxx" pattern="^\d{11}$" 
              required="true"> <!-- "^\d{3}-\d{3}-\d{4}$" -->
            </div>

            <div class="form-group row">
              <label for="password" class="col-sm-4 form-label"> Password </label>
              <input type="password" name="password" class="form-control col-sm-8" 
              placeholder="Enter Password" pattern=".{8,}" title="8 or more characters ..." 
              required="true">
            </div>

            <div class="form-group row">
              <label for="company_type" class="col-sm-4 form-label"> Company Type </label>
              <input type="text" name="company_type" class="form-control col-sm-8" 
              placeholder="Enter Company_type"
              required="true">
            </div>

            <div class="form-group row">
              <label for="company_website" class="col-sm-4 form-label"> Company_website </label>
              <input type="text" name="company_website" class="form-control col-sm-8" 
              placeholder="Enter company_website"
              required="true">
            </div>

            <!-- <input type="hidden" name="role_id" value=3>
            -->
            <button type="submit" class="btn btn-outline-primary" >Submit</button>
            <button type="reset" class="btn btn-outline-danger">Cancel</button>

          </form>
        </div>
      </div>
    </div>

    

  </body>
  </html>
  <?php include('../adminfooter.php'); ?>