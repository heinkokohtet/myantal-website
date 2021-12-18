<?php ob_start(); 

session_start();

include('config.php');

include('header.php');

?>

<!---Check seesion and company --->
<?php



if(isset($_SESSION['login_company_email']))
{
  if($_SESSION['login_company_email'] =='YES')
  {
    $login_company_email = TRUE;
  }

}else{

  if(!$login_company_email)
  {
    header('Location: company_login.php');
    exit;
  }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Job</title>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

  <style type="text/css">

  #btn1{
    margin-left: 408px;
  }



</style>

</head>

<body>

  <div id="banner2">

    <div class="container" id="navtitle">
      <div class="row justify-content-center text-center">
        <div class="col-8">
          <h1>We Are Here To Help You and Your Company</h1>
        </div>
        <div class="col-10">
          <h4>Post Job And Develop Your Company</h4>

        </div>
      </div>
    </div>
  </div>

  <?php

  $db_company_id = $_SESSION["login_company_id"];

  $db_company_name = $_SESSION["login_company"]["company_name"];

  //echo $db_company_name;

    //echo $_SESSION["login_company_name"];
    //echo $_SESSION["login_company_email"]; 
    //echo "<br>";
    //echo $_SESSION["login_company"]["company_name"];

  ?>


  <!-- logout -->
    <!-- <?php

      if(isset($_POST['LogoutBtn'])){
          session_destroy();
          header('location:company_login.php');
      }

    ?>
    <form action="company.php" method="post">
    <button type="submit" name="LogoutBtn" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to logout?');">Logout</button>
  </form> -->

  
  <div class="container-fluid"> <!-- align="center" -->
    <h3 align="center" id=heading>Post Your Job Here Register</h3><h6 align="center"> Here to Post Your First Job</h6>
    <div class="col-lg-6 col-md-12 col-sm-12 mx-auto">
      <div class="card" style="width: 100%;" id="card1" > <!-- style="margin-left: 270px; margin-right: 270px;" -->
        <div class="card-body">
          <div>

            <form action="company-add.php" method="post" enctype="multipart/form-data">

              <!-- <div class="form-group">
                <label for="inputname"></label>
                <input type="text" class="form" id="inputAddress" placeholder="Company name">
              </div> -->

              <div class="form-group">
                <label for="inputname"></label>

                <select name="company_id" class="form">
                  <option value="<?php echo $db_company_id; ?>"><?php echo $db_company_name; ?></option>
                  
                </select>
              </div>


              <div class="form-group">
                <label for="inputjobname"></label>
                <input type="text" name="job_name" class="form" id="inputPassword4" placeholder="Job Name">

              </div>

              <div class="form-group">
                <label for="inputdescription"></label>
                <textarea id="summernote" name="text" placeholder="Job Description" class="form-control col-sm-8" required=""></textarea>

              </div>


              <div class="form-group">
                <label for="inputrequirement"></label>
                <textarea id="summernote1" name="requirement" class="form-control col-sm-8" placeholder="Job Requirement"required=""></textarea>
              </div>

              <div class="form-group">
                <label for="inputbenefit"></label>
                <textarea id="summernote2" name="benefit" class="form-control col-sm-8" required="" placeholder="Job Benefit"></textarea>
              </div>


              <div class="form-group">
                <label for="inputgender"></label>
                <input type="text" name="gender" class="form" placeholder="eg. Male/Female - 3 Posts" required="">
              </div>

              <div class="form-group">
                <label for="inputsalary"></label>
                <input type="text" name="salary" class="form" placeholder="Enter Salary..." required="">
              </div>

              <div class="form-group">

                <label for="inputregion"></label>
                <input type="text" name="region" class="form" placeholder="Enter Region..." required="">
              </div>

              <div class="form-group">
                <label for="inputlocation"></label>
                <input type="text" name="location" class="form" placeholder="Enter Location..." required="">
              </div>

              <div class="form-group">
                <label for="inputjobcategory"></label>
                <select name="jc_id" class="form">
                  <option value="0">*** Choose Job Category ***</option>
                  <?php  

                  $result1 = mysqli_query($conn, "SELECT * FROM jobcategory");
                  while($row1 = mysqli_fetch_assoc($result1)): ?>
                    <option value="<?php echo $row1['jc_id'] ?>" >
                      <?php echo $row1['jc_name'] ?>
                    </option>
                  <?php endwhile; ?>
                </select>
              </div>

              <div class="form-group">
                <label for="inputjobtype"></label>
                <select name="jt_id" class="form">
                  <option value="0">*** Choose Job Type ***</option>
                  <?php 

                  $result2 = mysqli_query($conn, "SELECT * FROM jobtype");
                  while($row2 = mysqli_fetch_assoc($result2)): ?>
                    <option value="<?php echo $row2['jt_id'] ?>">
                      <?php echo $row2['jt_name'] ?>
                    </option>

                  <?php endwhile; ?>
                </select>
              </div>

              <div align="center">
                <button type="reset" class="btn btn-outline-danger">Cancel</button>
                <button type="submit" class="btn btn-outline-primary">Submit</button>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>


    <?php
  //Pagination
  //To reterive data from data by using limit
    $showRecordPerPage = 5;
    if(isset($_GET['page']) && !empty($_GET['page'])){
      $currentPage = $_GET['page'];
    }else{
      $currentPage = 1;
    }
    $startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
    $totalSQL = "SELECT * FROM job WHERE company_id = $db_company_id";
    $allResult = mysqli_query($conn, $totalSQL);
    $totaljob  = mysqli_num_rows($allResult);
    $lastPage = ceil($totaljob/$showRecordPerPage);
    $firstPage = 1;
    $nextPage = $currentPage + 1;
    $previousPage = $currentPage - 1; 

    $result = mysqli_query($conn, "SELECT * FROM job jb, jobcategory jc, jobtype jt, company cp WHERE jb.jc_id = jc.jc_id and jb.jt_id = jt.jt_id and jb.company_id = cp.company_id and jb.company_id = $db_company_id  ORDER BY jb.job_id DESC LIMIT $startFrom, $showRecordPerPage");

    ?>

    <div class="container-fluid" style="margin-top: 50px;">
      <div class="row">
        <div class="col-sm-12">


          <h4 class="header font-weight-bold text-dark" style="text-align: center;">Job List</h4>
        </div>
      </div>


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
        $logo=$row['logo'];

        $Duration = $row['Duration'];
        $post_date = $row['post_date'];

        $db_company_id = $_SESSION["login_company_id"];
        $db_company = $_SESSION["login_company"];

        ?>

        <div class="card shadow col-sm-12" style="margin-top: 7px;"> <!-- style="width: 18rem;" -->
          <div class="card-body">



            <p class="card-text"><span class="one">Job Name:</span> <?php echo $job_name; ?></p>
            <p class="card-text"><span class="one">Company:</span> <?php echo $company_name; ?></p>

            <span class="one">Job Description:</span><p class="card-text"> <?php echo $text; ?></p>
            <span class="one">Job Requirement:</span><p class="card-text"> <?php echo $requirement; ?></p>
            <span class="one">Benefit:</span><p class="card-text"> <?php echo $benefit; ?></p>

            <div class="row">         
              <p class="card-text col-sm-4"><span class="one">Gender:</span> <?php echo $gender; ?></p>
              <p class="card-text col-sm-4"><span class="one">Salary:</span> <?php echo $salary; ?></p>
              <p class="card-text col-sm-4"><span class="one">Region:</span> <?php echo $region; ?></p>
            </div>

            <div class="row">         
              <p class="card-text col-sm-4"><span class="one">Location:</span> <?php echo $location; ?></p>
              <p class="card-text col-sm-4"><span class="one">Click to download File:</span> <a download="<?php echo $jobfile; ?>" href="./jobFile/<?php echo $jobfile; ?>">
                <?php echo $jobfile; ?>
              </a></p>
              <p class="card-text col-sm-4" value="<?php echo $jc_id; ?>" name="jc_id"><span class="one">Job Category:</span> <?php echo $jc_name; ?></p>
            </div>

            <div class="row">         
              <p class="card-text col-sm-4" value="<?php echo $jt_id; ?>" name="jt_id"><span class="one">Job Type:</span> <?php echo $jt_name; ?></p>
              <p class="card-text col-sm-4"><span class="one">Duration:</span> <?php echo $Duration; ?></p>
              <p class="card-text col-sm-4"><span class="one">Posted Date:</span> <?php echo $post_date; ?></p>
            </div>

            <a href="job-delete.php?job_id=<?php echo $job_id; ?>" onclick="return confirm('Are you sure want to delete?');">
              <button type="button" class="btn btn-outline-danger" id="delete"><i class="fas fa-trash-alt"></i></button>
            </a>

            <a href="job-edit.php?job_id=<?php echo $job_id; ?>">
              <button type="edit" class="btn btn-outline-info" id="edit"><i class="fas fa-edit"></i></button>
            </a>


          </div>

        </div>

      <?php } ?>

      <!-- start Pagination page -->
      <nav aria-label="Page navigation" style="background-color: white;">
        <ul class="pagination justify-content-end" style="margin-top: 15px;">
          <?php if($currentPage != $firstPage) { ?>
            <li class="page-item">
              <a class="page-link" href="?page=<?php echo $firstPage ?>" tabindex="-1" aria-label="Previous">
                <span aria-hidden="true">First</span>     
              </a>
            </li>
          <?php } ?>
          <?php if($currentPage >= 2) { ?>
            <li class="page-item"><a class="page-link" href="?page=<?php echo $previousPage ?>"><?php echo $previousPage ?></a></li>
          <?php } ?>
          <li class="page-item active"><a class="page-link" href="?page=<?php echo $currentPage ?>"><?php echo $currentPage ?></a></li>
          <?php if($currentPage != $lastPage) { ?>
            <li class="page-item"><a class="page-link" href="?page=<?php echo $nextPage ?>"><?php echo $nextPage ?></a></li>
            <li class="page-item">
              <a class="page-link" href="?page=<?php echo $lastPage ?>" aria-label="Next">
                <span aria-hidden="true">Last</span>
              </a>
            </li>
          <?php } ?>
        </ul>
      </nav>
      <!-- end Pagination page -->


      <h3 align="center" style="margin-top: 30px;">Your Job appliers</h3><h6 align="center" id=heading3> Browse your Shortlist candidates</h6>

      <?php 

      $result = mysqli_query($conn, "SELECT * FROM job jb, jobcategory jc, jobtype jt, company cp WHERE jb.jc_id = jc.jc_id and jb.jt_id = jt.jt_id and jb.company_id = cp.company_id and jb.company_id = $db_company_id  ORDER BY jb.job_id DESC");

      /*SELECT COUNT(CustomerName),* FROM Customers
        WHERE Country IN ('Germany');*/


      /*$result = mysqli_query($conn, "SELECT COUNT(uj.user_id) AS applierCount, * FROM job jb, jobcategory jc, jobtype jt, company cp , userjob uj WHERE jb.jc_id = jc.jc_id and jb.jt_id = jt.jt_id and jb.company_id = cp.company_id and jb.company_id = $db_company_id  ORDER BY jb.job_id DESC");
*/
      /*
        $result=mysqli_query($con,"Select count(region.regionID) As regionCount,region.state_name, region.regionID from region JOIN travelplaces WHERE region.regionID=travelplaces.regionID Group By region.regionID;");*/



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
        $logo=$row['logo'];

        $Duration = $row['Duration'];
        $post_date = $row['post_date'];

        $db_company_id = $_SESSION["login_company_id"];
        $db_company = $_SESSION["login_company"];

        ?>

      <div class="kan" align="center">
        <div class="card col-8" style="width:100%" id="card3">
          <div class="card-body" id="someClass">

            <div class="row">

              <div class="img col-lg-1">
                <img src="company/photo/<?php echo $_SESSION["login_company"]["logo"] ?>" class="image" width="90px;" height="90px">

              </div>

              <div class="col-lg-4">
                <h5><?php echo $job_name; ?></h5>
                <p id="fade"><?php echo $jc_name; ?> | <?php echo $jt_name; ?></p>
                <!-- <p id="fade"></p> -->
                <p id="fade"><i class="far fa-calendar-alt " style="color: #f9b940"></i> <?php echo $post_date; ?></p>

              </div>

              <?php 

        
              $result1 = mysqli_query($conn, "SELECT COUNT(user_id) AS applierCount  FROM userjob WHERE job_id IN ($job_id)");

              while($row1=mysqli_fetch_assoc($result1))
              { 
                

              ?>

              <div class="col-lg-4">

                <!-- Job ID: <?php echo $job_id; ?> -->
                <h4><span class="red"><?php echo $row1['applierCount'];?></span><span> appliers</span></h4>

              </div>

              <?php } ?>

              <div class="col-lg-3 my-3">
                <a href="company2.php?job_id=<?php echo $job_id; ?>"><button type="submit" id="btn3">View Detail</button></a>
              </div>

            </div>
          </div>
        </div>


      </div>

      <?php } ?>

    
      <!-- <div classs="form-group" style="margin-bottom: 50px;" align="center">
        <button type="submit" id="btn2">view More</button>
      </div> -->




    </div>

    <script>
      $('#summernote').summernote({
        placeholder: 'Enter Job Description...',
        tabsize: 2,
        height: 200
      });

      $('#summernote1').summernote({
        placeholder: 'Enter Job Requirement...',
        tabsize: 2,
        height: 200
      });

      $('#summernote2').summernote({
        placeholder: 'Enter Benefit...',
        tabsize: 2,
        height: 150
      });
    </script>

  </body>
  </html>

