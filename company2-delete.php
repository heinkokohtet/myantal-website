<?php 
	
	include('config.php');

	$uj_id = $_GET['uj_id'];

	//echo "UserJob Id is".$uj_id;

	$result = mysqli_query($conn, "DELETE FROM userjob WHERE uj_id = $uj_id");

	if(!$result)
	{
		echo mysqli_error($conn);
	}
	else
	{
		echo "<script> alert(' 1 User's record deleted!!') </script>";

		header('location: company.php');
	}

?>	