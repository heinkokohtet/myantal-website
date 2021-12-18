<?php ob_start(); 

session_start();

include('config.php');

include("header.php"); ?>

<!---Check seesion and company --->
<?php



if(isset($_SESSION['login_company_email']))
{
  if($_SESSION['login_company_email'] =='YES')
  {
    $login_company_email = TRUE;
  }

}else{

  if(!$login_company_email)
  {
    header('Location: company_login.php');
    exit;
  }

}

?>

<div id="banner1"></div>
<div class="container" align="center" id="save">
  <h3 align="center" >Applier</h3><h6 align="center" id=heading3> Browse your Shortlist candidates</h6>

  <?php 

  $job_id = $_GET['job_id'];

  //echo $job_id;



/*$result1 = mysqli_query($conn, "SELECT * FROM userjob WHERE job_id = $job_id");
$row1 = mysqli_fetch_assoc($result1);*/

$result = mysqli_query($conn, "SELECT * FROM userjob uj, job jb, user ur WHERE uj.job_id = jb.job_id and uj.user_id = ur.user_id and uj.job_id = $job_id");


?>

<div class="card" style="width:45rem;" id="company2">
  <div class="card-body">
    <table class="table table-hover">
      <thead class="table table-borderless">
        <tr align="center">
          <th >Job Name</th>
          <th >Applier Name</th>
          <th >Download CV</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php 

        while($row=mysqli_fetch_assoc($result))
        {


          ?>
          <tr align="center">

            <td value="<?php echo $row['job_id'] ?>"><?php echo $row['job_name'] ?></td>

            <td><img src="images/company/a.png" width="50px" style="padding-right: 20px"><?php echo $row['user_name'] ?></td>

            <td><?php echo $row['post_date'] ?> <i class="fas fa-file-download" style="color:#f9b940"></i> <a download="<?php echo $row['CV'] ?>" href="user/userCV/<?php echo $row['CV'] ?>">
              <?php echo $row['CV'] ?>
            </a></td>

            <td>
              <a href="company2-delete.php?uj_id=<?php echo $row['uj_id'] ?>" onclick="return confirm('Are you sure want to delete?');">
              <button type="button" class="btn btn-outline-danger" id="delete"><i class="fas fa-trash-alt"></i></button>
            </a>
            </td>

          </tr>

          

        <?php } ?>

      </tbody>

      


    </table>
    
  </div>
</div>
</div>
