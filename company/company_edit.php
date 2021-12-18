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
        Update Company</center></h4>
      </div>

    </div>

      <div class="row">

      <div class="col-sm-12">

        <a href="company_list.php">
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
		          $company_id=$_GET["company_id"];

		          

		      	//GET data from database
		      	  $result=mysqli_query($conn,"Select * from company where 
		        company_id=$company_id");

		      		while ($row=mysqli_fetch_array($result)){
		          
		          	  $company_id=$row['company_id'];
		              $company_name=$row['company_name'];
		              $logo=$row['logo']; 
		              $email=$row["email"];
		              $phone_no=$row["phone_no"];
		              $password=$row['password'];
		              $company_type=$row['company_type'];
		              $company_website=$row['company_website'];
		              $role_id=$row['role_id'];
		    ?>
  		<form action="company_update.php" method="post" enctype="multipart/form-data">

  			    <input type="hidden" name="company_id" value="<?php echo $row['company_id'] ?>">

    			<div class="form-group row">
      				<label for="company_name" class="col-sm-4 control-label">Company name</label>
      				<input type="text" name="company_name" class="form-control col-sm-8" placeholder="Enter Name" required="true" value="<?php echo $company_name;?>">
    			</div>

	          	<div class="form-group row">
	              <label class="col-sm-4 col-form-label">Old Logo</label>
	                <div class="col-sm-8">
	                  <img src="./photo/<?php echo $logo; ?>" width="100" height="100">
	                </div>
	            </div>

	            <div class="form-group row">
	              <label for="logo" class="col-sm-4 col-form-label">New Logo</label>
	                <div class="col-sm-8">
	                  <input type="file" name="logo" >
	                </div>
	            </div>

	            <div class="form-group row">
	              <label for="email" class="col-sm-4 col-form-label">Email</label>
	              <input type="email" class="form-control col-sm-8" name="email" value="<?php echo $row['email'] ?>" required="true">
	            </div>

	            <div class="form-group row">
	              <label for="phone_no" class="col-sm-4 col-form-label">Phone Number</label>
	              <input type="tel" class="form-control col-sm-8" pattern="^\d{11}$" name="phone_no" value="<?php echo $row['phone_no'] ?>">
	            </div>

		        <div class="form-group row">
		          <label for="password" class="col-sm-4 control-label">Password</label>
		          <input type="text" name="password" class="form-control col-sm-8" placeholder="Enter Name" pattern=".{8,}" title="8 or more characters ..." required="true" value="<?php echo $password;?>">
		        </div>

		        <div class="form-group row">
		  	      <label for="company_type" class="col-sm-4 control-label"> Company Type </label>
		          <input type="text" name="company_type" class="form-control col-sm-8" 
		              placeholder="Enter Name"
		              required="true" value="<?php echo $company_type; ?>">
		        </div>

		        <div class="form-group row">
		          <label for="company_website" class="col-sm-4 control-label"> Company_website </label>
	              <input type="text" name="company_website" class="form-control col-sm-8" placeholder="Enter Name" required="true" value="<?php echo $company_website; ?>">
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