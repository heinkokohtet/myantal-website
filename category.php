<?php ob_start(); 

session_start();


include("header.php"); 

include('config.php');

?>
<div id="banner1">
	
</div>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" id="carousel">
    <div class="carousel-item active">
      <img src="images/category/banner-3.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/category/banner1.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/category/company-banner.png" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>




<?php 

$result = mysqli_query($conn, "SELECT * FROM jobcategory");

?>

<div class="div-1q col-lg-12 col-md-12 col-sm-12" >

 <div class="container">
  <h1 align="center" id=heading><span>Browse Job By</span> <span id=heading2>Categories</span></h1>
  <div class="row my-5" align="center">

    <?php 

    while($row=mysqli_fetch_assoc($result))
    {
      $jc_id = $row['jc_id'];
      $photo = $row['photo'];
      $jc_name = $row['jc_name'];

      ?>
      
      <div class="col-lg-3 col-md-6 col-sm-12 my-5">

        <button class="button buttonc foo">
          <a href="job_post.php?jc_id=<?php echo $jc_id; ?>">
            
            <img src="jobcategory/photos/<?php echo $photo ?>" width="70px">
          </a>
        </button>

        <h5><?php echo $jc_name; ?></h5>
        



      </div>


      <?php } ?>

    </div>
  </div>
</div>





<?php include("footer.php"); ?>