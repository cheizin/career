<?php
if(!$_SERVER['REQUEST_METHOD'] == "POST")
{
  exit();
}
session_start();


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
<link rel="stylesheet" media="print" onload="this.media='all'" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">
<link rel="stylesheet" media="print" onload="this.media='all'" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" />
<link rel="stylesheet" media="print" onload="this.media='all'" href="assets/css/select2-material-theme.css">
<link rel="stylesheet" media="print" onload="this.media='all'" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"  />
<link rel="stylesheet" media="print" onload="this.media='all'" href="https://cdn.jsdelivr.net/npm/pace-js@1/themes/blue/pace-theme-flash.css" />
<link rel="stylesheet" media="print" onload="this.media='all'" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css">
<link rel="stylesheet" media="print" onload="this.media='all'" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"/>
<link rel="stylesheet" media="print" onload="this.media='all'" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.1.0/css/hover-min.css" integrity="sha512-glciccPoOqr5mfDGmlJ3bpbvomZmFK+5dRARpt62nZnlKwaYZSfFpFIgUoD8ujqBw4TmPa/F3TX28OctJzoLfg==" crossorigin="anonymous" />
<link rel="stylesheet" media="print" onload="this.media='all'" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.23/af-2.3.5/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/cr-1.5.3/fc-3.3.2/fh-3.1.7/kt-2.5.3/r-2.2.7/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.1/sp-1.2.2/sl-1.3.1/datatables.min.css"/>
<link rel="stylesheet" media="print" onload="this.media='all'" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.13.1/sweetalert2.min.css" integrity="sha512-EeZYT52DgUwGU45iNoywycYyJW/C2irAZhp2RZAA0X4KtgE4XbqUl9zXydANcIlEuF+BXpsooxzkPW081bqoBQ==" crossorigin="anonymous" />
<link rel="stylesheet" media="print" onload="this.media='all'" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>

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

<style>
.collapsible {
  background-color: #9e7d08 ;
  color: white;
  cursor: pointer;
  padding: 10px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 10px;
}

.active, .collapsible:hover {
  background-color: #555;
}

