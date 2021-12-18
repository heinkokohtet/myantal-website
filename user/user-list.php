<?php 



include('../config.php');

include('../adminheader.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>User</title>


</head>
<body>

	<?php 
	//Pagination
	//To reterive data from data by using limit
	$showRecordPerPage = 10;
	if(isset($_GET['page']) && !empty($_GET['page'])){
		$currentPage = $_GET['page'];
	}else{
		$currentPage = 1;
	}
	$startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
	$totalSQL = "SELECT * FROM user";
	$allResult = mysqli_query($conn, $totalSQL);
	$totaluser = mysqli_num_rows($allResult);
	$lastPage = ceil($totaluser/$showRecordPerPage);
	$firstPage = 1;
	$nextPage = $currentPage + 1;
	$previousPage = $currentPage - 1;

	$result = mysqli_query($conn, "SELECT * FROM user ur, role re WHERE ur.role_id = re.role_id ORDER BY ur.user_id DESC LIMIT $startFrom, $showRecordPerPage");

	?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">

				<h4 class="header font-weight-bold text-dark" style="text-align: center;">User Registration List</h4>
			</div>
		</div>

		<div class="card shadow mb-4">
			<div class="card-body">
				<div class="table-responsive">

					

					<table class="table" cellspacing="0">
						<thead>

							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Phone Number</th>
								<th>Click below to download CV</th>
								
								<th></th>
								<th></th>
							</tr>
						</thead>
						
						<tbody>
							<tr>
								<?php 

								while($row=mysqli_fetch_assoc($result))
								{	
									$user_id = $row['user_id'];
									$user_name = $row['user_name'];
									$email = $row['email'];
									$phone_no = $row['phone_no'];
									$CV = $row['CV'];
									$role_id = $row['role_id'];
									$role_name = $row['role_name'];

									?>

									<td><?php echo $user_name; ?></td>
									<td><?php echo $email; ?></td>
									<td><?php echo $phone_no; ?></td>
									<td>
										
										<a download="<?php echo $CV; ?>" href="./userCV/<?php echo $CV; ?>">
											<?php echo $CV; ?>
										</a>
										
									</td>
									

									<td>
										<a href="user-delete.php?user_id=<?php echo $user_id; ?>" onclick="return confirm('Are you sure want to delete?');">
											<button type="button" id="delete" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
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