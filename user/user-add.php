<?php 
			
			include('../config.php');

			$user_name = $_POST['user_name'];
			$email = $_POST['email'];
			$phone_no = $_POST['phone_no'];
			$password = sha1($_POST['password']);

			/*$CV = $_FILES['CV']['name'];
			$tmp = $_FILES['CV']['tmp_name']; //1st test*/

			$role_id = $_POST['role_id'];

			$CV = $_FILES['CV']['name'];

    		// destination of the file on the server
			$destination = './userCV/' . $CV;

    		// get the file extension
			$extension = pathinfo($CV, PATHINFO_EXTENSION);

   		 	// the physical file on a temporary uploads directory on the server
			$file = $_FILES['CV']['tmp_name'];
			$size = $_FILES['CV']['size'];

			if (!in_array($extension, ['pdf'])) {
				echo "You file extension must be .pdf";
			} elseif ($_FILES['CV']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
			    echo "File too large!";
			} else {
			        // move the uploaded (temporary) file to the specified destination
				if (move_uploaded_file($file, $destination)) {
					
					$sql = mysqli_query($conn, "INSERT INTO user (user_name, email, phone_no, password, CV, role_id) VALUES ('$user_name', '$email', '$phone_no', '$password', '$CV', '$role_id')");

					if (mysqli_query($conn, $sql)) {
						echo "File uploaded successfully";

					}
				} else {
					echo "Failed to upload file.";
				}

				header('location: user-list.php');
			}

			/*if($CV)
			{
				move_uploaded_file($tmp, "./userCV/$CV");
			}  //1st test


			$result = mysqli_query($conn, "INSERT INTO user (user_name, email, phone_no, password, CV, role_id) VALUES ('$user_name', '$email', '$phone_no', '$password', '$CV', '$role_id')"); //1st test

			if(!$result)
			{
				echo mysqli_error($conn);
			}
			else
			{
				echo "<script> alert('User added Successfully!!') </script>";

				header('location: user-list.php');
			}
*/
		

	?>