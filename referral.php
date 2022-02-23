<?php
session_start();
include("controllers/setup/connect.php");
require_once("controllers/auth/auth.php");

        $profile_pic = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM staff_users WHERE Email ='".$_SESSION['email']."'"));
        $url = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM site_url"));

        if(!isset($_SESSION['email']) && empty($_SESSION['email'])) {
           echo 'You must be Logged in as a Recruiter To access The referral program';

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

<style>
.fa-yahoo {
  background: #430297;
  color: white;


font-size: 30px;
width: 30px;
text-align: center;
text-decoration: none;
border-radius: 70%;
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
      <h2>Refer and Earn</h2>
      <p><a href="#" title="Home">Home</a> <i class="ti-angle-double-right"></i> Referral</p>
    </div>
  </div>
</div>
<!-- ======================= End Page Title ===================== -->
<?php
if($_SESSION['access_level'] == "recruiter" || $_SESSION['access_level'] =="admin")
{
?>
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

        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#dashboard"><i class="login-icon ti-dashboard"></i>Dashboard</a>
        </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#profile"><i class="login-icon ti-user"></i>Referral</a>
      </li>


    								<li class="nav-item">
    									<a class="nav-link" data-toggle="tab" href="#applied"><i class="ti-file"></i>FAQs</a>
    								</li>
    								<li class="nav-item">
    									<a class="nav-link" data-toggle="tab" href="#alert"><i class="ti-file"></i>Terms and Conditions</a>
    								</li>



		  </ul>
		</div>
	  </div>
	  <div class="col-md-9">

      <div class="tab-content">
        <!-- dashboard -->
        <div class="tab-pane" id="dashboard">

          <div id="dashboard_listing_blcok">
  		  <div class="col-md-4 col-sm-4">
  			<div class="statusbox">
  			  <h3>Total Referrals</h3>
  			  <div class="statusbox-content">
            <p>        <?php

                    $row3 = mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM staff_users WHERE refferred_token = '".$profile_pic['token']."'"));

                    ?>
                </p>  <strong>
  				<p class="ic_status_item ic_col_one"><i class="fa fa-balance-scale"></i></p>
  				<h2><?php echo $row3; ?> Referral(s)</strong></h2>
  				<span>Updated <?php echo $profile_pic['date_recorded'];?></span>
  			  </div>
  			</div>
  		  </div>
  		  <div class="col-md-4 col-sm-4">
  			<div class="statusbox">
  			  <h3>Coupons Earned</h3>
  			  <div class="statusbox-content">
            <p>        <?php

                    $row3 = mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM staff_users WHERE refferred_token = '".$profile_pic['token']."'"));

                    ?>
                </p>
  				<p class="ic_status_item ic_col_two"><i class="fa fa-cc-paypal"></i></p>
  				<h2>Ksh <?php echo $row3; ?>0,000 </h2>
  				<span>Updated <?php echo $profile_pic['date_recorded'];?></span>
  			  </div>
  			</div>
  		  </div>

  		</div>

        </div>
  <!-- My Profile -->
  <div class="tab-pane active container" id="profile">

    <!-- Basic Info -->
    <div class="tr-single-box">
      <div class="tr-single-header">
        <h4><i class="ti-desktop"></i> Referral Process</h4>
      </div>

      <div class="profile_detail_block">

  	Get <strong> 40% of the clients pay</strong> when you refer an employer to Potential Staffing Kenya. The more employers you refer, the more you earn.
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
      <label>Start referring now! </br>
<strong>Copy and Share your unique referral link below</strong></label>
      <input type="text" class="form-control" value ="<?php echo $profile_pic['url'];?>"  >
      <strong>or share via social media channels </strong>
      <!-- Email -->
<a href="mailto:?Subject=Potential Staffing referral Program
&Body=Hello, Kindly advertise your jobs with Potential Staffing using my unique referral code:
<?php echo $profile_pic['url'];?>
                                                    .Potential Staffing is the leading online recruitment portal in Kenya.

"><a href="#" class="fa fa-yahoo"></a></a>
<a href="https://api.whatsapp.com/send?text=Hello, Kindly advertise your jobs with Potential Staffing using my unique referral code:
                           <?php echo $profile_pic['url'];?>
                                                    .Potential Staffing is the leading online recruitment portal in Kenya" target="_blank"><i class="fa fa-whatsapp" style="font-size:48px;color:green"></i></a>
      </div>
  		</div>
    </div>
    <!-- /Basic Info -->
    <div class="detail-wrapper-header">
      <h4>How it Works


  </h4>
    </div>

    <div class="detail-wrapper-body">


        <?php
        $no = 1;
        $sql= mysqli_query($dbc,"SELECT * FROM how_it_works  ORDER BY id ASC ");
        while($employment = mysqli_fetch_array($sql))
        {
        ?>

      <div class="edu-history info"> <i></i>
        <div class="detail-info">
          <h3><?php echo $employment['details'];?></h3>

          <p><?php echo $employment['more_details'];?></p>
        </div>
      </div>
      <?php
      }
      ?>


    </div>


  </div>
  </div>

  <!-- My Resume -->

    <div class="tab-pane" id="resume">

      <div class="detail-wrapper">
        <div class="detail-wrapper-header">
          <h4>Employement History


      </h4>
        </div>
        <button class="btn btn-link" style="float:right;"
      data-toggle="modal" data-target="#add-employment-history-modal">
      <i class="fa fa-plus-circle">Add Employment History</i>
      </button>
        <div class="detail-wrapper-body">
          <?php
          //$sql_query1 =  mysqli_query($dbc,"SELECT * FROM about_me WHERE email ='".$_SESSION['email'].");
          $sql_query1 =  mysqli_query($dbc,"SELECT * FROM employment_history WHERE email ='".$_SESSION['email']."' ");
          $number = 1;
          if($total_rows1 = mysqli_num_rows($sql_query1) > 0)
          {?>

            <?php
            $no = 1;
            $sql= mysqli_query($dbc,"SELECT * FROM employment_history WHERE email ='".$_SESSION['email']."'  ORDER BY start_date DESC ");
            while($employment = mysqli_fetch_array($sql))
            {
            ?>

          <div class="edu-history info"> <i></i>
            <div class="detail-info">
              <h3><?php echo $employment['comp_name'];?></h3>
              <i><?php echo $employment['start_date'];?> - <?php echo $employment['end_date'];?></i> <span> <?php echo $employment['job_title'];?>, <i><?php echo $employment['job_level'];?></i></span>
              <p><?php echo $employment['job_responsibilities'];?></p>
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

          <div class="alert alert-success">
          <button class="btn btn-link" style="float:right;"
          data-toggle="modal" data-target="#add-employment-history-modal">
          <i class="fa fa-plus-circle"></i> Add a short overview of your Employment History
          </button>
      </div>
          <?php
          }
          ?>

        </div>

        <div class="modal fade" id="add-employment-history-modal" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">

        <div class="modal-header alert alert-success">

        <h5 class="modal-title">Adding Career History
        <span class="font-weight-bold"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form id="add-employment-history-form">

        <input type="hidden" name="add-employment-history" value="add-employment-history">
        <input type="hidden" name="email" value ="<?php echo $_SESSION['email'];?>" >

        <div class="row border-bottom mx-4">
        <div class="col-lg-3 col-xs-12 form-group">
        <label><span class="required">*</span>Employer Name</label>
          <input type="text" autocomplete="off" class="select2 form-control" name="comp_name">
        </div>
        <div class="col-lg-3 col-xs-12 form-group">
        <label><span class="required">*</span>Industry</label>
        <?php
        $result = mysqli_query($dbc, "SELECT * FROM industry ORDER BY industry_name ASC");
        echo '
        <select name="industry" data-tags="true" class="wide form-control" required>
        <option data-display="Select Industry"></option>';
        while($row = mysqli_fetch_array($result)) {
            echo '<option value="'.$row['industry_name'].'">'.$row['industry_name']."</option>";
        }
        echo '</select>';
        ?>
        </div>

        <div class="col-lg-3 col-xs-12 form-group">
          <label><span class="required">*</span>Job Title</label>
          <input type="text" autocomplete="off" class="select2 form-control" name="job_title">
        </div>
        <div class="col-lg-3 col-xs-12 form-group">
        <label><span class="required">*</span>Country</label>
          <input type="text" autocomplete="off" class="select2 form-control"  name="country">
        </div>

        </div>

        <div class="row border-bottom mx-4">



        <div class="col-lg-3 col-xs-12 form-group">
        <label><span class="required">*</span>Work Type</label>
        <?php
        $result = mysqli_query($dbc, "SELECT * FROM work_type ORDER BY work_type ASC");
        echo '
        <select name="work_type" data-tags="true" class="wide form-control" required>
        <option data-display="Select Work Type"></option>';
        while($row = mysqli_fetch_array($result)) {
        echo '<option value="'.$row['work_type'].'">'.$row['work_type']."</option>";
        }
        echo '</select>';
        ?>
        </div>



                      <div class="col-lg-3 col-xs-12 form-group">
                          <label><span class="required">*</span>Monthly Salary</label>
                            <input type="text" autocomplete="off" class="select2 form-control"  name="monthly_salary">
                      </div>

                      <div class="col-lg-3 col-xs-12 form-group">
                          <label><span class="required">*</span>Job Level</label>
                          <?php
                          $result = mysqli_query($dbc, "SELECT * FROM job_level ORDER BY job_level ASC");
                          echo '
                          <select name="job_level" data-tags="true" class="wide form-control"  required>
                          <option data-display="Select Job Level"></option>';
                          while($row = mysqli_fetch_array($result)) {
                              echo '<option value="'.$row['job_level'].'">'.$row['job_level']."</option>";
                          }
                          echo '</select>';
                          ?>
                      </div>

        </div>

        <div class="row border-bottom mx-4">

          <div class="col-lg-3 col-xs-12 form-group">
            <label> <span class="required">*</span> Start Date</label>
            <div class="input-group mb-2 mr-sm-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fal fa-calendar-day"></i></div>
              </div>
              <input type="text" class="form-control project_start_date" autocomplete="off" name="start_date" required>
            </div>
          </div>
          <div class="col-lg-3 col-xs-12 form-group">
            <label> <span class="required">*</span> End Date</label>
            <div class="input-group mb-2 mr-sm-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fal fa-calendar-day"></i></div>
              </div>
              <input type="text" class="form-control project_end_date" autocomplete="off" name="end_date" required>
            </div>
          </div>
          <div class="col-lg-3 col-xs-12 form-group">
              <label><span class="required">*</span>Duration</label>


              <input type="hidden" class="form-control project-duration-in-days" name="duration" readonly required>
              <input type="text" class="form-control pull-right project-duration bg-grey" readonly required>
          </div>

        </div>

        <div class="row border-bottom mx-4">

        <div class="col-lg-12 col-xs-12 form-group">
        <label for="job_responsibilities"><span class="required">*</span>Job Responsibilities</label>

          <textarea name="job_responsibilities" class="form-control" required></textarea>
        </div>
        </div>



              <!-- start row button -->
        <div class="row">
          <div class="col-md-12 text-center">
              <button type="submit" class="btn btn-success btn-block font-weight-bold submitting">SUBMIT</button>
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

      </div>
      <div class="detail-wrapper">
        <div class="detail-wrapper-header">
          <h4>Education History
      </h4>
        </div>

                  <button class="btn btn-link" style="float:right;"
                  data-toggle="modal" data-target="#add-education-history-modal">
                  <i class="fa fa-plus-circle">Add Education History</i>
                  </button>
        <div class="detail-wrapper-body">
          <?php
          //$sql_query1 =  mysqli_query($dbc,"SELECT * FROM about_me WHERE email ='".$_SESSION['email'].");

          $sql_query1 =  mysqli_query($dbc,"SELECT * FROM education_history WHERE email ='".$_SESSION['email']."' ");
          $number = 1;
          if($total_rows1 = mysqli_num_rows($sql_query1) > 0)
          {?>
            <?php
            $no = 1;
            $sql= mysqli_query($dbc,"SELECT * FROM education_history WHERE email ='".$_SESSION['email']."'  ORDER BY start_date DESC ");
            while($employment = mysqli_fetch_array($sql))
            {
            ?>

          <div class="edu-history info"> <i></i>
            <div class="detail-info">
              <h3><?php echo $employment['school_name'];?></h3>
              <i><?php echo $employment['start_date'];?> - <?php echo $employment['end_date'];?></i> <span> <?php echo $employment['qualification'];?>, <i><?php echo $employment['qualification_name'];?></i></span>
              <p><?php echo $employment['description'];?></p>
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



          <div class="alert alert-success">
            <button class="btn btn-link" style="float:right;"
            data-toggle="modal" data-target="#add-education-history-modal">
            <i class="fa fa-plus-circle"></i> Add a short overview of your Education History</p>
            </button>
          </div>

          <?php
          }
          ?>

        </div>


                <!-- start add end product modal -->
                <div class="modal fade" id="add-education-history-modal" role="dialog">
                <div class="modal-dialog" role="document">
                <div class="modal-content">

                <div class="modal-header alert alert-success">

                <h5 class="modal-title">Adding Education History
                <span class="font-weight-bold"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form id="add-education-history-form">

                <input type="hidden" name="add-education-history" value="add-education-history">
                <input type="hidden" name="email" value ="<?php echo $_SESSION['email'];?>" >

                <div class="row border-bottom mx-4">
                <div class="col-lg-12 col-xs-12 form-group">
                <label><span class="required">*</span>Institution</label>
                  <input type="text" autocomplete="off" class="select2 form-control" name="school_name">
                </div>
                <div class="col-lg-6 col-xs-12 form-group">
                <label><span class="required">*</span>Qualification</label>
                <?php
                $result2 = mysqli_query($dbc, "SELECT * FROM qualification ORDER BY id ASC");
                echo '
                <select name="qualification" data-tags="true" class="wide form-control"  required>
                <option data-display="Qualification"></option>';
                while($row = mysqli_fetch_array($result2)) {
                    echo '<option value="'.$row['rank_name'].'">'.$row['rank_name']."</option>";
                }
                echo '</select>';
                ?>
                </div>


                <div class="col-lg-6 col-xs-12 form-group">
                <label><span class="required">*</span>Course Name</label>
                  <input type="text" autocomplete="off" class="select2 form-control" name="qualification_name">
                </div>


                </div>


                <div class="row border-bottom mx-4">

                  <div class="col-lg-5 col-xs-12 form-group">
                    <label> <span class="required">*</span> Start Date</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fal fa-calendar-day"></i></div>
                      </div>
                      <input type="text" class="form-control project_start_date" autocomplete="off" name="start_date" required>
                    </div>
                  </div>
                  <div class="col-lg-5 col-xs-12 form-group">
                    <label> <span class="required">*</span> End Date</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fal fa-calendar-day"></i></div>
                      </div>
                      <input type="text" class="form-control project_end_date" autocomplete="off" name="end_date" required>
                    </div>
                  </div>
                  <div class="col-lg-2 col-xs-12 form-group">
                      <label>Duration</label>


                      <input type="hidden" class="form-control project-duration-in-days" name="duration" readonly required>
                      <input type="text" class="form-control pull-right project-duration bg-grey" readonly required>
                  </div>

                </div>

                <div class="row border-bottom mx-4">

                <div class="col-lg-12 col-xs-12 form-group">
                <label for="description"><span class="required">*</span>Description</label>

                  <textarea name="description" class="form-control" required></textarea>
                </div>
                </div>



                      <!-- start row button -->
                <div class="row">
                  <div class="col-md-12 text-center">
                      <button type="submit" class="btn btn-success btn-block font-weight-bold submitting">SUBMIT</button>
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
      </div>

      <div class="detail-wrapper">
        <div class="detail-wrapper-header">
          <h4>Certificate and Awards
      </h4>
        </div>

        <button class="btn btn-link" style="float:right;"
      data-toggle="modal" data-target="#add-awards-history-modal">
      <i class="fa fa-plus-circle">Add Certificate and Awards</i>
      </button>
        <div class="detail-wrapper-body">
          <?php
          //$sql_query1 =  mysqli_query($dbc,"SELECT * FROM about_me WHERE email ='".$_SESSION['email'].");


          $sql_query1 =  mysqli_query($dbc,"SELECT * FROM awards WHERE email ='".$_SESSION['email']."' ");
          $number = 1;
          if($total_rows1 = mysqli_num_rows($sql_query1) > 0)
          {?>

            <?php
            $no = 1;
            $sql2= mysqli_query($dbc,"SELECT * FROM awards ORDER BY year_received DESC ");
            while($awards = mysqli_fetch_array($sql2))
            {
            ?>

          <div class="edu-history info"> <i></i>
            <div class="detail-info">
              <h3><?php echo $awards['institution'];?></h3>
              <i><?php echo $awards['year_received'];?></i> <span> <?php echo $awards['award_name'];?>, <i><?php echo $awards['type'];?></i></span>

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



          <div class="alert alert-success">
            <button class="btn btn-link" style="float:right;"
            data-toggle="modal" data-target="#add-awards-history-modal">
            <i class="fa fa-plus-circle"></i> Give overview of Certificates and Awards</p>
            </button>
          </div>

          <?php
          }
          ?>

        </div>


          <!-- start add end product modal -->
          <div class="modal fade" id="add-awards-history-modal" role="dialog">
          <div class="modal-dialog" role="document">
          <div class="modal-content">

          <div class="modal-header alert alert-success">

          <h5 class="modal-title">Adding Certificates And Awards
          <span class="font-weight-bold"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body">
          <form id="add-awards-history-form">

          <input type="hidden" name="add-awards-history" value="add-awards-history">
          <input type="hidden" name="email" value ="<?php echo $_SESSION['email'];?>" >

          <div class="row border-bottom mx-4">
          <div class="col-lg-5 col-xs-12 form-group">
          <label><span class="required">*</span>Institution</label>
            <input type="text" autocomplete="off" class="select2 form-control" name="institution">
          </div>
          <div class="col-lg-5 col-xs-12 form-group">
          <label><span class="required">*</span>Award Name</label>
          <?php
          $result2 = mysqli_query($dbc, "SELECT * FROM award_type ORDER BY id ASC");
          echo '
          <select name="type" data-tags="true" class="wide form-control" required>
          <option data-display="Select Award Type"></option>';
          while($row = mysqli_fetch_array($result2)) {
              echo '<option value="'.$row['type'].'">'.$row['type']."</option>";
          }
          echo '</select>';
          ?>
          </div>

          <div class="col-lg-5 col-xs-12 form-group">
          <label><span class="required">*</span>Award Name</label>
            <input type="text" autocomplete="off" class="select2 form-control" name="award_name">
          </div>
          <div class="col-lg-5 col-xs-12 form-group">
          <label> <span class="required">*</span> Year Received</label>
          <div class="input-group mb-2 mr-sm-2">
          <div class="input-group-prepend">
            <div class="input-group-text"><i class="fal fa-calendar-day"></i></div>
          </div>
          <input type="text" class="form-control project_start_date" autocomplete="off" name="year_received" required>
          </div>
          </div>


          </div>

                <!-- start row button -->
          <div class="row">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-success btn-block font-weight-bold submitting">SUBMIT</button>
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
      </div>
      <hr style="border-top: 1px dashed #8c8b8b;">
          <!-- Add Skills -->
          <div class="detail-wrapper-header">
            <h4>Skills, Competencies and KPI


      </h4>
          </div>
          <div class="row">
            <div class="col-md-6">

              <button class="btn btn-link" style="float:right;"
        data-toggle="modal" data-target="#add-skills-modal">
        <i class="fa fa-plus-circle">Add Skills</i>
        </button>

        <!-- start add end product modal -->
        <div class="modal fade" id="add-skills-modal" role="dialog">
        <div class="modal-dialog" role="document">
        <div class="modal-content">

        <div class="modal-header alert alert-success">

        <h5 class="modal-title">Adding Skills
        <span class="font-weight-bold"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          <form id="add-job-skills-form">

      <input type="hidden" name="add-job-skills-history" value="add-job-skills-history">
      <input type="hidden" name="email" value ="<?php echo $_SESSION['email'];?>">
      <div class="row">


      <div class="col-lg-12 col-xs-12 form-group">
      <label><span class="required">*</span>Enter Skills</label>
      <input type="text" class="form-control" name="skill_name" placeholder="skill_name">
      </div>

                </div>




      <div class="row">
      <div class="col-md-12 text-center">
      <button type="submit" class="btn btn-success btn-block font-weight-bold submitting">SUBMIT Job Skills</button>
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

              <?php
              //$sql_query1 =  mysqli_query($dbc,"SELECT * FROM about_me WHERE email ='".$_SESSION['email'].");
    $row8 = mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM selected_job_skills WHERE email ='".$_SESSION['email']."' ORDER by id DESC"));

              $sql_query1 =  mysqli_query($dbc,"SELECT * FROM selected_job_skills WHERE email ='".$_SESSION['email']."' ");
              $number = 1;
              if($total_rows1 = mysqli_num_rows($sql_query1) > 0)
              {?>


                  <table class="table table-striped table-bordered skills-table" style="width:100%">
              <thead>
              <tr>
              <td>#</td>
              <td><strong><?php echo $row8; ?> Job Skills </strong></td>

              </tr>
              </thead>
              <?php
              $no = 1;
              $sql2= mysqli_query($dbc,"SELECT * FROM selected_job_skills WHERE email ='".$_SESSION['email']."' ");
              while($awards = mysqli_fetch_array($sql2))
              {
              ?>
              <tr style="cursor: pointer;">
              <td width="40px"><?php echo $no++ ;?>.

              </td>

              <td><?php echo $awards['skill_name'];?></td>


              </tr>
              <?php
              }
              ?>
              </table>

              <?php
              }
              else
              {
              ?>

              <button class="btn btn-link" style="float:right;">
           No Skills</p>
              </button>

              <?php
              }
              ?>
            </div>
            <div class="col-md-6">

              <button class="btn btn-link" style="float:right;"
        data-toggle="modal" data-target="#add-competency-modal">
        <i class="fa fa-plus-circle">Add competency</i>
        </button>

        <!-- start add end product modal -->
        <div class="modal fade" id="add-competency-modal" role="dialog">
        <div class="modal-dialog" role="document">
        <div class="modal-content">

        <div class="modal-header alert alert-success">

        <h5 class="modal-title">Adding competency
        <span class="font-weight-bold"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          <form id="add-competency-form">

      <input type="hidden" name="add-competency-history" value="add-competency-history">
      <input type="hidden" name="email" value ="<?php echo $_SESSION['email'];?>">
      <div class="row">


      <div class="col-lg-12 col-xs-12 form-group">
      <label><span class="required">*</span>Enter Competency</label>
      <input type="text" class="form-control" name="competency_name" placeholder="competency name">
      </div>

                </div>




      <div class="row">
      <div class="col-md-12 text-center">
      <button type="submit" class="btn btn-success btn-block font-weight-bold submitting">SUBMIT Competency</button>
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

              <?php
              //$sql_query1 =  mysqli_query($dbc,"SELECT * FROM about_me WHERE email ='".$_SESSION['email'].");

    $row9 = mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM selected_competencies WHERE email ='".$_SESSION['email']."' ORDER by id DESC"));
              $sql_query1 =  mysqli_query($dbc,"SELECT * FROM selected_competencies WHERE email ='".$_SESSION['email']."'");
              $number = 1;
              if($total_rows1 = mysqli_num_rows($sql_query1) > 0)
              {?>

             <table  class="table table-striped table-bordered skills-table" style="width:100%">
              <thead>
              <tr>
              <td>#</td>
              <td><strong><?php echo $row9; ?> Competencies </strong></td>

              </tr>
              </thead>
              <?php
              $no = 1;
              $sql2= mysqli_query($dbc,"SELECT * FROM selected_competencies WHERE email ='".$_SESSION['email']."' ");
              while($awards = mysqli_fetch_array($sql2))
              {
              ?>
              <tr style="cursor: pointer;">
              <td width="40px"><?php echo $no++ ;?>.

              </td>

              <td><?php echo $awards['competency_name'];?></td>


              </tr>
              <?php
              }
              ?>
              </table>

              <?php
              }
              else
              {
              ?>

              <button class="btn btn-link" style="float:right;">
           No Competency</p>
              </button>

              <?php
              }
              ?>
            </div>
            <div class="col-md-6">

              <button class="btn btn-link" style="float:right;"
        data-toggle="modal" data-target="#add-KPI-modal">
        <i class="fa fa-plus-circle">Add KPI</i>
        </button>

        <!-- start add end product modal -->
        <div class="modal fade" id="add-KPI-modal" role="dialog">
        <div class="modal-dialog" role="document">
        <div class="modal-content">

        <div class="modal-header alert alert-success">

        <h5 class="modal-title">Adding KPI
        <span class="font-weight-bold"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form id="add-KPI-form">

      <input type="hidden" name="add-KPI-history" value="add-KPI-history">
      <input type="hidden" name="email" value ="<?php echo $_SESSION['email'];?>">
      <div class="row">


      <div class="col-lg-12 col-xs-12 form-group">
      <label><span class="required">*</span>Enter KPI</label>
      <input type="text" class="form-control" name="kpi_name" placeholder="kpi_name">
      </div>

                </div>




      <div class="row">
      <div class="col-md-12 text-center">
      <button type="submit" class="btn btn-success btn-block font-weight-bold submitting">SUBMIT KPI</button>
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


              <?php
              //$sql_query1 =  mysqli_query($dbc,"SELECT * FROM about_me WHERE email ='".$_SESSION['email'].");

    $row9 = mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM selected_kpi WHERE email ='".$_SESSION['email']."' ORDER by id DESC"));
              $sql_query1 =  mysqli_query($dbc,"SELECT * FROM selected_kpi WHERE email ='".$_SESSION['email']."'");
              $number = 1;
              if($total_rows1 = mysqli_num_rows($sql_query1) > 0)
              {?>

      <table  class="table table-striped table-bordered skills-table" style="width:100%">
              <thead>
              <tr>
              <td>#</td>
              <td><strong> <?php echo $row9; ?> KPI </strong> </td>

              </tr>
              </thead>
              <?php
              $no = 1;
              $sql2= mysqli_query($dbc,"SELECT * FROM selected_kpi WHERE email ='".$_SESSION['email']."' ");
              while($awards = mysqli_fetch_array($sql2))
              {
              ?>
              <tr style="cursor: pointer;">
              <td width="40px"><?php echo $no++ ;?>.

              </td>

              <td><?php echo $awards['kpi_name'];?></td>


              </tr>
              <?php
              }
              ?>
              </table>

              <?php
              }
              else
              {
              ?>

              <button class="btn btn-link" style="float:right;">
           No JPI</p>
              </button>

              <?php
              }
              ?>
            </div>
          </div>



    </div>

    <!-- Add Educations -->

    <!-- /Education Info -->

  <!-- alert job -->
  <div class="tab-pane" id="alert">



  </div>

  <!-- CV & Cover letter -->
  <div class="tab-pane" id="cv">
    <!-- CV & Cover letter -->
    <div class="tr-single-box">
      <div class="tr-single-header">
        <h4><i class="ti-desktop"></i> CV & Cover letter</h4>
        <button class="btn btn-link" style="float:left;"
              title="Click here to attach evidence documents"  data-toggle="modal" data-target="#evidence-document-modal">
                <i class="fa fa-paperclip">Attach CV and Cover Letter</i>
        </button>

      </div>

      <div class="tr-single-body">
        <div class="card-header">
            Evidence Documents

          </div>
          <div class="card-body table-responsive">

            <?php
          $sql_query1 =  mysqli_query($dbc,"SELECT * FROM all_evidence_document WHERE reference_no ='".$_SESSION['email']."' ORDER BY id ");

          $number = 1;
          if($total_rows1 = mysqli_num_rows($sql_query1) > 0)
          {?>
           <table class="table table-striped table-bordered table-hover" id="invoice-received-table" style="width:100%">
               <tr>
                 <td>#</td>
                 <td>Curriculum Vitae</td>
                 <td>Tertiary Certificate</td>
                 <td>Cover Letter</td>
                  <td>Email</td>

             </tr>
             </thead>
             <?php

               $sql = mysqli_query($dbc,"SELECT * FROM all_evidence_document WHERE reference_no ='".$_SESSION['email']."' ORDER BY id DESC limit 1");
                 while($invoice = mysqli_fetch_array($sql))

                 {?>
                   <tr style="cursor: pointer;">
                     <td><?php echo $number++;?>. </td>
                     <td>    <a href="views/documents/<?php echo $invoice['cv'];?>" target="_blank">

                                  <?php echo $invoice['cv'];?>

                                   </a>
                                 </td>
                     <td> <a href="views/documents/<?php echo $invoice['college_doc'];?>" target="_blank">
                          <?php echo $invoice['college_doc'];?>
                                   </a>
                                 </td>
                     <td><a href="views/documents/<?php echo $invoice['kcse_doc'];?>" target="_blank">

                              <?php echo $invoice['kcse_doc'];?>
                                   </a>
                                   </td>
                                   <td>
                                     <?php echo $invoice['reference_no'];
                                       ?>

                                   </td>
                  </tr>
                  <?php
                }
              ?>
           </table>

           <?php
           }
           else
           {
                 ?>
               <br/>
      <div class="alert alert-success">
      <strong><i class="fa fa-info-circle"></i> No attached Evidence Document</strong>
      </div>

             <?php
           }
           ?>
                 </div>
      </div>
      <!-- start evidence doc modal -->


      <div class="modal fade" id="evidence-document-modal" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header alert alert-success">

              <h5 class="modal-title">Attaching Supporting Documents for <strong><?php echo $name['fName'];?></strong>

                 <span class="font-weight-bold"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="add-evidence-document-form" class="mt-4" enctype="multipart/form-data">
                <input type="hidden" name="reference_no" value="<?php echo $_SESSION['email'];?>">

                <input type="hidden" name="add-evidence-document" value="add-evidence-document">

                <div class="row border-bottom mx-2">

                <div class="col-lg-12 col-xs-12">

                  <div class="input-group mb-12">
                    <div class="input-group-prepend">
                      <span class="input-group-btn">
                          <span class="btn btn-primary btn-file project-file">
                              <i class="fal fa-file-alt"></i>  Browse CV Document &hellip; <input type="file" name="additional_file2" class="form-control purchase-order-document" single>
                          </span>
                      </span>
                    </div>

                  </div>
                  <div class="row purchase-order-document-error"></div>

                </div>

                <div class="col-lg-12 col-xs-12">

                  <div class="input-group mb-12">
                    <div class="input-group-prepend">
                      <span class="input-group-btn">
                          <span class="btn btn-primary btn-file project-file">
                              <i class="fal fa-file-alt"></i>  Browse Tertiary Document &hellip; <input type="file" name="additional_file" class="form-control delivery-note-document" single>
                          </span>
                      </span>
                    </div>

                  </div>
                  <div class="row delivery-note-document-error"></div>

                </div>

                              <div class="col-lg-12 col-xs-12">

                                <div class="input-group mb-12">
                                  <div class="input-group-prepend">
                                    <span class="input-group-btn">
                                        <span class="btn btn-primary btn-file project-file">
                                            <i class="fal fa-file-alt"></i>  Browse Cover Letter&hellip; <input type="file" name="file" class="form-control invoice-document" single>
                                        </span>
                                    </span>
                                  </div>

                                </div>
                                <div class="row invoice-document-error"></div>

                              </div>

                    <div class="pull-left mt-4">
                      <small class="text-muted">Recorded by:- <?php echo $_SESSION['fName'];?></small>
                    </div>
                      </div>



                <div class="row text-center">
                    <button type="submit" class="btn btn-primary btn-block btn_submit_total submitting8">SUBMIT</button>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- end add evidence doc -->

    </div>
    <!-- /CV -->



  </div>

  <!-- package -->
  <div class="tab-pane" id="package">
    <table class="table table-striped tbl-big center mb-5">
      <thead class="bg-primary text-light">
        <tr>
          <th scope="col">Select</th>
          <th scope="col">Title</th>
          <th scope="col">Jobs Remaining</th>
          <th scope="col">Features Remaining</th>
          <th scope="col">Renew Remaining</th>
          <th scope="col">Duration</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th>
            <input type="radio" class="radio-custom" id="basic" name="cm-r" checked>
            <label for="basic" class="radio-custom-label"></label>
          </th>
          <td>Basic</td>
          <td>15</td>
          <td>07</td>
          <td>5</td>
          <td>30 Days</td>
        </tr>
        <tr>
          <th>
            <input type="radio" class="radio-custom" id="premium" name="cm-r">
            <label for="premium" class="radio-custom-label"></label>
          </th>
          <td>Premium</td>
          <td>18</td>
          <td>12</td>
          <td>2</td>
          <td>60 Days</td>
        </tr>

      </tbody>
    </table>

    <table class="table table-striped tbl-big center mb-5">
      <thead class="bg-primary text-light">
        <tr>
          <th scope="col">Select</th>
          <th scope="col">Title</th>
          <th scope="col">Price</th>
          <th scope="col">Jobs Posting</th>
          <th scope="col">Feature Jobs</th>
          <th scope="col">Renew Jobs</th>
          <th scope="col">Duration</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th>
            <input type="radio" class="radio-custom" id="basic-p" name="nm-r" checked>
            <label for="basic-p" class="radio-custom-label"></label>
          </th>
          <td>Basic</td>
          <td>$49</td>
          <td>50</td>
          <td>50</td>
          <td>30</td>
          <td>30 Days</td>
        </tr>
        <tr>
          <th>
            <input type="radio" class="radio-custom" id="premium-p" name="nm-r">
            <label for="premium-p" class="radio-custom-label"></label>
          </th>
          <td>Premium</td>
          <td>$99</td>
          <td>99</td>
          <td>50</td>
          <td>30</td>
          <td>30 Days</td>
        </tr>
        <tr>
          <th>
            <input type="radio" class="radio-custom" id="standard-p" name="nm-r">
            <label for="standard-p" class="radio-custom-label"></label>
          </th>
          <td>Standard</td>
          <td>$149</td>
          <td>170</td>
          <td>10</td>
          <td>50</td>
          <td>60 Days</td>
        </tr>
        <tr>
          <th>
            <input type="radio" class="radio-custom" id="platinum-p" name="nm-r">
            <label for="platinum-p" class="radio-custom-label"></label>
          </th>
          <td>Platinum</td>
          <td>$499</td>
          <td>250</td>
          <td>100</td>
          <td>70</td>
          <td>60 Days</td>
        </tr>

      </tbody>
    </table>

    <button class="btn btn-md btn-info" type="submit">Continue<i class="ti-arrow-right ml-2"></i></button>
  </div>

  <!--view profile -->

  <div class="tab-pane" id="profile">
    <table class="table table-striped tbl-big center mb-5">
      <thead class="bg-primary text-light">
        <tr>
          <th scope="col">Select</th>
          <th scope="col">Title</th>
          <th scope="col">Jobs Remaining</th>
          <th scope="col">Features Remaining</th>
          <th scope="col">Renew Remaining</th>
          <th scope="col">Duration</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th>
            <input type="radio" class="radio-custom" id="basic" name="cm-r" checked>
            <label for="basic" class="radio-custom-label"></label>
          </th>
          <td>Basic</td>
          <td>15</td>
          <td>07</td>
          <td>5</td>
          <td>30 Days</td>
        </tr>
        <tr>
          <th>
            <input type="radio" class="radio-custom" id="premium" name="cm-r">
            <label for="premium" class="radio-custom-label"></label>
          </th>
          <td>Premium</td>
          <td>18</td>
          <td>12</td>
          <td>2</td>
          <td>60 Days</td>
        </tr>

      </tbody>
    </table>

    <table class="table table-striped tbl-big center mb-5">
      <thead class="bg-primary text-light">
        <tr>
          <th scope="col">Select</th>
          <th scope="col">Title</th>
          <th scope="col">Price</th>
          <th scope="col">Jobs Posting</th>
          <th scope="col">Feature Jobs</th>
          <th scope="col">Renew Jobs</th>
          <th scope="col">Duration</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th>
            <input type="radio" class="radio-custom" id="basic-p" name="nm-r" checked>
            <label for="basic-p" class="radio-custom-label"></label>
          </th>
          <td>Basic</td>
          <td>$49</td>
          <td>50</td>
          <td>50</td>
          <td>30</td>
          <td>30 Days</td>
        </tr>
        <tr>
          <th>
            <input type="radio" class="radio-custom" id="premium-p" name="nm-r">
            <label for="premium-p" class="radio-custom-label"></label>
          </th>
          <td>Premium</td>
          <td>$99</td>
          <td>99</td>
          <td>50</td>
          <td>30</td>
          <td>30 Days</td>
        </tr>
        <tr>
          <th>
            <input type="radio" class="radio-custom" id="standard-p" name="nm-r">
            <label for="standard-p" class="radio-custom-label"></label>
          </th>
          <td>Standard</td>
          <td>$149</td>
          <td>170</td>
          <td>10</td>
          <td>50</td>
          <td>60 Days</td>
        </tr>
        <tr>
          <th>
            <input type="radio" class="radio-custom" id="platinum-p" name="nm-r">
            <label for="platinum-p" class="radio-custom-label"></label>
          </th>
          <td>Platinum</td>
          <td>$499</td>
          <td>250</td>
          <td>100</td>
          <td>70</td>
          <td>60 Days</td>
        </tr>

      </tbody>
    </table>

    <button class="btn btn-md btn-info" type="submit">Continue<i class="ti-arrow-right ml-2"></i></button>
  </div>

  <!-- change-password -->
  <div class="tab-pane" id="change-password">
    <div class="tr-single-box">
      <div class="tr-single-header">
        <h4><i class="lni-lock"></i> Change Password</h4>
      </div>

      <div class="tr-single-body">
        <div class="form-group">
          <label>Current Password</label>
          <input class="form-control" type="password">
        </div>
        <div class="form-group">
          <label>New Password</label>
          <input class="form-control" type="password">
        </div>
        <div class="form-group">
          <label>Confirm Password</label>
          <input class="form-control" type="password">
        </div>
      </div>

    </div>

    <a href="#" class="btn btn-info btn-md full-width">Save & Update<i class="ml-2 ti-arrow-right"></i></a>

  </div>


    <!-- applied job -->
    <div class="tab-pane" id="applied">


    </div>

</div>

      </div>
    </div>
  </div>
</section>
<!-- ================ End Profile Settings ======================= -->

               <?php
               }
               else
               {?>

                 <br/>
             <div class="alert alert-info">
             <strong><i class="fa fa-info-circle"></i> You must be a Recruiter to Access the Referral Program</strong>
             </div>
<?php
               }
               ?>
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
$('.skills-table').DataTable({
  destroy: true,
  "pageLength": 5
});

</script>
</body>

<!-- Mirrored from utouchdesign.com/themes/envato/escort/profile-settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Feb 2021 07:04:47 GMT -->
</html>
