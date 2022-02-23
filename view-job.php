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

      <h2>All Jobs</h2>
      <p><a href="#" title="Home">Home</a> <i class="ti-angle-double-right"></i> Viewing All Job</p>
    </div>
  </div>
</div>
<!-- ======================= End Page Title ===================== -->
<section class="utf_job_category_area">
  <div class="container">
    <div class="row">
<!-- ======================= Create Job ===================== -->
<nav aria-label="breadcrumb">
     <ol class="breadcrumb">
       <li class="breadcrumb-item active" aria-current="page">All Job post</li>
     </ol>
</nav>


<!-- post job modal -->

<div class="modal fade" id="post-job-modal">
<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
  <div class="modal-content">
  <div class="modal-header alert alert-success">
      <h5 class="modal-title">Posting A new Job Vaccancy </h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form id="add-job-vaccancy-form2" class="mt-4" enctype="multipart/form-data">
        <input type="hidden" value="post-job" name="post-job">
         <input type="hidden" name="email" value ="<?php echo $_SESSION['email'];?>" >
         <div class="row">
           <div class="col-md-4 col-sm-6 col-xs-12">
             <label>Job Title</label>
             <input type="text" name="job_title" class="form-control" placeholder="Job Title">
           </div>
           <div class="col-md-4 col-sm-6 col-xs-12">
             <label>Company Name</label>
             <input type="text" class="form-control" name="company_name" value ="<?php echo $_SESSION['fName'];?>" placeholder="Company Name" >
           </div>


           <div class="col-md-4 col-sm-6 col-xs-12 m-clear">
             <label><span class="required">*</span>Company Type</label>
             <?php
             $result = mysqli_query($dbc, "SELECT * FROM company_type ORDER BY com_type ASC");
             echo '
             <select class="wide form-control" name="com_type" data-tags="true" class="select2 form-control" required>
               <option data-display="Select Company"></option>';
             while($row = mysqli_fetch_array($result)) {
                 echo '<option value="'.$row['com_type'].'">'.$row['com_type']."</option>";
             }
             echo '</select>';
             ?>
           </div>

           <div class="col-md-3 col-sm-6 col-xs-12 m-clear">
<label for="item_description"><span class="required">*</span>Job Location</label>

  <input type="text" autocomplete="off" class="select2 form-control" name="job_location">
</div>
<div class="col-md-3 col-sm-6 col-xs-12 m-clear">
<label for="item_description"><span class="required">*</span>Country</label>

  <input type="text" autocomplete="off" class="select2 form-control" name="country">
</div>
           <div class="col-md-3 col-sm-6 col-xs-12 m-clear">
             <label>Experience Years</label>
             <select name="expLength" class="wide form-control">
               <option value="3">0 To 6 Month</option>
               <option value="1">1 Year</option>
               <option value="2">2 Year</option>
             </select>
           </div>

           <div class="col-md-3 col-sm-6 col-xs-12 m-clear">
             <label><span class="required">*</span>Experience Level</label>
             <?php
               $result = mysqli_query($dbc, "SELECT * FROM experience_level ORDER BY exp_level ASC");
             echo '
             <select class="wide form-control" name="exp_level" data-tags="true" class="select2 form-control" required>
               <option data-display="Select Qualifcation"></option>';
             while($row = mysqli_fetch_array($result)) {
                       echo '<option value="'.$row['exp_level'].'">'.$row['exp_level']."</option>";
             }
             echo '</select>';
             ?>
           </div>

           <div class="col-md-3 col-sm-6 col-xs-12 m-clear">
             <label><span class="required">*</span>Employment Type</label>
             <?php
             $result = mysqli_query($dbc, "SELECT * FROM employment_type ORDER BY emp_type ASC");
             echo '
             <select class="wide form-control" name="emp_type" data-tags="true" class="select2 form-control" required>
               <option data-display="Select Company"></option>';
             while($row = mysqli_fetch_array($result)) {
                 echo '<option value="'.$row['emp_type'].'">'.$row['emp_type']."</option>";
             }
             echo '</select>';
             ?>
           </div>


                       <div class="col-md-3 col-sm-6 col-xs-12 m-clear">
                         <label><span class="required">*</span>Minimum Qualification</label>
                         <?php
                         $result = mysqli_query($dbc, "SELECT * FROM qualification ORDER BY rank_name ASC");
                         echo '
                         <select class="wide form-control" name="rank_name" data-tags="true" class="select2 form-control" required>
                           <option data-display="Select Qualifcation"></option>';
                         while($row = mysqli_fetch_array($result)) {
                                 echo '<option value="'.$row['rank_name'].'">'.$row['rank_name']."</option>";
                         }
                         echo '</select>';
                         ?>
                       </div>

                             <div class="col-lg-3 col-xs-12 form-group">
                               <label> <span class="required">*</span> Deadline</label>
                               <div class="input-group mb-2 mr-sm-2">
                                 <div class="input-group-prepend">
                                   <div class="input-group-text"><i class="fal fa-calendar-day"></i></div>
                                 </div>
                                 <input type="text" class="form-control project_start_date" autocomplete="off" name="deadline" required>
                               </div>
                             </div>

           <div class="col-md-3 col-sm-6 col-xs-12 m-clear">
             <label>No. Of Vacancy</label>
             <input type="text" class="form-control" name="no_vaccancy" placeholder="No. Of Vacancy">
           </div>

           <div class="col-md-3 col-sm-6 col-xs-12 m-clear">
             <label>Company Logo</label>
             <div class="custom-file-upload">
               <input type="file" id="file" name="myfiles[]" multiple />
             </div>
           </div>

           <div class="col-md-12 col-sm-6 col-xs-12 m-clear">
         <label for="item_name"><span class="required">*</span>job Description</label>
               <textarea name="job_description" class="form-control" required></textarea>
           </div>

           <div class="col-md-12 col-sm-6 col-xs-12 m-clear">
             <label for="item_name"><span class="required">*</span>Responsibilities and Duties</label>

                   <textarea name="responsibility" class="form-control" required></textarea>
           </div>


                      <div class="col-md-12 col-sm-6 col-xs-12 m-clear">
                        <label for="item_name"><span class="required">*</span>Job Qualification and Skills</label>

                              <textarea name="skills" class="form-control" required></textarea>
                      </div>

         </div>



              <div class="row border-bottom mx-2">


                  <div class="pull-left mt-4">
                    <small class="text-muted">Recorded by:- <?php echo $_SESSION['fName'];?></small>
                  </div>
                    </div>
                    <div class="row submit-project-btn d-none">
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
<!-- end of post job modal -->

