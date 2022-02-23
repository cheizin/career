<?php
session_start();
include("controllers/setup/connect.php");
require_once("controllers/auth/auth.php");


$about_me =  mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM about_me WHERE email ='".$_SESSION['email']."'"));

$emp_details = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM employment_history WHERE email ='".$_SESSION['email']."'"));


$test_details = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM application_status_details WHERE email ='".$_SESSION['email']."' && status_name = 'Testing' ORDER BY id DESC LIMIT 1"));


$applied_details = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM applied_jobs WHERE email ='".$_SESSION['email']."'"));
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
        <li><a href="resources.php">E-Resources</a></li>

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

<!-- ======================= Start Banner ===================== -->
 <!-- <div class="utf_main_banner_area" style="background-image:url(assets/img/slider_bg.jpg);" data-overlay="8"> -->
 <div class="utf_main_banner_area" style="background-image:url(assets/img/slider_bg.jpg);">
  <div class="container">
    <div class="col-md-8 col-sm-10">
      <div class="caption cl-white">
        <h2>Get the right </br><span class="theme-cl">Job Vaccancies  </span> and <span class="theme-cl"> Careers</span></h2>
        <p> </p> What we say is what we do <a href="resources.php" target="_blank"><img border="0" alt="Click here" src="assets/img/clickhere.png" width="100" height="50"> </a><br/>
        <p> Refer and Earn! Invite employers from your network to join Potential Staffing & you will get 40% of the Clients pay
          <span class="trending_key"><a href="referral.php" target="_blank">Clck here to refer
							</a></span>

            </p>


              <strong>

<!--
                <?php

              $sql_query1 =  mysqli_query($dbc,"SELECT * FROM application_status_details WHERE email ='".$_SESSION['email']."' && status_name = 'Testing'  ORDER BY reference_no DESC limit 1");
              $number = 1;
              if($total_rows1 = mysqli_num_rows($sql_query1) > 0)
              {?>


                          <form method="post" action="test_answer_management.php">
                          <input type="hidden" name="reference_no" value="<?php echo $test_details['reference_no'];?>">
                          <div class="cta-text">
                            <h3><span class="days_remaining caption cl-white home_two_slid"></h3>
                           <h4>   <input type="submit" name="submit" class="btn btn-info" value="Click here To access the Assigned Test" title="Click here To access the Test"></h4>
                            </div>
                      </form>
             <?php

                              }
                              else
                              {

                                echo $row2['job_status'];

                              }
                              ?>
                            -->



                                  </strong>


      </div>

    </div>
  </div>
</div>

<!-- ======================= End Banner ===================== -->

<!-- ================= Job start ========================= -->
<section class="padd-top-80 padd-bot-80">
  <div class="container">
    <div class="row">


      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="heading">
            <h2>Job Listing</h2>

          </div>
        </div>
    </div>
    <div class="tab-content">
      <div class="tab-pane fade in show active" id="recent" role="tabpanel">
        <div class="row">
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
            $sql = mysqli_query($dbc,"SELECT * FROM job_posting ORDER BY id DESC");
            while($row = mysqli_fetch_array($sql)){
            ?>
           <tr style="cursor: pointer;">


             <td>
               <!-- Single Verticle job -->
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
      </div>


</section>

<!-- ================= Category start ========================= -->
<section class="utf_job_category_area">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="heading">
          <h2>Job Industries</h2>
		  <p>Here are some of the popular Job Industries</p>
        </div>
      </div>
    </div>
    <div class="row">
		<div class="col-md-12">

      <?php
      $sql_query1 =  mysqli_query($dbc,"SELECT * FROM industry  ORDER BY id");

      $number = 1;
      if($total_rows1 = mysqli_num_rows($sql_query1) > 0)
      {

        $no = 1;
         $sql = mysqli_query($dbc,"SELECT * FROM industry  ORDER BY id ASC");
         while($row = mysqli_fetch_array($sql)){
         ?>
		  <div class="col-md-3 col-sm-6">
			<a href="browse-job.php" method="post" title="">

        <input type="hidden" name="industry_name" value="<?php echo $row['industry_name']; ?>">

				<div class="utf_category_box_area">
				  <div class="utf_category_desc">
					<div class="utf_category_icon"> <i class="<?php echo $row['class'] ;?> " aria-hidden="true"></i> </div>
					<div class="category-detail utf_category_desc_text">
					  <h4><?php echo $row['industry_name'] ;?></h4>
					  <p>        <?php

                    $row3 = mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM job_posting WHERE job_category = '".$row['industry_name']."'"));


                    ?>
                <strong>     <?php echo $row3; ?> Jobs</strong></p>
					</div>
				  </div>
				</div>


			</a>
		  </div>

      <?php
         }
       ?>


      <?php
      }
      else
      {
      ?>
      <br/>
      <div class="alert alert-info">
      <strong><i class="fa fa-info-circle"></i> No Category Added</strong>
      </div>

      <?php
      }
      ?>

	  </div>
    </div>
  </div>
</section>


<div class="utf_main_banner_area" style="background-image:url(assets/img/sponsors.png);" data-overlay="8">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="heading">
          <h2>Our Clients</h2>

        </div>
      </div>
    </div>

  </div>
    </div>
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

<?php
include("views/script.php");
?>
<script src="controllers/typed.js"></script>
<script src="controllers/days_remaining.js"></script>
</body>

<!-- Mirrored from utouchdesign.com/themes/envato/escort/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Feb 2021 07:02:10 GMT -->
</html>
