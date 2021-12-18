<?php
	
	include('../config.php');

	$job_id = $_POST['job_id'];
	
	$job_name = $_POST['job_name'];
	$text = $_POST['text'];
	$requirement = $_POST['requirement'];
	$benefit = $_POST['benefit'];
	$gender = $_POST['gender'];
	$salary = $_POST['salary'];
	$region = $_POST['region'];
	$location = $_POST['location'];

	/*$jobfile = $_FILES['jobfile']['name'];
	$tmp = $_FILES['jobfile']['tmp_name'];*/

	$jc_id = $_POST['jc_id'];
	$jt_id = $_POST['jt_id'];
	$company_id = $_POST['company_id'];

	$jobfile = $_FILES['jobfile']['name'];

    // destination of the file on the server
	$destination = './jobFile/' . $jobfile;

    // get the file extension
	$extension = pathinfo($jobfile, PATHINFO_EXTENSION);

   	// the physical file on a temporary uploads directory on the server
	$file = $_FILES['jobfile']['tmp_name'];
	$size = $_FILES['jobfile']['size'];

	if (!in_array($extension, ['pdf'])) {

		echo "You file extension must be .pdf";

	} else  { 
	// file shouldn't be larger than 1Megabyte
		if($_FILES['jobfile']['size'] > 1000000)
		{
			echo "File too large!"; //($_FILES['jobfile']['size'] > 3000000)
		}

	}

			        
			if (move_uploaded_file($file, $destination)) 
			{
				$sql = mysqli_query($conn,"UPDATE job SET job_name = '$job_name', text = '$text', requirement = '$requirement', benefit = '$benefit', gender = '$gender', salary = '$salary', region = '$region', location = '$location', jobfile = '$jobfile', jc_id = '$jc_id', jt_id = '$jt_id', company_id = '$company_id' WHERE job_id = $job_id");

				if (mysqli_query($conn, $sql)) {
					echo "File updated successfully";

				}
			} 
			else {

				$sql = mysqli_query($conn,"UPDATE job SET job_name = '$job_name', text = '$text', requirement = '$requirement', benefit = '$benefit', gender = '$gender', salary = '$salary', region = '$region', location = '$location', jc_id = '$jc_id', jt_id = '$jt_id', company_id = '$company_id' WHERE job_id = $job_id");

				echo "Failed to upload file.";
			}

		header('location: job-list.php');


	/*if($jobfile)
	{
		move_uploaded_file($tmp, "./jobFile/$jobfile");

		$sql = "UPDATE job SET job_name = '$job_name', text = '$text', requirement = '$requirement', benefit = '$benefit', gender = '$gender', salary = '$salary', region = '$region', location = '$location', jobfile = '$jobfile', jc_id = '$jc_id', jt_id = '$jt_id' WHERE job_id = $job_id";

	}
	else
	{
		$sql = "UPDATE job SET job_name = '$job_name', text = '$text', requirement = '$requirement', benefit = '$benefit', gender = '$gender', salary = '$salary', region = '$region', location = '$location', jc_id = '$jc_id', jt_id = '$jt_id' WHERE job_id = $job_id";

	}

	mysqli_query($conn, $sql);

	header('location: job-list.php');*/



?>