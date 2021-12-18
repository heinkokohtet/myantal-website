<!---seesion --->

<?php ob_start(); 

session_start();

?>

<!---Check seesion and admin --->
<?php

if(isset($_SESSION['login_admin_name']))
{
 if($_SESSION['login_admin_name'] =='YES')
 {
   $login_admin_name = TRUE;
 }
 
}else{

if(!$login_admin_name)
{
  header('Location: ../amlogin.php');
  exit;
}

}

?>

<?php include('../config.php'); ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title></title>


  <!------------CSS-------------->
  <link href="../css/admin.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/myantalstyle.css">  

  <!------------font-------------->
  <link rel="stylesheet" href="../font/fontawesomemin.css">
  <script src="../font/ajaxfontawesomemin.js"></script>
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" 
    style="background-color: #212529;">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../dashboard.php">
        <div class="sidebar-brand-icon rotate-n-15">

        </div>

        <div class="sidebar-brand-text">          
          MyanTal
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="../dashboard.php">
          <!-- <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a> -->
            <i class="fas fa-home"></i>
            <span>Home</span></a>

          </li>

          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Heading -->
          <div class="sidebar-heading">
            Interface
          </div>

          <!-- Nav Item - Job Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-briefcase"></i>
              <span>Job</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">JOBS:</h6>
                <a class="collapse-item" href="../jobcategory/jobcategory-list.php">
                Job Category</a>
                <a class="collapse-item" href="../jobtype/jobtype_list.php">Job Type</a>
                <a class="collapse-item" href="../job/job-list.php">Job Post</a>          
              </div>
            </div>
          </li>

          <!-- Nav Item - User Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link" href="../user/user-list.php">
              <i class="fas fa-users"></i>
              <span>User</span></a>
            </li>

            <!-- Nav Item - Company Collapse Menu -->
            <li class="nav-item">
              <a class="nav-link" href="../company/company_list.php">
                <i class="far fa-building"></i>
                <span>Company</span></a>
              </li>

              <!-- Nav Item - Training Collapse Menu -->
            <li class="nav-item">
              <a class="nav-link" href="../trainingcenter/training_list.php">
                <i class="far fa-building"></i>
                <span>Training</span></a>
              </li>

                <!-- Nav Item - 
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <i class="fas fa-users-cog"></i>
                    <span>Admin</span></a>
                  </li> Admin Collapse Menu -->

                <!-- Nav Item - logout -->
              <li class="nav-item">
                <a class="nav-link" href="../myanmlogin/amlogout.php">
                  <i class="fas fa-sign-out-alt"></i>
                  <span>Logout</span></a>
                </li>
                  

                  <!-- Sidebar Toggler (Sidebar) -->
                  <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                  </div>

                </ul>
                <!-- End of Sidebar -->

                <!-- Content Wrapper -->
                <div id="content-wrapper" class="d-flex flex-column">

                  <!-- Main Content -->
                  <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                      <!-- Topbar Header -->
                      <h6 class="h6 mb-0 text-dark">MyanTal- Myanmar Talents</h6>

                      <!-- Sidebar Toggle (Topbar) -->
                      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i> <!-- to delete fa-4x -->
                      </button>

                      <!-- Topbar Navbar -->
                      <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">

                            <?php echo $_SESSION['login_admin_name']; ?>
                              
                            </span>
                          

                          </a>
                         

                        </li>

                      </ul>

                    </nav>
                    <!-- End of Topbar -->
