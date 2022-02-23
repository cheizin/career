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

<!-- CSS -->
<style type="text/css">
.cke_textarea_inline{
  border: 1px solid black;
}
</style>

  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/skin.cma.css">
   <link rel="stylesheet" href="dist/css/loader.css">

  <!-- Date Picker -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="dist/css/custom.css">
  <link type="text/css" rel="stylesheet" href="bower_components/sweet/sweetalert.css"  media="screen,projection"/>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <script>
  function showActivity(str) {
    $('.activity_type').hide();
    $('.kpi-class').hide();
      if (str == "") {
          document.getElementById("main_activity_data").innerHTML = "";
          return;
      } else {
          if (window.XMLHttpRequest) {
              // code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp = new XMLHttpRequest();
          } else {
              // code for IE6, IE5
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("main_activity_data").innerHTML = this.responseText;
              }
          };
          xmlhttp.open("GET","functions/get-main-activity-data.php?q="+str,true);
          xmlhttp.send();
      }
  }

  </script>
<script src="ckeditor/ckeditor.js" ></script>
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
  <img src="assets/img/<?php echo $profile_pic['emp_photo']; ?>" class="img-responsive img-circle" alt=""> <?php echo $_SESSION['fName'];?>, <?php echo $_SESSION['lName'];?>
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
             <textarea id='short_desc' name="short_desc" style='border: 1px solid black;' readonly  >  Email Marketing </textarea><br>
      </h2>
        <p><a href="#" title="Home">Home</a> <i class="ti-angle-double-right"></i> emails</p>
    </div>
  </div>
</div>

<!-- ======================= End Page Title ===================== -->
<!-- ================ Profile Settings ======================= -->
<section class="padd-top-80 padd-bot-80">
  <div class="container">
    <div class="row">
      <div class="col-md-3">

		<div class="dashboard_nav_item">
		  <ul>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#saved_messages"><i class="login-icon ti-user"></i>Saved Messsages</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#send_clients"><i class="login-icon ti-dashboard"></i>Send to Clients</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#send_job_seeker"><i class="login-icon ti-dashboard"></i>Send to Job-seeker</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#send_individual"><i class="login-icon ti-dashboard"></i>Send to Individual</a>
        </li>


