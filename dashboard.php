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
    header('Location: amlogin.php');
    exit;
  }

}

?>

<?php include('config.php'); ?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title></title>


  <!------------CSS-------------->
  <link href="css/admin.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/myantalstyle.css">

  <!------------font-------------->
  <link rel="stylesheet" href="font/fontawesomemin.css">
  <script src="font/ajaxfontawesomemin.js"></script>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">



</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" 
    style="background-color: #212529;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
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
      <a class="nav-link" href="dashboard.php">
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
                <a class="collapse-item" href="jobcategory/jobcategory-list.php">
                Job Category</a>
                <a class="collapse-item" href="jobtype/jobtype_list.php">Job Type</a>
                <a class="collapse-item" href="job/job-list.php">Job Post</a>          
              </div>
            </div>
          </li>

          <!-- Nav Item - User Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link" href="user/user-list.php">
              <i class="fas fa-users"></i>
              <span>User</span></a>
            </li>

            <!-- Nav Item - Company Collapse Menu -->
            <li class="nav-item">
              <a class="nav-link" href="company/company_list.php">
                <i class="far fa-building"></i>
                <span>Company</span></a>
              </li>

              <!-- Nav Item - Training Collapse Menu -->
              <li class="nav-item">
                <a class="nav-link" href="trainingcenter/training_list.php">
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
                    <a class="nav-link" href="myanmlogin/amlogout.php">
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


                      <!-- Begin Page Content -->
                      <div class="container-fluid">

                       <!-- Page Heading -->
                       <div class="d-sm-flex align-items-center justify-content-between mb-4">


                       </div>

                       <!-- Content Row -->
                       <div class="row">
                        <!-- Job -->
                        <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text font-weight-bold text-primary text-uppercase mb-1">Job</div>

                                </div>
                                <div class="col-auto">
                                  <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                                  <i class="fas fa-briefcase fa-2x 300" style="color: black"></i>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- User -->
                        <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text font-weight-bold text-success text-uppercase mb-1">User</div>

                                </div>
                                <div class="col-auto">
                                  <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                                  <i class="fas fa-users fa-2x 300" style="color: black"></i>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Company -->
                        <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text font-weight-bold text-warning text-uppercase mb-1">Company</div>

                                </div>
                                <div class="col-auto">
                                <!-- <i class="fas fa-comments fa-2x text-gray-300"></i>
                                -->                           
                                <i class="far fa-building fa-2x 300" style="color: black"></i>

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- category -->
                      <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text font-weight-bold text-info text-uppercase mb-1">Training Center</div>

                              </div>
                              <div class="col-auto">
                                <i class="far fa-building fa-2x 300" style="color: black"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>        
                    </div>

                    <?php 

                  $result = mysqli_query($conn, "SELECT * FROM userjob uj, job jb, user ur, company cp WHERE uj.job_id = jb.job_id and uj.user_id = ur.user_id and jb.company_id = cp.company_id");

                  ?>

                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-sm-12 my-3">

                        <h4 class="header font-weight-bold text-dark" style="text-align: center;">Customer-job List</h4>
                      </div>
                    </div>

                    <div class="card shadow mb-4">
                      <div class="card-body">
                        <div class="table-responsive">


                          <table class="table" cellspacing="0">
                            <thead>

                              <tr>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Click below to download CV</th>
                                <th>Job Name</th>
                                <th>Company Name</th>

                              </tr>
                            </thead>

                            <tbody>
                              <tr>
                                <?php 

                                while($row=mysqli_fetch_assoc($result))
                                { 

                                  $uj_id = $row['uj_id'];
                                  $user_id = $row['user_id'];
                                  $job_id = $row['job_id'];
                                  $company_id = $row['company_id'];

                                  $user_name = $row['user_name'];
                                  $email = $row['email'];
                                  $phone_no = $row['phone_no'];
                                  $CV = $row['CV'];
                                  $job_name = $row['job_name'];
                                  $company_name = $row['company_name'];


                                  ?>

                                  <td><?php echo $user_name; ?></td>
                                  <td><?php echo $email; ?></td>
                                  <td><?php echo $phone_no; ?></td>
                                  <td>

                                    <a download="<?php echo $CV; ?>" href="user/userCV/<?php echo $CV; ?>">
                                      <?php echo $CV; ?>
                                    </a>

                                  </td>

                                  <td><?php echo $job_name; ?></td>
                                  <td><?php echo $company_name; ?></td>

                                </tr>

                              <?php } ?>

                            </tbody>

                          </table>

                        </div>
                      </div>
                    </div>




                  <!-- End of Main Content -->

                  <!-- Footer -->
                  <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                      <div class="text-muted"><center>Copyright &copy; MyanTal <?php echo date("Y") ?></center>
                      </div>
                    </div>
                  </footer>
                  <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->

              </div>
              <!-- End of Page Wrapper -->

              <!-- Scroll to Top Button-->
              <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
              </a>




              <!-- Bootstrap core JavaScript-->
              <script src="vendor/jquery/jquery.min.js"></script>
              <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

              <!-- Core plugin JavaScript-->
              <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

              <!-- Custom scripts for all pages-->
              <script src="js/admin.min.js"></script>


            </body>

            </html>

