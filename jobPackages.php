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


</nav>
<!-- ======================= End Navigation ===================== -->

<!-- ======================= Page Title ===================== -->
<div class="page-title">
  <div class="container">
    <div class="page-caption">
      <h2>Job Packages</h2>
      <p><a href="#" title="Home">Home</a> <i class="ti-angle-double-right"></i> Job Packages</p>
    </div>
  </div>
</div>
<!-- =====
<!-- ======================= End Page Title ===================== -->
<section class="utf_job_category_area">
  <div class="container">
    <div class="row">

      <div class="col-lg-8 col-md-5 bg-white">
        <div class="contact-address">
          <div class="add-box">
            <div class="add-icon-box">
              <i class="ti-home theme-cl"></i>
            </div>
            <div class="add-text-box">
              <h4>About our Company</h4>
              Potential staﬃng Africa is the largest and fastest-growing online talent measurement solution provider globally that has been at the forefront of online assessment technology since its inception in 2015. We enable organizations to build winning teams by taking credible candidates across two key areas: Talent Acquisition and Development. We are based in African countries with over 2000 clients.

Potential Staﬃng Africa is a leading provider of web-based pre-employment testing, recruitment, and training services. When getting the staff for you we consider how they will achieve your objective. Our passion is to make high-quality candidate testing solutions and analysis accessible to companies of all sizes<br>

            </div>
          </div>

          <div class="add-box">
            <div class="add-icon-box">
              <i class="ti-map-alt theme-cl"></i>
            </div>
            <div class="add-text-box">
              <h4>Postal Address</h4>
              40-00200,<br>
              Nairobi
            </div>
          </div>

          <div class="add-box">
            <div class="add-icon-box">
              <i class="ti-email theme-cl"></i>
            </div>
            <div class="add-text-box">
              <h4>Email</h4>
              info@potentialstaffing.com<br>

            </div>
          </div>
          <div class="add-box">
            <div class="add-icon-box">
              <i class="ti-headphone theme-cl"></i>
            </div>
            <div class="add-text-box">
              <h4>Calls</h4>
              +254706429377<br>

            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-5 bg-white">
        <div class="contact-address">
          <div class="add-box">
            <div class="add-icon-box">
              <i class="ti-home theme-cl"></i>
            </div>
            <div class="add-text-box">
              <h4>  Applicant Tracking system</h4>
              <ul>
                <li>Powerful Sourcing Tool</li>
                  <li>Pool of Talented Applicants</li>
                    <li>Talent Acquisition system</li>
                      <li>Applicant tracking system</li>
                        <li>Advanced hiring Analytics</li>
                        <li>Pre-employment competency Tests</li>
                          <li>On-job coaching and training</li>
  </ul>
            </div>
          </div>

          <div class="add-box">
            <div class="add-icon-box">
              <i class="ti-map-alt theme-cl"></i>
            </div>
            <div class="add-text-box">
              <h4>  Recruitment/Talent sourcing</h4>
              <ul>
                <li>Lower, Mid-level, and senior management recruitment</li>
                  <li>Headhunting</li>
                    <li>Cv Screening</li>
  </ul>
            </div>
          </div>

          <div class="add-box">
            <div class="add-icon-box">
              <i class="ti-email theme-cl"></i>
            </div>
            <div class="add-text-box">
              <h4>  Employee background checks</h4>
              <ul>
                <li>Identity checks</li>
                  <li>Education checks</li>
                    <li>Employment history</li>
                      <li>Professional check</li>
                        <li>Criminal check</li>
    </ul>
            </div>
          </div>
          <div class="add-box">
            <div class="add-icon-box">
              <i class="ti-headphone theme-cl"></i>
            </div>
            <div class="add-text-box">
              <h4>Training</h4>
              <ul>
                <li>Financial Management and Internal controls</li>
                  <li>Sales generation and Marketing</li>
                    <li>Receivables and Debt collection</li>
                      <li>Customer care skills and administration</li>
                        <li>Team building, leadership, and communication skills</li>
                        <li>Training</li>
                          <li>Audit preparation</li>
    </ul>

            </div>

            <div class="add-box">
              <div class="add-icon-box">
                <i class="ti-headphone theme-cl"></i>
              </div>
              <div class="add-text-box">
                <h4>Employment compliance</h4>
                <ul>
                  <li>Statutory compliance audit.</li>
                    <li>Audit against best industry practice.</li>
                      <li>Policy and procedure formulation.</li>
                        <li>HR Technical assistance.</li>
                          <li>HR Analytics, performance management and talent development</li>

      </ul>

              </div>
            </div>

            <div class="add-box">
              <div class="add-icon-box">
                <i class="ti-headphone theme-cl"></i>
              </div>
              <div class="add-text-box">
                <h4>HR consulting services</h4>
                <ul>
                  <li>Salary Survey</li>
                    <li>Employee satisfaction and engagement survey</li>
                      <li>Job analysis & Evaluation</li>
                        <li>HR Audit</li>
                          <li>HR Systems, Policies and procedures.</li>
                          <li>ISO Consultation services</li>

      </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
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
