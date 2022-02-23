<?php
session_start();
include("controllers/setup/connect.php");
require_once("controllers/auth/auth.php");
  //$token = bin2hex(random_bytes(50));

  $token2 = bin2hex(random_bytes(50));
  $token = $_GET['token'];


  if(!isset($_GET['token']))
  {
    exit("Invalid Link. No security Token Exist");
  }


  $token_validation = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM staff_users WHERE token ='".$_GET['token']."' ORDER BY id "));
?>

<!DOCTYPE html>
<html class="" lang="zxx">

<!-- Mirrored from utouchdesign.com/themes/envato/escort/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Feb 2021 07:01:02 GMT -->
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

<!-- ======================= Start Page Title ===================== -->
<div class="page-title">
  <div class="container">
    <div class="page-caption">
      <h2><strong>Congratulations! </strong> You were referred by <?php echo $token_validation['fName'];?> to
register with Potential Staffing <br/>
</h2>
      <p><a href="#" title="Home"> Sign up below (You must use this sign up page, so that we can track your referred status)</p>
    </div>
  </div>
</div>
<!-- ======================= End Page Title ===================== -->

<!-- ====================== Start Signup Form ============= -->
<section class="padd-top-80 padd-bot-80">
  <div class="container">
    <div id="response-data" style="width:100%">

      <div class="row module-panel">
          <!-- /.col -->


           <div class="col-md-12 col-xs-12 " data-toggle="modal" data-target="#add-recruiter-modal">
             <div class="card text-center card-success card-outline">
                 <div class="card-header">
                 <b>  Employer Login<img src="assets/img/performance.png" alt="" width="25" height="25"> </b>
                 </div>
                 <div class="card-body card-success">
                   <a href="#" class="btn btn-info btn-lg btn-block">Are you looking for quality candidates?</br>
