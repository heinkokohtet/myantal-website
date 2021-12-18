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

<div id="banner1"></div>

<div class="container" style="padding-top: 80px;">
  <div class="row" style="padding-bottom: 80px;">

    <div class="col-lg-6 col-md-12 col-sm-12">
      <img src="images/office.jpg" width="100%">
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

      $result=mysqli_query($conn,"SELECT * FROM company WHERE email='$email' and password='$pw'");
      $rowcount=mysqli_num_rows($result);
        //echo "result is".$rowcount;

      if($rowcount>0){

        while($row=mysqli_fetch_array($result)) {

          $db_company_id=$row["company_id"];
          $db_company_email=$row["email"];
          $db_role_id=$row[3];
          //$db_company_name=$row["company_name"];
          $db_company = $row;
        }

        $_SESSION["login_company_id"]=$db_company_id;
        $_SESSION["login_company_email"]=$db_company_email;
        $_SESSION["login_company_role"]=$db_role_id;
        //$_SESSION["login_company_name"]=$db_company_name;
        $_SESSION["login_company"]=$db_company;

        header("location:company.php");

      }else{
        echo "<div class='alert alert-danger' role='alert'>Your email and password is incorrect!</div>";

        header("Refresh:3;url=company_login.php");


      }

    }
    
    ?>

    <div class="col-lg-5 col-md-12 col-sm-12">
     <h1>Login To Your Company</h1>
     
     <form action="company_login.php" method="post" enctype="multipart/form-data">
       <div class="form-floating mb-3">
        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="Email Address" >

      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">

      </div>
      <br>
      <div classs="form-group" align="center">
       <button type="submit" id="btregister"  class="btn btn-outline-primary">Login</button>

     </div>
   </form>

 </div>
</div>
</div>


<?php include("footer.php"); ?>