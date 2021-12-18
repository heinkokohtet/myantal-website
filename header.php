<?php ob_start(); 

//session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title></title>


  <!------------CSS-------------->
  <link rel="stylesheet" href="css/bootstrapmin.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">


  <!------------JS-------------->
  <script src="js/jquerymin.js"></script>
  <script src="js/poppermin.js"></script>
  <script src="js/bootstrapmin.js"></script>
  <script src="js/custom.js"></script>


  <!------------font-------------->
  <link rel="stylesheet" href="font/fontawesomemin.css">
  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

</head>


<body>
  <!-- <div id="loading">
  <img id="loading-image" src="images/home page/aaa.jpg" alt="Loading..." width="100px" />
   
</div>    -->



<nav class="navbar navbar-expand-lg navbar-light fixed-top">
  <a class="navbar-brand" href="index.php"><img src="images/home page/66.png" style="width:150px; height:120px">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active px-3">
        <a class=" nav-link w3-bar-item w3-button w3-hover-none w3-border-white  w3-hover-border-orange w3-hover-text-orange" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active px-3">
        <a class=" nav-link w3-bar-item w3-button w3-hover-none w3-border-white  w3-hover-border-orange w3-hover-text-orange" href="category.php">Category<span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item active px-3">
        <a class=" nav-link w3-bar-item w3-button w3-hover-none w3-border-white  w3-hover-border-orange w3-hover-text-orange" href="training.php">Training <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item active px-3">
        <a class="nav-link w3-bar-item w3-button w3-hover-none w3-border-white w3-hover-border-orange w3-hover-text-orange" href="contact.php">Contact<span class="sr-only">(current)</span></a>
      </li>

      <?php

      if(!isset($_SESSION["login_user_email"]) && !isset($_SESSION["login_company_email"])){
        ?>

        <li class="nav-item active px-3">
          <a class=" nav-link w3-bar-item w3-button w3-hover-none w3-border-white w3-hover-border-orange w3-hover-text-orange" href="login.php" >Login<span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item active px-3">
          <a class=" nav-link w3-bar-item w3-button w3-hover-none w3-border-white w3-hover-border-orange w3-hover-text-orange" href="register.php" >Register <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item active px-3">
          <a class=" nav-link w3-bar-item w3-button w3-hover-none w3-border-white w3-hover-border-orange w3-hover-text-orange" href="company_login.php" >For Company<span class="sr-only">(current)</span></a>
        </li>


      <?php }else {
        if(isset($_SESSION["login_user_email"])){
          ?>

          <!-- <a href="job_detail.php?job_id=<?php echo $job_id; ?>"> -->
          <a href="profile.php" class="nav-link text-success"><b><?php echo $_SESSION["login_user_email"] ?></b></a>

          <li class="nav-item active px-3">
            <a class=" nav-link w3-bar-item w3-button w3-hover-none w3-border-white w3-hover-border-orange w3-hover-text-orange" href="logout.php" >Logout<span class="sr-only">(current)</span></a>
          </li>

        <?php }else{ ?>
          
          <!-- echo $_SESSION["login_company"]["company_name"]; -->
          <a href="company.php" class="nav-link text-success"><b><?php echo $_SESSION["login_company_email"] ?></b></a>

          <li class="nav-item active px-3">
            <a class=" nav-link w3-bar-item w3-button w3-hover-none w3-border-white w3-hover-border-orange w3-hover-text-orange" href="logout1.php" >Logout<span class="sr-only">(current)</span></a>
          </li>

        <?php } ?>



      <?php } ?>




    </ul>
  </div>
</nav>