Advertise and search</a>
                 </div>
               </div>
            </div>

      </div>
      <!-- add job seeker modal -->
                <div class="modal fade" id="add-job-seeker-modal">
                <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                  <div class="modal-content">
                    <div class="modal-header alert alert-success">

                      <h5 class="modal-title">Signup As a Job Seeker </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form id="add-job-seeker-form" class="mt-4" enctype="multipart/form-data">
                        <input type="hidden" value="add-job-seeker" name="add-job-seeker">
                          <input type="hidden" value="job-seeker" name="job-seeker">

                      <!-- start of row -->
                                <div class="row border-bottom mx-4">
                            <div class="col-lg-3 col-xs-12 form-group">
                                <label><span class="required">*</span>Surname</label>
                                  <input type="text" autocomplete="off" class="select2 form-control" name="fName">
                            </div>
                            <div class="col-lg-3 col-xs-12 form-group">
                                <label><span class="required">*</span>Other Names</label>
                                  <input type="text" autocomplete="off" class="select2 form-control" name="lName">
                            </div>

                          <div class="col-lg-3 col-xs-12 form-group">
                            <label> <span class="required">*</span> Date Of Birth</label>
                            <div class="input-group mb-2 mr-sm-2">
                              <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fal fa-calendar-day"></i></div>
                              </div>
                              <input type="text" class="form-control project_start_date" autocomplete="off" name="dob" required>
                            </div>
                          </div>

                          <div class="col-md-3 col-sm-6 col-xs-12 m-clear">
                            <label><span class="required">*</span>Gender</label>
                            <?php
                            $result = mysqli_query($dbc, "SELECT * FROM gender ORDER BY gender_name ASC");
                            echo '
                            <select class="wide form-control" name="gender" data-tags="true" class="select2 form-control" required>
                              <option data-display="Select gender"></option>';
                            while($row = mysqli_fetch_array($result)) {
                                echo '<option value="'.$row['gender_name'].'">'.$row['gender_name']."</option>";
                            }
                            echo '</select>';
                            ?>
                          </div>
                          </div>


                            <div class="row border-bottom mx-4">
                            <div class="col-lg-3 col-xs-12 form-group">
                                <label><span class="required">*</span>Email</label>
                                  <input type="email" autocomplete="off" class="select2 form-control" name="Email">
                            </div>
                            <div class="col-lg-3 col-xs-12 form-group">
                                <label><span class="required">*</span>Location</label>
                                  <input type="text" autocomplete="off" class="select2 form-control"  name="location">
                            </div>
                            <div class="col-lg-3 col-xs-12 form-group">
                                <label><span class="required">*</span>Contact</label>
                                  <input type="text" autocomplete="off" class="select2 form-control"  name="contact">
                            </div>

                            <div class="col-lg-3 col-xs-12 form-group">
                                <label><span class="required">*</span>Nationality</label>
                                  <input type="text" autocomplete="off" class="select2 form-control"  name="nationality">
                            </div>


              </div>

                            <div class="row border-bottom mx-4">
                              <div class="col-lg-3 col-xs-12 form-group">
                                  <label><span class="required">*</span>Highest Qualification</label>
                                    <input type="text" autocomplete="off" class="select2 form-control" name="highestQualification">
                              </div>
                              <div class="col-lg-3 col-xs-12 form-group">
                                  <label><span class="required">*</span>Current Position</label>
                                    <input type="text" autocomplete="off" class="select2 form-control"  name="currentPosition">
                              </div>
                              <div class="col-lg-3 col-xs-12 form-group">
                                  <label><span class="required">*</span>Company Name</label>
                                    <input type="text" autocomplete="off" class="select2 form-control"  name="companyName">
                              </div>

                              <div class="col-lg-3 col-xs-12 form-group">
                                  <label><span class="required">*</span>Experience</label>
                                    <input type="text" autocomplete="off" class="select2 form-control"  name="experience">
                              </div>


                </div>

    <div class="row border-bottom mx-4">

      <div class="col-lg-6 col-xs-12 form-group">
        <label for="password">Enter Password
          <i class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="right"
          title="Your Password associated to your Windows account" id=""></i></label>
        <div class="input-group add-on">
          <input type="password" name="password" id="password" maxlength="40" class="form-control pwd"  required placeholder="input your password">

        </div>
        <span class="text-info invisible" id="caps-lock">CAPS LOCK IS ON!</span>
      </div>
      <div class="col-lg-6 col-xs-12 form-group">
        <label for="password">Confirm Password
          <i class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="right"
          title="Your Password associated to your Windows account" id="password_help"></i></label>
        <div class="input-group add-on">
          <input type="password" id="confirm" name="confirm" maxlength="40" class="form-control pwd"  required placeholder="Confirm Your password">

        </div>
        <span class="text-info invisible" id="caps-lock">CAPS LOCK IS ON!</span>
        </div>

            </div>

                              <!-- start row button -->
                        <div class="row">
                          <div class="col-md-12 text-center">
                              <button type="submit" class="btn btn-primary btn-block font-weight-bold submitting">SUBMIT</button>
                          </div>
                        </div>

                    </form>

                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  </div>
                  </div>
                <!-- end of add job seeker modal -->


                <!-- add recruiter modal -->

                <div class="modal fade" id="add-recruiter-modal">
                <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                  <div class="modal-content">
                    <div class="modal-header alert alert-success">

                      <h5 class="modal-title">Referral Signup As a Recruiter or Employment Agency</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form id="add-recruiter-form-referral" class="mt-4" enctype="multipart/form-data">
                        <input type="hidden" value="add-recruiter" name="add-recruiter">
                          <input type="hidden" value="recruiter" name="recruiter">

                          <input type="hidden" name="token2" value ="<?php echo $token2;?>" >
                            <input type="hidden" name="refferred_token" value ="<?php echo $token;?>" >

                            <input type="hidden" name="referral_email" value ="<?php echo $token_validation['Email'];?>" >
                      <!-- start of row -->
                                <div class="row border-bottom mx-4">
                            <div class="col-lg-3 col-xs-12 form-group">
                                <label><span class="required">*</span>Company Name</label>
                                  <input type="text" autocomplete="off" class="select2 form-control" name="cName">
                            </div>
                            <div class="col-lg-3 col-xs-12 form-group">
                            <label><span class="required">*</span>Industry</label>
                            <?php
                            $result2 = mysqli_query($dbc, "SELECT * FROM industry ORDER BY id ASC");
                            echo '
                            <select class="wide form-control"  name="industry_name" data-tags="true" class="select2 form-control" required>
                            <option></option>';
                            while($row = mysqli_fetch_array($result2)) {
                                echo '<option value="'.$row['industry_name'].'">'.$row['industry_name']."</option>";
                            }
                            echo '</select>';
                            ?>
                            </div>

                          <div class="col-lg-3 col-xs-12 form-group">
                            <label> <span class="required">*</span> Date Of Registration</label>
                            <div class="input-group mb-2 mr-sm-2">
                              <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fal fa-calendar-day"></i></div>
                              </div>
                              <input type="text" class="form-control project_start_date" autocomplete="off" name="dob" required>
                            </div>
                          </div>
                          <div class="col-lg-3 col-xs-12 form-group">
                              <label><span class="required">*</span>Country</label>
                                <input type="text" autocomplete="off" class="select2 form-control"  name="nationality">
                          </div>

                          </div>

                            <div class="row border-bottom mx-4">
                            <div class="col-lg-3 col-xs-12 form-group">
                                <label><span class="required">*</span>Email</label>
                                  <input type="email" autocomplete="off" class="select2 form-control" name="Email">
                            </div>
                            <div class="col-lg-3 col-xs-12 form-group">
                                <label><span class="required">*</span>Location</label>
                                  <input type="text" autocomplete="off" class="select2 form-control"  name="location">
                            </div>
                            <div class="col-lg-3 col-xs-12 form-group">
                                <label><span class="required">*</span>Contact</label>
                                  <input type="text" autocomplete="off" class="select2 form-control"  name="contact">
                            </div>

                            <div class="col-lg-3 col-xs-12 form-group">
                            <label><span class="required">*</span>No Of Employees</label>
                            <?php
                            $result2 = mysqli_query($dbc, "SELECT * FROM employee_no ORDER BY id ASC");
                            echo '
                            <select class="wide form-control"  name="emp_no" data-tags="true" class="select2 form-control" required>
                            <option></option>';
                            while($row = mysqli_fetch_array($result2)) {
                                echo '<option value="'.$row['emp_no'].'">'.$row['emp_no']."</option>";
                            }
                            echo '</select>';
                            ?>
                            </div>

              </div>
                            <div class="row border-bottom mx-4">

                              <div class="col-lg-3 col-xs-12 form-group">
                              <label><span class="required">*</span>Type Of Employer</label>
                              <?php
                              $result2 = mysqli_query($dbc, "SELECT * FROM company_type ORDER BY id ASC");
                              echo '
                              <select class="wide form-control"  name="emp_type" data-tags="true" class="select2 form-control" required>
                              <option></option>';
                              while($row = mysqli_fetch_array($result2)) {
                                  echo '<option value="'.$row['com_type'].'">'.$row['com_type']."</option>";
                              }
                              echo '</select>';
                              ?>
                              </div>
                              <div class="col-lg-5 col-xs-12 form-group">
                              <label><span class="required">*</span>Where did you hear about us</label>
                              <?php
                              $result2 = mysqli_query($dbc, "SELECT * FROM hear_about_us ORDER BY id ASC");
                              echo '
                              <select class="wide form-control"  name="about_us_name" data-tags="true" class="select2 form-control" data-display="City" required>
                                  <option data-display="Info"></option>';
                              while($row = mysqli_fetch_array($result2)) {
                                  echo '<option value="'.$row['about_us_name'].'">'.$row['about_us_name']."</option>";
                              }
                              echo '</select>';
                              ?>
                              </div>
                              <div class="col-lg-4 col-xs-12 form-group">
                                  <label><span class="required">*</span>website URL</label>
                                    <input type="text" autocomplete="off" class="select2 form-control"  name="web_url" placeholder="(start with https://)">
                              </div>


                </div>


      <div class="col-lg-6 col-xs-12 form-group">
        <label for="password">Enter Password
          <i class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="right"
          title="Your Password associated to your Windows account" id=""></i></label>
        <div class="input-group add-on">
          <input type="password" name="password" id="password" maxlength="40" class="form-control pwd"  required placeholder="input your password">

        </div>
        <span class="text-info invisible" id="caps-lock">CAPS LOCK IS ON!</span>
      </div>
      <div class="col-lg-6 col-xs-12 form-group">
        <label for="password">Confirm Password
          <i class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="right"
          title="Your Password associated to your Windows account" id="password_help"></i></label>
        <div class="input-group add-on">
          <input type="password" id="confirm" name="confirm" maxlength="40" class="form-control pwd"  required placeholder="Confirm Your password">

        </div>
        <span class="text-info invisible" id="caps-lock">CAPS LOCK IS ON!</span>
        </div>


                              <!-- start row button -->
                        <div class="row">
                          <div class="col-md-12 text-center">
                              <button type="submit" class="btn btn-primary btn-block font-weight-bold submitting">SUBMIT</button>
                          </div>
                        </div>

                    </form>

                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  </div>
                  </div>
                <!-- end of recruiter modal -->

    </div>
  </div>
