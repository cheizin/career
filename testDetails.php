<?php
if(!$_SERVER['REQUEST_METHOD'] == "POST")
{
  exit();
}
session_start();
include("controllers/setup/connect.php");
if(!isset($_POST['id']))
{
  exit("No Selected ID");
}

$row = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM job_titles WHERE id ='".$_POST['id']."'"));

$row2 = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM job_test WHERE reference_no ='".$_POST['id']."'"));
?>

<div class="row">
  <div class="col-lg-6 col-xs-12">
    <div class="card card-success card-outline">
      <div class="card-header">
        <form id="add-test-history-form">

          <input type="hidden" name="add_test_history" value="add_test_history">

            <input type="hidden" name="id" value="<?php echo $_POST['id'];?>"  >

            <div class="row border-bottom mx-4">
              <div class="col-lg-12 col-xs-12 form-group">
                  <label for="item_name"><span class="required">*</span>Question Name </label>

                    <textarea name="test_name" class="form-control" required></textarea>

              </div>


            </div>

            <div class="row">
              <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-success btn-block font-weight-bold submitting">SUBMIT</button>
              </div>
            </div>

            </form>

      </div>

    </div>

  </div>

  <div class="col-lg-3 col-xs-12">
    <div class="card card-success card-outline">
      <div class="card-header">
        <form id="set-timer-form">

          <input type="hidden" name="add_timer_history" value="add_timer_history">


            <?php

              $sql_query = mysqli_query($dbc,"SELECT * FROM assigned_test WHERE reference_no ='".$row2['reference_no']."'");

              while($row = mysqli_fetch_array($sql_query))
              {

                ?>
                <input type="hidden" name="posted_job" value="<?php echo $row['posted_job'];?>"  >

                <?php
              }

             ?>

            <div class="row border-bottom mx-4">
              <div class="col-lg-12 col-xs-12 form-group">
                  <label for="item_name"><span class="required">*</span>Set Timer for the Questions</label>
    </div>
                  <div class="col-md-4 col-sm-6 col-xs-12">
  <input type="text" autocomplete="off" class="select2 form-control" name="hrs" placeholder="Hrs">
                  </div>
                  <div class="col-md-4 col-sm-6 col-xs-12">
  <input type="text" autocomplete="off" class="select2 form-control" name="mins" placeholder="Mins">
                  </div>

            </div>

            <div class="row">
              <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-success btn-block font-weight-bold submitting">SUBMIT</button>
              </div>
            </div>

            </form>

      </div>

    </div>

  </div>

  <div class="col-lg-3 col-xs-12">
    <div class="card card-success card-outline">
      <div class="card-header">


        <button class="btn btn-link" style="float:right;"
                data-toggle="modal" data-target="#add-job-modal">
                <i class="fa fa-plus-circle">Click here to assign Questions To a job Post</i>
        </button>
<br/><br/>
        <?php

          $sql_query = mysqli_query($dbc,"SELECT * FROM assigned_test WHERE reference_no ='".$row2['reference_no']."'");

          while($row = mysqli_fetch_array($sql_query))
          {


           echo $row['posted_job'];


              $sql_query3 = mysqli_query($dbc,"SELECT * FROM quiz_timer WHERE posted_job ='".$row['posted_job']."' ORDER  by id DESC LIMIT 1");

              while($row3 = mysqli_fetch_array($sql_query3))
              {
                ?>
              <br/> Time Set
                <?php
                           echo $row3['hrs'];?> Hrs : <?php echo $row3['mins'];?> mins
                           <?php

              }


          }

         ?>



        <!-- start add end product modal -->
        <div class="modal fade" id="add-job-modal" role="dialog">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header alert alert-success">

        <h5 class="modal-title">Asigning test to posted job title
        <span class="font-weight-bold"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form id="add-job-post-form">

        <input type="hidden" name="add-job-post" value="add-job-post">

          <input type="hidden" name="id" value="<?php echo $row2['reference_no'];?>"  >
        <!-- start of row -->
           <div class="row">
             <div class="col-lg-12 col-xs-12 form-group">
             <label><span class="required">*</span>Jobs Posted</label>
             <?php
             $result2 = mysqli_query($dbc, "SELECT * FROM job_posting ORDER BY id ASC");
             echo '
             <select name="job_title" data-tags="true" class="select2 form-control" data-placeholder="Select Job Posted" required>
             <option></option>';
             while($row = mysqli_fetch_array($result2)) {
                 echo '<option value="'.$row['job_title'].'">'.$row['job_title']."</option>";
             }
             echo '</select>';
             ?>
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
</br>




      </div>

    </div>
  </div>
  </div>

  <?php
  //$sql_query1 =  mysqli_query($dbc,"SELECT * FROM about_me WHERE email ='".$_SESSION['email'].");
  $sql_query1 =  mysqli_query($dbc,"SELECT * FROM job_test WHERE reference_no ='".$_POST['id']."'");
  $number = 1;
  if($total_rows1 = mysqli_num_rows($sql_query1) > 0)
  {?>

  <table class="table table-striped table-bordered table-hover" id="end-product-table" style="width:100%">
  <thead>
  <tr>
  <td>#</td>
  <td>Question Name</td>
  <td>Time Recorded</td>
  <td>Recorded by</td>
  <td>Edit</td>
  <td>Delete</td>

  </tr>
  </thead>
  <?php
  $no = 1;
  $sql= mysqli_query($dbc,"SELECT * FROM job_test WHERE reference_no ='".$_POST['id']."' ");
  while($employment = mysqli_fetch_array($sql))
  {
  ?>
  <tr style="cursor: pointer;">
  <td width="40px"><?php echo $no++ ;?>.

  </td>


  <td><?php echo $employment['test_name'];?></td>
  <td><?php echo $employment['time_recorded'];?></td>

  <td><?php echo $employment['recorded_by'];?></td>

  <td>
    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#edit-project-modal-<?php echo $employment['id'];?>">
     Edit
   </button>


   <!-- edit project modal -->
   <div class="modal fade" id="edit-project-modal-<?php echo $employment['id'];?>">
   <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Modifying Question <strong>: <?php echo $employment['test_name'];?></strong></h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form id="edit-project-form-<?php echo $employment['id'];?>" class="mt-4" onsubmit="ModifyProject('<?php echo $employment['id'];?>');">
           <input type="hidden" value="edit_project" name="edit_project">
           <input type="hidden" value="<?php echo $employment['id'];?>" name="id">

               <div class="col-lg-12 col-xs-12 form-group">
                   <label for="project_name"><span class="required">*</span>Question Name</label>
                   <textarea name="project_name" id="project_name-<?php echo $employment['id'];?>" class="form-control" required><?php echo $employment['test_name'];?></textarea>
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
  <a href="#" class="btn btn-link" onclick="CloseProject('<?php echo $employment['id'];?>');">
    Delete
  </a>
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

  <button class="btn btn-link" style="float:right;"
  data-toggle="modal" data-target="#add-employment-history-modal">
  <i class="fa fa-plus-circle"></i> No Questions Details Have been added
  </button>

  <?php
  }
  ?>
