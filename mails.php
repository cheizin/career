<?php
if(!$_SERVER['REQUEST_METHOD'] == "POST")
{
  exit();
}

include("controllers/setup/connect.php");
$project_module = $_POST['id'];

$row = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM job_posting WHERE id ='".$_POST['id']."'"));

$row2 = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM applied_jobs WHERE job_posting_id ='".$_POST['id']."'"));
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add Work Plan | PPRMIS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="icon" href="dist/img/cma.PNG" sizes="16x16" type="image/png">
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
</head>
<body class="hold-transition skin-cma fixed sidebar-mini">
<div class="wrapper">
  <?php include("../layout/main-header.php");?>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li><a href="home.php"><i class="fa fa-home"></i> <span>HOME</span></a></li>
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href="reports.php"><i class="fa fa-file-text-o"></i> <span>Reports</span></a></li>
<?php
if($_SESSION['department_code'] == 'SPRF')
{
  ?>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-edit"></i> <span>Corporate Workplans</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
            <li><a href="add-corporate-perfomance.php" class="children"><i class="fa fa-plus"></i> Add Corporate Workplan</a></li>
            <li><a href="view-corporate-perfomance.php" class="children"><i class="fa fa-folder-open"></i> View Corporate Workplan</a></li>

    </ul>
  </li>
  <?php
}
 ?>

        <li class="treeview active">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Departmental Workplans</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
                  <li class="active"><a href="add-perfomance.php" class="children"><i class="fa fa-plus"></i> Add Activity</a></li>



                  <?php
                    if($_SESSION['access_level'] == "standard")
                    {
                    ?>
             <li><a href="https://pprmis.cma.or.ke/prmis/pages/perfomance-management/departmental-workplan.php" class="children"><i class="fa fa-folder-open"></i> Monitor Workplan</a></li>



                  <?php
                }
                else
                {
                  ?>
                    <li><a href="view-perfomance.php" class="children"><i class="fa fa-folder-open"></i> Monitor Workplan</a></li>
                  <?php
                }
                   ?>

          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Activity | <?php echo $_SESSION['department_code'];?>
        <br/>
        <small>(fields marked with asterisks (<span class="required">*</span>) are compulsory)</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <form id="add-departmental-workplan-form">
            <div class="row">
              <div class="col-lg-12 col-xs-12" id="loader">
                  </div>
                  <div id="feedback_message">

                  </div>
            </div>

            <!-- start row programme information -->
            <div class="row">
              <div class="col-lg-12 col-xs-12">
                 <div class="row">
                      <div class="col-lg-3 col-xs-12 form-group">
                        <label for="strategic_objective"><span class="required">*</span>Strategic Objectives</label>
                        <?php
                        $result = mysqli_query($dbc, "SELECT * FROM strategic_objectives");
                        echo '
                        <select name="strategic_objective" id="strategic_objective" class="select2 form-control" onChange="getOutcomesandKpis();" required>
                        <option value="">search and select...</option>';
                        while($row = mysqli_fetch_array($result)) {
                            echo '<option value="'.$row['strategic_objective_id'].'">'.$row['strategic_objective_description']."</option>";
                        }
                        echo '</select>';
                        ?>
                      </div>
                      <div class="col-lg-3 col-xs-12 form-group">
                              <label for="strategic_outcomes"><span class="required">*</span>Strategic Outcomes</label>
                                        <select name="strategic_outcomes[]" id="strategic_outcomes" class="select2 form-control" multiple="multiple" onchange="getKpis();" required>
                                        </select>
                      </div>
                      <div class="col-lg-3 col-xs-12 form-group">
                              <label for="strategic_kpis"><span class="required">*</span>Strategic KPIs</label>
                                        <select name="strategic_kpis[]" id="strategic_kpis" class="select2 form-control" multiple="multiple" required>

                                        </select>
                      </div>
                 </div>
              </div>
            </div>

              <div class="row"> <!-- id="departmental-objective" -->
                  <div class="col-lg-3 col-xs-12 form-group">
                      <label for="departmental_objective"><span class="required">*</span>Departmental Objective</label>
                        <?php
                          $result = mysqli_query($dbc, "SELECT * FROM departmental_objectives WHERE department_id='".$_SESSION['department_code']."' && removed='no'");
                            echo '
                              <select name="departmental_objective" class="select2 form-control" id="departmental_objective" onChange="getSubobjectives();" required>
                                   <option value="">search and select...</option>';
                                   while($row = mysqli_fetch_array($result)) {
                                       echo '<option value="'.$row['departmental_objective_id'].'">'.$row['departmental_objective_description']."</option>";
                                   }
                            echo '</select>';
                        ?>
                  </div>
                  <div class="col-lg-3 col-xs-12 form-group">
                          <label for="departmental_sub_objectives">Departmental Sub-Objective/s</label>
                                    <select name="departmental_sub_objectives" id="departmental_sub_objectives" class="select2 form-control">

                                    </select>
                  </div>
                  <div class="col-lg-3 col-xs-12 form-group">
                          <label for="activity_type"><span class="required">*</span>Activity Type</label>
                          <select name="activity_type" class="activity_type select2 form-control" required>
                              <option value="">-- Select Activity type --</option>
                              <option value="Corporate">Corporate</option>
                              <option value="SP">SP</option>
                              <option value="PC">PC</option>
                              <option value="SP & PC">SP & PC</option>
                              <option value="PC & Corporate">PC & Corporate</option>
                              <option value="CMMP">CMMP</option>
                              <option value="Operational">Operational</option>
                          </select>
                    </div>
              </div>

            <div style="border-top: 1px dashed #8c8b8b;"></div>
            <!-- /.end row programme information -->


            <!-- start of row -->
              <div class="row">
              <div class="col-lg-3 col-xs-12 form-group">
                      <label for="activity_description"><span class="required">*</span>Activity Description</label><br/><br/>
                      <textarea name="activity_description" title="Activity Description" id="activity" class="form-control" placeholder="Activity Description" maxlength="200" required></textarea>
                      <h6 class="pull-right" id="count_message_activity"></h6>

              </div>
              <div class="col-lg-3 col-xs-12 form-group">
                  <label for="timeline"> <span class="required">*</span>Timeline</label>
                  <br/><br/>
                  <div class="input-append date inner-addon left-addon" id="dpMonths" data-date="" data-date-format="mm/yyyy" data-date-viewmode="years" data-date-minviewmode="months">
                <input class="span2 form-control"  type="text" name="timeline" readonly="" style="background: white;">
                <span class="add-on"></span>
                </div>

              </div>
              <div class="col-lg-3 col-xs-12 form-group kpi-class">
                      <label for="key_perfomance_indicator"> <span class="required">*</span>Departmental KPI</label><br/><br/>
                      <textarea name="key_perfomance_indicator" id="key_perfomance_indicator" class="form-control" maxlength="500" required></textarea>
                      <h6 class="pull-right" id="count_message"></h6>
              </div>
              <div class="col-md-3 col-xs-12 form-group">
                <label><span class="required">*</span> Activity Owner</label><br/><br/>
                <select name="activity_owner[]" class="select2 form-control" required multiple="multiple">
                    <?php
                      $sql_query = mysqli_query($dbc,"SELECT * FROM staff_users ORDER BY fName ASC");
                      while($row = mysqli_fetch_array($sql_query))
                      {
                        ?>
                          <option value="<?php echo $row['id'];?>" selected="selected"><?php echo $row['fName'];?></option>

                        <?php
                      }
                     ?>
                </select>
              </div>

              <div class="col-lg-10 col-xs-12 form-group">
              </div>


             <div class="pull-left">
               Recorded by:- <?php echo $_SESSION['fName'];?>

             </div>

            </div>

            <!-- start row button -->
            <div class="row">
                  <div class="col-md-12 text-center">
                      <button type="submit" class="btn btn-primary" id="create-workplan-button" style="font-weight:bold;">SUBMIT ACTIVITY</button>
                  </div>
            </div>

            <!-- end row button -->
      </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- start footer -->
<?php include("../layout/footer.php");?>
<!-- end footer -->
</div>
<!-- ./wrapper -->


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
<script src="functions/add-workplan.js"></script>
<script src="dist/js/typed.js"></script>
<script src="functions/days_remaining.js"></script>
<script src="functions/get-sub-objectives.js?v=1"></script>
<script src="functions/get-strategic-outcomes-and-kpis.js?v=1"></script>
<script src="functions/textarea-character-counter.js"></script>
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
</html>