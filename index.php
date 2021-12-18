<?php ob_start(); 

session_start();


include('config.php');

?>
<style type="text/css">
.bannner{
  background:linear-gradient(to bottom,rgba(250,250,250,0), rgba(250,250,250,0)100%),url(newbanner.jpg);
  background-repeat:no-repeat;
  background-position: center center;
  background-size: cover;
}
</style>

<div id="banner">
<?php include("header.php") ?>
<div class="container" id="navtitle">
      <div class="row justify-content-center text-center">
         <div class="col-8">
          <h1>WE ARE AVALIABLE ON</h1>
          </div>
        <div class="col-10">
          <h1 class="display-2" id="font">MYAN TAL</h1>
          
        </div>
<div class="input-group col-lg-6 my-3">
 <?php
      if(isset($_POST["search_data"]))
      {
        $search_value=$_POST["search_data"];
      }else
      {
        $search_value="";
      }

      ?>
    <form class="form-inline my-2 col-lg-12"  action="job_post.php" method="POST"> 
      <div class="input-group col-lg-12 my-3">
    <input type="search" name="search_data" class="form-control col-lg-11 col-md-11 col-sm-11"  placeholder="Search Job By Name" aria-describedby="button-addon2" value="<?php echo $search_value; ?>">
<div class="input-group-append">
    <button class="btn btn-warning" type="search" id="button-addon2"><i class="fas fa-search"></i></button>
  </div>
    </div>
  </form>


    </div>
          <!-- <div class="mt-4">

            <a href="contact.html"id="contactbtn">Contact Us</a>
          </div> -->

        


      </div>


    </div>
  </div>

<div class="div-1" >
         <div class="container">
          <h1 align="center" id=heading style="padding-bottom: 50px;"><span>Our Top</span> <span id=heading2>Companies</span></h1>
<div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel" style="padding-bottom: 40px;">
        <div class="carousel-inner w-100" role="listbox">
            <div class="carousel-item row no-gutters active">
                <div class="col-2 float-left"><img class="img-fluid" src="images/home page/33.png" width="150px;"></div>
                <div class="col-2 float-left"><img class="img-fluid" src="images/home page/22.png" width="150px;"></div>
                <div class="col-2 float-left"><img class="img-fluid" src="images/home page/55.png" width="150px;"></div>
                <div class="col-2 float-left"><img class="img-fluid" src="images/home page/66.png" width="150px;"></div>
                <div class="col-2 float-left"><img class="img-fluid" src="images/home page/11.png" width="150px;"></div>
                <div class="col-2 float-left"><img class="img-fluid" src="images/home page/44.png" width="150px;"></div>
            </div>
            <div class="carousel-item row no-gutters">
                <div class="col-2 float-left"><img class="img-fluid" src="images/home page/100plus.png" width="150px;"></div>
                <div class="col-2 float-left"><img class="img-fluid" src="images/home page/cmhl.png" width="150px;"></div>
                <div class="col-2 float-left"><img class="img-fluid" src="images/home page/shwelamin.png" width="150px;"></div>
                <div class="col-2 float-left"><img class="img-fluid" src="images/home page/pepsi.png" width="150px;"></div>
                <div class="col-2 float-left"><img class="img-fluid" src="images/home page/pencell.png" width="150px;"></div>
                <div class="col-2 float-left"><img class="img-fluid" src="images/home page/HP.png" width="150px;"></div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

           </div>
         </div>

         <?php 


$result = mysqli_query($conn, "SELECT * FROM job jb, jobcategory jc, jobtype jt, company cp WHERE jb.jc_id = jc.jc_id and jb.jt_id = jt.jt_id and jb.company_id = cp.company_id ORDER BY jb.job_id DESC LIMIT 6");


?>


<div class="container my-5">
 <h2 align="center">Recent Jobs</h2>
 <h4 align="center">Recent Jobs avaliable on our website and take a look at it</h4>

 <div class="row" align="center" id="recent">

  <?php 

  while($row=mysqli_fetch_assoc($result))
  { 
    $job_id = $row['job_id'];
    $job_name = $row['job_name'];


    $jc_id = $row['jc_id'];
    $jc_name = $row['jc_name'];

    $jt_id = $row['jt_id'];
    $jt_name = $row['jt_name'];

    $company_id = $row['company_id'];
    $company_name = $row['company_name'];

    ?>


    <div class="col-lg-4 col-md-6 col-sm-12 my-3">
     <div class="card  text-center " id="card"style="width: 18rem; height: 20rem">
      <div class="card-body">

        <h5 class="card-title"><img src="company/photo/<?php echo $row['logo'] ?>" width="60px" height="60px;"></h5>
        <hr class="" id="divider">
        <h5><?php echo $job_name; ?></h5>

    <!-- <p><span id="fade">Job Category:</span> <?php echo $jc_name; ?></p>
    -->    <p><?php echo $jc_name; ?></p>

    <h6><?php echo $jt_name; ?></h6>
    <a href="job_detail.php?job_id=<?php echo $job_id; ?>" class="btn btn-warning my-4" id="cool">View More</a>
  </div>
</div>
</div>

<?php } ?>

</div>
</div>

<a href="category.php"><h5 align="center" class="my-5">Browse More</h5></a>

<div class="container my-5" id="apply">
 <h3 align="center" class="my-5">How To Apply</h3>
 <h5 align="center">First You Create an Account on Our Website, Fill your CV Form</h5> <h5 align="center">and Then Go to the Next Step </h5>
 <div class="row" align="center" style="padding-top: 90px;">
   <div class="col-lg-4 col-md-12 col-sm-12">
     <h1 style="font-size: 70px; color: #FFC300" >01<img src="images/home page/creategrey.png" width="100px;"></h1>
     <h4>Create An Account</h4>
   </div>
   <div class="col-lg-4 col-md-12 col-sm-12">
     <h1 style="font-size: 70px; color: #FFC300">02<img src="images/home page/jobsearch.png" width="60px;"></h1>
     <h4>Search Job</h4>
   </div>
   <div class="col-lg-4 col-md-12 col-sm-12">
     <h1 style="font-size: 70px; color: #FFC300">03<img src="images/home page/resume.png" width="60px;"></h1>
     <h4>Apply</h4>
   </div>

 </div>
</div>
<!-- <script>
         setTimeout(function() {
    $('#loading-image').fadeOut('fast');
    $('#loading').fadeOut('fast');
}, 1000); // <
</script> -->
 <div class="bannner">
        <div class="container">
          <div class="row" align="center">
            <div class="col-lg-12 col-md-8 col-md-8" style="padding-bottom: 80px;">
              <h2 style="color: black; padding-top: 100px; font-size: 40px;">Its Never Too late To Try</h2>
              <h2  style="color: black; font-size: 40px;">So Apply for your Dream Job Now</h2>
              <button 
              style="  padding:1rem 2.20rem;
                       font-size: 1rem;
                       font-weight: 250;
                       border:white;
                       border-radius:3rem;
                       background-color:#FFC300 ;
                      color:white;"><span style="font-size: 30px;">
                      Create an account</span>
              </button>
            </div>


          </div>
        </div>
      </div>


<?php include("footer.php"); ?>
</body>