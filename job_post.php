<?php  

ob_start(); 

session_start();

include("header.php");

include('config.php');

?>

<script type="text/javascript">
  $(document).ready(function(){
    $("#heart").click(function(){
      if($("#heart").hasClass("liked")){
        $("#heart").html('<i class="far fa-heart"></i></i>');
        $("#heart").removeClass("liked");
      }else{
        $("#heart").html('<i class="fa fa-heart" aria-hidden="true"></i>');
        $("#heart").addClass("liked");
      }
    });
  });


  $(document).ready(function(){
    $("#heart1").click(function(){
      if($("#heart1").hasClass("liked")){
        $("#heart1").html('<i class="far fa-heart"></i></i>');
        $("#heart1").removeClass("liked");
      }else{
        $("#heart1").html('<i class="fa fa-heart" aria-hidden="true"></i>');
        $("#heart1").addClass("liked");
      }
    });
  });
  $(document).ready(function(){
    $("#heart2").click(function(){
      if($("#heart2").hasClass("liked")){
        $("#heart2").html('<i class="far fa-heart"></i></i>');
        $("#heart2").removeClass("liked");
      }else{
        $("#heart2").html('<i class="fa fa-heart" aria-hidden="true"></i>');
        $("#heart2").addClass("liked");
      }
    });
  });
  $(document).ready(function(){
    $("#heart3").click(function(){
      if($("#heart3").hasClass("liked")){
        $("#heart3").html('<i class="far fa-heart"></i></i>');
        $("#heart3").removeClass("liked");
      }else{
        $("#heart3").html('<i class="fa fa-heart" aria-hidden="true"></i>');
        $("#heart3").addClass("liked");
      }
    });
  });
</script>
<div class="container" id="navtitle">
  <div class="row justify-content-center text-center">
   <div class="col-lg-12">
    <h1 id="job" align="center">Browse Jobs </h1>

  </div>
