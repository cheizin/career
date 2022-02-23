<?php
require_once('../setup/connect.php');
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{


//start of job recruiter
if(isset($_POST['sell-a-module']))
{

$access_level = mysqli_real_escape_string($dbc,strip_tags($_POST['module_name']));

$fName = mysqli_real_escape_string($dbc,strip_tags($_POST['cName']));
$lName = mysqli_real_escape_string($dbc,strip_tags($_POST['industry_name']));
$dob = mysqli_real_escape_string($dbc,strip_tags($_POST['dob']));
$nationality= mysqli_real_escape_string($dbc,strip_tags($_POST['nationality']));
//$gender = mysqli_real_escape_string($dbc,strip_tags($_POST['gender']));

$Email = mysqli_real_escape_string($dbc,strip_tags($_POST['Email']));
$location = mysqli_real_escape_string($dbc,strip_tags($_POST['location']));
  $contact= mysqli_real_escape_string($dbc,strip_tags($_POST['contact']));

$highestQualification = mysqli_real_escape_string($dbc,strip_tags($_POST['emp_no']));
$currentPosition = mysqli_real_escape_string($dbc,strip_tags($_POST['emp_type']));
$companyName = mysqli_real_escape_string($dbc,strip_tags($_POST['about_us_name']));

$experience = mysqli_real_escape_string($dbc,strip_tags($_POST['web_url']));
$password = mysqli_real_escape_string($dbc,strip_tags(md5($_POST['password'])));

$passwordmd5 = md5($password);


$date_recorded = date('d-M-yy');


$time_recorded = date('Y/m/d H:i:s');

/* set autocommit to off */
mysqli_autocommit($dbc, FALSE);

$sql_insert= mysqli_query($dbc,"INSERT INTO staff_users
    (fName, lName, dob, gender, Email, location,access_level, contact, nationality, highestQualification, currentPosition,companyName, experience,
      date_recorded,time_recorded, password)
      VALUES ('".$fName."','".$lName."','".$dob."', '".$gender."', '".$Email."','".$location."','".$access_level."', '".$contact."',
        '".$nationality."','".$highestQualification."', '".$currentPosition."','".$companyName."','".$experience."','".$date_recorded."',
        '".$time_recorded."','".$password."')") or die (mysqli_error($dbc));

//log the action
$action_reference = "Sold a module to " . $fName;
$action_name = "Module Sale";
$action_icon = "far fa-project-diagram text-success";
$page_id = "Job Seeker Application Details";
$time_recorded = date('Y/m/d H:i:s');

$sql_log = mysqli_query($dbc,"INSERT INTO activity_logs
          (email,action_name,action_reference,action_icon,page_id,time_recorded)
              VALUES
      ('".$_SESSION['email']."','".$action_name."','".$action_reference."',
              '".$action_icon."','".$page_id."','".$time_recorded."')"
       );

if(mysqli_commit($dbc))
{
exit("success");
}

else
{
mysqli_rollback($dbc);
exit("failed");
}
}




}

//END OF POST REQUEST


?>
