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

    <meta name="author" content="">
    <meta name="description" content="">
    <meta http-equiv="Content-Type"content="text/html;charset=UTF-8"/>
    <meta name="viewport"content="width=device-width, initial-scale=1.0">
    <title>Potential Staffing - Assessment Report</title>

    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="assets/img/logo-light2.png" />

    <!-- CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap-select.min.css">

    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <!-- select2 css ver @4.0.12 -->
  <link href="assets/css/select2.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/fonts/fontawesome-pro-5.12.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome-animation.css">
    <!-- Ionicons 2.0.1-->
    <link rel="stylesheet" href="assets/css/ionicons.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- sweetalert -->
    <link rel="stylesheet" href="assets/css/sweetalert2@9.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="assets/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.css">
    <!-- Datatables-->
    <link rel="stylesheet" type="text/css" href="assets/libs/datatables/datatables.min.css"/>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-material-ui@3.2.0/material-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <!-- Hover-->
    <link rel="stylesheet"  href="assets/css/hover.css"/>
    	<!-- Animate-->
    <link rel="stylesheet"  href="assets/css/animate.css"/>
    <!--placeholder-->
    <link rel="stylesheet" href="assets/libs/placeholder/placeholder-loading.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
    <!--Jquery UI -->
    <link href="assets/css/jquery-ui.css" rel="Stylesheet"type="text/css"/>
    <!-- Date Picker -->
    <link rel="stylesheet" href="assets/css/datepicker.min.css">
    <!-- News like simpleticker -->
    <link rel="stylesheet" href="assets/libs/jquery.simpleTicker/jquery.simpleTicker.css">

    <!--roadmap -->
    <link rel="stylesheet" href="assets/libs/roadmap/dist/jquery.roadmap.min.css">

    <link href="assets/plugins/icons/css/icons.css" rel="stylesheet">
    <link href="assets/plugins/animate/animate.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap/css/bootsnav.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/nice-select/css/nice-select.css">
    <link href="assets/plugins/aos-master/aos.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-material-ui@3.2.0/material-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>

    <!-- CSS -->
    <link href="assets/libs/smartwizard/smart_wizard_all.css" rel="stylesheet" type="text/css" />
    <!-- select2 css ver @4.0.12 -->
    <link href="assets/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

    <link rel="stylesheet" href="assets/libs/animated-event-calendar/dist/simple-calendar.css">
      <!-- custom css -->
      <link rel="stylesheet" href="assets/css/custom.css?v=9">

      <!-- Andoird css -->
      <link rel="stylesheet" href="assets/css/android.css">

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
          <ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">
            <li class="dropdown active"> <a href="training">Corporate Training</a> </li>


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

    <h2>Assessment report For Candidates</h2>
      <p><a href="#" title="Home">Home</a> <i class="ti-angle-double-right"></i> Reports</p>
    </div>
  </div>
</div>
<!-- ======================= End Page Title ===================== -->
<!-- ================ Profile Settings ======================= -->
<section class="padd-top-80 padd-bot-80">
  <div class="container">

      <div class="card card-body">
         <form id="all_candidates_form">
            <div class="row">

              <div class="col-lg-3 form-group">
                <label for="select_period"><span class="required">*</span> Select Candidate Details</label>

                 <?php
                    //$result = mysqli_query($dbc, "SELECT * FROM staff_users WHERE access_level ='job-seeker'");

                    $result = mysqli_query($dbc, "SELECT * FROM staff_users");
                    echo '
                    <select name="Email" id="Email" class="select2 form-control" required>
                    <option value="all">All Candidate</option>';
                    while($row = mysqli_fetch_array($result)) {
                        echo '<option value="'.$row['Email'].'">'.$row['Email']."</option>";
                    }
                    echo '</select>';
                    ?>
              </div>




           <div class="col-lg-2 form-group text-center">
               <label></label><br/>
               <button class="btn btn-primary">Generate</button>
            </div>
            </div>
         </form>
      </div>

       <div id="generated-report-data"></div>


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
