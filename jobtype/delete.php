<?php

		//Connect with DB
		include("../config.php");

		//Get ID from URL
		$jt_id=$_GET["jt_id"];

		echo "jt_id is".$jt_id;

		//Delete from database
		$delete_query=mysqli_query($conn, "DELETE From jobtype where 
			jt_id=$jt_id");

		if(!$delete_query)
		{
			echo mysqli_error($conn);
		}
		else{
			echo "1 record deleted";
			header("location:jobtype_list.php");
		}

?>	