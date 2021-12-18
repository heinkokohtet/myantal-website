<?php ob_start(); 

session_start(); 

include('config.php');
include("header.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title></title>


  <!------------CSS-------------->
  <link rel="stylesheet" href="css/bootstrapmin.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">


  <!------------JS-------------->
  <script src="js/jquerymin.js"></script>
  <script src="js/poppermin.js"></script>
  <script src="js/bootstrapmin.js"></script>
  <script src="js/custom.js"></script>


  <!------------font-------------->
  <link rel="stylesheet" href="font/fontawesomemin.css">
  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
  <script type="text/javascript">
    $(document).ready(function(){
      $("#heart").click(function(){
        if($("#heart").hasClass("liked")){
          $("#heart").html('<i class="far fa-heart fa-2x"></i></i>');
          $("#heart").removeClass("liked");
        }else{
          $("#heart").html('<i class="fa fa-heart fa-2x" aria-hidden="true"></i>');
          $("#heart").addClass("liked");
        }
      });
    });
  </script>
</head>



<body>
  <!-- <div id="loading">
  <img id="loading-image" src="images/home page/aaa.jpg" alt="Loading..." width="100px" />

</div>    -->

<div id="banner1">


</div>

<?php 

$job_id = $_GET['job_id'];

$result = mysqli_query($conn, "SELECT * FROM job jb, jobcategory jc, jobtype jt, company cp WHERE jb.jc_id = jc.jc_id and jb.jt_id = jt.jt_id and jb.company_id = cp.company_id and jb.job_id = $job_id ORDER BY jb.job_id DESC");


?>

<?php 

while($row=mysqli_fetch_assoc($result))
{ 
  $job_id = $row['job_id'];
  $job_name = $row['job_name'];
  $text = $row['text'];
  $requirement = $row['requirement'];
  $benefit = $row['benefit'];
  $gender = $row['gender'];
  $salary = $row['salary'];
  $region = $row['region'];
  $location = $row['location'];
  $jobfile = $row['jobfile'];
  $jc_id = $row['jc_id'];
  $jc_name = $row['jc_name'];
  $jt_id = $row['jt_id'];
  $jt_name = $row['jt_name'];
  $company_id = $row['company_id'];
  $company_name = $row['company_name'];
  $logo=$row["logo"];
  $email = $row['email'];
  $phone_no = $row['phone_no'];

  $Duration = $row['Duration'];
  $post_date = $row['post_date'];

  ?>


  <div class="container-fluid" id="detail3">
    <div class="row">
      <div class="col-lg-2">
        <img src="company/photo/<?php echo $row['logo'] ?>" class="image" 
        width="150px;" height="150px">
      </div>
      <div class="col-lg-6" id="detail">
        <h3><?php echo $job_name; ?></h3>
        <p><?php echo $company_name; ?></p>
        <div class="row">
          <div class="col-lg-3">
            <i class="far fa-clock " style="color: pink"></i> <?php echo $post_date; ?>
          </div>
          <div class="col-lg-5">
            <i class="fas fa-map-marker-alt" style="color: blue"></i> <?php echo $location; ?>
          </div>
          <div class="col-lg-4">
            <i class="fas fa-hand-holding-usd" style="color: green"></i> Salary|Ks <?php echo $salary; ?>
          </div>
        </div>
      </div>

      <div class="col-lg-1" id="detail1">
        <span id = heart><i class="far fa-heart fa-2x"></i> </span>
      </div>
      <!-- <div class="col-lg-3" id="detail2">
        
        <a href="login.php"><button type="submit" class="btn btn-warning col-lg-5 p-3" style="color: white; font-size: 18px; border-radius: 30px;">Apply Now</button></a>
      </div> -->

      <div class="col-lg-3" id="detail2">
        <a href="usercv.php?job_id=<?php echo $job_id; ?>"><button type="submit" id="btn4">Apply Now</button></a>
      </div>

      
      
    </div>
  </div>
  <div class="container-fluid">
    <hr class="" id="divider3">
  </div>

  <div class="container-fluid" id="c4">
    <div class="row">
      <div class="col-lg-8">
        <div class="card" style="width: auto;" id="card1">
         <div class="card-body">
          <div class="container">
            <h4 class="card-title">Job Description</h4>

            <h6 style="color: grey; text-align: justify;">
              <?php echo $text; ?>
            </h6>

            <br>

            <h4> Job Requirement</h4>
            <h6 style="color: grey; text-align: justify;"><?php echo $requirement; ?></h6>
            
            <h5 style="text-align: left;">Gender</h5>
            <h6 style="text-align: justify;"><?php echo $gender; ?></h6> <br>

            <h5 style="text-align: left;">Benefit</h5>
            <h5 style="text-align: justify;"><?php echo $benefit; ?></h5>



            
            <div class="row">
             <div class="col-lg-4">
              <i class="fas fa-phone fa-2x" style="color: #f9b940"></i><span class="c2"><?php echo $phone_no; ?></span>
            </div>
            <div class="col-lg-5">
              <i class="fas fa-envelope fa-2x" style="color: #f9b940"></i><span class="c2"><?php echo $email; ?></span>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

<?php } ?>



<div class="col-lg-4 col-md-6 col-sm-12 my-3">
  <h4>Related Job</h4>


  <?php 

  $result1 = mysqli_query($conn, "SELECT * FROM job jb, jobcategory jc, jobtype jt, company cp WHERE jb.jc_id = jc.jc_id and jb.jt_id = jt.jt_id and jb.company_id = cp.company_id ORDER BY jb.job_id DESC LIMIT 2");

  while($row1=mysqli_fetch_assoc($result1))
  { 
    $job_id = $row1['job_id'];
    $job_name = $row1['job_name'];


    $jc_id = $row1['jc_id'];
    $jc_name = $row1['jc_name'];

    $jt_id = $row1['jt_id'];
    $jt_name = $row1['jt_name'];

    $company_id = $row1['company_id'];
    $company_name = $row1['company_name'];

    ?>

    <div class="card  text-center " id="card1"style="width: auto; height: auto">
      <div class="card-body">

        <h5 class="card-title" id="imgpadding"><img src="company/photo/<?php echo $row1['logo'] ?>" width="60px"></h5>
        <hr class="" id="divider">
        <h5><?php echo $job_name; ?></h5>
        <h6><?php echo $jt_name; ?></h6>
        <br>
        <a href="job_detail.php?job_id=<?php echo $job_id; ?>" class="btn btn-warning my-4" id="cool"><h4>View More</h4></a>
      </div>
    </div>
    <br>

  <?php } ?>


</div>

</div>
</div>



    <footer>
      
      <div class="footer">
        <div class="container">
          <div class="row" align="center">
            <div class="col-lg-2 col-md-2 col-sm-2" id="foot" >
              <a href="" id="foot1">About us</a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3" id="foot">
              <a href="" id="foot1">How Its Work</a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3" id="foot">
              <a href="" id="foot1">Terms And Conditions</a>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2" id="foot">
              <a href="" id="foot1">Job Seeker Account</a>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2" id="foot">
              <a href="contact.php" id="foot1">Contact Us</a>
            </div>
          </div>
          
          <div>
            <h5 align="center" id="foot2">No.819-B, Marga 10 street, 12th Qr, South Ooakalapa Township</h5>
            <h5 align="center">Yangon, Myanmar</h5>

            <h5 align="center" class= "foot2">09457500118</h5>

            <h5 align="center" class= "foot2">info.myantal@gmail.com</h5>
          </div>
          
        </div>
      </div>
      <div class="footer2">
        <div class="container">
          <div class="row" >
            <div class="col-lg-10 col-md-10 col-sm-10">
              <h5 id="foot3">&copy; <?php echo date("Y") ?> ESCMyanmar All Rights Reserved</h5>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2">
              <i id="foot4" class="fab fa-facebook-square fa-2x "></i>
              <i id="foot4" class="fab fa-instagram fa-2x"></i>
              <i id="foot4" class="fab fa-invision fa-2x"></i>
            </div>
          </div>
        </div>
      </div>

    </footer>