</section>
<!-- ====================== End Signup Form ============= -->
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


<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootsnav.js"></script>
<script src="assets/js/viewportchecker.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap-wysihtml5.js"></script>
<script src="assets/plugins/aos-master/aos.js"></script>
<script src="assets/plugins/nice-select/js/jquery.nice-select.min.js"></script>
<script src="assets/js/custom.js"></script>

<!-- color schemes for the charts -->
<script src="assets/js/chartjs-plugin-colorschemes.min.js"></script>

<script src="assets/libs/smartwizard/jquery.smartWizard.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

<!-- ChartJS -->
<script src="assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.js"></script>
<script src="assets/js/pace.min.js"></script>

<!--blockui ver 2.70-->
<script src="assets/js/jquery.blockUI.js"></script>
<!--sweetalert-->
<script src="assets/js/sweetalert2@9.js"></script>


<!--select2  ver @4.0.12-->
<script src="assets/js/select2.min.js"></script>

<!-- select2 bootstrap theme -->
<script src="assets/js/select2-bootstrap4-theme.js"></script>
<!--jquery autosize-->
<script src="assets/js/jquery.autosize.js"></script>
<!-- Datatables -->
<script type="text/javascript" src="assets/libs/datatables/pdfmake.min.js"></script>
<script type="text/javascript" src="assets/libs/datatables/vfs_fonts.js"></script>
<script type="text/javascript" src="assets/libs/datatables/datatables.min.js"></script>
<!-- datepicker -->
<script src="assets/js/bootstrap-datepicker.min.js"></script>
<!-- maxlength -->
<script src="assets/js/bootstrap-maxlength.js"></script>

