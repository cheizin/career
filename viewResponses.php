<?php
if(!$_SERVER['REQUEST_METHOD'] == "POST")
{
  exit();
}
session_start();
include("controllers/setup/connect.php");
/*if(!isset($_POST['id']))
{
  exit("Please select The Job Applied ");
}

$project_module = $_POST['id'];


$row = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM job_posting WHERE id ='".$_POST['id']."'"));

$row2 = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM applied_jobs WHERE job_posting_id ='".$_POST['id']."'"));

*/

if(!isset($_SESSION['email']) && empty($_SESSION['email'])) {
   echo 'Kindly Login First or signup to access the Responses';

   ?>

<script>
  window.location.href = "login.php";


  </script>

     <?php
}

?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<!-- Mirrored from utouchdesign.com/themes/envato/escort/profile-settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Feb 2021 07:04:42 GMT -->
<head>
<?php
include("views/header.php");
?>

</head>
<body class="utf_skin_area">
<div class="page_preloaderr"></div>
<!-- ======================= Start Navigation ===================== -->
<nav class="navbar navbar-default navbar-mobile navbar-fixed white no-background bootsnav">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"> <i class="fa fa-bars"></i> </button>
      <a class="navbar-brand" href="index-2.html">  <img src="assets/img/logo.png" class="logo logo-scrolled" alt=""> </a>
  </div>
    <div class="collapse navbar-collapse" id="navbar-menu">

      <ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">

   <li class="br-center">  <img src="assets/img/logo-light.png" class="logo logo-display" width="250" height="100" alt=""> </li>

 </ul>
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
              <li><a href="viewResponses.php">View Responses</a></li>
           <li><a href="viewReports.php">View Reports</a></li>

            </ul>
          </li>

          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mailing</a>
            <ul class="dropdown-menu animated fadeOutUp">
              <li><a href="bulk_mails.php">Bulk Emails</a></li>
              <li><a href="config_mails.php">Email Configuration</a></li>

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


</nav>

<!-- ======================= End Navigation ===================== -->

<!-- ======================= Page Title ===================== -->
<div class="page-title">
  <div class="container">
    <div class="page-caption">

    <h2>Responses For Asessment Undertaken</h2>
      <p><a href="#" title="Home">Home</a> <i class="ti-angle-double-right"></i> Assessment Response</p>
    </div>
  </div>
</div>
<!-- ======================= End Page Title ===================== -->
<!-- ================ Profile Settings ======================= -->
<section class="padd-top-80 padd-bot-80">
  <div class="container">

    <?php
    //$sql_query1 =  mysqli_query($dbc,"SELECT * FROM about_me WHERE email ='".$_SESSION['email'].");

    $sql_query1 =  mysqli_query($dbc,"SELECT * FROM answered_test");
    $number = 1;
    if($total_rows1 = mysqli_num_rows($sql_query1) > 0)
    {?>

    <div class="row">
      <div class="col-lg-4 col-xs-12">
        <div class="card card-success card-outline">
          <div class="card-header">


            <div class="row border-bottom mx-4">

            </div>
            <?php

          $row3 = mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM answered_test"));



          ?>
          <strong>     <?php echo $row3; ?> Response(s)</strong>
          <table id="examplee" class="table table-striped table-bordered" style="width:100%">

            <thead>
              <tr>
                <td>#</td>

                <td>Applicant Details</td>

             <!--   <td>Status</td> -->
              </tr>
            </thead>
            <?php
            $no = 1;
            $sql= mysqli_query($dbc,"SELECT * FROM answered_test ");
            while($row = mysqli_fetch_array($sql))
            {
                      $row4 = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM applied_jobs WHERE job_posting_id ='".$_POST['id']."'"));

            ?>

            <tr style="cursor: pointer;">


              <td> <?php echo $no++;?>.

              </td>
                        <td  onclick="SelectResponse('<?php echo $row['id'];?>')">
                               <!-- Single Verticle job -->
                               <div class="job-verticle-list">
                                 <div class="vertical-job-card">
                                   <div class="vertical-job-header" >

                                     <div class="vrt-job-cmp-logo"> <a href="#"> <img src="assets/img/company_logo_1.png" class="img-responsive" alt="" /> </div>
                              <strong>   <span class="pull-left vacancy-no">                            <strong>
            <?php

                 $result = mysqli_query($dbc, "SELECT * FROM staff_users WHERE Email ='".$row['email']."'"  );
                 if(mysqli_num_rows($result))
                 {
                   while($project= mysqli_fetch_array($result))
                   {
                       echo $project['fName'];

                   }
                 }
                 ?>,                <strong>
            <?php

                 $result = mysqli_query($dbc, "SELECT * FROM staff_users WHERE Email ='".$row['email']."'"  );
                 if(mysqli_num_rows($result))
                 {
                   while($project= mysqli_fetch_array($result))
                   {
                       echo $project['lName'];

                   }
                 }
                 ?></span> </strong>
                            </br><span class="pull-right vacancy-no">Designation:-            <?php

                 $result = mysqli_query($dbc, "SELECT * FROM staff_users WHERE Email ='".$row['email']."'"  );
                 if(mysqli_num_rows($result))
                 {
                   while($project= mysqli_fetch_array($result))
                   {
                       echo $project['currentPosition'];

                   }
                 }
                 ?></span></span>


                                      <span class="com-tagline">
                                        <?php

  $result = mysqli_query($dbc, "SELECT * FROM staff_users WHERE Email ='".$row['email']."'"  );
  if(mysqli_num_rows($result))
  {
    while($project= mysqli_fetch_array($result))
    {
        echo $project['currentPosition'];

    }
  }
  ?></span>
                                        <span class="com-tagline">
                                          at
            <?php

                 $result = mysqli_query($dbc, "SELECT * FROM staff_users WHERE Email ='".$row['email']."'"  );
                 if(mysqli_num_rows($result))
                 {
                   while($project= mysqli_fetch_array($result))
                   {
                       echo $project['companyName'];

                   }
                 }
                 ?>
                 </b> <br/>
                   Holds a    <?php

                          $result = mysqli_query($dbc, "SELECT * FROM staff_users WHERE Email ='".$row['email']."'"  );
                          if(mysqli_num_rows($result))
                          {
                            while($project= mysqli_fetch_array($result))
                            {
                                echo $project['highestQualification'];

                            }
                          }
                          ?>
                          with
                          <?php

                                $result = mysqli_query($dbc, "SELECT * FROM staff_users WHERE Email ='".$row['email']."'"  );
                                if(mysqli_num_rows($result))
                                {
                                  while($project= mysqli_fetch_array($result))
                                  {
                                      echo $project['experience'];

                                  }
                                }
                                ?>

                                Experience<br/></span>

                            </div>

                                 </div>
                               </div>

                               </td>

            </tr>
            <?php
            }
            ?>
            </table>

          </div>

        </div>
      </div>

      <div class="col-lg-8 col-xs-12">
        <div class="card card-success card-outline">
          <div class="card-header">

            <div class="card project-module-data d-none">

            </div>


          </div>

        </div>
      </div>
    </div>


    <?php
    }
    else
    {
          ?>
        <br/>
    <div class="alert alert-success">
    <strong><i class="fa fa-info-circle"></i> No Response</strong>
    </div>

      <?php
    }
    ?>
  </div>