</div>
<div class="row">
  

  <?php 

  if(isset($_POST["search_data"])) {

    ?>

    
    <div class="col col-sm-9">
      <?php

      $search_value=$_POST["search_data"];


      //Write a query
      $result=mysqli_query($conn,"SELECT * FROM job WHERE job_name LIKE '%$search_value%'");

      //count data
      $row_count = mysqli_num_rows($result);
      
      if($row_count>0){
        echo "<div class='alert alert-primary' role='alert'>
        About $row_count result! </div>";

        while ($row=mysqli_fetch_array($result)){


          $job_id=$row['job_id'];
          $job_name=$row['job_name'];
          $post_date=$row['post_date'];


          ?>

          <div class="kan">
            <div class="card" id="card3" style="width: 100%;">
              <div class="card-body" id="someClass">

                <div class="row">

                  <div class="col-lg-6">  
                    <h5><?php echo $job_name; ?></h5>
                  </div>

                  <div class="col-lg-4">
                    <small><?php echo $post_date; ?></small>
                  </div>

                  <div class="col-lg-2">
                    <a href="job_detail.php?job_id=<?php echo $job_id; ?>" class="btn btn-warning" id="cool">View More</a>
                  </div>

                </div>

              </div>
            </div>
          </div>

        <?php } 


      }else{
        echo "<div class='alert alert-danger' role='alert'>
        There is no data to display! </div>";
      }

      ?>



    </div>


  </div>

</div>




<?php }else{

  ?>


  <?php


  $jc_id = $_GET['jc_id'];

  

   //Pagination
  //To reterive data from data by using limit
      $showRecordPerPage = 1; //15
      if(isset($_GET['page']) && !empty($_GET['page'])){
        $currentPage = $_GET['page'];
      }else{
        $currentPage = 1;
      }
      $startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
      $totalSQL = "SELECT * FROM job WHERE jc_id = $jc_id";
      $allResult = mysqli_query($conn, $totalSQL);
      $totaltraining = mysqli_num_rows($allResult);
      $lastPage = ceil($totaltraining/$showRecordPerPage);
      $firstPage = 1;
      $nextPage = $currentPage + 1;
      $previousPage = $currentPage - 1;
      //pagination end

      

      $result1 = mysqli_query($conn, "SELECT * FROM jobcategory WHERE jc_id = $jc_id");
      $row1 = mysqli_fetch_assoc($result1);
      $jc_id = $row1['jc_id'];
      $jc_name = $row1['jc_name'];


      $result = mysqli_query($conn, "SELECT * FROM job jb, jobcategory jc, jobtype jt, company cp WHERE jb.jc_id = jc.jc_id and jb.jt_id = jt.jt_id and jb.company_id = cp.company_id and jb.jc_id = $jc_id ORDER BY jb.job_id DESC LIMIT $startFrom, $showRecordPerPage");


      ?>



      <div class="col-lg-12 col-md-6 col-sm-6">



        <h4 id="job2" name="jc_id" value="<?php echo $jc_id; ?>" style="text-align: center;">Job Category/ <?php echo $jc_name; ?></h4>

        <!-- <a href="?jc_id=<?php echo $row1['jc_id'] ?>" value="<?php echo $row1['jc_id'] ?>"><?php echo $jc_id; ?> | <?php echo $jc_name; ?></a> -->
        
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
          $logo=$row["logo"];


          $post_date = $row['post_date'];

          ?>

          

          <div class="kan">
            <div class="card" style="width:100% "    id="card3">
              <div class="card-body" id="someClass">

                <div class="row">
                  <div class="img col-lg-1">

                    <img src="company/photo/<?php echo $row['logo'] ?>"  class="image" width="60px;" height="60px"> 
            <!--  <div class="middle">
                    <div class="text">View Detail</div>
                  </div>
                --> </div>



                <div class="col-lg-4">

                  <h5><?php echo $job_name; ?></h5>

                  <!-- Testing -->
                  <!-- <p><span id="fade">Job Category:</span> <?php echo $jc_name; ?></p> -->

                  <p id="fade"><?php echo $jt_name; ?></p>
                </div>
                <div class="img col-lg-1">
                  <i class="far fa-calendar-alt fa-2x" style="color: #f9b940"></i>
                </div>
                <div class="col-lg-2">
                  <p class="calendar"><?php echo $post_date; ?></p>
                </div>
                <div class="col-lg-1">
                  <span id = heart><i class="far fa-heart"></i> </span>

                </div>
                <div class="col-lg-3">
                  <a href="job_detail.php?job_id=<?php echo $job_id; ?>">
                    <button type="submit" id="btn3">View Detail</button>
                  </a>
                </div>


              </div>
            </div>
          </div>
        </div>

      <?php } ?>


    </div>
  </div>

  <!-- <?php echo $row1['jc_id']; ?> and <?php echo $row1['jc_name']; ?> -->

  <!-- start Pagination page -->
  <nav aria-label="Page navigation" style="background-color: white;">
    <ul class="pagination justify-content-end">
      <?php if($currentPage != $firstPage) { ?>
        
        <li class="page-item">
          <a class="page-link" href="?jc_id=<?php echo $row1['jc_id']; ?>&page=<?php echo $firstPage ?>" tabindex="-1" aria-label="Previous">
            <span aria-hidden="true">First</span>     
          </a>
        </li>
        
      <?php } ?>
      <?php if($currentPage >= 2) { ?>
        
        <li class="page-item"><a class="page-link" href="?jc_id=<?php echo $row1['jc_id']; ?>&page=<?php echo $previousPage ?>"><?php echo $previousPage ?></a></li>
        
      <?php } ?>
      
      <li class="page-item active"><a class="page-link" href="?jc_id=<?php echo $row1['jc_id']; ?>&page=<?php echo $currentPage ?>"><?php echo $currentPage ?></a></li>
      
      <?php if($currentPage != $lastPage) { ?>
        
        <li class="page-item"><a class="page-link" href="?jc_id=<?php echo $row1['jc_id']; ?>&page=<?php echo $nextPage ?>"><?php echo $nextPage ?></a></li>
        
        
        <li class="page-item">
          <a class="page-link" href="?jc_id=<?php echo $row1['jc_id']; ?>&page=<?php echo $lastPage ?>" aria-label="Next">
            <span aria-hidden="true">Last</span>
          </a>
        </li>
        
      <?php } ?>
    </ul>
  </nav>
  <!-- end Pagination page -->


  
</div>

?>
<?php }

?>





<?php include("footer.php"); ?>