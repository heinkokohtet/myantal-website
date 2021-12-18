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
    var x = document.getElementById("floatingPassword");
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
        <h5 class="card-title"></h5>
        <div class="row justify-content-center text-center">
          <div class="col-8 ">
            <h3>Login to Your <span id=heading2>Profile</span></h3>
          </div>
        </div>

        <!--login--->
        <?php 

        if ($_SERVER['REQUEST_METHOD']=="POST"){

          $email=$_POST["email"];
          $pw=md5($_POST["password"]);

        //echo "User email is".$email;
        //echo "Password is".$pw;

        //Connect with db
          include("config.php");
        //Check Username and PW
          $result=mysqli_query($conn,"SELECT * FROM user WHERE email='$email' and password='$pw'");
          $rowcount=mysqli_num_rows($result);
        //echo "result is".$rowcount;

          if($rowcount>0){

            while($row=mysqli_fetch_array($result)) {

              $db_user_id=$row["user_id"];
              $db_user_email=$row["email"];
              $db_role_id=$row[2];
              $db_user = $row;
            }

            $_SESSION["login_user_id"]=$db_user_id;
            $_SESSION["login_user_email"]=$db_user_email;
            $_SESSION["login_user_role"]=$db_role_id;
            $_SESSION["login_user"] = $db_user;
            
            header("location:category.php");

          }else{
            echo "<div class='alert alert-danger' role='alert'>Your email and password is incorrect!</div>";
            header("Refresh:3;url=login.php");


          }

        }
        
        ?>

        <!--login Form-->

        <div class="col-lg-12 my-5">
          <form action="login.php" method="post">

            <div class="form-floating mb-3 ">
              <input type="email" name="email" class="form-control" id="floatingInput" placeholder="Enter Email Address"  required="">


            </div>
            <div class="form-floating">
              <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required=""><span><i class="far fa-eye-slash" onclick="myFunction()"></i></span>


            </div>
            
            <div classs="form-group">
              <button type="cancel" id="btregister" class="btn btn-outline-danger">Cancel</button></a>
              <button type="submit" id="btregister"  class="btn btn-outline-primary">Login</button>
            </div>
            
          </form>
          <div class="form-group my-5">
            <label for="vehicle1"> Don't have an account?</label><br>
            
            <a href="register.php"><button id="btregister" class="btn btn-outline-primary">Register</button></a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

</div>

<?php include("footer.php"); ?>