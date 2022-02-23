
<?php

if(!$_SERVER['REQUEST_METHOD'] == "POST")
{
  exit();
}
session_start();
include("controllers/setup/connect.php");
require_once("controllers/auth/auth.php");

$token = $_GET['token'];


if(!isset($_GET['token']))
{
  exit("Invalid Link. No security Token Exist");
}


$token_validation = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM password_resets  ORDER BY id DESC LIMIT 1"));

//$valid_token = $token_validation['token'];


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

<!-- ======================= Start Page Title ===================== -->
<div class="page-title">
  <div class="container">
    <div class="page-caption">
      <h2>Password Recovery</h2>

      <p><a href="#" title="Home">Home</a> <i class="ti-angle-double-right"></i> Password Recovery</p>
    </div>
  </div>
</div>
<!-- ======================= End Page Title ===================== -->
<?php

if($token_validation['token'] == $token)
{?>

<!-- ====================== Start Signup Form ============= -->
<section class="padd-top-80 padd-bot-80">
  <div class="container">
    <div id="response-data" style="width:100%">

      <div class="row module-panel">
          <!-- /.col -->

               <form id="potential-change-password-form">
   <input type="hidden" name="email" value="<?php echo $token_validation['email']; ?>">
  <!-- form validation messages -->

  <div class="form-group">
    <label for="password">New Password

      <i class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="right"
      title="Your Password" id=""></i></label>
    <input type="password" autocomplete="on" id="password" name="password" class="form-control" placeholder="Enter New Password">
  </div>
  <div class="form-group">
    <label for="password">Confirm Password
      <i class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="right"
      title="Your Passwor" id="password_help"></i></label>
    <input type="password" name="new_pass_crtr" id="confirm" class="form-control" placeholder="Confirm New Password">
  </div>

  <div class="card-footer text-right">
<button type="submit" name="new_password" class="btn btn-success btn-block"Submit>Submit </button>
</div>

</form>
      </div>



    </div>
  </div>
</section>

<?php
}
else
{
?>
<br/>
<div class="alert alert-info">
<strong><i class="fa fa-info-circle"></i>  <a href="enter_email.php" title="Expired Token. Click here to request Another" >The token has Expired. Click Here to send another request </a></strong>
</div>

<?php
}
?>

<!-- /.change password -->
<div class="modal fade" id="add-about-me-modal2" role="dialog">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header alert alert-success">

<h5 class="modal-title">Change Password Form
<span class="font-weight-bold"></h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
  <form id="inventory-signup-form">
      <div class="card-header bg-light">
        HRMIS Change Password
      </div>
      <div class="card-body">
        <label for="email">Enter Your Mail
           <i class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="right"
           title="Your Name associated to your Windows account, i.e MUser" id="name_help"></i></label>
        <input type="text" autocomplete="on" id="email" name="email" class="form-control" maxlength="70" required placeholder="input your registered Email">
        <div class="row">
          <br/>
        </div>
        <!--<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>-->
          <label for="password">Enter Password
            <i class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="right"
            title="Your Password associated to your Windows account" id=""></i></label>
          <div class="input-group add-on">
            <input type="password" name="password" id="password" maxlength="40" class="form-control pwd"  required placeholder="input your password">

          </div>
          <span class="text-info invisible" id="caps-lock">CAPS LOCK IS ON!</span>
          <div class="row">

          </div>
          <label for="password">Confirm Password
            <i class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="right"
            title="Your Password associated to your Windows account" id="password_help"></i></label>
          <div class="input-group add-on">
            <input type="password" id="confirm" name="confirm" maxlength="40" class="form-control pwd"  required placeholder="Confirm Your password">

          </div>
          <span class="text-info invisible" id="caps-lock">CAPS LOCK IS ON!</span>

         </div> <!-- form-group// -->
         <div class="card-footer text-right">
           <button type="submit" class="btn btn-primary btn-block submitting"> Change Password </button>
         </div>
    </form>
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>



<!-- ====================== End Signup Form ============= -->

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
<footer class="footer">
  <div class="container">
    <div class="row">
	  <div class="col-md-3 col-sm-4">
        <a href="index-2.html"><img class="footer-logo" src="assets/img/logo.png" alt=""></a>
        <p>Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since.</p>
        <!-- Social Box -->
        <div class="f-social-box">
          <ul>
            <li><a href="#"><i class="fa fa-facebook facebook-cl"></i></a></li>
            <li><a href="#"><i class="fa fa-google google-plus-cl"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter twitter-cl"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram instagram-cl"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-9 col-sm-8">
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <h4>Job Categories</h4>
            <ul>
              <li><a href="#"><i class="fa fa-angle-double-right"></i> Work from Home</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i> Internship Job</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i> Freelancer Job</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i> Part Time Job</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i> Full Time Job</a></li>
            </ul>
          </div>
          <div class="col-md-3 col-sm-6">
            <h4>Job Type</h4>
            <ul>
              <li><a href="#"><i class="fa fa-angle-double-right"></i> Create Account</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i> Career Counseling</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i> My Oficiona</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i> FAQ</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i> Report a Problem</a></li>
            </ul>
          </div>
          <div class="col-md-3 col-sm-6">
            <h4>Resources</h4>
            <ul>
              <li><a href="#"><i class="fa fa-angle-double-right"></i> My Account</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i> Support</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i> How It Works</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i> Underwriting</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i> Employers</a></li>
            </ul>
          </div>
		  <div class="col-md-3 col-sm-6">
            <h4>Quick Links</h4>
            <ul>
              <li><a href="#"><i class="fa fa-angle-double-right"></i> Jobs Listing</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i> About Us</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i> Contact Us</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i> Privacy Policy</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i> Term & Condition</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="copyright text-center">
          <p>Copyright © 2021 All Rights Reserved.</p>
        </div>
      </div>
    </div>
  </div>
</footer>

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
