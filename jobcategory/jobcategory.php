<?php 

	//include('../config.php');

include('../adminheader.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Job Category</title>
</head>
<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">

				<h4 class="header font-weight-bold text-dark" style="text-align: center;">Job Category Form</h4>
			</div>
		</div>	

		<div class="row">
			<div class="col-sm-12">

				<a href="jobcategory-list.php">
					<button type="button" class="btn btn-outline-primary"><i class="fas fa-fast-backward"></i> Go Back</button>
				</a>
			</div>
		</div>


		<div class="row">
			<div class="col col-sm-6" id="form">
				<form action="jobcategory-add.php" method="post" enctype="multipart/form-data">
					<div class="form-group row">
						<label for="photo" class="col-sm-4">Photo</label>
						<input type="file" name="photo" class="form-control col-sm-8" required="">
					</div>

					<div class="form-group row">
						<label for="jc_name" class="col-sm-4">Job Category Name</label>
						<input type="text" name="jc_name" class="form-control col-sm-8" placeholder="Enter Job Category..." required="true">
					</div>

					<button type="submit" class="btn btn-outline-primary">Submit</button>
					<button type="cancel" class="btn btn-outline-danger">Cancel</button>
				</form>
			</div>
		</div>
	</div>

</body>
</html>

<?php include('../adminfooter.php'); ?>