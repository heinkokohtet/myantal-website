<?php ob_start(); 

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title></title>


  <!------------CSS-------------->
  <link href="../css/admin.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/myantalstyle.css">  

  <!------------font-------------->
  <link rel="stylesheet" href="../font/fontawesomemin.css">
  <script src="../font/ajaxfontawesomemin.js"></script>
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <style type="text/css">
    #card {
      margin-top:70px;
    }
  </style>

</head>

<body>
  <div class="container-fluid">

     <!--login--->
      <?php 

      if ($_SERVER['REQUEST_METHOD']=="POST"){

        $admin_name=$_POST["admin_name"];
        $pw=$_POST['password'];

        /*echo "admin name is".$admin_name;
        echo "password is".$pw;
*/
        //Connect with db
        include('../config.php');

      //Check admin_name and Password
      $result=mysqli_query($conn,"SELECT * FROM admin WHERE admin_name='$admin_name' and password='$pw'");

      $rowcount=mysqli_num_rows($result);
      /*echo "result is".$rowcount;*/

        if($rowcount>0){

            while($row=mysqli_fetch_array($result)) {

              $db_admin_id=$row["admin_id"];
              $db_admin_name=$row["admin_name"];
              $db_role_id=$row[1];
            }

          $_SESSION["login_admin_id"]=$db_admin_id;
          $_SESSION["login_admin_name"]=$db_admin_name;
          $_SESSION["login_admin_role"]=$db_role_id;
          header("location:../dashboard.php");

        }else{
          
          echo "<div class='alert alert-danger' role='alert'>username and password is incorrect!</div>";
          header("Refresh:2;url=amlogin.php");

        }

      }
      
      ?>


   <!--login form--->
   <div class="row justify-content-center">
    <div class="col-lg-4" id=card>
      <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header justify-content-center">
          <h3 class="font-weight-light my-2"><center style="color: #0069d9;">MyanTal Login</center></h3>
        </div>

        <div class="card-body">

          <form action="amlogin.php" method="POST">
            <div class="form-group">
              <label class="small mb-1" for="name" style="color: black;">User Name:</label>
              <input type="text" name="admin_name" class="form-control rounded-pill" placeholder="Enter Name"required="true">
            </div>

            <div class="form-group">
              <label class="small mb-1" for="inputPassword" style="color: black;">Password:
              </label>
              <input type="password" name="password" class="form-control rounded-pill" placeholder="Enter password" required="true">
            </div>

            <input class="btn btn-md btn-outline-primary btn-block rounded-pill" type="submit" value="Login" name="login" >

            <!--<button class="btn btn-primary rounded-pill" type="submit">Login</button>-->
          </form>
        </div>
      </div>
    </div>
  </div>     
</div> 


</body>
</html>







