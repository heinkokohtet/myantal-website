<?php 
	
	include('config.php');

	$job_id = $_GET['job_id'];

	echo "Job Id is".$job_id;

	$result = mysqli_query($conn, "DELETE FROM job WHERE job_id = $job_id");

	if(!$result)
	{
		echo mysqli_error($conn);
	}
	else
	{
		echo "<script> alert(' 1 Job's record deleted!!') </script>";

		header('location: company.php');
	}

?>	