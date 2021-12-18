<?php include('../adminheader.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title></title>


</head>

<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="row">

    <div class="col-sm-12">
      <h4 class="header font-weight-bold text-dark"><center>Company List</center></h4>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <a href="company_new.php">
        <button type="button" class="btn btn-outline-primary"><i class="fas fa-plus-circle"></i> Add New</button>
      </a>
    </div>
  </div>
  <?php 
        //Connect with db
  include("../config.php");

  //Pagination
  //To reterive data from data by using limit
  $showRecordPerPage = 9;
  if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = $_GET['page'];
  }else{
    $currentPage = 1;
  }
  $startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
  $totalSQL = "SELECT * FROM company";
  $allResult = mysqli_query($conn, $totalSQL);
  $totalcompany = mysqli_num_rows($allResult);
  $lastPage = ceil($totalcompany/$showRecordPerPage);
  $firstPage = 1;
  $nextPage = $currentPage + 1;
  $previousPage = $currentPage - 1;

        //reterive data to database
  $result=mysqli_query($conn, "SELECT * FROM company c, role r WHERE c.role_id = r.role_id order by c.company_id desc LIMIT $startFrom, $showRecordPerPage");
  ?>

  <div class="row">

    <?php 
    while ($row=mysqli_fetch_array($result)){
      $company_id=$row['company_id'];
      $company_name=$row['company_name'];
      $logo=$row["logo"];
      $email=$row["email"];
      $phone_no=$row["phone_no"];
      $password=$row['password'];
      $company_type=$row['company_type'];
      $company_website=$row['company_website'];
      $role_id=$row['role_id'];

      ?>

      <div class="col-sm-4" style="margin-top: 20px">
        <div class="card" style="width: 20rem;">
          <img src="./photo/<?php echo $row['logo'] ?>" class="card-img-top" style="width: 200px; margin-left: 50px; height: 200px; "alt="...">
          <div class="card-body">
            <h5 class="card-title">
              <center><?php echo $company_name; ?></center></h5>
              <p class="card-text">
                <b>Email: </b><?php echo $email;?><br>
                <b>Phone: </b><?php echo $phone_no;?><br>
                <b>Type: </b><?php echo $company_type;?><br>
                <b>Website: </b><?php echo $company_website;?>
              </p>
              <a href="company_edit.php?company_id=<?php echo $company_id;?>">
                <button type="button" class="btn btn-outline-info col-4" id="edit">Edit</button>
              </a>
              <a href="company_delete.php?company_id=<?php echo $company_id;?>" onclick="return confirm('Are you sure you want to delete?');">
                <button type="button" class="btn btn-outline-danger col-4" id="delete">Delete</button>
              </a>
            </div>
          </div>

        </div>
      <?php } ?>
    </div>

<!-- start Pagination page -->
    <nav aria-label="Page navigation">
      <ul class="pagination justify-content-end" style="margin-top: 15px;">
        <?php if($currentPage != $firstPage) { ?>
          <li class="page-item">
            <a class="page-link" href="?page=<?php echo $firstPage ?>" tabindex="-1" aria-label="Previous">
              <span aria-hidden="true">First</span>     
            </a>
          </li>
        <?php } ?>
        <?php if($currentPage >= 2) { ?>
          <li class="page-item"><a class="page-link" href="?page=<?php echo $previousPage ?>"><?php echo $previousPage ?></a></li>
        <?php } ?>
        <li class="page-item active"><a class="page-link" href="?page=<?php echo $currentPage ?>"><?php echo $currentPage ?></a></li>
        <?php if($currentPage != $lastPage) { ?>
          <li class="page-item"><a class="page-link" href="?page=<?php echo $nextPage ?>"><?php echo $nextPage ?></a></li>
          <li class="page-item">
            <a class="page-link" href="?page=<?php echo $lastPage ?>" aria-label="Next">
              <span aria-hidden="true">Last</span>
            </a>
          </li>
        <?php } ?>
      </ul>
    </nav>
    <!-- end Pagination page -->
  </div>


  <?php include('../adminfooter.php'); ?>
</body>
</html>