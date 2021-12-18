<?php

session_start();

//include('config.php');

?>

<!---Check seesion and user --->
<?php



if(isset($_SESSION['login_user_email']))
{
  if($_SESSION['login_user_email'] =='YES')
  {
    $login_user_email = TRUE;
  }
 
}else{

  if(!$login_user_email)
  {
    header('Location: login.php');
    exit;
  }

}

?>

<style type="text/css">

.form-control{


}



.btnregister1
{
  padding:0.2rem 2.25rem;
  border-radius:1rem;
  background-color:white;
  color:black;
  font-size: 25px;
  border:1px solid;

}
.btnregister1:hover{
  background-color: #FCF1CB;
}

.btnlogin1{
  padding:0.2rem 2.25rem;
  border-radius:1rem;
  background-color:white;
  color:black;
  font-size: 25px;
  border:1px solid;

}
.btnlogin1:hover{
  background-color: #FCF1CB;
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

<div style="background:linear-gradient(to bottom,rgba(250,250,250,0.8), rgba(250,250,250,0.8)100%),url(profile.png); background-repeat: no-repeat;   background-attachment: fixed;
background-size: cover;  background-size: 100% 100%; ">




<div class="container" id="navtitle" align="center" style="padding-bottom: 60px;">
  <div class="row justify-content-center text-center">
   <div class="card  text-center " id="card"style="width:40rem;">
    <div class="card-body">

      <h5 class="card-title">
       <div class="row justify-content-center text-center" >
         <div class="col-12 " style="padding-bottom: 40px;">
          <h1>Your <span id=heading2>Profile</span></h1>
        
          
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
         <table class="table table-borderless" >

          <tbody>

            <tr>
              <th scope="row"><h5>User ID</h5></th>
              <td><h5 id=heading2><?php echo $_SESSION["login_user"]["user_id"] ?></h5></td>
            </tr>
            <tr>
              <th scope="row"><h5>Name</h5></th>
              <td><h5 id=heading2><?php echo $_SESSION["login_user"]["user_name"] ?></h5></td>

            </tr>
            <tr>
              <th scope="row"><h5>Your CV</h5></th>
              <td><h5 id=heading2><a download="<?php echo $_SESSION["login_user"]["CV"] ?>" href="user/userCV/<?php echo $_SESSION["login_user"]["CV"] ?>">
                      <?php echo $_SESSION["login_user"]["CV"] ?>
                    </a></h5></td>

            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-lg-6">
       <table class="table table-borderless" >

        <tbody>
          <tr>
            <th scope="row"><h5>Email</h5></th>
            <td><h5 id=heading2><?php echo $_SESSION["login_user"]["email"] ?></h5></td>
          </tr>
          <!-- <tr>
            <th scope="row"><h5>Gender</h5></th>
            <td><h5 id=heading2>Female</td>
            </tr> -->
            <tr>
              <th scope="row"><h5>Phone</h5></th>
              <td><h5 id=heading2><?php echo $_SESSION["login_user"]["phone_no"] ?></h5></td>

            </tr>

          </tbody>
        </table>
      </div>



    </div>
  </div>
</div>



</div>
</div>



<?php include("footer.php"); ?>
