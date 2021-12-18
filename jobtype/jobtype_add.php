<?php 


        //Connect with db
        include("../config.php");

        if ($_SERVER['REQUEST_METHOD']=="POST"){

        $jt_name=$_POST["jt_name"];
        $Duration=$_POST["Duration"];

        // insert data to database
        $insert_query=mysqli_query($conn, "INSERT INTO jobtype(jt_name,Duration) VALUES ('$jt_name','$Duration')");

        if(!$insert_query)
        {
          echo mysqli_error($conn);
        } else{
          echo "Successful!";

          header("location:jobtype_list.php");

        }

      }
      
  			?>