
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
        <h4 class="header font-weight-bold text-dark"><center>Job Type List</center></h4>
      </div>
    </div>


        <?php 
        //Connect with db
        include("../config.php");

        //reterive data to database
        $result=mysqli_query($conn, "SELECT * from jobtype order by jt_id desc");

        ?>

      <!-- Table -->
    <div class="card shadow mb-4">

      <div class="card-body">
        <div class="table-responsive">

            <a href="jobtype_new.php">
          <button type="button" class="btn btn-outline-primary"><i class="fas fa-plus-circle"></i> Add New</button>
        </a>
          <table class="table"  width="100%" cellspacing="0">
            <thead>
              <tr>
          <th>Job Type Name</th> 
          <th>Duration</th>         
          <th></th>
          <th>Actions</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <?php 
            while ($row=mysqli_fetch_array($result)){
          $jt_id=$row['jt_id'];
          $jt_name=$row['jt_name'];
          $Duration=$row['Duration'];
          ?>
      
        <td><?php echo $jt_name;?></td>
        <td><?php echo $Duration;?></td>
        
        <td>
          <a href="delete.php?jt_id=<?php echo $jt_id;?>" 
        onclick="return confirm('Are you sure you want to delete?');">
          <button type="button" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
    </a>
        </td>
        <td>
          <a href="jobtype_edit.php?jt_id=<?php echo $jt_id;?>">
          <button type="button" class="btn btn-outline-info"><i class="fas fa-edit"></i></button>
        </td>
        </tr>
    
      <?php } ?>

            </tbody>
        </table>
    </div>
</div>
</div>

</div>
<!-- /.container-fluid -->
<?php include('../adminfooter.php'); ?>
</body>
</html>

