<?php
if(!$_SERVER['REQUEST_METHOD'] == "POST")
{
  exit();
}
session_start();

if(!isset($_SESSION['email']) && empty($_SESSION['email'])) {
   echo 'Session Error. Kindly Login';

   ?>
   <script>
     window.location.href = "login.php";
     </script>

     <?php
}
include("controllers/setup/connect.php");
$project_module = $_POST['id'];

$row = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM job_posting WHERE id ='".$_POST['id']."'"));

$row2 = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM applied_jobs WHERE job_posting_id ='".$_POST['id']."'"));
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<!-- Mirrored from utouchdesign.com/themes/envato/escort/profile-settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Feb 2021 07:04:42 GMT -->
<head>

<?php
include("views/header.php");
?>

<style>

.submitLink {
  background-color: transparent;
  text-decoration: underline;
  border: none;
  color: blue;
  cursor: pointer;
}
submitLink:focus {
  outline: none;
}
</style>
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


        <h2>
              Ask the right interview questions, hire the right candidates
      </h2>
        <p><a href="#" title="Home">Home</a> <i class="ti-angle-double-right"></i> Test</p>
    </div>
  </div>
</div>

<!-- ======================= End Page Title ===================== -->
<!-- ================ Profile Settings ======================= -->

<div class="section-padding-top">
	<div class="container">
		<div class="row">
			<div class="col-12">
        		<section class="section-list">

              <button class="submitLink" style="float:right;"
                  data-toggle="modal" data-target="#add-group-modal">
                  <i class="fa fa-plus-circle"></i>Click Here to Add Assessment Group
          </button>
          <button class="submitLink" style="float:right;"
              data-toggle="modal" data-target="#add-job-modal">
              <i class="fa fa-plus-circle"></i>Click Here to Add Assessment Name
          </button>

          <div class="modal fade" id="add-group-modal" role="dialog">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
          <div class="modal-header alert alert-success">

          <h5 class="modal-title">Adding Group Name
          <span class="font-weight-bold"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body">
          <form id="add-group-title-form">

          <input type="hidden" name="add-group-title" value="add-group-title">

          <!-- start of row -->

             <div class="row">

                           <div class="col-lg-12 col-xs-12 form-group">
                               <label for="item_name"><span class="required">*</span>Group Name</label>

                                  <input type="text" autocomplete="off" class="select2 form-control" name="grouping_name">

                           </div>

             </div>
             <div class="row text-center">
                 <button type="submit" class="btn btn-success btn-block btn_submit_total submitting">SUBMIT</button>
             </div>
           </form>
          </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
          </div>
          </div>
          </div>


          <!-- start add end product modal -->
          <div class="modal fade" id="add-job-modal" role="dialog">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
          <div class="modal-header alert alert-success">

          <h5 class="modal-title">Adding Assessment Name
          <span class="font-weight-bold"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body">
          <form id="add-job-title-form">

          <input type="hidden" name="add-job-title" value="add-job-title">

          <!-- start of row -->

             <div class="row">

                <div class="col-lg-12 col-xs-12 form-group">
                 <label><span class="required">*</span>Assessment Group</label>
                 <?php
                 $result = mysqli_query($dbc, "SELECT * FROM job_titles_grouping ORDER BY grouping_name ASC");
                 echo '
                 <select class="wide form-control" name="id" data-tags="true" class="select2 form-control" required>
                   <option data-display="Select Assessment Group"></option>';
                 while($row = mysqli_fetch_array($result)) {
                     echo '<option value="'.$row['id'].'">'.$row['grouping_name']."</option>";
                 }
                 echo '</select>';
                 ?>
               </div>

                           <div class="col-lg-12 col-xs-12 form-group">
                               <label for="item_name"><span class="required">*</span>Assessment Name</label>

                                  <input type="text" autocomplete="off" class="select2 form-control" name="job_title">

                           </div>

             </div>
             <div class="row text-center">
                 <button type="submit" class="btn btn-success btn-block btn_submit_total submitting">SUBMIT</button>
             </div>
           </form>
          </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
          </div>
          </div>
          </div>

          <table id="example" class="table table-striped table-bordered" style="width:100%">

             <thead>
               <tr>
                 <td></td>


              <!--   <td>Status</td> -->
               </tr>
             </thead>
        <?php

        $row3 = mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM job_titles"));

          $row4 = mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM job_titles_grouping"));



        ?>
    <strong>     <?php echo $row4; ?> Assessment Groups</strong>,  <strong>     <?php echo $row3; ?> Assessment Names</strong>
    <?php
    $no = 1;
    $sql= mysqli_query($dbc,"SELECT * FROM job_titles_grouping");
    while($row = mysqli_fetch_array($sql))
    {


    ?>
    <tr style="cursor: pointer;">


      <td>

	        <div class="col-12 margin-b-sm">

		        	<span class="align-self-center iq-icon iq-icon--skills"></span>

		        	<h4><?php echo $row['grouping_name'];?> </h4>

		      </div>


          <ul class="row list-unstyled links-list">



          <?php
          //$no = 1;
          $sql2= mysqli_query($dbc,"SELECT * FROM job_titles WHERE grouping_name = '".$row['id']."'");
          while($row2 = mysqli_fetch_array($sql2))
          {
          ?>
          <li class="col-xs-12 col-sm-4 margin-b-0-to-xs">


              <form method="post" action="test_management.php">
              <input type="hidden" name="id" value="<?php echo $row2['id']; ?>">
              <h4>   <input type="submit" name="submit" class="submitLink" value="<?php echo $row2['title_name'];?> Questions" title="Click here to view Asessement Details for <?php echo $row2['title_name'];?> Job"></h4>
             </form>
      </li>
                      <?php
                      }
                      ?>

                    </ul>
                  </td>




              </tr>
              <?php
                 }
               ?>
                        </table>

 </div>  </div>  </div> </div>

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

  $('#assessment-data-table').DataTable({
    destroy: true,
     "pageLength": 2
  });


</script>
</body>

<!-- Mirrored from utouchdesign.com/themes/envato/escort/profile-settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Feb 2021 07:04:47 GMT -->
</html>
