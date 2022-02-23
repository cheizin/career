<div class="container">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"> <i class="fa fa-bars"></i> </button>
    <a class="navbar-brand" href="index-2.html"> <img src="assets/img/logo-light.png" class="logo logo-display" alt=""> <img src="assets/img/logo.png" class="logo logo-scrolled" alt=""> </a>
</div>
  <div class="collapse navbar-collapse" id="navbar-menu">
    <ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">
      <li class="dropdown active"> <a href="index.php">Home</a> </li>


    </ul>

    <ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">

  <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">About Us</a>
    <ul class="dropdown-menu animated fadeOutUp">
      <li><a href="contact.php">Contact Us</a></li>
      <li><a href="companyProfile.php">Company Profile</a></li>

    </ul>
  </li>
        </ul>

    <?php
//check authentication
if(isset($_SESSION['email']))
{

        $profile_pic = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM staff_users WHERE Email ='".$_SESSION['email']."'"));
        //check role
/*if($_SESSION['access_level'] == "admin")
{
  ?>
  */
        ?>


        <ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">
          <?php
      if($_SESSION['access_level'] == "recruiter" || $_SESSION['access_level'] =="admin")
      {
      ?>
              <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Jobs</a>
                <ul class="dropdown-menu animated fadeOutUp">
                  <li><a href="add-job.php">Add New Job</a></li>
                  <li><a href="view-job.php">View All Jobs</a></li>
                </ul>
              </li>

              <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Candidate</a>
                <ul class="dropdown-menu animated fadeOutUp">
                  <li><a href="applicants.php">View New Applicants</a></li>
                  <li><a href="candidates_database.php">All Candidates Database</a></li>

                </ul>
              </li>

              <?php
      }
      if($_SESSION['access_level'] == "job-seeker" )
      {
      ?>

              <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Job Seeker</a>
                <ul class="dropdown-menu animated fadeOutUp">
                  <li><a href="view-job.php">View Posted Jobs</a></li>
                  <li><a href="profile-settings.php">View Applied Jobs</a></li>
                </ul>
              </li>
              <?php
      }
      if($_SESSION['access_level'] =="admin")
      {
      ?>

              <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Assessment</a>
                <ul class="dropdown-menu animated fadeOutUp">
                  <li><a href="create_test.php">Create Test</a></li>
                  <li><a href="candidates_database.php">View Responses</a></li>

                </ul>
              </li>
              <?php
      }
      ?>


                  </ul>

                  <?php
                  /*
      }
      */
      ?>
 <ul class="nav navbar-nav navbar-right">

   <li class="dropdown sign-up">
<a class="dropdown-toggle btn-signup red-btn" data-toggle="dropdown" href="profile-settings.php">
<img src="assets/img/<?php echo $profile_pic['emp_photo']; ?>" class="img-responsive img-circle" alt="">Welcome <?php echo $_SESSION['fName'];?>, <?php echo $_SESSION['lName'];?>
</a>
     <ul class="dropdown-menu animated fadeOutUp">
          <li> <a href="profile-settings.php">My Account</a> </li>
       <li><a href="browse-job.html">Browse Jobs</a></li>
       <li><a href="create-company.html">Create Company</a></li>
       <li><a href="create-resume.html">Create Resume</a></li>
       <li> <a class="dropdown-item text-danger waves-effect waves-light log-out-link" href="?logout">Sign Out</a></li>
     </ul>
   </li>

 </ul>


<?php
}
else
{
?>
    <ul class="nav navbar-nav navbar-right">
      <li class="br-right"><a class="btn-signup red-btn" href="login.php"><i class="login-icon ti-user"></i>Login</a></li>

      <li class="sign-up user-selection-link"><a class="btn-signup red-btn" href="signup.php"><span class="ti-briefcase"></span>Register</a></li>
    </ul>

    <?php
}


?>

  </div>
</div>
