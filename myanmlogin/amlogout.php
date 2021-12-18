<?php 
	ob_start();
    session_start();
    // Destroy session
    if(session_destroy()) {
        // Redirecting To adminlogin Page
        header("Location: amlogin.php");
    }
?>
