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
  <img src="assets/img/<?php echo $profile_pic['emp_photo']; ?>" class="img-responsive img-circle" alt=""><?php echo $_SESSION['fName'];?>, <?php echo $_SESSION['lName'];?>
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
             <textarea id='short_desc' name="short_desc" style='border: 1px solid black;' readonly  >  Email Settings </textarea><br>
      </h2>
        <p><a href="#" title="Home">Home</a> <i class="ti-angle-double-right"></i> email Settings</p>
    </div>
  </div>
</div>

<!-- ======================= End Page Title ===================== -->
<!-- ================ Profile Settings ======================= -->

<div class="section-padding-top">
	<div class="container">
		<div class="row">
</br>
      <div class="col-lg-6 col-xs-12">
        <div class="card card-success card-outline">
          <div class="card-header">

      <form id="bulk-save-email-form" class="mt-4" enctype="multipart/form-data">
        <input type="hidden" value="post-save-emails" name="post-save-emails">

         <div class="row">


           <div class="col-lg-12 col-xs-12 form-group">

               <label> <span class="required">*</span> Schedule Date and Time To send Mail</label>
               <div class="input-group mb-4 mr-sm-4">
  <input type="datetime-local" id="birthdaytime" name="birthdaytime">
               </div>

             <div class="form-group">
               <label for="item_name"><span class="required">*</span>To</label>
               <input type="text" autocomplete="on" name="sendTo" class="form-control" placeholder="Enter Recepients Email Address">
             </div>

             <select name="sendToMany[]" class="select2 form-control" required multiple="multiple">
    <?php
      $sql_query = mysqli_query($dbc,"SELECT * FROM staff_users ORDER BY fName ASC");
      while($row = mysqli_fetch_array($sql_query))
      {
        ?>
          <option value="<?php echo $row['Email'];?>" selected="selected"><?php echo $row['Email'];?></option>

        <?php
      }
     ?>
</select>
             Email Message:
              <textarea id='long_desc' name='long_desc' ></textarea><br>


           </div>



         </div>

              <div class="row border-bottom mx-2">


                  <div class="pull-left mt-4">
                    <small class="text-muted">Sent by:- <?php echo $_SESSION['fName'];?></small>
                  </div>
                    </div>
                    <div class="row submit-project-btn d-none">
                    <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary btn-block font-weight-bold submitting">Send</button>
                    </div>
                    </div>
      </form>
    </div>

  </div>

</div>
<div class="col-lg-6 col-xs-12">
  <div class="card card-success card-outline">
    <div class="card-header">

      <?php
    //  $job_applied = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM applied_jobs WHERE applicant_email ='".$_SESSION['email']."' "));
    $sql_query1 =  mysqli_query($dbc,"SELECT * FROM bulk_save_email ORDER BY id");

      $number = 1;
      if($total_rows1 = mysqli_num_rows($sql_query1) > 0)
      {?>

    <table id="example" class="table table-striped table-bordered" style="width:100%">

       <thead>
         <tr>
            <td>#</td>
            <td>Scheduled Mail</td>


        <!--   <td>Status</td> -->
         </tr>
       </thead>
       <?php
       $no = 1;
      $sql = mysqli_query($dbc,"SELECT * FROM bulk_save_email  ORDER BY id DESC");
        while($row = mysqli_fetch_array($sql)){
        ?>
       <tr style="cursor: pointer;">


         <td>
          <?php echo $no++;?>
         </td>

<td>
  Will be Sent To: <strong> <?php echo $row['sendTo'] ;?>  </strong></br> Status: <strong>Scheduled</strong>
</br> Date/Time: <strong><?php echo $row['date_time'] ;?></strong>  </br> Message Body: </br><?php echo $row['message'] ;?>
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
             <strong><i class="fa fa-info-circle"></i> No Scheduled Email</strong>
             </div>

             <?php
             }
             ?>
           </div>
    </div>

  </div>

</div>


      </div>  </div> </div>

<!-- ================ End Profile Settings ======================= -->

<!-- ================= subscribe start ========================= -->
    <?php
    include("views/subscribe.php");
    ?>


<!-- ================= footer start ========================= -->
<?php
include("views/footer.php");
?>

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

    width: "600px",
        height: "200px"

  });


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
<script>
jQuery('#datetimepicker3').datetimepicker({
  format:'d.m.Y H:i',
  inline:true,
  lang:'ru'
});
</script>

<!--<script>
 window.addEventListener("load", function() {
  // Check time and update the button's state every second.
  setInterval(updateSubmitButton, 1000);
}, false);

function updateSubmitButton() {
var currentTime = new Date();
var hours = currentTime.getHours();
var minutes = currentTime.getMinutes();

// at 11.30 am and at 8.30 pm

if ((hours === 10 && minutes === 41)
|| (hours === 20 && minutes === 30)) {
document.getElementById('bulk-save-email-form').click();
} else {
console.log( "Wait for specified time" );
}
}


</script>
-->
<script type="text/javascript">
<!--
   var wait=setTimeout("document.bulk-save-email-form.submit();",500);
//-->
</script>
</body>

<!-- Mirrored from utouchdesign.com/themes/envato/escort/profile-settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Feb 2021 07:04:47 GMT -->
</html>
