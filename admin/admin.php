<?php 

session_start();

include('../config.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
</head>
<body>

	<?php 

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$admin_name = $_POST['admin_name'];
		$password = sha1($_POST['password']);

		$role_id = $_POST['role_id'];

		$result = mysqli_query($conn, "INSERT INTO admin (admin_name, password, role_id) VALUES ('$admin_name', '$password', '$role_id')");

		if(!$result)
		{
			echo mysqli_error($conn);
		}
		else
		{
			echo "<script> alert('Admin Update!!') </script>";

		}

	}

	?>

	<fieldset>
		<legend>Admin Form</legend>

		<form action="admin.php" method="post" enctype="multipart/form-data">
			<label for="admin_name">Admin Name</label>
			<input type="text" name="admin_name" required="true"><br>

			<label>Password</label>
			<input type="password" name="password" id="password" required="true">

			<input type="hidden" name="role_id" value=1>

			<button type="reset" class="btn btn-outline-danger">Cancel</button>
			<button type="submit" class="btn btn-outline-primary">Submit</button>
		</form>
	</fieldset>

	<table>
		<?php 

		$result = mysqli_query($conn, "SELECT * FROM admin ur, role re WHERE ur.role_id = re.role_id ORDER BY ur.admin_id DESC");

	?>

	<h1>Admin List</h1>

		<tr>
			<th>Name</th>
			<th>Password</th>
			<th>Role</th>
		</tr>

		<tr>
			<?php 

				while($row=mysqli_fetch_assoc($result))
				{	
					$admin_id = $row['admin_id'];
					$admin_name = $row['admin_name'];
					$password = $row['password'];
					$role_id = $row['role_id'];
					$role_name = $row['role_name'];

			?>

			<td><?php echo $admin_name; ?></td>
			<td><?php echo $password; ?></td>
			<td value="<?php echo $role_id; ?>" name="role_id">
				<?php echo $role_name; ?>		
			</td>

			<td>
				<a href="admin-delete.php?admin_id=<?php echo $admin_id; ?>" onclick="return confirm('Are you sure want to delete?');">
					<button type="button" id="delete">Delete</button>
				</a>
			</td>
			<td>
				<a href="admin-edit.php?admin_id=<?php echo $admin_id; ?>">
					<button>Edit</button>
				</a>
			</td>
		</tr>

	<?php } ?>

	</table>

</body>
</html>