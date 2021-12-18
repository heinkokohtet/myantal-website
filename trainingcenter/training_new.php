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
        Create New Training</center></h4>
      </div>

    </div>

      <div class="row">

      <div class="col-sm-12">

        <a href="training_list.php">
          <button type="button" class="btn btn-outline-primary"><i class="fas fa-fast-backward"></i> Go Back</button>
        </a>
      </div>

    </div>
  <div class="row">
    <div class="col col-sm-6" id="form">

      <form action="training_add.php" method="post" enctype="multipart/form-data">
          <div class="form-group row">
            <label for="company_name" class="col-sm-4 form-label">Title</label>
              <input type="text" name="name" class="form-control col-sm-8" 
              placeholder="Enter Title"
              required="true">
          </div>

          <div class="form-group row">
            <label for="photo" class="col-sm-4 form-label">Photo</label>
              <input type="file" name="photo" class="form-control col-sm-8" 
              required="true">
          </div>


          <div class="form-group row">
            <label for="link" class="col-sm-4 form-label">Link</label>
              <input type="text" name="link" class="form-control col-sm-8" 
              placeholder="Enter link"
              required="true">
          </div>


          

          <button type="submit" class="btn btn-outline-primary" >Submit</button>
          <button type="reset" class="btn btn-outline-danger">Cancel</button>
         
      </form>
    </div>
  </div>
</div>

<?php include('../adminfooter.php'); ?>

</body>
</html>
