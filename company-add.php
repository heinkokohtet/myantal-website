<?php 

		include('config.php');

		
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$job_name = $_POST['job_name'];
			$text = $_POST['text'];
			$requirement = $_POST['requirement'];
			$benefit = $_POST['benefit'];
			$gender = $_POST['gender'];
			$salary = $_POST['salary'];
			$region = $_POST['region'];
			$location = $_POST['location'];

			$jc_id = $_POST['jc_id'];
			$jt_id = $_POST['jt_id'];
			$company_id = $_POST['company_id'];

			/*$jobfile = $_FILES['jobfile']['name'];
			$tmp = $_FILES['jobfile']['tmp_name'];*/

			$jobfile = $_FILES['jobfile']['name'];

    		// destination of the file on the server
			$destination = './jobFile/' . $jobfile;

    		// get the file extension
			$extension = pathinfo($jobfile, PATHINFO_EXTENSION);

   		 	// the physical file on a temporary uploads directory on the server
			$file = $_FILES['jobfile']['tmp_name'];
			$size = $_FILES['jobfile']['size'];

			if (!in_array($extension, ['pdf'])) 
			{
				echo "You file extension must be .pdf";

			} 
			else
			{

			 	if($_FILES['jobfile']['size'] > 1000000) 
			 	{ // file shouldn't be larger than 1Megabyte
			   		echo "File too large!";
			   	}

			} 
			        // move the uploaded (temporary) file to the specified destination
				if (move_uploaded_file($file, $destination)) 
				{

					$sql = mysqli_query($conn,"INSERT INTO job (job_name, text, requirement, benefit, gender, salary, region, location, jobfile, jc_id, jt_id, company_id, post_date ) VALUES ('$job_name', '$text', '$requirement', '$benefit', '$gender', '$salary', '$region', '$location', '$jobfile', '$jc_id', '$jt_id', '$company_id', curdate() )");

					if (mysqli_query($conn, $sql)) 
					{
						echo "File uploaded successfully";

			                //header('location: job-list.php');
					}
				} 
				else
				{
					$sql = mysqli_query($conn,"INSERT INTO job (job_name, text, requirement, benefit, gender, salary, region, location, jc_id, jt_id, company_id, post_date ) VALUES ('$job_name', '$text', '$requirement', '$benefit', '$gender', '$salary', '$region', '$location', '$jc_id', '$jt_id', '$company_id', curdate() )");
					if (mysqli_query($conn, $sql)) 
					{
						echo "File uploaded successfully";

			                //header('location: job-list.php');
					}

				}

				header('location: index.php');
			



			/*$jc_id = $_POST['jc_id'];
			$jt_id = $_POST['jt_id'];*/

			/*if($jobfile)
			{
				move_uploaded_file($tmp, "./jobFile/$jobfile");
			}*/  


			/*$result = mysqli_query($conn, "INSERT INTO job (job_name, text, requirement, benefit, gender, salary, region, location, jobfile, jc_id, jt_id, post_date ) VALUES ('$job_name', '$text', '$requirement', '$benefit', '$gender', '$salary', '$region', '$location', '$jobfile', '$jc_id', '$jt_id', curdate() )");*/

			/*if(!$sql)
			{
				echo mysqli_error($conn);
			}
			else
			{
				echo "<script> alert('Job added Successfully!!') </script>";

				header('location: job-list.php');
			}
*/
		}

	?>
	