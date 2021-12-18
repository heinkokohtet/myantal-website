<?php 

include('../config.php');

include('../adminheader.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Job</title>
	
	<!----------summernote-css and js-------------->

	<script src="../js/jqueryminsummernote.js"></script>
	<script src="../js/poppermin.js"></script>

	<link rel="stylesheet" href="../css/bootstrapmin.css">

	<script src="../js/bootstrapmin.js"></script>

	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
	<script src="../js/summernotebs4min.js"></script>

	<!----------end-------------->

	<style type="text/css">

	#btn1{
		margin-left: 408px;
	}

</style>

</head>

<body>

	<?php 

	$job_id = $_GET['job_id'];

	$result = mysqli_query($conn, "SELECT * FROM job WHERE job_id = $job_id");

	$row = mysqli_fetch_assoc($result);

	?>	

	<div class="container-fluid">
		<div class="row">

			<div class="col-sm-12">
				

				<h4 class="header font-weight-bold text-dark" style="text-align: center;">Edit Job</h4>
			</div>

		</div>

		<div class="row">

			<div class="col-sm-12">

				<a href="job-list.php">
					<button type="button" class="btn btn-outline-primary"><i class="fas fa-fast-backward"></i> Go Back</button>
				</a>
			</div>

		</div>

		<div class="row">
			<div class="col col-sm-6" id="form" style="margin-top: 30px;">

				<form action="job-update.php" method="post" enctype="multipart/form-data">

					<input type="hidden" name="job_id" value="<?php echo $row['job_id'] ?>">

					<div class="form-group row">
						<label class="col-sm-4">Job Name</label>
						<input type="text" name="job_name" class="form-control col-sm-8" value="<?php echo $row['job_name'] ?>">
					</div>

					<div class="form-group row">

						
						<label class="col-sm-4">Job Description</label>
						<textarea id="summernote" name="text" class="form-control col-sm-8"><?php echo $row['text'] ?></textarea>
					</div>

					<div class="form-group row">


						<label class="col-sm-4">Job Requirement</label>
						<textarea id="summernote1" name="requirement" class="form-control col-sm-8"><?php echo $row['requirement'] ?></textarea>
					</div>

					<div class="form-group row">

						
						<label class="col-sm-4">Benefit</label>
						<textarea id="summernote2" name="benefit" class="form-control col-sm-8"><?php echo $row['benefit'] ?></textarea>
					</div>

					<div class="form-group row">

						
						<label class="col-sm-4">Gender</label>
						<input type="text" name="gender" class="form-control col-sm-8" value="<?php echo $row['gender'] ?>">
					</div>

					<div class="form-group row">


						<label class="col-sm-4">Salary</label>
						<input type="text" name="salary" class="form-control col-sm-8" value="<?php echo $row['salary'] ?>">
					</div>

					<div class="form-group row">


						<label class="col-sm-4">Region</label>
						<input type="text" name="region" class="form-control col-sm-8" value="<?php echo $row['region'] ?>">
					</div>

					<div class="form-group row">

						
						<label class="col-sm-4">Location</label>
						<input type="text" name="location" class="form-control col-sm-8" value="<?php echo $row['location'] ?>">
					</div>

					<div class="form-group row">


						<label class="col-sm-4">Old File</label>
						<a href="" name="jobfile"><?php echo $row['jobfile'] ?></a>
					</div>

					<div class="form-group row">


						<label for="jobfile" class="col-sm-4">New File(pdf only and file shouldn't be larger than 1MB)</label>
						<input type="file" name="jobfile" class="form-control col-sm-8" accept=".pdf">
					</div>

					<div class="form-group row">


						<label class="col-sm-4">Job Category</label>
						<select name="jc_id" class="form-control col-sm-8">
							<option value="0">*** Choose ***</option>
							<?php  

							$result1 = mysqli_query($conn, "SELECT * FROM jobcategory");
							while($row1 = mysqli_fetch_assoc($result1)): ?>
								<option value="<?php echo $row1['jc_id'] ?>" <?php if($row1['jc_id'] == $row['jc_id']) echo "selected" ?> >
									<?php echo $row1['jc_name'] ?>
								</option>
							<?php endwhile; ?>
						</select>
					</div>

					<div class="form-group row">


						<label class="col-sm-4">Job Type</label>
						<select name="jt_id" class="form-control col-sm-8">
							<option value="0">*** Choose ***</option>
							<?php 

							$result2 = mysqli_query($conn, "SELECT * FROM jobtype");
							while($row2 = mysqli_fetch_assoc($result2)): ?>
								<option value="<?php echo $row2['jt_id'] ?>" <?php if($row2['jt_id'] == $row['jt_id']) echo "selected" ?> >
									<?php echo $row2['jt_name'] ?>
								</option>

							<?php endwhile; ?>
						</select>
					</div>

					<div class="form-group row">


						<label class="col-sm-4">Company</label>
						<select name="company_id" class="form-control col-sm-8">
							<option value="0">*** Choose ***</option>
							<?php 

							$result3 = mysqli_query($conn, "SELECT * FROM company");
							while($row3 = mysqli_fetch_assoc($result3)): ?>
								<option value="<?php echo $row3['company_id'] ?>" <?php if($row3['company_id'] == $row['company_id']) echo "selected" ?> >
									<?php echo $row3['company_name'] ?>
								</option>

							<?php endwhile; ?>
						</select>
					</div>

					<div class="form-group row">

						
						<button type="submit" id="btn1" class="btn btn-outline-primary">Update</button>

					</div>

					</form>

				</div>
			</div>
		</div>

		<script>
			$('#summernote').summernote({
				placeholder: 'Enter Duration',
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

	<?php include('../adminfooter.php'); ?>