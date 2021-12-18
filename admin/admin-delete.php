<?php 

	include('../config.php');

	$admin_id = $_GET['admin_id'];
	$sql = "DELETE FROM admin WHERE admin_id = $admin_id";

	mysqli_query($conn, $sql);

	header('location: admin.php');
?>