<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    require_once('../setup/connect.php');
session_start();

 require_once('../../phpmailer/PHPMailerAutoload.php');
 $mail = new phpmailer;

 $sendTo = mysqli_real_escape_string($dbc,strip_tags($_POST['sendTo']));

   $long_desc3 = $_POST['long_desc3'];

    //$mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged

  //  $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'pcheizin@gmail.com';                     // SMTP username
    $mail->Password   = '9000@Kenya';                               // SMTP password

    //Recipients
    $mail->setFrom('inventory@panoramaengineering.com', 'Potential Staffing Email Marketing');
    foreach ($_POST['sendToMany'] as $selectedEmail)
    //while ($_POST['sendToMany'] as $selectedEmail)
    {


    //  $insert_approver = mysqli_query($dbc,"INSERT INTO bulk_email_multiple (mail_address,mail_details,  recorded_by)
    //  VALUES ('".$selectedEmail."','".$long_desc."','".$recorded_by."')") or die (mysqli_error($dbc));

      //  $mail->addAddress("$email");     // Add a recipient
      //$mail->addCC('pchege@students.uonbi.ac.ke');               // Name is optional
      //  $mail->addReplyTo('info@example.com', 'Information');
      //    $mail->addCC('moffat1@panoramaengineering.com');
       $mail->addBCC("$selectedEmail");

           }

    //$mail->setFrom('pcheizin@gmail.com', 'Panorama');
    //$mail->addAddress(".$stock_approver.", ".$recorded_by.");     // Add a recipient
    $mail->isHTML(true);
    $css.='<style type="text/css">
    		.test{
    			font-size:12px;
    			color:green;
    		}

    				.test2{
    			font-size:12px;
    			color:red;
    		}
    		</style>';                              // Set email format to HTML
    //$mail->addAttachment('../../views/stock-item/documents/panoramaLogo.jpg');
    $mail->Subject = 'Potential Staffing Email Marketing';
    $mail->Body    ='
    <html>
    <head>
      <title></title>
      '.$css.'
    </head>
    <body>

      <p  class="test">Dear Sir/Madam </b>, <br/><br/><br/>

    <p>'.$long_desc3.'</p>

      <br/>
 <p  class="test"> For more information <a href="https://career.panoramaengineering.com/resources.php">Click here</a>. <br/>

      Kind Regards,  <br/>

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
