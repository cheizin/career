<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    require_once('../setup/connect.php');
session_start();

 require_once('../../phpmailer/PHPMailerAutoload.php');
 $mail = new phpmailer;

 $access_level = mysqli_real_escape_string($dbc,strip_tags($_POST['job-seeker']));
 $fName = mysqli_real_escape_string($dbc,strip_tags($_POST['fName']));
 $lName = mysqli_real_escape_string($dbc,strip_tags($_POST['lName']));
 $dob = mysqli_real_escape_string($dbc,strip_tags($_POST['dob']));
 $gender = mysqli_real_escape_string($dbc,strip_tags($_POST['gender']));

 $Email = mysqli_real_escape_string($dbc,strip_tags($_POST['Email']));
 $location = mysqli_real_escape_string($dbc,strip_tags($_POST['location']));
   $contact= mysqli_real_escape_string($dbc,strip_tags($_POST['contact']));
 $nationality= mysqli_real_escape_string($dbc,strip_tags($_POST['nationality']));
 $highestQualification = mysqli_real_escape_string($dbc,strip_tags($_POST['highestQualification']));
 $currentPosition = mysqli_real_escape_string($dbc,strip_tags($_POST['currentPosition']));
 $companyName = mysqli_real_escape_string($dbc,strip_tags($_POST['companyName']));

 $experience = mysqli_real_escape_string($dbc,strip_tags($_POST['experience']));

$total = mysqli_real_escape_string($dbc,strip_tags($_POST['total']));


$date_recorded = date('d-M-yy');

$recorded_by = $_SESSION['fName'];

$email = $_SESSION['email'];


    //$mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged

  //  $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'pcheizin@gmail.com';                     // SMTP username
    $mail->Password   = '9000@Kenya';                               // SMTP password

    //Recipients
    $mail->setFrom('inventory@panoramaengineering.com', 'Potential Staffing Career Portal');
    $mail->addAddress("$Email");     // Add a recipient
     //$mail->addCC('pchege@students.uonbi.ac.ke');               // Name is optional
  //  $mail->addReplyTo('info@example.com', 'Information');
  //    $mail->addCC('moffat1@panoramaengineering.com');
  //  $mail->addBCC('bcc@example.com');

//$mail->setFrom('pcheizin@gmail.com', 'Panorama');
//$mail->addAddress(".$stock_approver.", ".$recorded_by.");     // Add a recipient
$mail->isHTML(true);                                  // Set email format to HTML
//$mail->addAttachment('../../views/stock-item/documents/panoramaLogo.jpg');
$mail->Subject = 'Potential Staffing Job Seeker Sign up';
$mail->Body    = '
<html>
<head>
  <title></title>
  '.$css.'
</head>
<body>

  <p  class="test">Dear <b>'.$fName.', '.$lName.' </b>, <br/><br/><br/>
You have Registered as a <b>Job Seeker</b> in <b> Potential Staffing Career Portal </b>  as follows:- <br/> </p>
  <table>
    <tr>
      <th  class="test2">First Name</th><th class="test2">Last Name</th><th class="test2">Date of Birth</th><th class="test2">Email</th>
      <th class="test2">Location</th> <th class="test2">Contact</th> <th class="test2">Nationality</th> <th class="test2">Highest Qualification</th>
      <th class="test2">Current Position</th> <th class="test2">Company Name</th> <th class="test2">Experience</th>
    </tr>
    <tr>
      <td class="test">'.$fName.'</td><td class="test">'.$lName.'</td><td class="test">'.$dob.'</td><td class="test">'.$Email.'</td>
        <td class="test">'.$location.'</td><td class="test">'.$nationality.'</td><td class="test">'.$highestQualification.'</td><td class="test">'.$currentPosition.'</td>
        <td class="test">'.$companyName.'</td><td class="test">'.$experience.'</td>
    </tr>

  </table>
  <br/>
  <br/><br/>
  <p  class="test">  Please log in to <a href="https://career.panoramaengineering.com/">Career Portal</a> to view more Details.
  <br/><br/>
  Kind Regards,   <br/>

  Potential Staffing Africa   <br/>
  https:www.potentialstaffing.com   <br/>
  <br/><br/>
  <img src="https://career.panoramaengineering.com/assets/img/potential.png" alt="Website Change Request" />
</body>
</html>
';



if(!$mail->send())
{
                      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
else {
  echo 'Message has been sent';
}

}
//END OF POST REQUEST

 ?>