<div class="row">
  <div class="col-lg-12 col-xs-12">
    <div class="card card-success card-outline">

      <div class="card-body table-responsive">


        <?php
        $sql_query1 =  mysqli_query($dbc,"SELECT * FROM job_posting  ORDER BY id");

        $number = 1;
        if($total_rows1 = mysqli_num_rows($sql_query1) > 0)
        {?>

  <table id="example" class="table table-striped table-bordered" style="width:100%">

    <thead>
      <tr>
        <td></td>
        <td></td>



     <!--   <td>Status</td> -->
      </tr>
    </thead>
         <?php
         $no = 1;
          $sql = mysqli_query($dbc,"SELECT * FROM job_posting  ORDER BY id DESC");
          while($row = mysqli_fetch_array($sql)){
          ?>
         <tr style="cursor: pointer;">


           <td>

             <div class="job-verticle-list">
               <div class="vertical-job-card">
                 <div class="vertical-job-header" >
                   <form method="post" action="job-detail.php">
                   <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                   <div class="vrt-job-cmp-logo"> <a href="#"><img src="assets/img/company_logo_1.png" class="img-responsive" alt="" /></a> </div>
                   <h4>   <input type="submit" name="submit" class="btn btn-info" value="<?php echo $row['job_title'] ;?>" title="Click Here to view more details and Apply"></h4>

               </form>
                    <span class="com-tagline"><?php echo $row['company_name'] ;?></span> <span class="pull-right vacancy-no"><?php echo $row['emp_type'] ;?></span></span>
                      <span class="com-tagline"><?php echo $row['job_location'] ;?></span>
                        <span class="com-tagline"><?php echo $row['country'] ;?></span>

                        <ul class="list-unstyled list-inline font-small mt-3">

                        </ul>
          </div>

               </div>
             </div>




             </td>

             <td>
               <div class="vertical-job-card">
               <div class="vertical-job-body">
                 <div class="row">
                   <div class="col-md-9 col-sm-12 col-xs-12">
                     <ul class="can-skils">
                      <li><strong>Experience Level: </strong><?php echo $row['exp_level'] ;?></li>

                          <li><strong>No Of Vaccancy: </strong><?php echo $row['no_vaccancy'] ;?> Vaccancies </li>
                 <li><strong>Deadline: </strong><?php echo $row['deadline'] ;?></li>
                      <li> <strong> Posted: </strong> <span class="timeago"title="<?php echo $row['time_recorded'];?>"><?php echo $row['time_recorded'];?></span></li>

                     </ul>
                   </div>
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
</div>
</div>

<?php
}
else
{
      ?>
    <br/>
<div class="alert alert-info">
<strong><i class="fa fa-info-circle"></i> No Job Posted</strong>
</div>

  <?php
}
?>



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
