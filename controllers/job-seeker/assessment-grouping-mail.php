<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    require_once('../setup/connect.php');
session_start();

 require_once('../../phpmailer/PHPMailerAutoload.php');
 $mail = new phpmailer;

      $grouping_name = mysqli_real_escape_string($dbc,strip_tags($_POST['grouping_name']));



    //  $date_created = date('d-M-yy');


      $time_recorded = date('Y/m/d H:i:s');

        $recorded_by = $_SESSION['lName'];

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
    $mail->addAddress("$email", 'Potential Staffing Career Portal');     // Add a recipient

  //  $mail->addBCC('bcc@example.com');

//$mail->setFrom('pcheizin@gmail.com', 'Panorama');
//$mail->addAddress(".$stock_approver.", ".$recorded_by.");     // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML
$mail->addAttachment('../../views/stock-item/documents/panoramaLogo.jpg');
$mail->Subject = 'Potential Satffing Career Portal';
$mail->Body    = "Dear <b>All</b>, <br/><br/><br/>

The Asessement Name:- <b>".$grouping_name."</b> <br/>
was added in the system by: <b>".$email."</b><br/>
<br/>
<br/><br/><br/>
Please log in to <a href='https://career.panoramaengineering.com/'>Career Portaly</a> to view Details.
<br/><br/><br/><br/><br/>
<b>This is an automated message, please do not reply</b>";

if(!$mail->send())
{
  echo 'Message not Sent';
}
else {
  echo 'Message has been sent';
}

}
//END OF POST REQUEST

 ?>
