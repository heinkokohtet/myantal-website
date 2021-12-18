<?php ob_start(); 

session_start();


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


<div style="background:linear-gradient(to bottom,rgba(250,250,250,0.8), rgba(250,250,250,0.8)100%),url(usercv.jpg); background-repeat: no-repeat;   background-attachment: fixed;
background-size: cover;  background-size: 100% 100%; ">

<div class="container" id="navtitle" align="center" style="padding-bottom: 60px;">
  <div class="row justify-content-center text-center">
   <div class="card  text-center " style="width:40rem;">
    <div class="card-body">
      <h5 class="card-title">
       <div class="row justify-content-center text-center">
         <div class="col-12 ">
          <h2>CV <span id=heading2>Here</span></h2>
          <h5>CV Here to make your first application of your dream job</h5>
        </div>
      </div>

      <!-- logout -->
    <!-- <?php

      if(isset($_POST['LogoutBtn'])){
          session_destroy();
          header('location:login.php');
      }

    ?>
    <form action="usercv.php" method="post">
    <button type="submit" name="LogoutBtn" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to logout?');">Logout</button>
  </form> -->

  <?php 

       //Connect with db
  include("config.php");


  $db_user_id = $_SESSION["login_user_id"];

  $job_id = $_GET['job_id'];

      //echo $_SESSION["login_user_email"]; 

      //echo  $_SESSION["login_user"]["user_name"];

  if ($_SERVER['REQUEST_METHOD']=="POST"){

    $user_id=$_POST["user_id"];

    $job_id = $_POST['job_id'];

    $CV = $_FILES['CV']['name'];

        // destination of the file on the server
    $destination = 'user/userCV/' . $CV;

        // get the file extension
    $extension = pathinfo($CV, PATHINFO_EXTENSION);

        // the physical file on a temporary uploads directory on the server
    $file = $_FILES['CV']['tmp_name'];
    $size = $_FILES['CV']['size'];

    if (!in_array($extension, ['pdf'])) {
      echo "You file extension must be .pdf";
      } elseif ($_FILES['CV']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
      echo "File too large!";
    } else {
              // move the uploaded (temporary) file to the specified destination
      if (move_uploaded_file($file, $destination)) {


        $sql = mysqli_query($conn, "UPDATE user SET CV = '$CV' WHERE user_id = $db_user_id");

        $one = "INSERT INTO userjob (user_id, job_id) VALUES ($db_user_id, $job_id)";


        
        if (mysqli_query($conn, $one)) {
          
          echo "Successfully!!";
        }
        else{
          echo mysqli_error($conn);
        }


        
      } else {


        echo "Failed to upload file.";
      }


      header('location: index.php');
    }

  }



  ?>



  <div class="col-lg-12 my-5">
    <form action="usercv.php" method="post" enctype="multipart/form-data">



      <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
      <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">


      <div class="form-group row">

        <label for="CV" class="col-sm-6">Upload Your CV(pdf only)</label>
        <input type="file" name="CV" class="form-control col-sm-6" required="true" accept=".pdf"><br> 
      </div>



      <div classs="form-group">
        <button type="cancel" id="btregister" class="btn btn-outline-danger">Cancel</button>
        <button type="submit" id="btregister"  class="btn btn-outline-primary">Submit</button>
      </div>

    </form>
  </div>







</div>
</div>
</div>
</div>

<?php include("footer.php"); ?>
