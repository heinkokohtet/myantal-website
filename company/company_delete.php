<?php

		//Connect with DB
		include("../config.php");

		//Get ID from URL
		$company_id=$_GET["company_id"];

		echo "company_id is".$company_id;

		//Delete from database
		$delete_query=mysqli_query($conn, "DELETE From company where 
			company_id=$company_id");

		if(!$delete_query)
		{
			echo mysqli_error($conn);
		}
		else{
			echo "1 record deleted";
			header("location:company_list.php");
		}

