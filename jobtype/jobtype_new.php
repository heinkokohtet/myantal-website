

<?php include('../config.php'); ?>
<?php include('../adminheader.php'); ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title></title>


</head>

<body>

  <div class="container-fluid">
    <div class="row">

      <div class="col-sm-12">
        <h4 class="header font-weight-bold text-dark"><center>
        Create New Job Type</center></h4>
      </div>

    </div>

      <div class="row">

      <div class="col-sm-12">

        <a href="jobtype_list.php">
          <button type="button" class="btn btn-outline-primary"><i class="fas fa-fast-backward"></i> Go Back</button>
        </a>
      </div>

    </div>

  <div class="row">
      <div class="col col-sm-6" id="form">

<form action="jobtype_add.php" method="post">
        <div class="form-group row">
          <label for="jt_name" class="col-sm-4">Job Type name</label>
            <input type="text" name="jt_name" class="form-control col-sm-8" 
            placeholder="Enter Job Type Name"
            required="true">
        </div>

        <div class="form-group row">
          <label for="Duration" class="col-sm-4">Duration</label>
          <textarea class="form-control col-sm-8" placeholder="Enter Duration" required="true" name="Duration"></textarea>
        </div>

        <button type="submit" class="btn btn-outline-primary">Submit</button>
        <button type="reset" class="btn btn-outline-danger">Cancel</button>
        
    </form>
    </div>
  </div>
</div>

<?php include('../adminfooter.php'); ?>

</body>
</html>