<input type="hidden" name="email" class="email" value="<?php echo $_SESSION['email'];?>">



		  </ul>
		</div>
	  </div>


    <div class="col-md-9">

      <div class="tab-content">

        <div class="tab-pane active container" id="saved_messages">

          <!-- Basic Info -->
          <div class="tr-single-box">
            <div class="tr-single-header">
              <h4><i class="ti-desktop"></i> Saved Messages</h4>
            </div>


  <div class="col-lg-10 col-xs-12">
                  <div class="profile_detail_block">
              <?php
            //  $job_applied = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM applied_jobs WHERE applicant_email ='".$_SESSION['email']."' "));
            $sql_query1 =  mysqli_query($dbc,"SELECT * FROM bulk_email ORDER BY id");

              $number = 1;
              if($total_rows1 = mysqli_num_rows($sql_query1) > 0)
              {?>

            <table id="example" class="table table-striped table-bordered" style="width:100%">

               <thead>
                 <tr>
                    <td>#</td>
                    <td>Message</td>

                <!--   <td>Status</td> -->
                 </tr>
               </thead>
               <?php
               $no = 1;
              $sql = mysqli_query($dbc,"SELECT * FROM bulk_email  ORDER BY id DESC");
                while($row = mysqli_fetch_array($sql)){
                ?>
               <tr style="cursor: pointer;">


                 <td>
                  <?php echo $no++;?>
                 </td>

        <td>
          Sent To: <strong>
            <?php
              $sql_query = mysqli_query($dbc,"SELECT * FROM bulk_email_multiple WHERE mail_details = '".$row['message']."' ");
              while($row2 = mysqli_fetch_array($sql_query))
              {
                ?>
                <?php echo $row2['mail_address'];?>,

                <?php
              }
             ?>

            <?php echo $row['sendTo'] ;?>  </strong></br> Status: <strong>Delivered</strong>  </br> Message Body: </br><?php echo $row['message'] ;?>
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
                     <div class="alert alert-info">
                     <strong><i class="fa fa-info-circle"></i> No Sent Email</strong>
                     </div>

                     <?php
                     }
                     ?>

    </div>
          </div>
          </div>
          <!-- /Basic Info -->
</div>


            <!--end of tab details -->
        <!-- dashboard -->
        <div class="tab-pane" id="send_clients">
          <div id="dashboard_listing_blcok">

            <div class="col-lg-12 col-xs-12">
              <div class="card card-success card-outline">
                <div class="card-header">

            <form id="bulk-email-form" class="mt-4" enctype="multipart/form-data">
              <input type="hidden" value="post-emails" name="post-emails">

               <div class="row">
          <!--
                   <div class="form-group">
                     <label for="item_name"><span class="required">*</span>To</label>
                     <input type="text" autocomplete="on" name="sendTo" class="form-control" placeholder="Enter Recepients Email Address">
                   </div> -->
          <label for="item_name"><span class="required">*</span>To Clients</label>
                                   <select name="sendToMany[]" class="select2 form-control" required multiple="multiple">
                          <?php
                            $sql_query = mysqli_query($dbc,"SELECT * FROM staff_users WHERE access_level ='recruiter'  ORDER BY fName ASC");
                            while($row = mysqli_fetch_array($sql_query))
                            {
                              ?>
                                <option value="<?php echo $row['Email'];?>" selected="selected"><?php echo $row['Email'];?></option>

                              <?php
                            }
                           ?>
                      </select>

                 </div>



                                  Email Message:
                                   <textarea class='long_desc' name='long_desc' ></textarea><br>
               </div>

                    <div class="row border-bottom mx-2">


                        <div class="pull-left mt-4">
                          <small class="text-muted">Sent by:- <?php echo $_SESSION['fName'];?></small>
                        </div>
                          </div>
                          <div class="row submit-project-btn d-none">
                          <div class="col-md-12 text-center">
                          <button type="submit" class="btn btn-primary btn-block font-weight-bold submitting">SEND MAIL</button>
                          </div>
                          </div>
            </form>
          </div>

          </div>

      </div>

        </div>

        <!-- send mail tab  -->
        <div class="tab-pane" id="send_job_seeker">

          <div id="dashboard_listing_blcok">

            <div class="col-lg-12 col-xs-12">
              <div class="card card-success card-outline">
                <div class="card-header">

            <form id="bulk-email-form1" class="mt-4" enctype="multipart/form-data">
              <input type="hidden" value="post-emails" name="post-emails">

               <div class="row">
          <!--
                   <div class="form-group">
                     <label for="item_name"><span class="required">*</span>To</label>
                     <input type="text" autocomplete="on" name="sendTo" class="form-control" placeholder="Enter Recepients Email Address">
                   </div> -->
          <label for="item_name"><span class="required">*</span>To Job-seeker</label>
                                   <select name="sendToMany[]" class="select2 form-control" required multiple="multiple">
                          <?php
                            $sql_query = mysqli_query($dbc,"SELECT * FROM staff_users  WHERE access_level ='job-seeker' ORDER BY fName ASC");
                            while($row = mysqli_fetch_array($sql_query))
                            {
                              ?>
                                <option value="<?php echo $row['Email'];?>" selected="selected"><?php echo $row['Email'];?></option>

                              <?php
                            }
                           ?>
                      </select>

                 </div>


                 Email Message:
                  <textarea class='long_desc2' name='long_desc2' ></textarea><br>


               </div>

                    <div class="row border-bottom mx-2">


                        <div class="pull-left mt-4">
                          <small class="text-muted">Sent by:- <?php echo $_SESSION['fName'];?></small>
                        </div>
                          </div>
                          <div class="row submit-project-btn d-none">
                          <div class="col-md-12 text-center">
                          <button type="submit" class="btn btn-primary btn-block font-weight-bold submitting">SEND MAIL</button>
                          </div>
                          </div>
            </form>
          </div>

          </div>

      </div>


        </div>
  <!-- My Profile -->

  <!-- send mail tab  -->
  <div class="tab-pane" id="send_individual">

    <div id="dashboard_listing_blcok">

      <div class="col-lg-12 col-xs-12">
        <div class="card card-success card-outline">
          <div class="card-header">

      <form id="bulk-email-form2" class="mt-4" enctype="multipart/form-data">
        <input type="hidden" value="post-emails" name="post-emails">

         <div class="row">
    <!--
             <div class="form-group">
               <label for="item_name"><span class="required">*</span>To</label>
               <input type="text" autocomplete="on" name="sendTo" class="form-control" placeholder="Enter Recepients Email Address">
             </div> -->
    <label for="item_name"><span class="required">*</span>To individual</label>  </br>
    <div class="col-md-6 col-sm-12 col-xs-12">

      <input type="text" name="sendToMany" class="form-control" placeholder="Enter Email Address">
    </div>

           </div>


           <div class="col-md-12 col-sm-6 col-xs-12 m-clear">
         <label for="item_name"><span class="required">*</span>Email Message: </label>
               <textarea name="long_desc3" class="form-control" required></textarea>
           </div>
         </div>

              <div class="row border-bottom mx-2">


                  <div class="pull-left mt-4">
                    <small class="text-muted">Sent by:- <?php echo $_SESSION['fName'];?></small>
                  </div>
                    </div>
                    <div class="row submit-project-btn d-none">
                    <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary btn-block font-weight-bold submitting">SEND MAIL</button>
                    </div>
                    </div>
      </form>
    </div>

    </div>

</div>

  </div>
<!-- My Profile -->


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

  $('#assessment-data-table').DataTable({
    destroy: true,
     "pageLength": 2
  });


</script>


<script type="text/javascript">

  // Initialize CKEditor
  CKEDITOR.inline( 'short_desc');

  CKEDITOR.replace('long_desc',{

    width: "800px",
        height: "200px"

  });
CKEDITOR.add
</script>

<script type="text/javascript">

  // Initialize CKEditor
  CKEDITOR.inline( 'short_desc');

  CKEDITOR.replace('long_desc2',{

    width: "800px",
        height: "200px"

  });
CKEDITOR.add
</script>

<script type="text/javascript">

  // Initialize CKEditor
  CKEDITOR.inline( 'short_desc');

  CKEDITOR.replace('long_desc3',{

    width: "800px",
        height: "200px"

  });
CKEDITOR.add
</script>


<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="bower_components/sweet/sweetalert.min.js"></script>

<script>

//select 2
$('.select2').select2({
  width:'100%'
});
$('#strategic_outcomes').select2({
  placeholder: "Select Strategic Outcomes"
})


//prevent sorting of values
$(".select2").on("select2:select", function (evt) {
  var element = evt.params.data.element;
  var $element = $(element);

  $element.detach();
  $(this).append($element);
  $(this).trigger("change");
});

//auto increase textarea
$('input[type=text], textarea').on('keyup', function(){
  $(this).css('height','auto');
  $(this).height(this.scrollHeight);
 });



$("#dpMonths").datepicker( {
    format: "mm-yyyy",
    startView: "months",
    minViewMode: "months",
    startDate: '-1m',
    //startDate: '0m',
    autoclose: true
});



</script>
<script>
//this scrip prevents asking for form resubmission
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>

<!-- Mirrored from utouchdesign.com/themes/envato/escort/profile-settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Feb 2021 07:04:47 GMT -->
</html>
