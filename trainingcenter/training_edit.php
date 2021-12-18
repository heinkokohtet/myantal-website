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
        Update Training</center></h4>
      </div>

    </div>

      <div class="row">

      <div class="col-sm-12">

        <a href="training_list.php">
          <button type="button" class="btn btn-outline-primary"><i class="fas fa-fast-backward"></i> Go Back</button>
        </a>
      </div>

    </div>
	<div class="row">
  		<div class="col col-sm-6" id="form">

  			<?php 


		        //connect with database
		          include("../config.php");

		          //GET ID from URL
		          $t_id=$_GET["t_id"];

		          

		      	//GET data from database
		      	  $result=mysqli_query($conn,"Select * from training where 
		        t_id=$t_id");

		      		while ($row=mysqli_fetch_array($result)){
		          
		          	  $t_id=$row['t_id'];
		              $name=$row['name'];
		              $photo=$row['photo']; 
		      
		              $link=$row["link"];
		    ?>
  		<form action="training_update.php" method="post" enctype="multipart/form-data">

  			    <input type="hidden" name="t_id" value="<?php echo $row['t_id'] ?>">

    			<div class="form-group row">
      				<label for="name" class="col-sm-4 control-label">Title</label>
      				<input type="text" name="name" class="form-control col-sm-8" placeholder="Enter Title" required="true" value="<?php echo $name;?>">
    			</div>

	          	<div class="form-group row">
	              <label class="col-sm-4 col-form-label">Old Photo</label>
	                <div class="col-sm-8">
	                  <img src="./photo/<?php echo $photo; ?>" width="100" height="100">
	                </div>
	            </div>

	            <div class="form-group row">
	              <label for="photo" class="col-sm-4 col-form-label">New Photo</label>
	                <div class="col-sm-8">
	                  <input type="file" name="photo" >
	                </div>
	            </div>

	            
	            <div class="form-group row">
	              <label for="link" class="col-sm-4 form-label">Link</label>
	              <input type="text" name="link" class="form-control col-sm-8" value="<?php echo $row['link'] ?>">
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