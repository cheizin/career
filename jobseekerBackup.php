<?php
if(!$_SERVER['REQUEST_METHOD'] == "POST")
{
  exit();
}
session_start();
include("controllers/setup/connect.php");
if(!isset($_POST['id']))
{
  exit("Please select The Job Applied ");
}

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
      <nav aria-label="breadcrumb">

        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            Job Title: <strong>  <?php echo $row['job_title'];?> <br/> </strong>JOB Code: <strong> <?php echo $_POST['id'];?> </strong>  <br/>

            Status:  <strong>
        <?php echo $row['status'];?>
                                </strong>
                                  <br/>
       Deadline: <strong> <?php echo $row['deadline'];?>  </strong><br/>
      </li>

      </ol>
      </nav>
    </div>
  </div>
</div>
<!-- ======================= End Page Title ===================== -->
<!-- ================ Profile Settings ======================= -->
<section class="padd-top-80 padd-bot-80">
  <div class="container">

            <?php
            //$sql_query1 =  mysqli_query($dbc,"SELECT * FROM about_me WHERE email ='".$_SESSION['email'].");

            $sql_query1 =  mysqli_query($dbc,"SELECT * FROM applied_jobs WHERE job_posting_id ='".$_POST['id']."' ORDER by id DESC ");
            $number = 1;
            if($total_rows1 = mysqli_num_rows($sql_query1) > 0)
            {?>

    <div class="row">
      <div class="col-lg-5 col-xs-12">
        <div class="card card-success card-outline">
          <div class="card-header">


            <div class="row border-bottom mx-4">

            </div>
            <?php

            $row3 = mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM applied_jobs WHERE job_posting_id ='".$_POST['id']."' ORDER by id DESC"));



            ?>
          <strong>     <?php echo $row3; ?> Applicant(s)</strong>
          <table id="example" class="table table-striped table-bordered" style="width:100%">

            <thead>
              <tr>
                <td>#</td>

                <td>Applicant Details</td>

                  <td>Skills</td>

             <!--   <td>Status</td> -->
              </tr>
            </thead>
            <?php
            $no = 1;
            $sql= mysqli_query($dbc,"SELECT * FROM applied_jobs WHERE job_posting_id ='".$_POST['id']."' ");
            while($row = mysqli_fetch_array($sql))
            {
                      $row4 = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM applied_jobs WHERE job_posting_id ='".$_POST['id']."'"));

            ?>


            <tr style="cursor: pointer;">

              <td width="50px"> <?php echo $no++;?>.

              </td>
                        <td  onclick="SelectProjectModule('<?php echo $row['id'];?>')">
                               <!-- Single Verticle job -->
                               <div class="job-verticle-list">
                                 <div class="vertical-job-card">
                                   <div class="vertical-job-header" >

                                     <div class="vrt-job-cmp-logo"> <a href="#"> <img src="assets/img/company_logo_1.png" class="img-responsive" alt="" /> </div>
                              <strong>   <span class="pull-left vacancy-no">                <?php

                                                    $result = mysqli_query($dbc, "SELECT * FROM staff_users WHERE Email ='".$row['applicant_email']."'"  );
                                                    if(mysqli_num_rows($result))
                                                    {
                                                      while($project= mysqli_fetch_array($result))
                                                      {
                                                          echo $project['fName'];

                                                      }
                                                    }
                                                    ?>,                      <?php

                                                                              $result = mysqli_query($dbc, "SELECT * FROM staff_users WHERE Email ='".$row['applicant_email']."'"  );
                                                                              if(mysqli_num_rows($result))
                                                                              {
                                                                                while($project= mysqli_fetch_array($result))
                                                                                {
                                                                                    echo $project['lName'];

                                                                                }
                                                                              }
                                                                              ?></span> </strong> </br><span class="pull-right vacancy-no">Applied</span></span>


                                      <span class="com-tagline"><?php

                                             $result = mysqli_query($dbc, "SELECT * FROM staff_users WHERE Email ='".$row['applicant_email']."'"  );
                                             if(mysqli_num_rows($result))
                                             {
                                               while($project= mysqli_fetch_array($result))
                                               {
                                                   echo $project['currentPosition'];

                                               }
                                             }
                                             ?></span>
                                        <span class="com-tagline">
                                               at
                                               <?php

                                                    $result = mysqli_query($dbc, "SELECT * FROM staff_users WHERE Email ='".$row['applicant_email']."'"  );
                                                    if(mysqli_num_rows($result))
                                                    {
                                                      while($project= mysqli_fetch_array($result))
                                                      {
                                                          echo $project['companyName'];

                                                      }
                                                    }
                                                    ?>
                                                    </b> <br/>
                                                      Holds a    <?php

                                                             $result = mysqli_query($dbc, "SELECT * FROM staff_users WHERE Email ='".$row['applicant_email']."'"  );
                                                             if(mysqli_num_rows($result))
                                                             {
                                                               while($project= mysqli_fetch_array($result))
                                                               {
                                                                   echo $project['highestQualification'];

                                                               }
                                                             }
                                                             ?>
                                                             with
                                                             <?php

                                                                   $result = mysqli_query($dbc, "SELECT * FROM staff_users WHERE Email ='".$row['applicant_email']."'"  );
                                                                   if(mysqli_num_rows($result))
                                                                   {
                                                                     while($project= mysqli_fetch_array($result))
                                                                     {
                                                                         echo $project['experience'];

                                                                     }
                                                                   }
                                                                   ?>

                                                                   Experience<br/></span>
                                          <span class="com-tagline"><?php echo $row['country'] ;?></span>


                            </div>

                                 </div>
                               </div>




                               </td>

                               <td>
                                 <?php

                                 $row8 = mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM selected_job_skills WHERE email ='".$row['applicant_email']."' ORDER by id DESC"));


                                                 ?>
                                                   <div class="col-md-5 col-xs-12" data-toggle="modal" data-target="#skills-modall-<?php echo $row['id'];?>">
                               <strong>     <?php echo $row8; ?>Skills</strong> <br/>
                               <div class="modal fade" id="skills-modall-<?php echo $row['id'];?>" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header alert alert-success">

        <h5 class="modal-title">Skills for <strong> : <?php echo $row['applicant_email'];?>
           <span class="font-weight-bold"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php

          $sql_query = mysqli_query($dbc,"SELECT * FROM selected_job_skills WHERE email ='".$row['applicant_email']."' ");

          while($row = mysqli_fetch_array($sql_query))
          {

            ?>
            <?php echo $row['skill_name'];?>,

            <?php
          }

         ?>
      </div>
    </div>

  </div>

                             </div>
                           </div>


                               <?php

                               $row8 = mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM selected_competencies WHERE email ='".$row['applicant_email']."' ORDER by id DESC"));


                                               ?>
                             <strong>
                                <?php echo $row8; ?>Competencies</strong>
                             <br/>

                             <?php

                             $row8 = mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM selected_kpi WHERE email ='".$row['applicant_email']."' ORDER by id DESC"));


                                             ?>
                           <strong>     <?php echo $row8; ?>KPI</strong>
                               </td>

            </tr>
            <?php
            }
            ?>
            </table>

          </div>

        </div>
      </div>

      <div class="col-lg-7 col-xs-12">
        <div class="card card-success card-outline">
          <div class="card-header">

            <div class="card project-module-data d-none">

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
    <div class="alert alert-success">
    <strong><i class="fa fa-info-circle"></i> No Applicant For the Posted Job</strong>
    </div>

      <?php
    }
    ?>
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
