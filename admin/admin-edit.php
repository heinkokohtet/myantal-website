<?php 

session_start();
include('../config.php');

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  
</head>
<body>
  <?php if (isset($_POST['update']))
    {
      $admin_id = $_POST['admin_id'];
      
      $admin_name = $_POST['admin_name'];
      $password = sha1($_POST['password']);

      $role_id = $_POST['role_id'];

      $result = mysqli_query($conn, "UPDATE admin SET admin_name='$admin_name', password='$password' ,role_id='$role_id' Where admin_id=$admin_id");

      if(!$result)
      {
        echo mysqli_error($conn);
      }
      else
      {
        echo "<script> alert('Admin Register Successfully!!') </script>";
        header('location: admin.php');

      }
    } 

  ?>
    

  <?php 

    $admin_id = $_GET['admin_id'];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE admin_id = $admin_id");
    
    while($row = mysqli_fetch_assoc($result))
    { 

      $admin_name = $row['admin_name'];
      $password = $row['password'];

  ?>
  <fieldset>
    <legend>Admin Form</legend>

    <form action="admin-edit.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">
      <label for="admin_name">Admin Name</label>
      <input type="text" name="admin_name" value="<?php echo $admin_name; ?>" required="true"><br>

      <label>Password</label>
      <input type="password" name="password" value="<?php echo $password; ?>" id="password" required="true">

      <input type="hidden" name="role_id" value=1>

      <button type="reset">Cancel</button>
      <button type="submit" name="update">Update</button>
    </form>
  <?php } ?>
  </fieldset>
 
</body>
</html>