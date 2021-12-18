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


	//Pagination
	//To reterive data from data by using limit
	$showRecordPerPage = 15;
	if(isset($_GET['page']) && !empty($_GET['page'])){
		$currentPage = $_GET['page'];
	}else{
		$currentPage = 1;
	}
	$startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
	$totalSQL = "SELECT * FROM training";
	$allResult = mysqli_query($conn, $totalSQL);
	$totaluser = mysqli_num_rows($allResult);
	$lastPage = ceil($totaluser/$showRecordPerPage);
	$firstPage = 1;
	$nextPage = $currentPage + 1;
	$previousPage = $currentPage - 1;

	$result = mysqli_query($conn, "SELECT * FROM training ORDER BY t_id DESC LIMIT $startFrom, $showRecordPerPage");

	?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">

				<h4 class="header font-weight-bold text-dark" style="text-align: center;">Training Center List</h4>
			</div>
		</div>

		<div class="card shadow mb-4">
			<div class="card-body">
				<div class="table-responsive">

					<a href="training_new.php">
						<button type="button" class="btn btn-outline-primary"><i class="fa fa-plus-circle"></i> Add New</button>
					</a>

					<table class="table" cellspacing="0">
						<thead>
							<tr>
								<th>Photo</th>
								<th>Name</th>
								<th>Link</th>
								<th></th>
								<th>Action</th>
							</tr>
						</thead>

						<tbody>
							<tr>
								<?php 

								while($row=mysqli_fetch_assoc($result))
								{
									$t_id = $row['t_id'];
									$photo = $row['photo'];
									$name = $row['name'];
									$link = $row['link']

									?>

									<td><img src="./photo/<?php echo $photo ?>" width="100" height="100"></td>
									<td><?php echo $name; ?></td>
									<td><a href="<?php echo $link; ?>"><?php echo $link;?></a></td>

									<td>
										<a href="training_delete.php?t_id=<?php echo $t_id; ?>" onclick="return confirm('Are you sure want to delete?');">
											<button type="button" class="btn btn-outline-danger" id="delete"><i class="fas fa-trash-alt"></i></button>
										</a>
									</td>

									<td>
										<a href="training_edit.php?t_id=<?php echo $t_id; ?>">
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

		<!-- start Pagination page -->
		<nav aria-label="Page navigation">
			<ul class="pagination justify-content-end">
				<?php if($currentPage != $firstPage) { ?>
					<li class="page-item">
						<a class="page-link" href="?page=<?php echo $firstPage ?>" tabindex="-1" aria-label="Previous">
							<span aria-hidden="true">First</span>			
						</a>
					</li>
				<?php } ?>
				<?php if($currentPage >= 2) { ?>
					<li class="page-item"><a class="page-link" href="?page=<?php echo $previousPage ?>"><?php echo $previousPage ?></a></li>
				<?php } ?>
				<li class="page-item active"><a class="page-link" href="?page=<?php echo $currentPage ?>"><?php echo $currentPage ?></a></li>
				<?php if($currentPage != $lastPage) { ?>
					<li class="page-item"><a class="page-link" href="?page=<?php echo $nextPage ?>"><?php echo $nextPage ?></a></li>
					<li class="page-item">
						<a class="page-link" href="?page=<?php echo $lastPage ?>" aria-label="Next">
							<span aria-hidden="true">Last</span>
						</a>
					</li>
				<?php } ?>
			</ul>
		</nav>
		<!-- end Pagination page -->
		
	</div>
</body>
</html>

<?php include('../adminfooter.php'); ?>