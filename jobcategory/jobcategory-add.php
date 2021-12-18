<?php 
	
		include('../config.php');

			
			$photo = $_FILES['photo']['name'];
			$tmp = $_FILES['photo']['tmp_name'];

			$jc_name = $_POST['jc_name'];

			if($photo)
			{
				move_uploaded_file($tmp, "./photos/$photo");
			}

			$result = mysqli_query($conn, "INSERT INTO  jobcategory (jc_name, photo) VALUES ('$jc_name', '$photo')");

			if(!$result)
			{
				echo mysqli_error($conn);
			}
			else
			{
				echo "<script> alert('Job Category added Successfully!!') </script>";

				header('location: jobcategory-list.php');
			}
		

	?>