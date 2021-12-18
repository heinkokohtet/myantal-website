<?php ob_start(); 

session_start();

?>


<style type="text/css">
  #btregister{
    padding:0.3rem 2.25rem;
    border-radius:3rem;

  }
</style>

<script>
  function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>
<?php include("header.php"); ?>
<div style="background:linear-gradient(to bottom,rgba(250,250,250,0.8), rgba(250,250,250,0.8)100%),url(login_bg.jpg); background-repeat: no-repeat;   background-attachment: fixed;
background-size: cover;  background-size: 100% 100%; ">

<div class="container" id="navtitle" align="center" style="padding-bottom: 60px;">
  <div class="row justify-content-center text-center">
   <div class="card  text-center " style="width:40rem;">
    <div class="card-body">
      <h5 class="card-title">
       <div class="row justify-content-center text-center">
         <div class="col-12 ">
          <h2>Register <span id=heading2>Here</span></h2>
          <h5>Register Here to make your first application of your dream job</h5>
        </div>
      </div>
      <?php 
      $password_error="";
      $email_error="";

      $user_name=$password=$confirm_password=$phone_no="";

      if ($_SERVER['REQUEST_METHOD']=="POST"){

        $user_name=$_POST["user_name"];
        $email = $_POST['email'];
        $password=md5($_POST["password"]);
        $confirm_password=md5($_POST["confirm_password"]);
        $phone_no = $_POST['phone_no'];

        //Check password
        if($password!=$confirm_password){
          $password_error="Password and Confirm Password do not match!";
        }

      // Validate email
        if(filter_var($email, FILTER_VALIDATE_EMAIL)===false) {
          $email_error="Please provide valid email address!";
        }

        if(($password_error=="") AND ($email_error==""))
        {
        //insert into database
        //echo "Insert Ready";

      //Connect with db
          include("config.php");

        // insert register user data to database
          $insert_query=mysqli_query($conn, "INSERT INTO user (user_name, email, phone_no, password, role_id) VALUES ('$user_name', '$email', '$phone_no', '$password', 2)");

          if(!$insert_query)
          {
            echo mysqli_error($conn);
          } else{
            echo "<div class='alert alert-success' role='alert'>Your Registeration is Successful! You can login now !</div>";
            $user_name=$password=$confirm_password=$phone_no="";

            header("Refresh:2;url=login.php");

          }

        }

      }
      ?>
      <div class="col-lg-12 my-5">
        <form action="register.php" method="post">

          <div class="row g-2" align="center">
            <div class="col-md">
              <div class="form-group">
                <input type="text" class="form-control" name="user_name" id="floatingInputGrid" placeholder="Name" required="">

              </div>
            </div>
            <div class="col-md">
              <div class="form-floating">
                <input type="text" name="phone_no" class="form-control" id="floatingPassword" placeholder="Phone xxxxxxxxxxx" maxlength="11"pattern="^\d{11}$" required="">

              </div>
            </div>
          </div>
          <br>
          <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="Email Address"  required="">
            <p class="error" style="color: red"><?php echo $email_error;?></p>
          </div>

          <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required="">
            <span class="error" style="color: red"> <?php echo $password_error;?></span>

          </div>
          <br>
          <div class="form-floating mb-3">
            <input type="password" name="confirm_password" class="form-control" id="floatingInput"  placeholder="Confirm Password" required="">

          </div>
          <div classs="form-group">
            <button type="cancel" id="btregister" class="btn btn-outline-danger">Cancel</button>
            <button type="submit" id="btregister"  class="btn btn-outline-primary">Submit</button>
          </div>
        </form>
        <div class="form-group my-5">
          <label for="vehicle1">Already have an account?</label>

          <a href="login.php"><button id="btregister" class="btn btn-outline-primary">Login</button></a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php include("footer.php"); ?>