</section>
<!-- ================ End Profile Settings ======================= -->

<!-- ================= subscribe start ========================= -->
    <?php
    include("views/subscribe.php");
    ?>


<!-- ================= footer start ========================= -->
<?php
include("views/footer.php");
?>
<!-- Signup Code -->
<div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="myModalLabel1">
      <div class="modal-body">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-advance theme-bg" role="tablist">
          <li class="nav-item active"> <a class="nav-link" data-toggle="tab" href="#employer" role="tab"> <i class="ti-user"></i> Job Seeker</a> </li>
          <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#candidate" role="tab"> <i class="ti-user"></i> Job Provider</a> </li>
        </ul>
        <!-- Nav tabs -->
        <!-- Tab panels -->
        <div class="tab-content">
          <!-- Employer Panel 1-->
          <div class="tab-pane fade in show active" id="employer" role="tabpanel">
            <form>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Email Address">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Password">
              </div>
              <div class="form-group"> <span class="custom-checkbox">
                <input type="checkbox" id="4">
                <label for="4"></label>
                Remember Me </span> <a href="#" title="Forget" class="fl-right">Forgot Password?</a>
			  </div>
              <div class="form-group text-center">
                <button type="button" class="btn theme-btn full-width btn-m">LogIn</button>
              </div>
            </form>
			<div class="log-option"><span>OR</span></div>
			<div class="row">
              <div class="col-md-6"> <a href="#" title="" class="fb-log-btn log-btn"><i class="fa fa-facebook"></i> Facebook</a> </div>
              <div class="col-md-6"> <a href="#" title="" class="gplus-log-btn log-btn"><i class="fa fa-google"></i> Google</a> </div>
            </div>
          </div>
          <!--/.Panel 1-->

          <!-- Candidate Panel 2-->
          <div class="tab-pane fade" id="candidate" role="tabpanel">
            <form>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Email Address">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Password">
              </div>
              <div class="form-group"> <span class="custom-checkbox">
                <input type="checkbox" id="44">
                <label for="44"></label>
                Remember Me </span> <a href="#" title="Forget" class="fl-right">Forgot Password?</a>
			  </div>
              <div class="form-group text-center">
                <button type="button" class="btn theme-btn full-width btn-m">LogIn</button>
              </div>
            </form>
			<div class="log-option"><span>OR</span></div>
			<div class="row">
              <div class="col-md-6"> <a href="#" title="" class="fb-log-btn log-btn"><i class="fa fa-facebook"></i> Facebook</a> </div>
              <div class="col-md-6"> <a href="#" title="" class="gplus-log-btn log-btn"><i class="fa fa-google"></i> Google</a> </div>
            </div>
          </div>
        </div>
        <!-- Tab panels -->
      </div>
    </div>
  </div>
</div>
<!-- End Signup -->
<div><a href="#" class="scrollup">Scroll</a></div>

<!-- Jquery js-->
<?php
include("views/script.php");
?>
</body>

<!-- Mirrored from utouchdesign.com/themes/envato/escort/profile-settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Feb 2021 07:04:47 GMT -->
</html>
