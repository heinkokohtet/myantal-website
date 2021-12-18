<?php ob_start(); 

session_start();


include("header.php"); 

include('config.php');

?>

<div id="banner1">
</div>
<div class="container" align="center" style="margin-top: 50px">
  <h1>Our Training Center</h1>
  <h5>We Also Provide with these trainings</h5>
</div>
<div class="container" id="training">
  <div class="row">


    <div class="col-lg-12">

      <?php 
      //Pagination
  //To reterive data from data by using limit
      $showRecordPerPage = 9;
      if(isset($_GET['page']) && !empty($_GET['page'])){
        $currentPage = $_GET['page'];
      }else{
        $currentPage = 1;
      }
      $startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
      $totalSQL = "SELECT * FROM training";
      $allResult = mysqli_query($conn, $totalSQL);
      $totaltraining = mysqli_num_rows($allResult);
      $lastPage = ceil($totaltraining/$showRecordPerPage);
      $firstPage = 1;
      $nextPage = $currentPage + 1;
      $previousPage = $currentPage - 1;

      $result = mysqli_query($conn, "SELECT * FROM training ORDER BY t_id DESC LIMIT $startFrom, $showRecordPerPage");

      ?>

      <div class="row">
        <?php 
        while($row=mysqli_fetch_assoc($result))
        {
          $t_id = $row['t_id'];
          $photo = $row['photo'];
          $name = $row['name'];
          
          $link = $row['link']

          ?>
          <div class="col-lg-4 col-md-6 col-sm-12 my-3" style="text-align: center;">
            <div class="card" >
              <div class="card-body">

                <h5 class="card-title">
                	<img src="trainingcenter/photo/<?php echo $photo ?>" width="200px;" height="200px;">
                </h5>

                <h5><?php echo $name; ?></h5>

                <a href="<?php echo $link; ?>" class="btn btn-warning my-4" id="cool">View More</a>
              </div>
            </div>
          </div>

        <?php } ?>



      </div>
    </div>

  </div>
      <!-- start Pagination page -->
    <nav aria-label="Page navigation" style="display: contents;">
      <ul class="pagination justify-content-end">
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
</div>


</body>
<?php include("footer.php"); ?>