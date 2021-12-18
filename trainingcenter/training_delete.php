<?php

		//Connect with DB
		include("../config.php");

		//Get ID from URL
		$t_id=$_GET["t_id"];

		echo "t_id is".$t_id;

		//Delete from database
		$delete_query=mysqli_query($conn, "DELETE From training where 
			t_id=$t_id");

		if(!$delete_query)
		{
			echo mysqli_error($conn);
		}
		else{
			echo "1 record deleted";
			header("location:training_list.php");
		}

