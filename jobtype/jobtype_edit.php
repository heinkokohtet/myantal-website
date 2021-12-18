<?php include('../adminheader.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title></title>


</head>

<body>
	<div class="container-fluid">
    <div class="row">

      <div class="col-sm-12">
        <h4 class="header font-weight-bold text-dark"><center>
        Update Job Type</center></h4>
      </div>

    </div>

      <div class="row">

      <div class="col-sm-12">

        <a href="jobtype_list.php">
          <button type="button" class="btn btn-outline-primary"><i class="fas fa-fast-backward"></i> Go Back</button>
        </a>
      </div>

    </div>

	  <div class="row">
  		<div class="col col-sm-6" id="form" style="margin-top: 30px;">

  			<?php 


          //connect with database
          include("../config.php");

          //GET ID from URL
          $jt_id=$_GET["jt_id"];

           

          //GET data from database
          $result=mysqli_query($conn,"Select * from jobtype where jt_id=$jt_id");

          while ($row=mysqli_fetch_array($result)){
              
              $jt_name=$row['jt_name'];
              $Duration=$row['Duration'];
          ?>
    		<form action="jobtype_update.php" method="post" enctype="multipart/form-data">

            <input type="hidden" name="jt_id" value="<?php echo $row['jt_id'] ?>">

      			<div class="form-group row">
        			<label for="jt_name" class="col-sm-4">Job Type name</label>
        				<input type="text" name="jt_name" class="form-control col-sm-8" 
                placeholder="Enter Name"
        				required="true" value="<?php echo $jt_name;?>">
      			</div>

      			<div class="form-group row">
        			<label for="Duration" class="col-sm-4">Duration</label>
        			<textarea class="form-control col-sm-8" placeholder="Enter Your Address" required="true" name="Duration"><?php echo $Duration;?></textarea>
      			</div>

            <button type="submit" class="btn btn-outline-primary">Update</button>
    		</form>

        <?php } 
        ?>
  		</div>
  	</div>
  </div>
<?php include('../adminfooter.php'); ?>

</body>
</html>
