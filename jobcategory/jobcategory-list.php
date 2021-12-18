<?php 

include('../config.php');

include('../adminheader.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Job Category</title>
</head>
<body>



	<?php 
	

	$result = mysqli_query($conn, "SELECT * FROM jobcategory ORDER BY jc_id DESC");

	?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">

				<h4 class="header font-weight-bold text-dark" style="text-align: center;">Job Category List</h4>
			</div>
		</div>

		<div class="card shadow mb-4">
			<div class="card-body">
				<div class="table-responsive">

					<a href="jobcategory.php">
						<button type="button" class="btn btn-outline-primary"><i class="fa fa-plus-circle"></i> Add New</button>
					</a>

					<table class="table" cellspacing="0">
						<thead>
							<tr>
								<th>Photo</th>
								<th>Name</th>
								<th></th>
								<th></th>
							</tr>
						</thead>

						<tbody>
							<tr>
								<?php 

								while($row=mysqli_fetch_assoc($result))
								{
									$jc_id = $row['jc_id'];
									$photo = $row['photo'];
									$jc_name = $row['jc_name'];

									?>

									<td><img src="./photos/<?php echo $photo ?>" width="100" height="100"></td>
									<td><?php echo $jc_name; ?></td>

									<td>
										<a href="jobcategory-delete.php?jc_id=<?php echo $jc_id; ?>" onclick="return confirm('Are you sure want to delete?');">
											<button type="button" class="btn btn-outline-danger" id="delete"><i class="fas fa-trash-alt"></i></button>
										</a>
									</td>

									<td>
										<a href="jobcategory-edit.php?jc_id=<?php echo $jc_id; ?>">
											<button type="button" class="btn btn-outline-info" id="edit"><i class="fas fa-edit"></i></button>
										</a>
									</td>

								</tr>

							<?php } ?>

						</tbody>

					</table>
				</div>
			</div>
		</div>
		
		
	</div>
</body>
</html>

<?php include('../adminfooter.php'); ?>