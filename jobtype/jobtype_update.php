<?php

	include('../config.php');

	$jt_id=$_POST["jt_id"];
    $jt_name=$_POST["jt_name"];
    $Duration=$_POST["Duration"];

    // insert data to database
    $insert_query=mysqli_query($conn, "UPDATE jobtype SET jt_name='$jt_name', Duration='$Duration' WHERE jt_id='$jt_id'");

    if(!$insert_query)
    {
        echo mysqli_error($conn);
    } else{
    	
        header("location:jobtype_list.php");
 
    }      