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
$row2 = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM answered_test WHERE id ='".$_POST['id']."'"));

//Job posted

$row3 = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM assigned_test WHERE id ='".$row2['reference_no']."'"));


$getTest = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM job_test WHERE reference_no ='".$row3['reference_no']."'"));

$testLoop = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM application_status_details WHERE email ='".$_SESSION['email']."'"));

$row5 = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM job_test WHERE reference_no ='".$row4['reference_no']."' DESC LIMIT 1"));


?>

        <div class="row">
          <div class="col-lg-12 col-xs-12">
            <b>Questions  </b>
            <div class="card card-success card-outline">
              <div class="card-header">
                <table class="table action-steps-list-table">

                 <thead>
                   <tr>
                     <td></td>
                  <!--   <td>Status</td> -->
                   </tr>
                 </thead>
                <?php
                $no = 1;
                $sql= mysqli_query($dbc,"SELECT * FROM job_test WHERE reference_no ='".$row3['reference_no']."' ");
                while($row = mysqli_fetch_array($sql))
                {
                  ?>

                    <tr style="cursor: pointer;">
<td>

                                <div class="row border-bottom mx-4">
                                  <div class="col-lg-12 col-xs-12 form-group">
                                      <label for="item_name"><?php echo $no++ ;?>.<?php echo $row['test_name']; ?></label>


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



<div class="row">
  <div class="col-lg-12 col-xs-12">
    <div class="card card-success card-outline">

      <nav aria-label="breadcrumb">
           <ol class="breadcrumb">
         <li class="breadcrumb-item active" aria-current="page"> <strong> Review Of The Answer: </strong> </li>
           </ol>
      </nav>

      <div class="card-body table-responsive">

                          <form id="add-response-answer-form">
                             <input type="hidden" name="add_response_answer" value="add_response_answer">

                   <input type="hidden" name="email" value ="<?php echo $row2['email'];?>" >

                           <input type="hidden" name="id" value ="<?php echo $_POST['id'];?>" >

                           <input type="hidden" name="answer_name" value ="<?php echo $row2['answer_name'];?>" >

                           <?php
                           $no = 1;
                           $sql= mysqli_query($dbc,"SELECT * FROM job_test WHERE reference_no ='".$row3['reference_no']."' ");
                           while($row = mysqli_fetch_array($sql))
                           {
                             ?>
            <input type="hidden" name="test_name" value ="<?php echo $row['test_name']; ?>" >


                             <?php
                             }

                           ?>


                          <!-- start of row -->

                             <div class="row">

                               <div class="col-lg-7 col-xs-12 form-group">

                                                        



                                                             <strong> Review Answer By Admin  <br/>   </strong>
                                                              	<textarea id='long_desc' name='response_name' ><?php echo $row2['answer_name'];?></textarea><br>

                                                                <textarea id='short_desc' name="short_desc" style='border: 1px solid black;' readonly  ><?php echo $row['title_name'];?>
                                                                </textarea><br>

                                                            <script src="ckeditor/ckeditor.js" ></script>
                                     <!-- Script -->
                                     <script type="text/javascript">

                                       // Initialize CKEditor
                                       CKEDITOR.inline( 'short_desc');

                                       CKEDITOR.replace('long_desc',{

                                         width: "450px",
                                             height: "300px"

                                       });


                                     </script>

                               </div>

                               <div class="col-lg-2 col-xs-12 form-group">
                                   <label for="item_name"><span class="required">*</span>Enter Score</label>

                                     <textarea name="marks" class="form-control" ></textarea>

                               </div>

                               <div class="col-lg-3 col-xs-12 form-group">
                               <label><span class="required">*</span>Scheme Rating</label>
                               <?php
                               $result2 = mysqli_query($dbc, "SELECT * FROM scheme_rating ORDER BY id ASC");
                               echo '
                               <select name="scheme_name" data-tags="true" class="select2 form-control" data-placeholder="Select Rating" required>
                               <option></option>';
                               while($row = mysqli_fetch_array($result2)) {
                                   echo '<option value="'.$row['scheme_name'].'">'.$row['scheme_name']."</option>";
                               }
                               echo '</select>';
                               ?>
                               </div>

                             </div>
                             <div class="row text-center">
                              <button type="submit" class="btn btn-success btn-block font-weight-bold submitting">SUBMIT REVIEW</button>
                             </div>
                           </form>

    </div>
  </div>
</div>
</div>

  <div class="col-lg-12 col-xs-12">
    <div class="card card-success card-outline">


      <nav aria-label="breadcrumb">
           <ol class="breadcrumb">
         <li class="breadcrumb-item active" aria-current="page"><strong> Review List By Admin </strong></li>
           </ol>
      </nav>

      <div class="card-body table-responsive">

        <?php

        $sql_query1 =  mysqli_query($dbc,"SELECT * FROM answered_response_test WHERE reference_no ='".$_POST['id']."' ORDER BY id DESC limit 1 ");

        $number = 1;
        if($total_rows1 = mysqli_num_rows($sql_query1) > 0)
        {?>

       <table class="table table-striped table-bordered table-hover"  id="invoice-received-table"  style="width:100%">

         <thead>
           <tr>
             <td>#</td>
             <td>Applicant Response</td>
             <td>Reviewer Response</td>
             <td>Score</td>
             <td>Rating</td>

          <!--   <td>Status</td> -->
           </tr>
         </thead>
         <?php
         $no = 1;
          $sql = mysqli_query($dbc,"SELECT * FROM answered_response_test WHERE reference_no ='".$_POST['id']."' ORDER BY id DESC limit 1 ");
          while($row = mysqli_fetch_array($sql)){
          ?>
         <tr style="cursor: pointer;">
           <td width="50px"> <?php echo $no++;?>.

           </td>


           <td>
             <b>
             <?php

                  $result = mysqli_query($dbc, "SELECT * FROM answered_test WHERE id ='".$_POST['id']."' ORDER BY id "  );
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


        <script>

$('.action-steps-list-table').DataTable({
  destroy: true,
  colReorder: true,

  //start select column
  initComplete: function () {
      this.api().columns().every( function () {
          var column = this;
          var select = $('<select class="mdb-select select2 form-control"><option value=""></option></select>')
              .appendTo( $(column.footer()).empty() )
              .on( 'change', function () {
                  var val = $.fn.dataTable.util.escapeRegex(
                      $(this).val()
                  );

                  column
                      .search( val ? '^'+val+'$' : '', true, false )
                      .draw();
              } );

          column.data().unique().sort().each( function ( d, j ) {
              select.append( '<option value="'+d+'">'+d+'</option>' )
          } );
      } );
  }
  //end select column
});
$('tfoot tr').insertAfter($('thead tr'));

$( ".select2" ).select2({
theme: "material"
});


</script>
