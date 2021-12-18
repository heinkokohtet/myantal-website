<?php 
	
	include('../config.php');

	$user_id = $_GET['user_id'];

	echo "User Id is".$user_id;

	$result = mysqli_query($conn, "DELETE FROM user WHERE user_id = $user_id");

	if(!$result)
	{
		echo mysqli_error($conn);
	}
	else
	{
		echo "<script> alert(' 1 User's record deleted!!') </script>";

		header('location: user-list.php');
	}

?>	