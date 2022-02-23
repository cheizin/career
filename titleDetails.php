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

$row2 = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM job_titles_more_description WHERE title_name ='".$_POST['id']."' "));
?>
<script src="ckeditor/ckeditor.js" ></script>
<div class="row">
  <div class="col-lg-7 col-xs-12">
    <div class="card card-success card-outline">
      <div class="card-header">

        <form id="add-test-history-form">

          <input type="hidden" name="add_test_history" value="add_test_history">

            <input type="hidden" name="id" value="<?php echo $_POST['id'];?>"  >

            <div class="row border-bottom mx-4">
              <div class="col-lg-12 col-xs-12 form-group">

    <?php echo $row2['description'];?>

              </div>


            </div>

            </form>

      </div>

    </div>

  </div>

  <div class="col-lg-5 col-xs-12">
    <div class="card card-success card-outline">
      <div class="card-header">


        <form id="add-details-form">

          <input type="hidden" name="add_details" value="add_details">

            <input type="hidden" name="id" value="<?php echo $_POST['id'];?>"  >

            <div class="row border-bottom mx-4">
              <div class="col-lg-12 col-xs-12 form-group">

                Interview Question Name:
                <textarea id='short_desc' name="short_desc" style='border: 1px solid black;' readonly  ><?php echo $row['title_name'];?> </textarea><br>
                Detailled Description:
                	<textarea id='long_desc' name='long_desc' ></textarea><br>


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

  </div>



  <script>
  $('#title_details').summernote({
    toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']],
    ['view', ['fullscreen']],
    ['insert', ['link']],
  ],
  height: 100
  });

  </script>

  <script type="text/javascript">

    // Initialize CKEditor
    CKEDITOR.inline( 'short_desc');

    CKEDITOR.replace('long_desc',{

      width: "500px",
          height: "200px"

    });


  </script>
