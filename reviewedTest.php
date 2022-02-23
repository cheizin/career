<?php
if(!$_SERVER['REQUEST_METHOD'] == "POST")
{
  exit();
}
session_start();
include("controllers/setup/connect.php");
/*
if($_SESSION['access_level']!='admin')
{
    exit("unauthorized");
}
*/

if(!isset($_POST['job_posting_id']))
{
  exit("Please select The application stage");
}



$row1 = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM applied_jobs WHERE job_posting_id ='".$_POST['job_posting_id']."'"));

$row4 = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM job_posting WHERE id ='".$row1['job_posting_id']."'"));


$row3 = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM assigned_test WHERE posted_job ='".$row4['job_title']."'"));


$row2 = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM answered_test WHERE reference_no ='".$row3['id']."'"));

$row5 = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM answered_response_test WHERE reference_no ='".$row2['id']."'"));

//Job posted



$row7 = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM job_test WHERE reference_no ='".$row3['reference_no']."'"));

$testLoop = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM application_status_details WHERE email ='".$_SESSION['email']."'"));

$row6 = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM job_test WHERE reference_no ='".$row4['reference_no']."' DESC LIMIT 1"));


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
  <?php
  include("views/navigation.php");
  ?>

</nav>
<!-- ======================= End Navigation ===================== -->
<!-- ======================= Page Title ===================== -->
<div class="page-title">
  <div class="container">
    <div class="page-caption">
      <h2>Online Test Reviewer Answer</h2>
      <p><a href="#" title="Home">Home</a> <i class="ti-angle-double-right"></i> Reviewer Answer</p>
    </div>
  </div>
</div>
<!-- ======================= End Page Title ===================== -->


