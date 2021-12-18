<?php 
	
	include('../config.php');

	$jc_id = $_GET['jc_id'];

	//echo "Job Category Id is" . $jc_id;

	$result = mysqli_query($conn, "DELETE FROM jobcategory WHERE jc_id = $jc_id");

	if(!$result)
	{
		echo mysqli_error($conn);
	}
	else
	{
		echo "<script> alert('1 Job Category's record deleted!!') </script>";

		header('location: jobcategory-list.php');
	}

?>