<!--highcharts -->
<script src="assets/js/highcharts.js"></script>
<script src="assets/js/exporting.js"></script>
<script src="assets/js/offline-exporting.js"></script>


<!-- autosave forms sisyphus -->
<script src="assets/js/sisyphus.min.js"></script>

<!--Typed js -->
<script src="assets/js/typed.js"></script>
<script src="assets/js/jq-ajax-progress.js"></script>

<!-- shimmer js -->
<script src="assets/libs/shimmerjs/shimmer.js"></script>

<!-- simpleticker  js -->
<script src="assets/libs/vticker/jquery.vticker-min.js"></script>

<!-- pace min js -->
<script data-pace-options='{ "ajax": true }' src='assets/js/pace.min.js'></script>

<!-- animated event calendar  js -->
<script src="assets/libs/animated-event-calendar/src/jquery.simple-calendar.js"></script>

<!-- roadmap -->
<script src="assets/libs/roadmap/dist/jquery.roadmap.min.js"></script>

<!-- gantt -->
<script src="assets/libs/gantt/js/jquery.fn.gantt.js"></script>

<!-- color schemes for the charts -->
<script src="assets/js/chartjs-plugin-colorschemes.min.js"></script>

<script src="assets/libs/smartwizard/jquery.smartWizard.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

<script src="assets/js/jquery.lettering.js"></script>
<script src="assets/js/jquery.textillate.js"></script>

<!-- routes -->
<script src="controllers/routes.js?v41"></script>

<!-- custom -->
<script src="controllers/custom.js?v=55"></script>

<!-- skeleton -->
<script src="controllers/skeletons.js?v=22"></script>

<!-- validators -->
<script src="controllers/validators.js"></script>

<!-- forms -->
<script src="controllers/forms.js?v=69"></script>

<script type="text/javascript"> window.$crisp=[];window.CRISP_WEBSITE_ID="fd25f24e-2c7d-4a3e-8307-766c1a69a4ec";(function(){ d=document;s=d.createElement("script"); s.src="https://client.crisp.chat/l.js"; s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})(); </script>

<script>
$('#confirm').on('keyup', function () {
  if ($('#password').val() == $('#confirm').val()) {
    $('#password_help').html(' Password Matched').css('color', 'blue');
  } else
    $('#password_help').html('Not Matching').css('color', 'red');
});

</script>

<script>
$("#smartwizard-add-project").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
    if(stepDirection == "3")
    {
      $('.sw-btn-group-extra').removeClass('d-none');
    }
    else
    {
      $('.sw-btn-group-extra').addClass('d-none');
    }
});

</script>
<script>
$crisp.push(["set", "user:nickname", ["<?php echo $_SESSION['fName']; ?>"]]);
</script>
<script>
	$(window).load(function() {
	  $(".page_preloaderr").fadeOut("slow");;
	});
	AOS.init();
</script>
</body>

<!-- Mirrored from utouchdesign.com/themes/envato/escort/profile-settings.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Feb 2021 07:05:44 GMT -->
</html>
