<?php
if(!$_SERVER['REQUEST_METHOD'] == "POST")
{
  exit();
}
session_start();
include("controllers/setup/connect.php");

$id = $_GET['id'];

if(!isset($_SESSION['email']) && empty($_SESSION['email'])) {
   echo 'Kindly Login First or signup to access the Online assessment';

   ?>

   <form method="post" action="login2.php">
   <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
<input type="submit" name="submit" class="btn btn-info" value="View Applicants" title="Click Here to view applicants">

<script>
  window.location.href = "login2.php";


  </script>

</form>


     <?php
}


if(isset($_POST['reference_no']))
{
  //exit("Please select The Job Vaccancy ");

  $row3 = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM job_posting WHERE id ='".$_POST['reference_no']."'"));

  $row4 = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM applied_jobs WHERE id ='".$_POST['reference_no']."'"));


  $row5 = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM job_posting WHERE id ='".$row4['job_posting_id']."'"));
}

if(isset($_GET['id']))
{

  $row3 = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM job_posting WHERE id ='".$_GET['id']."'"));


  $row4 = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM applied_jobs WHERE id ='".$_GET['id']."'"));


  $row5 = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM job_posting WHERE id ='".$row4['job_posting_id']."'"));
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
                    <li><a href="viewResponses.php">View Responses</a></li>

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


        <h2>
      Assessment Details for the Position <?php echo $row5['job_title'];?> </strong>
      </h2>
        <p><a href="#" title="Home">Home</a> <i class="ti-angle-double-right"></i>Assessement Details</p>
    </div>
  </div>
</div>

<input type="hidden" name="job_title" class="job_title" value="<?php echo $row5['job_title'];?>">
<!-- ======================= End Page Title ===================== -->
<!-- ================ Profile Settings ======================= -->
<section class="padd-top-80 padd-bot-80">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <ul class="nav nav-tabs nav-fill" role="tablist">
          <li class="nav-item">
            <a class="nav-link test-details-tab" data-toggle="tab" href="#test-details-tab" role="tab"
                aria-controls="contact" aria-selected="false" onclick="f1()">
              <i class="fas fa-users-class"></i> Click here when Ready to Start your Aptitude Test for the Position <strong><?php echo $row5['job_title'];?>
                <?php
                echo "Your Current time is " . date("h:i:sa");
                ?>

              </strong>
            </a>

            <form id="form1" runat="server">
            <div>

              <?php
                  $sql_query3 = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM quiz_timer WHERE posted_job ='".$row5['job_title']."' ORDER  by id DESC LIMIT 1"));
              ?>

                <input type="hidden"  id="job_title" name="job_title" value ="<?php echo $row5['job_title'];?>"  class="form-control">

                  <input type="hidden"  id="hrs" name="hrs" value ="<?php echo $sql_query3['hrs'];?>"  class="form-control">

                    <input type="hidden"  id="mins" name="mins" value ="<?php echo $sql_query3['mins'];?>"  class="form-control">

              <table width="100%" align="center">
                <tr>
                  <td colspan="2">
                  </td>
                </tr>
                <tr>
                  <td>
                    <div id="starttime"></div><br />
                    <div id="endtime"></div><br />
                    <div id="showtime"></div>
                  </td>
                </tr>
                <tr>
                  <td>

                      <br />

                  </td>

                </tr>
              </table>
              <br />

            </div>
            </form>
          </li>


        </ul>
        <div class="tab-content">

          <div class="tab-pane fade" id="test-details-tab" role="tabpanel"></div>


        </div>

      </div>
    </div>
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

<script>
$('#title_details').summernote({
  toolbar: [
  // [groupName, [list of button]]
  ['style', ['bold', 'italic', 'underline', 'clear']],
  ['font', ['superscript', 'subscript']],
  ['fontsize', ['fontsize']],
  ['color', ['color']],
  ['para', ['ul', 'ol', 'paragraph']],
  ['height', ['height']],
  ['view', ['fullscreen']],
  ['insert', ['link']],
],
height: 100
});

</script>

<script type="text/javascript">

  // Initialize CKEditor
  CKEDITOR.inline( 'short_desc');

  CKEDITOR.replace('long_desc',{

    width: "500px",
        height: "200px"

  });


</script>
</body>

<!-- Mirrored from utouchdesign.com/themes/envato/escort/profile-settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Feb 2021 07:04:47 GMT -->
</html>
