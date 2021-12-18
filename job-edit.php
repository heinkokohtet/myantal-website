<?php ob_start(); 

session_start();

include('config.php');

include('header.php');

?>

<!---Check seesion and company --->
<?php



if(isset($_SESSION['login_company_email']))
{
  if($_SESSION['login_company_email'] =='YES')
  {
    $login_company_email = TRUE;
  }

}else{

  if(!$login_company_email)
  {
    header('Location: company_login.php');
    exit;
  }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Job</title>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>



</head>

<body>

  <div id="banner2">

    <div class="container" id="navtitle">
      <div class="row justify-content-center text-center">
        <div class="col-8">
          <h1>We Are Here To Help You and Your Company</h1>
        </div>
        <div class="col-10">
          <h4>Post Job And Develop Your Company</h4>

        </div>
      </div>
    </div>
  </div>



	<?php 

	$db_company_id = $_SESSION["login_company_id"];

  	$db_company_name = $_SESSION["login_company"]["company_name"];

	$job_id = $_GET['job_id'];

	$result = mysqli_query($conn, "SELECT * FROM job WHERE job_id = $job_id");

	$row = mysqli_fetch_assoc($result);

	?>	

	<div class="container-fluid"> <!-- align="center" -->
		<h3 align="center" id=heading>Edit Job</h3>

		<div class="row">

			<div class="col-sm-12">

				<a href="company.php">
					<button type="button" class="btn btn-outline-primary"><i class="fas fa-fast-backward"></i> Go Back</button>
				</a>
			</div>

		</div>


		<div class="col-lg-6 col-md-12 col-sm-12 mx-auto">
			<div class="card" style="width: 100%;" id="card1" > <!-- style="margin-left: 270px; margin-right: 270px;" -->
				<div class="card-body">
					<div>

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
									<option value="<?php echo $db_company_id; ?>"><?php echo $db_company_name; ?></option>
								</select>
							</div>

							<div align="center">
								<button type="submit" class="btn btn-outline-primary">Update</button>

							</div>

						</form>

					</div>

				</div>

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