<section class="padd-top-80 padd-bot-80">
  <div class="col-lg-12 col-xs-12">
      <div class="card card-success card-outline">


        <nav aria-label="breadcrumb">
             <ol class="breadcrumb">
           <li class="breadcrumb-item active" aria-current="page"> Review List By Admin</li>
             </ol>
        </nav>

        <div class="card-body table-responsive">

          <?php

          $sql_query1 =  mysqli_query($dbc,"SELECT * FROM answered_response_test WHERE reference_no ='".$row2['id']."'");

          $number = 1;
          if($total_rows1 = mysqli_num_rows($sql_query1) > 0)
          {?>

         <table class="table table-striped table-bordered table-hover"  id="invoice-received-table"  style="width:100%">

           <thead>
             <tr>
               <td>#</td>
                <td>Questions</td>
               <td>Applicant Response</td>
               <td>Reviewer Response</td>
               <td>Score</td>
               <td>Remarks</td>

            <!--   <td>Status</td> -->
             </tr>
           </thead>
           <?php
           $no = 1;
            $sql = mysqli_query($dbc,"SELECT * FROM answered_response_test WHERE reference_no ='".$row2['id']."'");
            while($row = mysqli_fetch_array($sql)){
            ?>
           <tr style="cursor: pointer;">
             <td width="50px"> <?php echo $no++;?>.

             </td>
             <td>
             <div class="card-body box-profile">
               <div class="float-left">

                 <?php

                      $result = mysqli_query($dbc, "SELECT * FROM job_test WHERE reference_no ='".$row3['reference_no']."'"  );
                      if(mysqli_num_rows($result))
                      {
                        while($project= mysqli_fetch_array($result))
                        {
                            ?>

                                                    <div class="row border-bottom mx-4">
                                                      <div class="col-lg-12 col-xs-12 form-group">
                                                          <label for="item_name"><?php echo $project['test_name']; ?></label>


                                                      </div>

                                                    </div>
                                    <?php

                        }
                      }
                      ?>

               </div>
               </td>


             <td>
               <b>
               <?php

                    $result = mysqli_query($dbc, "SELECT * FROM answered_test WHERE reference_no ='".$row3['id']."' ORDER BY id "  );
                    if(mysqli_num_rows($result))
                    {
                      while($profile_pic = mysqli_fetch_array($result))
                      {
                        ?>
                        <?php echo $profile_pic['answer_name']; ?>

                     <?php

                      }
                    }
                    ?>
  </b>
             </td>

             <td><b> <?php echo $row['response_name'] ;?> </b>
             </td>
             <td><b> <?php echo $row['marks'] ;?> </b>
             </td>
             <td><b> <?php echo $row['remarks'] ;?> </b>
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

</section>


  <?php
  }
  else
  {
        ?>
      <br/>
  <div class="alert alert-success">
  <strong><i class="fa fa-info-circle"></i> No Review Answer has been done</strong>
  </div>

    <?php
  }
  ?>


        <!-- add stock modal -->

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
              <form id="add-job-vaccancy-form" class="mt-4" enctype="multipart/form-data">
                <input type="hidden" value="post-job" name="post-job">
                 <input type="hidden" name="email" value ="<?php echo $_SESSION['email'];?>" >

                <div class="row border-bottom mx-3">

                    <div class="col-lg-4 col-xs-12 form-group">
                        <label for="item_name"><span class="required">*</span>Job Title</label>

                          <input type="text" autocomplete="off" class="select2 form-control" name="job_title">

                    </div>

                    <div class="col-lg-4 col-xs-12 form-group">
                        <label><span class="required">*</span>Company Type</label>
                        <?php
                        $result = mysqli_query($dbc, "SELECT * FROM company_type ORDER BY com_type ASC");
                        echo '
                        <select name="com_type" data-tags="true" class="select2 form-control" data-placeholder="Select Company Type" required>
                        <option></option>';
                        while($row = mysqli_fetch_array($result)) {
                            echo '<option value="'.$row['com_type'].'">'.$row['com_type']."</option>";
                        }
                        echo '</select>';
                        ?>
                    </div>
                    <div class="col-lg-4 col-xs-12 form-group">
                        <label for="item_name"><span class="required">*</span>Experience Length</label>

                          <input type="text" autocomplete="off" class="select2 form-control" name="expLength">

                    </div>


                      </div>

                      <div class="row border-bottom mx-3">
                        <div class="col-lg-4 col-xs-12 form-group">
                            <label><span class="required">*</span>Employment Type</label>
                            <?php
                            $result = mysqli_query($dbc, "SELECT * FROM employment_type ORDER BY emp_type ASC");
                            echo '
                            <select name="emp_type" data-tags="true" class="select2 form-control" data-placeholder="Select Employment Type" required>
                            <option></option>';
                            while($row = mysqli_fetch_array($result)) {
                                echo '<option value="'.$row['emp_type'].'">'.$row['emp_type']."</option>";
                            }
                            echo '</select>';
                            ?>
                        </div>


                                    <div class="col-lg-4 col-xs-12 form-group">
                                      <label><span class="required">*</span>Minimum Qualification</label>
                                        <?php
                                        $result = mysqli_query($dbc, "SELECT * FROM qualification ORDER BY rank_name ASC");
                                        echo '
                                        <select name="rank_name" data-tags="true" class="select2 form-control" data-placeholder="Select Min Qualification" required>
                                        <option></option>';
                                        while($row = mysqli_fetch_array($result)) {
                                            echo '<option value="'.$row['rank_name'].'">'.$row['rank_name']."</option>";
                                        }
                                        echo '</select>';
                                        ?>
                                    </div>
                                    <div class="col-lg-4 col-xs-12 form-group">
                                        <label><span class="required">*</span>Experience Level</label>
                                        <?php
                                        $result = mysqli_query($dbc, "SELECT * FROM experience_level ORDER BY exp_level ASC");
                                        echo '
                                        <select name="exp_level" data-tags="true" class="select2 form-control" data-placeholder="Select Experience Level" required>
                                        <option></option>';
                                        while($row = mysqli_fetch_array($result)) {
                                            echo '<option value="'.$row['exp_level'].'">'.$row['exp_level']."</option>";
                                        }
                                        echo '</select>';
                                        ?>
                                    </div>
                                      </div>

                                      <div class="row border-bottom mx-3">


                                      <div class="col-lg-4 col-xs-12 form-group">
                                          <label for="item_description"><span class="required">*</span>Job Location</label>

                                            <input type="text" autocomplete="off" class="select2 form-control" name="job_location">
                                      </div>
                                      <div class="col-lg-4 col-xs-12 form-group">
                                          <label for="item_description"><span class="required">*</span>Country</label>

                                            <input type="text" autocomplete="off" class="select2 form-control" name="country">
                                      </div>



                                      <div class="col-lg-4 col-xs-12 form-group">
                                        <label> <span class="required">*</span> Deadline</label>
                                        <div class="input-group mb-2 mr-sm-2">
                                          <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fal fa-calendar-day"></i></div>
                                          </div>
                                          <input type="text" class="form-control project_start_date" autocomplete="off" name="deadline" required>
                                        </div>
                                      </div>
                                      </div>




                        <div class="row border-bottom mx-3">
                          <div class="col-lg-6 col-xs-12 form-group">
                              <label for="item_name"><span class="required">*</span>job Description</label>

                                <textarea name="job_description" class="form-control" required></textarea>

                          </div>

                    <div class="col-lg-6 col-xs-12 form-group">
                        <label for="item_name"><span class="required">*</span>Responsibilities and Duties</label>

                          <textarea name="responsibility" class="form-control" required></textarea>

                    </div>
                    </div>



                <!-- start row project timelines -->

                      <div class="row border-bottom mx-2">


                          <div class="pull-left mt-4">
                            <small class="text-muted">Recorded by:- <?php echo $_SESSION['fName'];?></small>
                          </div>
                            </div>


                <!-- end row project timelines -->


                      <!-- start row button -->
                <div class="row">
                  <div class="col-md-12 text-center">
                      <button type="submit" class="btn btn-primary btn-block font-weight-bold submitting">SUBMIT</button>
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
        <!-- end of add project modal -->

<!-- Jquery js-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootsnav.js"></script>
<script src="assets/js/viewportchecker.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/plugins/bootstrap/js/wysihtml5-0.3.0.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap-wysihtml5.js"></script>
<script src="assets/plugins/aos-master/aos.js"></script>
<script src="assets/plugins/nice-select/js/jquery.nice-select.min.js"></script>
<script src="assets/js/custom.js"></script>
<script>
	$(window).load(function() {
	  $(".page_preloaderr").fadeOut("slow");;
	});
	AOS.init();
</script>
<script>
	$('#dob').dateDropper();
</script>
</body>

<!-- Mirrored from utouchdesign.com/themes/envato/escort/profile-settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Feb 2021 07:04:47 GMT -->
</html>
