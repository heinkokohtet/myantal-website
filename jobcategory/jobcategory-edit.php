<?php 

include('../config.php');

include('../adminheader.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Job Category</title>
</head>
<body>
	<?php 

	$jc_id = $_GET['jc_id'];

	$result = mysqli_query($conn, "SELECT * FROM jobcategory WHERE jc_id = $jc_id");

	while($row = mysqli_fetch_assoc($result))
	{	
		$photo = $row['photo'];
		$jc_name = $row['jc_name'];

		?>

		<div class="container-fluid">
			<div class="row">

				<div class="col-sm-12">


					<h4 class="header font-weight-bold text-dark" style="text-align: center;">Edit Job Category</h4>
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
				<div class="col col-sm-6" id="form" style="margin-top: 30px;">

					<form action="jobcategory-update.php" method="post" enctype="multipart/form-data">

						<input type="hidden" name="jc_id" value="<?php echo $jc_id; ?>">

						<div class="form-group row">
							<label class="col-sm-4">Old Photo</label>
							<img src="./photos/<?php echo $photo ?>" width="150" height="120">
						</div>

						<div class="form-group row">
							<label for="photo" class="col-sm-4">New Photo</label>
							<input type="file" name="photo" class="form-control col-sm-8">
						</div>

						<div class="form-group row">
							<label class="col-sm-4">Job Category Name</label>
							<input type="text" name="jc_name" class="form-control col-sm-8" placeholder="Enter Job Category Name..." value="<?php echo $jc_name; ?>">
						</div>

						<button type="submit" class="btn btn-outline-primary">Update</button>
						
					</form>

				<?php } ?>

			</div>
		</div>
	</div>


</body>
</html>

<?php include('../adminfooter.php'); ?>