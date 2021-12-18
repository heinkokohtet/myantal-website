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

	<style>

	.card {
		margin-top: 20px;
		/*margin-left: 20px;*/
		display: inline-block;
		clear: both;
	}

	#delete, #edit {
		margin-bottom: 20px;
	}

	.one{
		color: black;
	}

</style>


</head>
<body>

	<?php
	//Pagination
	//To reterive data from data by using limit
	$showRecordPerPage = 5;
	if(isset($_GET['page']) && !empty($_GET['page'])){
		$currentPage = $_GET['page'];
	}else{
		$currentPage = 1;
	}
	$startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
	$totalSQL = "SELECT * FROM job";
	$allResult = mysqli_query($conn, $totalSQL);
	$totaljob  = mysqli_num_rows($allResult);
	$lastPage = ceil($totaljob/$showRecordPerPage);
	$firstPage = 1;
	$nextPage = $currentPage + 1;
	$previousPage = $currentPage - 1; 

	$result = mysqli_query($conn, "SELECT * FROM job jb, jobcategory jc, jobtype jt, company cp WHERE jb.jc_id = jc.jc_id and jb.jt_id = jt.jt_id and jb.company_id = cp.company_id ORDER BY jb.job_id DESC LIMIT $startFrom, $showRecordPerPage");

	?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">


				<h4 class="header font-weight-bold text-dark" style="text-align: center;">Job List</h4>
			</div>
		</div>

		<a href="job.php">
			<button type="button" class="btn btn-outline-primary" style="float: right;"><i class="fa fa-plus-circle"></i> Add New</button>
		</a>

		<?php 

		while($row=mysqli_fetch_assoc($result))
		{	
			$job_id = $row['job_id'];
			$job_name = $row['job_name'];
			$text = $row['text'];
			$requirement = $row['requirement'];
			$benefit = $row['benefit'];
			$gender = $row['gender'];
			$salary = $row['salary'];
			$region = $row['region'];
			$location = $row['location'];
			$jobfile = $row['jobfile'];
			$jc_id = $row['jc_id'];
			$jc_name = $row['jc_name'];
			$jt_id = $row['jt_id'];
			$jt_name = $row['jt_name'];
			$company_id = $row['company_id'];
			$company_name = $row['company_name'];
			$Duration = $row['Duration'];
			$post_date = $row['post_date'];

			?>

			<div class="card shadow col-sm-12"> <!-- style="width: 18rem;" -->
				<div class="card-body">



					<p class="card-text"><span class="one">Job Name:</span> <?php echo $job_name; ?></p>
					<p class="card-text"><span class="one">Company:</span> <?php echo $company_name; ?></p>

					<span class="one">Job Description:</span><p class="card-text"> <?php echo $text; ?></p>
					<span class="one">Job Requirement:</span><p class="card-text"> <?php echo $requirement; ?></p>
					<span class="one">Benefit:</span><p class="card-text"> <?php echo $benefit; ?></p>

					<div class="row">					
						<p class="card-text col-sm-4"><span class="one">Gender:</span> <?php echo $gender; ?></p>
						<p class="card-text col-sm-4"><span class="one">Salary:</span> <?php echo $salary; ?></p>
						<p class="card-text col-sm-4"><span class="one">Region:</span> <?php echo $region; ?></p>
					</div>

					<div class="row">					
						<p class="card-text col-sm-4"><span class="one">Location:</span> <?php echo $location; ?></p>
						<p class="card-text col-sm-4"><span class="one">Click to download File:</span> <a download="<?php echo $jobfile; ?>" href="./jobFile/<?php echo $jobfile; ?>">
							<?php echo $jobfile; ?>
						</a></p>
						<p class="card-text col-sm-4" value="<?php echo $jc_id; ?>" name="jc_id"><span class="one">Job Category:</span> <?php echo $jc_name; ?></p>
					</div>

					<div class="row">					
						<p class="card-text col-sm-4" value="<?php echo $jt_id; ?>" name="jt_id"><span class="one">Job Type:</span> <?php echo $jt_name; ?></p>
						<p class="card-text col-sm-4"><span class="one">Duration:</span> <?php echo $Duration; ?></p>
						<p class="card-text col-sm-4"><span class="one">Posted Date:</span> <?php echo $post_date; ?></p>
					</div>

					<a href="job-delete.php?job_id=<?php echo $job_id; ?>" onclick="return confirm('Are you sure want to delete?');">
						<button type="button" class="btn btn-outline-danger" id="delete"><i class="fas fa-trash-alt"></i></button>
					</a>

					<a href="job-edit.php?job_id=<?php echo $job_id; ?>">
						<button type="edit" class="btn btn-outline-info" id="edit"><i class="fas fa-edit"></i></button>
					</a>


				</div>

			</div>

		<?php } ?>

		<!-- start Pagination page -->
		<nav aria-label="Page navigation">
			<ul class="pagination justify-content-end" style="margin-top: 15px;">
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
</html>

<?php include('../adminfooter.php'); ?>