.content {
  padding: 0 10px;
  display: none;
  overflow: hidden;
  background-color: #f1f1f1;
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

          <li><a href="resources.php">Resources</a></li>

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
             <textarea id='short_desc' name="short_desc" style='border: 1px solid black;' readonly  >  Potential Staffing E-resources </textarea><br>
      </h2>
        <p><a href="#" title="Home">Home</a> <i class="ti-angle-double-right"></i> resources</p>
    </div>
  </div>
</div>

<!-- ======================= End Page Title ===================== -->
<!-- ================ Profile Settings ======================= -->


<button class="btn btn-link" style="float:left;"
        data-toggle="modal" data-target="#post-header-modal">
        <i class="fa fa-plus-circle"></i> Add Resource Header
</button>

<button class="btn btn-link" style="float:left;"
        data-toggle="modal" data-target="#post-resource-modal">
        <i class="fa fa-plus-circle"></i> Add Resources details
</button>

<!-- post resources modal -->

<!-- post job modal -->

<!-- post job modal -->

<div class="modal fade" id="post-resource-modal">
<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
  <div class="modal-content">
  <div class="modal-header alert alert-success">

      <h5 class="modal-title">Posting Resource Details </h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form id="add-resource-header-form">

        <input type="hidden" name="add_resource_history" value="add_resource_history">

          <input type="hidden" name="id" value="<?php echo $_POST['id'];?>"  >

          <div class="row border-bottom mx-4">
           <div class="col-md-12 col-sm-6 col-xs-12 m-clear">
              <label><span class="required">*</span>Header Name</label>
              <?php
                $result = mysqli_query($dbc, "SELECT * FROM resources_header ORDER BY resource_name ASC");
              echo '
              <select class="wide form-control" name="id" data-tags="true" class="select2 form-control" required>
                <option data-display="Select Header"></option>';
              while($row = mysqli_fetch_array($result)) {
                        echo '<option value="'.$row['id'].'">'.$row['resource_name']."</option>";
              }
              echo '</select>';
              ?>

            </div>
                  </div>
           <div class="col-md-12 col-sm-6 col-xs-12 m-clear">
                <label for="item_name"><span class="required">*</span>Resource Details</label>

                 <textarea class='long_desc' name='long_desc' ></textarea><br>

            </div>







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
<!-- end of post resources modal -->

<div class="modal fade" id="post-header-modal">
<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
  <div class="modal-content">
  <div class="modal-header alert alert-success">

      <h5 class="modal-title">Adding new Resource header </h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form id="add-header-form">

        <input type="hidden" name="add_header_history" value="add_header_history">

          <input type="hidden" name="id" value="<?php echo $_POST['id'];?>"  >

          <div class="row border-bottom mx-4">

            <div class="col-lg-12 col-xs-12 form-group">
              <label for="item_name"><span class="required">*</span>Header Name</label>
                    <textarea name="resource" class="form-control" required></textarea>

            </div>

          </div>

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
<!-- end of post resources modal -->


<div class="section-padding-top">
	<div class="container">
		<div class="row">
      <div class="col-lg-12 col-xs-12">
        <div class="card card-success card-outline">
      <div class="tab-content">
        <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">


           <!-- Accordion card -->

           <?php
  $no = 1;
             $sql_query = mysqli_query($dbc,"SELECT * FROM resources_header");

             while($row = mysqli_fetch_array($sql_query))
             {

?>
           <div class="card">

             <!-- Card header -->
             <div class="card-header" role="tab" id="<?php echo $row['token'];?>">
               <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#<?php echo $row['id'];?>"
                 aria-expanded="false" aria-controls="collapseTwo2">
                 <h4 class="mb-0">
                  <?php echo $no++ ;?>. <?php echo $row['resource_name'];?>: <i class="fas fa-angle-down rotate-icon"></i>


                                                       <button type="button" class="btn btn-link" data-toggle="modal" data-target="#edit-resource2-modal-<?php echo $row['id'];?>">
                                                        Edit Header
                                                      </button>


                                                      <!-- edit project modal -->
                                                      <div class="modal fade" id="edit-resource2-modal-<?php echo $row['id'];?>">
                                                      <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title">Modifying resource Header <strong>: <?php echo $row['resource_name'];?></strong></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class="modal-body">
                                                            <form id="edit-resource2-form-<?php echo $row['id'];?>" class="mt-4" onsubmit="Modifyresource2('<?php echo $row['id'];?>');">
                                                              <input type="hidden" value="edit_resource2" name="edit_resource2">
                                                              <input type="hidden" value="<?php echo $row['id'];?>" name="id">

                                                                  <div class="col-lg-12 col-xs-12 form-group">
                                                                      <label for="project_name"><span class="required">*</span>Resource Name</label>
                                                                      <textarea name="resource2" id="resource2-<?php echo $row['id'];?>" class="form-control" required><?php echo $row['resource_name'];?></textarea>
                                                                  </div>

                                                              <!-- end row project owenerships -->
                                                              <div class="row">
                                                                <small class="status-project-user text-success"></small><br/>
                                                              </div>

                                                              <!-- start row related activity -->
                                                              <div class="row  mb-4">


                                                              </div>
                                                              <!-- end row related activity -->

                                                              <div class="pull-left mt-4">
                                                                <small class="text-muted">Modified by:- <?php echo $_SESSION['fName'];?></small>
                                                              </div>

                                                                    <!-- start row button -->
                                                              <div class="row">
                                                                <div class="col-md-12 text-center">
                                                                    <button type="submit" class="btn btn-primary btn-block font-weight-bold submitting">Modify
                                                                    </button>
                                                                </div>
                                                              </div>

                                                                    <!-- end row button -->
                                                            </form>
                                                          </div>
                                                          <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      </div>
                                                      <!-- end of edit project modal -->
                                                      <a href="#" class="btn btn-link" onclick="CloseResources2('<?php echo $row['id'];?>');">
                                                                                Delete Header
                                                                              </a>
                 </h4>
               </a>
             </div>

             <!-- Card body -->
             <div id="<?php echo $row['id'];?>" class="collapse" role="tabpanel" aria-labelledby="<?php echo $row['token'];?>" data-parent="#accordionEx">
               <div class="card-body">

                 <table class="table table-striped table-bordered resource-table2" style="width:100%">

                    <thead>
                      <tr>

                         <td>Message</td>

                         <td>Edit</td>
                         <td>Delete</td>

                     <!--   <td>Status</td> -->
                      </tr>
                    </thead>

                 <?php
                   $no2 = 1;

                                  $sql_query3 = mysqli_query($dbc,"SELECT * FROM resource_details WHERE resource_id ='".$row['id']."' ORDER  by id");

                                  while($row3 = mysqli_fetch_array($sql_query3))
                                  {
                                    ?>

                                    <tr style="cursor: pointer;">


                             <td>
                             <?php echo $row3['resource'];?>

                             </td>

                             <td>
                               <button type="button" class="btn btn-link" data-toggle="modal" data-target="#edit-resource-modal-<?php echo $row3['id'];?>">
                                Edit
                              </button>


                              <!-- edit project modal -->
                              <div class="modal fade" id="edit-resource-modal-<?php echo $row3['id'];?>">
                              <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Modifying resource <strong>: <?php echo $row3['resource'];?></strong></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form id="edit-resource-form-<?php echo $row3['id'];?>" class="mt-4" onsubmit="Modifyresource('<?php echo $row3['id'];?>');">
                                      <input type="hidden" value="edit_resource" name="edit_resource">
                                      <input type="hidden" value="<?php echo $row3['id'];?>" name="id">

                                          <div class="col-lg-12 col-xs-12 form-group">
                                              <label for="project_name"><span class="required">*</span>Resource Name</label>
                                              <textarea name="resource" id="resource-<?php echo $row3['id'];?>" class="form-control" required><?php echo $row3['resource'];?></textarea>
                                          </div>

                                      <!-- end row project owenerships -->
                                      <div class="row">
                                        <small class="status-project-user text-success"></small><br/>
                                      </div>

                                      <!-- start row related activity -->
                                      <div class="row  mb-4">


                                      </div>
                                      <!-- end row related activity -->

                                      <div class="pull-left mt-4">
                                        <small class="text-muted">Modified by:- <?php echo $_SESSION['fName'];?></small>
                                      </div>

                                            <!-- start row button -->
                                      <div class="row">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary btn-block font-weight-bold submitting">Modify
                                            </button>
                                        </div>
                                      </div>

                                            <!-- end row button -->
                                    </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                              </div>
                              <!-- end of edit project modal -->

                             </td>

                             <td>


                                                   <a href="#" class="btn btn-link" onclick="CloseResources('<?php echo $row3['id'];?>');">
                                                                             Delete
                                                                           </a>
                             </td>



                                                       <?php



                                                     }

                                                     ?>
                                                   </table>


               </div>
             </div>

           </div>

           <?php
                        }

                       ?>

           <!-- Accordion card -->

        </div>


<!-- Accordion card -->


</div>
<!-- Accordion wrapper -->

</div>


</div>


      </div>

    </div>


    </div>

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

  $('.resource-table').DataTable({
    destroy: true,
     "pageLength": 2
  });



</script>

<script type="text/javascript">

  // Initialize CKEditor
  CKEDITOR.inline( 'short_desc');

  CKEDITOR.replace('long_desc',{

    width: "850px",
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
</body>

<!-- Mirrored from utouchdesign.com/themes/envato/escort/profile-settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Feb 2021 07:04:47 GMT -->
</html>
