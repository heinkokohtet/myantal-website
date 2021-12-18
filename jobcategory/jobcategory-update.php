<?php

	include('../config.php');

	$jc_id = $_POST['jc_id'];

	$photo = $_FILES['photo']['name'];
	$tmp = $_FILES['photo']['tmp_name'];

	$jc_name = $_POST['jc_name'];

	if($photo)
	{
		move_uploaded_file($tmp, "./photos/$photo");

		$sql = "UPDATE jobcategory SET photo = '$photo', jc_name = '$jc_name' WHERE jc_id = $jc_id ";
	}
	else
	{
		$sql = "UPDATE jobcategory SET jc_name = '$jc_name' WHERE jc_id = $jc_id ";
	}

	mysqli_query($conn, $sql);

	header('location: jobcategory-list.php');


?>