<?php
session_start();
include("controllers/setup/connect.php");
require_once("controllers/auth/auth.php");

        $profile_pic = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM staff_users WHERE Email ='".$_SESSION['email']."'"));
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
      <h2>Profile Settings</h2>
      <p><a href="#" title="Home">Home</a> <i class="ti-angle-double-right"></i> Jobs Applied</p>
    </div>
  </div>
</div>
<!-- ======================= End Page Title ===================== -->

<!-- ================ Profile Settings ======================= -->
<section class="padd-top-80 padd-bot-80">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
		<div id="leftcol_item">
		  <div class="user_dashboard_pic"> <img alt="user photo" src="assets/img/<?php echo $profile_pic['emp_photo']; ?>"> <span class="user-photo-action"><?php echo $_SESSION['fName'];?>, <?php echo $_SESSION['lName'];?></span> </div>
		</div>
		<div class="dashboard_nav_item">
		  <ul>
		    <li><a href="dashboard.html"><i class="login-icon ti-dashboard"></i> Dashboard</a></li>
			<li><a href="profile-settings.php"><i class="login-icon ti-user"></i> Edit Profile</a></li>

      	<li class="active"><a href="jobs-applied.php"><i class="login-icon ti-key"></i> Jobs Applied</a></li>
			<li><a href="change-password.html"><i class="login-icon ti-key"></i> Change Password</a></li>

		  </ul>
		</div>
	  </div>
	  <div class="col-md-9">
        <div class="row">
          <?php
          $job_applied = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM applied_jobs WHERE applicant_email ='".$_SESSION['email']."' "));
   $sql_query1 =  mysqli_query($dbc,"SELECT * FROM job_posting  WHERE id ='".$job_applied['job_posting_id']."' ORDER BY id");

          $number = 1;
          if($total_rows1 = mysqli_num_rows($sql_query1) > 0)
          {?>

        <table id="example" class="table table-striped table-bordered" style="width:100%">

           <thead>
             <tr>
               <td>Details</td>
                <td>Application Status</td>


            <!--   <td>Status</td> -->
             </tr>
           </thead>
           <?php
           $no = 1;
          $sql = mysqli_query($dbc,"SELECT * FROM applied_jobs WHERE applicant_email ='".$_SESSION['email']."' ORDER BY id DESC");
            while($row = mysqli_fetch_array($sql)){
            ?>
           <tr style="cursor: pointer;">


             <td>
               <!-- Single Verticle job -->
               <div class="job-verticle-list">
                 <div class="vertical-job-card">
                   <div class="vertical-job-header" onclick="viewJobApplicants('<?php echo $row['id'];?>');">
                     <form method="post" action="job-detail.php">
                     <input type="hidden" name="id" value="<?php

                  $result = mysqli_query($dbc, "SELECT * FROM job_posting WHERE id ='".$row['job_posting_id']."' ORDER BY id "  );
                  if(mysqli_num_rows($result))
                  {
                    while($profile_pic = mysqli_fetch_array($result))
                    {
                      ?>
                      <?php echo $profile_pic['id']; ?>

                   <?php

                    }
                  }
                  ?>">

                     <div class="vrt-job-cmp-logo"> <a href="#"><img src="assets/img/company_logo_1.png" class="img-responsive" alt="" /></a> </div>
                     <h4>   <input type="submit" name="submit" class="btn btn-info" value="       <?php

                  $result = mysqli_query($dbc, "SELECT * FROM job_posting WHERE id ='".$row['job_posting_id']."' ORDER BY id "  );
                  if(mysqli_num_rows($result))
                  {
                    while($profile_pic = mysqli_fetch_array($result))
                    {
                      ?>
                      <?php echo $profile_pic['job_title']; ?>

                   <?php

                    }
                  }
                  ?>" title="Click Here to view more details and Apply"></h4>
                     <span class="com-tagline">       <?php

                  $result = mysqli_query($dbc, "SELECT * FROM job_posting WHERE id ='".$row['job_posting_id']."' ORDER BY id "  );
                  if(mysqli_num_rows($result))
                  {
                    while($profile_pic = mysqli_fetch_array($result))
                    {
                      ?>
                      <?php echo $profile_pic['company_name']; ?>

                   <?php

                    }
                  }
                  ?></span> <span class="pull-right vacancy-no">       <?php

                  $result = mysqli_query($dbc, "SELECT * FROM job_posting WHERE id ='".$row['job_posting_id']."' ORDER BY id "  );
                  if(mysqli_num_rows($result))
                  {
                    while($profile_pic = mysqli_fetch_array($result))
                    {
                      ?>
                      <?php echo $profile_pic['emp_type']; ?>

                   <?php

                    }
                  }
                  ?></span></span>

                 </form>


            </div>
                   <div class="vertical-job-body">
                     <div class="row">
                       <div class="col-md-9 col-sm-12 col-xs-12">
                         <ul class="can-skils">
                          <li><strong>Exp Level: </strong>       <?php

                  $result = mysqli_query($dbc, "SELECT * FROM job_posting WHERE id ='".$row['job_posting_id']."' ORDER BY id "  );
                  if(mysqli_num_rows($result))
                  {
                    while($profile_pic = mysqli_fetch_array($result))
                    {
                      ?>
                      <?php echo $profile_pic['exp_level']; ?>

                   <?php

                    }
                  }
                  ?></li>
                          <li><strong>Location: </strong>       <?php

                  $result = mysqli_query($dbc, "SELECT * FROM job_posting WHERE id ='".$row['job_posting_id']."' ORDER BY id "  );
                  if(mysqli_num_rows($result))
                  {
                    while($profile_pic = mysqli_fetch_array($result))
                    {
                      ?>
                      <?php echo $profile_pic['job_location']; ?>

                   <?php

                    }
                  }
                  ?></li>
                          <li><strong>Country: </strong>       <?php

                  $result = mysqli_query($dbc, "SELECT * FROM job_posting WHERE id ='".$row['job_posting_id']."' ORDER BY id "  );
                  if(mysqli_num_rows($result))
                  {
                    while($profile_pic = mysqli_fetch_array($result))
                    {
                      ?>
                      <?php echo $profile_pic['country']; ?>

                   <?php

                    }
                  }
                  ?></li>

                     <li><strong>Deadline: </strong>       <?php

                  $result = mysqli_query($dbc, "SELECT * FROM job_posting WHERE id ='".$row['job_posting_id']."' ORDER BY id "  );
                  if(mysqli_num_rows($result))
                  {
                    while($profile_pic = mysqli_fetch_array($result))
                    {
                      ?>
                      <?php echo $profile_pic['deadline']; ?>

                   <?php

                    }
                  }
                  ?></li>

                         </ul>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>




               </td>

               <td onclick="viewResults('<?php echo $row['job_posting_id'];?>');" title="Click here to view Results for the <?php echo $row['status_name'];?>">


 <?php


$row4 = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM applied_jobs WHERE id ='".$row['id']."'"));

$row6 = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM application_status_details WHERE reference_no ='".$row4['id']."' ORDER BY id DESC LIMIT 1"));

//  $row5 = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM job_posting WHERE id ='".$row4['job_posting_id']."'"));

//  $row6 = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM assigned_test WHERE posted_job='".$row5['job_title']."'"));



// echo $row6['status_name'];


$sql_query1 =  mysqli_query($dbc,"SELECT * FROM application_status_details WHERE reference_no ='".$row4['id']."' ORDER BY id DESC LIMIT 1");
$number = 1;
if($total_rows1 = mysqli_num_rows($sql_query1) > 0)
{?>
 <?php

      $result = mysqli_query($dbc, "SELECT * FROM application_status_details WHERE reference_no ='".$row4['id']."'ORDER BY id DESC LIMIT 1"  );
      if(mysqli_num_rows($result))
      {
        while($profile_pic = mysqli_fetch_array($result))
        {
          ?>





                <span class="text-primary" style="cursor:pointer;"><?php echo $profile_pic['status_name'];?></span>


       <?php

        }
      }
      ?>

               <?php
               }
               else
               {

                 echo $row['job_status'];

               }
               ?>



</td>




           </tr>
           <?php
              }
            ?>

         </table>
        </div>


        <?php
        }
        else
        {
        ?>
        <br/>
        <div class="alert alert-info">
        <strong><i class="fa fa-info-circle"></i> No Job Applied</strong>
        </div>

        <?php
        }
        ?>


    </div>
  </div>
    </div>
</section>
<!-- ================ End Profile Settings ======================= -->

<section class="newsletter theme-bg" style="background-image:url(assets/img/bg-new.png)">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="heading light">
          <h2>Subscribe Our Newsletter!</h2>
          <p>Lorem Ipsum is simply dummy text printing and type setting industry Lorem Ipsum been industry standard dummy text ever since when unknown printer took a galley.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
        <div class="newsletter-box text-center">
          <div class="input-group"> <span class="input-group-addon"><span class="ti-email theme-cl"></span></span>
            <input type="text" class="form-control" placeholder="Enter your Email...">
          </div>
          <button type="button" class="btn theme-btn btn-radius btn-m">Subscribe</button>
        </div>
      </div>
    </div>
  </div>
</section>

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

<?php
include("views/script.php");
?>
</body>

<!-- Mirrored from utouchdesign.com/themes/envato/escort/profile-settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Feb 2021 07:04:47 GMT -->
</html>
