<?php
	
	include('../config.php');

	$user_id = $_POST['user_id'];
	$user_name = $_POST['user_name'];
	$email = $_POST['email'];
	$phone_no = $_POST['phone_no'];
	//$password = $_POST['password']; //password = '$password',

	$CV = $_FILES['CV']['name'];
	$tmp = $_FILES['CV']['tmp_name'];

	//$role_id = $_POST['role_id'];

	if($CV)
	{
		move_uploaded_file($tmp, "./userCV/$CV");

		$sql = "UPDATE user SET user_name = '$user_name', email = '$email', phone_no = '$phone_no', CV = '$CV' WHERE user_id = $user_id";

	}
	else
	{
		$sql = "UPDATE user SET user_name = '$user_name', email = '$email', phone_no = '$phone_no' WHERE user_id = $user_id";

	}

	mysqli_query($conn, $sql);

	header('location: user-list.php');


	/*if(!$result3)
	{
		echo mysqli_error($conn);
	}
	else
	{
		echo "<script> alert('User Update Successfully!!') </script>";

		header('location: user-list.php');
	}
*/
?>