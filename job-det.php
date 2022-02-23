<?php
session_start();
include("controllers/setup/connect.php");
require_once("controllers/auth/auth.php");
if(!$_SERVER['REQUEST_METHOD'] == "POST")
{
  exit();
}

if(!isset($_POST['id']))
{
  exit("Please select The Job Type ");
}


$job_post = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM job_posting WHERE id ='".$_POST['id']."'"));

 $sql_query123 =  mysqli_query($dbc,"SELECT * FROM applied_jobs WHERE job_posting_id ='".$job_post['id']."'");

$company_details = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM staff_users WHERE Email ='".$job_post['email']."'"));
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
      <h2>Job Details</h2>
      <p><a href="#" title="Home">Home</a> <i class="ti-angle-double-right"></i> Job Detail</p> <?php echo $_POST['id'];?>
    </div>
  </div>
</div>
<!-- ======================= End Page Title ===================== -->
<section class="padd-top-80 padd-bot-60">
  <div class="container">
    <!-- row -->
    <div class="row">
      <div class="col-md-8 col-sm-7">
        <div class="detail-wrapper">
          <div class="detail-wrapper-body">
			<div class="row">
				<div class="col-md-4 text-center user_profile_img"> <img src="assets/img/company_logo_1.png" class="width-100"  alt=""/>
				  <h4 class="meg-0"><?php echo $job_post['job_title'] ;?></h4>
				  <span><?php echo $job_post['job_location'] ;?>, <?php echo $job_post['country'] ;?></span>
          <?php
      //check authentication
      if(isset($_SESSION['email']))
      {
        ?>

          <?php
          }
          else
          {
            ?>
    				  <div class="text-center">
                <form method="post" action="login.php">
                   <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
              <i class="login-icon ti-user"></i> <input type="submit" name="submit" class="btn-job theme-btn job-apply" value="Login To Apply" title="Click Here to view more details and Apply">

            </form>

    				  </div>
              <?php

        }


        ?>

				</div>
				<div class="col-md-8 user_job_detail">
				  <div class="col-sm-12 mrg-bot-10"> <i class="ti-credit-card padd-r-10"></i><?php echo $job_post['company_name'] ;?></div>

				  <div class="col-sm-12 mrg-bot-10"> <i class="ti-email padd-r-10"></i><?php echo $job_post['email'] ;?></div>
				  <div class="col-sm-12 mrg-bot-10"> <i class="ti-calendar padd-r-10"></i><span class="full-type"><?php echo $job_post['emp_type'] ;?></span> </div>
				  				  <div class="col-sm-12 mrg-bot-10"> <i class="ti-shield padd-r-10"></i><?php echo $job_post['exp_level'] ;?></div>
          <div class="col-sm-12 mrg-bot-10"> <i class="ti-user padd-r-10"></i><span class="cl-danger"><?php echo $job_post['no_vaccancy'] ;?> Vaccancies</span> </div>
            <div class="col-sm-12 mrg-bot-10"> <i class="ti-mobile padd-r-10"></i><?php echo $job_post['deadline'] ;?> </div>

              <div class="col-sm-12 mrg-bot-10"> <i class="ti-calendar padd-r-10"></i> <span class="timeago"title="<?php echo $job_post['time_recorded'];?>"><?php echo $job_post['time_recorded'];?></span> </div>
				</div>
			</div>
          </div>
        </div>
        <div class="detail-wrapper">
          <div class="detail-wrapper-header">
            <h4>Job Description</h4>
          </div>
          <div class="detail-wrapper-body">
            <p><?php echo $job_post['job_description'] ;?></p>

          </div>
        </div>

        <div class="detail-wrapper">
          <div class="detail-wrapper-header">
            <h4>Job Responsibilities</h4>
          </div>
          <div class="detail-wrapper-body">
      <p><?php echo $job_post['responsibility'] ;?></p>
          </div>
        </div>
		<div class="detail-wrapper">
          <div class="detail-wrapper-header">
            <h4>Job Skill</h4>
          </div>
          <div class="detail-wrapper-body">
            <p><?php echo $job_post['skills'] ;?></p>
          </div>
        </div>
        <div class="detail-wrapper">
          <div class="detail-wrapper-header">
            <h4>Location</h4>
          </div>
          <div class="detail-wrapper-body">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3430.566512514854!2d76.8192921147794!3d30.702470481647698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390fecca1d6c0001%3A0xe4953728a502a8e2!2sChandigarh!5e0!3m2!1sen!2sin!4v1520136168627" width="100%" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>

      </div>

      <!-- Sidebar -->
      <div class="col-md-4 col-sm-5">
        <div class="sidebar">
          <!-- Start: Job Overview -->
          <div class="widget-boxed">
            <div class="widget-boxed-header">
              <h4><i class="ti-location-pin padd-r-10"></i>Company Details</h4>
            </div>
            <div class="widget-boxed-body">
              <div class="side-list no-border">
                <ul>
                  <li><i class="ti-credit-card padd-r-10"></i><?php echo $company_details['contact'] ;?></li>
                  <li><i class="ti-world padd-r-10"></i><?php echo $company_details['experience'] ;?></li>
                  <li><i class="ti-mobile padd-r-10"></i><?php echo $company_details['currentPosition'] ;?></li>
                  <li><i class="ti-email padd-r-10"></i><?php echo $company_details['highestQualification'] ;?></li>

                </ul>
              </div>
            </div>
          </div>
          <!-- End: Job Overview -->
          <?php
      //check authentication
      if(isset($_SESSION['email']))
      {

      //  $job_applied = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM applied_jobs WHERE applicant_email ='".$_SESSION['email']."' "));


        $number = 1;
        if($total_rows1 = mysqli_num_rows($sql_query123) > 0)
        {?>
          <div class="alert alert-info">
          <strong><i class="fa fa-info-circle"></i> Already Applied for the Job</strong>
          </div>

                  <?php
                  }
                  else
                  {
                  ?>
                  <br/>

                          <div class="widget-boxed">
                            <div class="widget-boxed-header">
                              <h4><i class="ti-email padd-r-10"></i>Apply Here</h4>
                            </div>
                            <div class="widget-boxed-body">
                              <div class="side-list no-border">
                                <div class="profile_detail_block">

                                  <form id="add-application-details-form">

                                    <input type="hidden" name="add-job-application" value="add-job-application">
                                    <input type="hidden" name="applicant_email" value ="<?php echo $_SESSION['email'];?>" >
                                      <input type="hidden" name="job_title" value ="<?php echo $job_post['job_title'] ;?>" >
                                        <input type="hidden" name="company_name" value ="<?php echo $job_post['company_name'] ;?>" >
                                          <input type="hidden" name="comp_type" value ="<?php echo $job_post['comp_type'] ;?>" >
                                            <input type="hidden" name="expLength" value ="<?php echo $job_post['expLength'] ;?>" >
                                              <input type="hidden" name="emp_type" value ="<?php echo $job_post['emp_type'] ;?>" >
                                                <input type="hidden" name="job_location" value ="<?php echo $job_post['job_location'] ;?>" >
                                                  <input type="hidden" name="country" value ="<?php echo $job_post['country'] ;?>" >
                                                    <input type="hidden" name="deadline" value ="<?php echo $job_post['deadline'] ;?>" >
                                                      <input type="hidden" name="job_description" value ="<?php echo $job_post['job_description'] ;?>" >
                                                          <input type="hidden" name="responsibility" value ="<?php echo $job_post['responsibility'] ;?>" >

                                    <input type="hidden" name="job_posting_id" value ="<?php echo $_POST['id'];?>" >
                            			<div class="col-md-6 col-sm-6 col-xs-12">
                            			  <div class="form-group">
                            				<label>First Name</label>
                            				<input type="text" class="form-control" name="fName"  value ="<?php echo $profile_pic['fName'];?>"  >
                            			  </div>
                            			</div>
                            			<div class="col-md-6 col-sm-6 col-xs-12">
                            			  <div class="form-group">
                            				<label>Last Name</label>
                            				<input type="text" class="form-control" name="lName"  value ="<?php echo $profile_pic['lName'];?>"  >
                            			  </div>
                            			</div>
                            			<div class="col-md-12 col-sm-6 col-xs-12">
                            			  <div class="form-group">
                            				<label>Highest Qualification</label>
                            				<input type="text" class="form-control" value ="<?php echo $profile_pic['highestQualification'];?>"  >
                            			  </div>
                            			</div>

                            			<div class="col-md-12 col-sm-6 col-xs-12">
                            			  <div class="form-group">
                            				<label>Current Position</label>
                            				<input type="text" class="form-control" value ="<?php echo $profile_pic['currentPosition'];?>"  >
                            			  </div>
                            			</div>
                            			<div class="col-md-12 col-sm-6 col-xs-12">
                            			  <div class="form-group">
                            				<label>Previous Company Name</label>
                            				<input type="text" class="form-control" value ="<?php echo $profile_pic['companyName'];?>"  >
                            			  </div>
                            			</div>
                                  <div class="col-md-12 col-sm-6 col-xs-12 m-clear">
                                    <label for="item_name"><span class="required">*</span>Cover Letter</label>

                                          <textarea name="cover_letter" class="form-control" required></textarea>
                                  </div>



                            			<div class="clearfix"></div>

                                  <div class="row">
                    <div class="col-md-12 padd-top-10 text-center">
                        <button type="submit" class="btn btn-m theme-btn full-width submitting">Apply Now</button>
                    </div>
                  </div>
                    </form>
                            		</div>
                              </div>
                            </div>
                          </div>



                  <?php
                  }
                  ?>


          <?php
          }
          else
          {
            ?>

            <!-- Start: Opening hour -->
            <div class="widget-boxed">
              <div class="widget-boxed-header">
                <h4><i class="ti-time padd-r-10"></i>Opening Hours</h4>
              </div>
              <div class="widget-boxed-body">
                <div class="side-list">
                  <ul>
                    <li>Monday <span>9 AM - 5 PM</span></li>
                    <li>Tuesday <span>9 AM - 5 PM</span></li>
                    <li>Wednesday <span>9 AM - 5 PM</span></li>
                    <li>Thursday <span>9 AM - 5 PM</span></li>
                    <li>Friday <span>9 AM - 5 PM</span></li>
                    <li>Saturday <span>9 AM - 3 PM</span></li>
                    <li>Sunday <span>Closed</span></li>
                  </ul>
                </div>
              </div>
            </div>
            <?php

      }


      ?>

		  <!-- Start: Location -->
          <div class="widget-boxed">
            <div class="widget-boxed-header">
              <h4><i class="ti-time padd-r-10"></i>Location</h4>
            </div>
            <div class="widget-boxed-body">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3430.566512514854!2d76.8192921147794!3d30.702470481647698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390fecca1d6c0001%3A0xe4953728a502a8e2!2sChandigarh!5e0!3m2!1sen!2sin!4v1520136168627" width="100%" height="360" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Row -->

  </div>
</section>


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

<!-- Jquery js-->
<!-- jQuery -->
<?php
include("views/script.php");
?>
</body>

<!-- Mirrored from utouchdesign.com/themes/envato/escort/add-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Feb 2021 07:04:34 GMT -->
</html>
