<?php 
	ob_start();
    session_start();
    // Destroy session
    if(session_destroy()) {
        // Redirecting To login Page
        header("Location: company_login.php");
    }
?>