<?php
/*
require_once('../setup/connect.php');
session_start();

if(isset($_POST['add_project']))
{

    //fetch last id
      $project_row_sql = mysqli_fetch_array(mysqli_query($dbc,"SELECT project_id,project_name FROM pm_projects ORDER BY
                                          time_recorded DESC LIMIT 1"));
      $project_id = $project_row_sql['project_id'];
      $project_name = $project_row_sql['project_name'];


    $sql_stakeholder = mysqli_query($dbc,"SELECT * FROM pm_project_roles WHERE project_id='".$project_id."'") or die(mysqli_error($dbc));
    if(mysqli_num_rows($sql_stakeholder) > 0)
    {
      while ($sql_stakeholder_row = mysqli_fetch_array($sql_stakeholder))
      {
        $email = $sql_stakeholder_row['project_stakeholder_email'];
        $name = $sql_stakeholder_row['project_stakeholder_name'];
        $role = $sql_stakeholder_row['project_role'];


            $subject = 'PPRMIS Project Role Notification';
            $message = "Dear  ".$name.", <br/><br/>

            A project titled <u> ".$project_name." </u> has been added and you have been assigned the following role(s): <br/>

            <u>".$role."</u><br/><br/>


            <br/><br/><br/>
            <i>This is an automated message, please do not reply</i>";
            $send_mail = mail($email,$subject,$message,$headers);

            if($send_mail)
                  {
                    $date_sent = date("d-m-Y h:i:sa");
                    $message = mysqli_real_escape_string($dbc,$message);
                    $store_sent_mail = mysqli_query($dbc,"INSERT INTO sent_mails (sent_from,sent_to,triggered_by,message_subject,message_body,date_sent)
                                                                  VALUES
                                                                  ('".$headers."','".$email."','".$_SESSION['name']."','".$subject."','".$message."','".$date_sent."')"
                                                   ) or die (mysqli_error($dbc));

                    echo "success";
                  }
                  else
                  {
                    echo error_get_last()['message'];
                    echo("mail not sent");
                  }
      }
    }
}

if(isset($_POST['edit_project']))
{

  $id = mysqli_real_escape_string($dbc,strip_tags($_POST['id']));

  $project_id_row = mysqli_fetch_array(mysqli_query($dbc,"SELECT project_id,project_name FROM pm_projects WHERE project_id='".$id."'"));
  $project_id = $project_id_row['project_id'];
  $project_name = $project_id_row['project_name'];


    $sql_stakeholder = mysqli_query($dbc,"SELECT * FROM pm_project_roles WHERE project_id='".$project_id."'") or die(mysqli_error($dbc));
    if(mysqli_num_rows($sql_stakeholder) > 0)
    {
      while ($sql_stakeholder_row = mysqli_fetch_array($sql_stakeholder))
      {
        $email = $sql_stakeholder_row['project_stakeholder_email'];
        $name = $sql_stakeholder_row['project_stakeholder_name'];
        $role = $sql_stakeholder_row['project_role'];


            $subject = 'PPRMIS Project Role Notification';
            $message = "Dear  ".$name.", <br/><br/>

            The project titled <u> ".$project_name." </u> has been modified. <br/><br/>
            You are receiving this email because you were assigned the following role(s): <br/>

            <u>".$role."</u><br/><br/>


            <br/><br/><br/>
            <i>This is an automated message, please do not reply</i>";
            $send_mail = mail($email,$subject,$message,$headers);

            if($send_mail)
                  {
                    $date_sent = date("d-m-Y h:i:sa");
                    $message = mysqli_real_escape_string($dbc,$message);
                    $store_sent_mail = mysqli_query($dbc,"INSERT INTO sent_mails (sent_from,sent_to,triggered_by,message_subject,message_body,date_sent)
                                                                  VALUES
                                                                  ('".$headers."','".$email."','".$_SESSION['name']."','".$subject."','".$message."','".$date_sent."')"
                                                   ) or die (mysqli_error($dbc));

                    echo "success";
                  }
                  else
                  {
                    echo error_get_last()['message'];
                    echo("mail not sent");
                  }
      }
    }
}


if(isset($_POST['add_project_issue_log']))
{
  //fetch last id
   $select_last_id_sql = mysqli_query($dbc,"SELECT issue_id,project_id FROM pm_issue_logs ORDER BY
                                        id DESC LIMIT 1");
  $id_row = mysqli_fetch_array($select_last_id_sql);
  $issue_id = $id_row['issue_id'];
  $project_id = $id_row['project_id'];

  $project_name_row = mysqli_fetch_array(mysqli_query($dbc,"SELECT project_name FROM pm_projects WHERE project_id='".$project_id."'"));
  $project_name = $project_name_row['project_name'];


  $issue_description = mysqli_real_escape_string($dbc,strip_tags($_POST['project_issue_description']));
  $issue_type = mysqli_real_escape_string($dbc,strip_tags($_POST['issue_type']));
  $raised_by= mysqli_real_escape_string($dbc,strip_tags($_POST['raised_by']));
  $priority = mysqli_real_escape_string($dbc,strip_tags($_POST['priority']));
  $person_responsible = mysqli_real_escape_string($dbc,strip_tags($_POST['person_responsible_for_next_action']));

  $sql_raised_by = mysqli_fetch_array(mysqli_query($dbc,"SELECT Email FROM staff_users WHERE Name='".$raised_by."'")) or die(mysqli_error($dbc));
  $raised_by_email = $sql_raised_by['Email'];

  $headers .= 'Cc: '.$raised_by_email.'' . "\r\n";

  $sql_person_responsible = mysqli_query($dbc,"SELECT Email FROM staff_users WHERE Name='".$person_responsible."'") or die(mysqli_error($dbc));
  if(mysqli_num_rows($sql_person_responsible) > 0)
  {
    while ($sql_person_responsible_row = mysqli_fetch_array($sql_person_responsible))
    {
      $email = $sql_person_responsible_row['Email'];
      $name = $person_responsible;

      $subject = 'PPRMIS Project Issue Notification';
      $message = "Dear  ".$name.", <br/><br/>

      A ".$priority."-Priority  issue, with the description <u>".$issue_description." </u> has been added. <br/><br/>
      This issue affects the project titled :  <u>".$project_name." </u> . <br/><br/>
      This issue was raised by <u>".$raised_by." </u> .<br/><br/>
      You are receiving this email because you have been selected as the  <u> Person Responsible for the Next Action </u>
      <br/><br/><br/>

      <i>This is an automated message, please do not reply</i>";
          $send_mail = mail($email,$subject,$message,$headers);

          if($send_mail)
                {
                  $date_sent = date("d-m-Y h:i:sa");
                  $message = mysqli_real_escape_string($dbc,$message);
                  $store_sent_mail = mysqli_query($dbc,"INSERT INTO sent_mails (sent_from,sent_to,triggered_by,message_subject,message_body,date_sent)
                                                                VALUES
                                                                ('".$headers."','".$email."','".$_SESSION['name']."','".$subject."','".$message."','".$date_sent."')"
                                                 ) or die (mysqli_error($dbc));

                  echo "success";
                }
                else
                {
                  echo error_get_last()['message'];
                  echo("mail not sent");
                }
    }
  }

}

if(isset($_POST['edit_project_issue_log']))
{
  $issue_id = mysqli_real_escape_string($dbc,strip_tags($_POST['issue_id']));
  $project_id = mysqli_real_escape_string($dbc,strip_tags($_POST['project_id']));

  $project_name_row = mysqli_fetch_array(mysqli_query($dbc,"SELECT project_name FROM pm_projects WHERE project_id='".$project_id."'"));
  $project_name = $project_name_row['project_name'];


  $issue_description = mysqli_real_escape_string($dbc,strip_tags($_POST['project_issue_description']));
  $issue_type = mysqli_real_escape_string($dbc,strip_tags($_POST['issue_type']));
  $raised_by= mysqli_real_escape_string($dbc,strip_tags($_POST['raised_by']));
  $priority = mysqli_real_escape_string($dbc,strip_tags($_POST['priority']));
  $person_responsible = mysqli_real_escape_string($dbc,strip_tags($_POST['person_responsible_for_next_action']));

  $sql_raised_by = mysqli_fetch_array(mysqli_query($dbc,"SELECT Email FROM staff_users WHERE Name='".$raised_by."'")) or die(mysqli_error($dbc));
  $raised_by_email = $sql_raised_by['Email'];

  $headers .= 'Cc: '.$raised_by_email.'' . "\r\n";

  $sql_person_responsible = mysqli_query($dbc,"SELECT Email FROM staff_users WHERE Name='".$person_responsible."'") or die(mysqli_error($dbc));
  if(mysqli_num_rows($sql_person_responsible) > 0)
  {
    while ($sql_person_responsible_row = mysqli_fetch_array($sql_person_responsible))
    {
      $email = $sql_person_responsible_row['Email'];
      $name = $person_responsible;

      $subject = 'PPRMIS Project Issue Notification';
      $message = "Dear  ".$name.", <br/><br/>

      The  issue with the description <u>".$issue_description." </u> has been modified. <br/><br/>
      This issue was raised by <u>".$raised_by." </u> .<br/><br/>
      You are receiving this email because you have been selected as the  <u> Person Responsible for the Next Action </u>
      <br/><br/><br/>

      <i>This is an automated message, please do not reply</i>";
          $send_mail = mail($email,$subject,$message,$headers);

          if($send_mail)
                {
                  $date_sent = date("d-m-Y h:i:sa");
                  $message = mysqli_real_escape_string($dbc,$message);
                  $store_sent_mail = mysqli_query($dbc,"INSERT INTO sent_mails (sent_from,sent_to,triggered_by,message_subject,message_body,date_sent)
                                                                VALUES
                                                                ('".$headers."','".$email."','".$_SESSION['name']."','".$subject."','".$message."','".$date_sent."')"
                                                 ) or die (mysqli_error($dbc));

                  echo "success";
                }
                else
                {
                  echo error_get_last()['message'];
                  echo("mail not sent");
                }
    }
  }
}

if(isset($_POST['close_issue_log']))
{
  $id = mysqli_real_escape_string($dbc,strip_tags($_POST['sid']));
  $status = mysqli_real_escape_string($dbc,strip_tags($_POST['status']));


  if($status == 'open')
  {
    $status = "OPENED";
  }
  else
  {
    $status = "CLOSED";
  }

  $issue_row = mysqli_fetch_array(mysqli_query($dbc,"SELECT issue_id,project_id FROM pm_issue_logs WHERE id='".$id."'"));

  $issue_id = $issue_row['issue_id'];
  $project_id = $issue_row['project_id'];

  $issue_description_row = mysqli_fetch_array(mysqli_query($dbc,"SELECT issue_description,raised_by,person_responsible
                                         FROM pm_issue_logs_updates WHERE issue_id='".$issue_id."' && changed='no'"));
  $issue_description = $issue_description_row['issue_description'];
  $raised_by = $issue_description_row['raised_by'];
  $person_responsible = $issue_description_row['person_responsible'];

  $project_name_row = mysqli_fetch_array(mysqli_query($dbc,"SELECT project_name FROM pm_projects WHERE project_id='".$project_id."'"));
  $project_name = $project_name_row['project_name'];
;

  $sql_raised_by = mysqli_fetch_array(mysqli_query($dbc,"SELECT Email FROM staff_users WHERE Name='".$raised_by."'")) or die(mysqli_error($dbc));
  $raised_by_email = $sql_raised_by['Email'];

  $headers .= 'Cc: '.$raised_by_email.'' . "\r\n";

  $sql_person_responsible = mysqli_query($dbc,"SELECT Email FROM staff_users WHERE Name='".$person_responsible."'") or die(mysqli_error($dbc));
  if(mysqli_num_rows($sql_person_responsible) > 0)
  {
    while ($sql_person_responsible_row = mysqli_fetch_array($sql_person_responsible))
    {
      $email = $sql_person_responsible_row['Email'];
      $name = $person_responsible;

      $subject = 'PPRMIS Project Issue Notification';
      $message = "Dear  ".$name.", <br/><br/>

      The  status for the issue with the description <u>".$issue_description." </u> is now  <u>".$status." .</u> <br/><br/>
      This issue was affecting the project titled  <u>".$project_name." </u> .<br/><br/>
      You are receiving this email because you were selected as the   Person Responsible for the Next Action
      <br/><br/><br/>

      <i>This is an automated message, please do not reply</i>";
          $send_mail = mail($email,$subject,$message,$headers);

          if($send_mail)
                {
                  $date_sent = date("d-m-Y h:i:sa");
                  $message = mysqli_real_escape_string($dbc,$message);
                  $store_sent_mail = mysqli_query($dbc,"INSERT INTO sent_mails (sent_from,sent_to,triggered_by,message_subject,message_body,date_sent)
                                                                VALUES
                                                                ('".$headers."','".$email."','".$_SESSION['name']."','".$subject."','".$message."','".$date_sent."')"
                                                 ) or die (mysqli_error($dbc));

                  echo "success";
                }
                else
                {
                  echo error_get_last()['message'];
                  echo("mail not sent");
                }
    }
  }

}

if(isset($_POST['add_project_risk']))
{
  //fetch last id
   $select_last_id_sql = mysqli_query($dbc,"SELECT risk_id FROM pm_risks ORDER BY
                                        id DESC LIMIT 1");
    $id_row = mysqli_fetch_array($select_last_id_sql);
    $risk_id = $id_row['risk_id'];

    $project_id = mysqli_real_escape_string($dbc,strip_tags($_POST['project_id']));

    $project_name_row = mysqli_fetch_array(mysqli_query($dbc,"SELECT project_name FROM pm_projects WHERE project_id='".$project_id."'"));
    $project_name = $project_name_row['project_name'];

    $risk_description = mysqli_real_escape_string($dbc,strip_tags($_POST['project_risk_description']));
    $project_phase = implode(" , ",$_POST['project_phase']);
    if($project_phase == "all")
    {
      $project_phase = "All Phases";
    }
    else
    {
      $project_phase = $project_phase;
    }

    $person_responsible = mysqli_real_escape_string($dbc,strip_tags($_POST['person_responsible']));
    $overall_score = mysqli_real_escape_string($dbc,strip_tags($_POST['overall_score']));

    $sql_person_responsible = mysqli_query($dbc,"SELECT Email FROM staff_users WHERE Name='".$person_responsible."'") or die(mysqli_error($dbc));
    if(mysqli_num_rows($sql_person_responsible) > 0)
    {
      while ($sql_person_responsible_row = mysqli_fetch_array($sql_person_responsible))
      {
        $email = $sql_person_responsible_row['Email'];
        $name = $person_responsible;

        $subject = 'PPRMIS Project Risk Notification';
        $message = "Dear  ".$name.", <br/><br/>

        A risk with the description <u>".$risk_description." </u> has been added for the project titled  <u>".$project_name." .</u> <br/><br/>
        This risk affects the following project phase(s): <u>".$project_phase." </u> .<br/><br/>
        This risk has a rating of <u>".$overall_score." </u> .<br/><br/>
        You are receiving this email because you have been selected as the <u>Risk Owner</u>
        <br/><br/><br/>

        <i>This is an automated message, please do not reply</i>";
            $send_mail = mail($email,$subject,$message,$headers);

            if($send_mail)
                  {
                    $date_sent = date("d-m-Y h:i:sa");
                    $message = mysqli_real_escape_string($dbc,$message);
                    $store_sent_mail = mysqli_query($dbc,"INSERT INTO sent_mails (sent_from,sent_to,triggered_by,message_subject,message_body,date_sent)
                                                                  VALUES
                                                                  ('".$headers."','".$email."','".$_SESSION['name']."','".$subject."','".$message."','".$date_sent."')"
                                                   ) or die (mysqli_error($dbc));

                    echo "success";
                  }
                  else
                  {
                    echo error_get_last()['message'];
                    echo("mail not sent");
                  }
      }
    }
  }

  if(isset($_POST['edit_project_risk']))
  {
    $risk_id = mysqli_real_escape_string($dbc,strip_tags($_POST['project_risk_id']));
    $project_id = mysqli_real_escape_string($dbc,strip_tags($_POST['project_id']));
    $risk_description = mysqli_real_escape_string($dbc,strip_tags($_POST['project_risk_description']));
    $project_phase = implode(" , ",$_POST['project_phase']);
    $person_responsible = mysqli_real_escape_string($dbc,strip_tags($_POST['person_responsible']));
    $risk_mitigatons_strategy = mysqli_real_escape_string($dbc,strip_tags($_POST['risk_mitigations_strategy']));
    $actions_applied = mysqli_real_escape_string($dbc,strip_tags($_POST['actions_applied']));
    $overall_score = mysqli_real_escape_string($dbc,strip_tags($_POST['overall_score']));

    $project_name_row = mysqli_fetch_array(mysqli_query($dbc,"SELECT project_name FROM pm_projects WHERE project_id='".$project_id."'"));
    $project_name = $project_name_row['project_name'];

    if($project_phase == "all")
    {
      $project_phase = "All Phases";
    }
    else
    {
      $project_phase = $project_phase;
    }


    $sql_person_responsible = mysqli_query($dbc,"SELECT Email FROM staff_users WHERE Name='".$person_responsible."'") or die(mysqli_error($dbc));
    if(mysqli_num_rows($sql_person_responsible) > 0)
    {
      while ($sql_person_responsible_row = mysqli_fetch_array($sql_person_responsible))
      {
        $email = $sql_person_responsible_row['Email'];
        $name = $person_responsible;

        $subject = 'PPRMIS Project Risk Notification';
        $message = "Dear  ".$name.", <br/><br/>

        The risk with the description <u>".$risk_description." </u> has been modified. <br/><br/>
        This risk affects the project <u>".$project_name." </u> on the project phase(s): <u>".$project_phase." </u> .<br/><br/>
        This risk has a rating of <u>".$overall_score." </u> .<br/><br/>
        This risk mitigation strategy for this risk is: ".$risk_mitigatons_strategy." .<br/><br/>
        The actions applied to curb this this are: ".$actions_applied."  .<br/><br/>
        You are receiving this email because you have been selected as the Risk Owner
        <br/><br/><br/>

        <i>This is an automated message, please do not reply</i>";
            $send_mail = mail($email,$subject,$message,$headers);

            if($send_mail)
                  {
                    $date_sent = date("d-m-Y h:i:sa");
                    $message = mysqli_real_escape_string($dbc,$message);
                    $store_sent_mail = mysqli_query($dbc,"INSERT INTO sent_mails (sent_from,sent_to,triggered_by,message_subject,message_body,date_sent)
                                                                  VALUES
                                                                  ('".$headers."','".$email."','".$_SESSION['name']."','".$subject."','".$message."','".$date_sent."')"
                                                   ) or die (mysqli_error($dbc));

                    echo "success";
                  }
                  else
                  {
                    echo error_get_last()['message'];
                    echo("mail not sent");
                  }
      }
    }

  }

  if(isset($_POST['close_project_risk']))
  {
    $id = mysqli_real_escape_string($dbc,strip_tags($_POST['sid']));
    $status = mysqli_real_escape_string($dbc,strip_tags($_POST['status']));

    if($status == 'open')
    {
      $status = "OPENED";
    }
    else
    {
      $status = "CLOSED";
    }

    $risk_row = mysqli_fetch_array(mysqli_query($dbc,"SELECT risk_id,project_id FROM pm_risks WHERE id='".$id."'"));

    $risk_id = $risk_row['risk_id'];
    $project_id = $risk_row['project_id'];

    $risk_description_row = mysqli_fetch_array(mysqli_query($dbc,"SELECT risk_description,actions_applied,mitigation_strategy,overall_score,risk_owner,phase
                                           FROM pm_risks_updates WHERE risk_id='".$risk_id."' && changed='no'"));
    $risk_description = $risk_description_row['risk_description'];
    $person_responsible = $risk_description_row['risk_owner'];
    $actions_applied = $risk_description_row['actions_applied'];
    $risk_mitigatons_strategy = $risk_description_row['mitigation_strategy'];
    $overall_score = $risk_description_row['overall_score'];
    $project_phase = $risk_description_row['phase'];

    $project_name_row = mysqli_fetch_array(mysqli_query($dbc,"SELECT project_name FROM pm_projects WHERE project_id='".$project_id."'"));
    $project_name = $project_name_row['project_name'];

    $sql_person_responsible = mysqli_query($dbc,"SELECT Email FROM staff_users WHERE Name='".$person_responsible."'") or die(mysqli_error($dbc));
    if(mysqli_num_rows($sql_person_responsible) > 0)
    {
      while ($sql_person_responsible_row = mysqli_fetch_array($sql_person_responsible))
      {
        $email = $sql_person_responsible_row['Email'];
        $name = $person_responsible;

        $subject = 'PPRMIS Project Risk Notification';
        $message = "Dear  ".$name.", <br/><br/>

        The risk with the description <u>".$risk_description." </u> is now <u>".$status." </u>. <br/><br/>
        This risk was affecting the project <u>".$project_name." </u> on the project phase(s): <u>".$project_phase." </u> .<br/><br/>
        This risk had a rating of <u>".$overall_score." </u> .<br/><br/>
        This risk mitigation strategy for this risk was: ".$risk_mitigatons_strategy." .<br/><br/>
        The actions applied to curb this this were: ".$actions_applied."  .<br/><br/>
        You are receiving this email because you were selected as the Risk Owner
        <br/><br/><br/>

        <i>This is an automated message, please do not reply</i>";
            $send_mail = mail($email,$subject,$message,$headers);

            if($send_mail)
                  {
                    $date_sent = date("d-m-Y h:i:sa");
                    $message = mysqli_real_escape_string($dbc,$message);
                    $store_sent_mail = mysqli_query($dbc,"INSERT INTO sent_mails (sent_from,sent_to,triggered_by,message_subject,message_body,date_sent)
                                                                  VALUES
                                                                  ('".$headers."','".$email."','".$_SESSION['name']."','".$subject."','".$message."','".$date_sent."')"
                                                   ) or die (mysqli_error($dbc));

                    echo "success";
                  }
                  else
                  {
                    echo error_get_last()['message'];
                    echo("mail not sent");
                  }
      }
    }
  }


  //if its milestone creation
  if(isset($_POST['add_resource']))
  {
    $select_last_id_sql = mysqli_query($dbc,"SELECT resource_id,time_recorded FROM pm_resources ORDER BY
                                          time_recorded DESC LIMIT 1") or die("failed");
    $id_row = mysqli_fetch_array($select_last_id_sql);
    $resource_id = $id_row['resource_id'];

    $task_id = mysqli_real_escape_string($dbc,strip_tags($_POST['task_id']));
    $project_id = mysqli_real_escape_string($dbc,strip_tags($_POST['project_id']));

    $sql_activity_name = mysqli_fetch_array(mysqli_query($dbc,"SELECT activity_name,milestone_id FROM pm_activities WHERE task_id='".$task_id."'"));
    $activity_name = $sql_activity_name['activity_name'];
    $milestone_id = $sql_activity_name['milestone_id'];


    $milestone_name = mysqli_fetch_array(mysqli_query($dbc,"SELECT milestone_name FROM pm_milestones WHERE id='".$milestone_id."'"));
    $milestone_name = $milestone_name['milestone_name'];

    $project_name_row = mysqli_fetch_array(mysqli_query($dbc,"SELECT project_name FROM pm_projects WHERE project_id='".$project_id."'"));
    $project_name = $project_name_row['project_name'];


    $sql_activity_owner = mysqli_query($dbc,"SELECT resource_name FROM pm_resources WHERE activity_id='".$task_id."'") or die(mysqli_error($dbc));
    if(mysqli_num_rows($sql_activity_owner) > 0)
    {
      while ($owners = mysqli_fetch_array($sql_activity_owner))
      {
        $resource_email = mysqli_fetch_array(mysqli_query($dbc,"SELECT Email FROM staff_users WHERE Name='".$owners['resource_name']."' "));
        $resource_email = $resource_email['Email'];

        $email[] = $resource_email;
        $name[] = $owners['resource_name'];
      }
      $to = implode(", ", $email);
      $name = implode(", ", $name);
    }

    $subject = 'PPRMIS Project Task Notification';
    $message = "Dear ".$name.", <br/><br/><br/>

    An activity with the description <u>".$activity_name."</u> has been added for the project ".$project_name.", under the ".$milestone_name." milestone.<br/><br/>

    You are receiving this email because you have been selected to handle this activity.<br/><br/>

    Please login to <a href='https://pprmis.cma.or.ke/prmis/'>PPRMIS</a>  to view more about the activity.

    <br/><br/><br/>
    <i>This is an automated message, please do not reply</i>";
    $send_mail = mail($to,$subject,$message,$headers);
    if($send_mail)
    {
      $date_sent = date("d-m-Y h:i:sa");
      $message = mysqli_real_escape_string($dbc,$message);
      $store_sent_mail = mysqli_query($dbc,"INSERT INTO sent_mails (sent_from,sent_to,triggered_by,message_subject,message_body,date_sent)
                                                    VALUES
                                                    ('".$headers."','".$to."','".$_SESSION['name']."','".$subject."','".$message."','".$date_sent."')"
                                     ) or die (mysqli_error($dbc));
      exit("success");
    }
    else
    {
      exit("mail not sent");
    }
}

if (isset($_POST['delete_resource']))
{
  $resource_id = mysqli_real_escape_string($dbc,strip_tags($_POST['sid']));
  $resource_name = mysqli_real_escape_string($dbc,strip_tags($_POST['resource_name']));
  $task_id = mysqli_real_escape_string($dbc,strip_tags($_POST['task_id']));
  $project_id = mysqli_real_escape_string($dbc,strip_tags($_POST['project_id']));
  $resource_id = mysqli_real_escape_string($dbc,strip_tags($_POST['sid']));

  $resource_email = mysqli_fetch_array(mysqli_query($dbc,"SELECT Email FROM staff_users WHERE Name='".$resource_name."' "));
  $resource_email = $resource_email['Email'];

  $sql_activity_name = mysqli_fetch_array(mysqli_query($dbc,"SELECT activity_name,milestone_id FROM pm_activities WHERE task_id='".$task_id."'"));
  $activity_name = $sql_activity_name['activity_name'];
  $milestone_id = $sql_activity_name['milestone_id'];


  $milestone_name = mysqli_fetch_array(mysqli_query($dbc,"SELECT milestone_name FROM pm_milestones WHERE id='".$milestone_id."'"));
  $milestone_name = $milestone_name['milestone_name'];

  $project_name_row = mysqli_fetch_array(mysqli_query($dbc,"SELECT project_name FROM pm_projects WHERE project_id='".$project_id."'"));
  $project_name = $project_name_row['project_name'];


  $sql_activity_owner = mysqli_query($dbc,"SELECT resource_name FROM pm_resources WHERE activity_id='".$task_id."'") or die(mysqli_error($dbc));
  if(mysqli_num_rows($sql_activity_owner) > 0)
  {
    while ($owners = mysqli_fetch_array($sql_activity_owner))
    {
      $active_resource_email = mysqli_fetch_array(mysqli_query($dbc,"SELECT Email FROM staff_users WHERE Name='".$owners['resource_name']."' "));
      $active_resource_email = $active_resource_email['Email'];

      $email[] = $active_resource_email;
    }
    $to_active_resource = implode(", ", $email);

  }

  $headers .= 'Cc: '.$to_active_resource.'' . "\r\n";

  $subject = 'PPRMIS Project Task Notification';
  $message = "Dear ".$resource_name.", <br/><br/><br/>

  You have been removed from the activity: <u>".$activity_name."</u>, for the project ".$project_name.", under the ".$milestone_name." milestone.<br/><br/>

  <br/><br/><br/>
  <i>This is an automated message, please do not reply</i>";

  $send_mail = mail($resource_email,$subject,$message,$headers);
  if($send_mail)
  {
    $date_sent = date("d-m-Y h:i:sa");
    $message = mysqli_real_escape_string($dbc,$message);
    $store_sent_mail = mysqli_query($dbc,"INSERT INTO sent_mails (sent_from,sent_to,triggered_by,message_subject,message_body,date_sent)
                                                  VALUES
                                                  ('".$headers."','".$to."','".$_SESSION['name']."','".$subject."','".$message."','".$date_sent."')"
                                   ) or die (mysqli_error($dbc));
    exit("success");
  }
  else
  {
    exit("mail not sent");
  }

}

if (isset($_POST['add_task_status']))
{
  $project_id = mysqli_real_escape_string($dbc,strip_tags($_POST['project_id']));
  $task_id = mysqli_real_escape_string($dbc,strip_tags($_POST['task_id']));
  $task_status = mysqli_real_escape_string($dbc,strip_tags($_POST['task_status']));
  $comments = mysqli_real_escape_string($dbc,strip_tags($_POST['task_status_comments']));

  if($comments == '')
  {
    $comments = "No Comments";
  }
  else
  {
    $comments = $comments;
  }

  $sql_activity_name = mysqli_fetch_array(mysqli_query($dbc,"SELECT activity_name,milestone_id FROM pm_activities WHERE task_id='".$task_id."'"));
  $activity_name = $sql_activity_name['activity_name'];
  $milestone_id = $sql_activity_name['milestone_id'];

  $updated_by = $_SESSION['name'];


  $milestone_name = mysqli_fetch_array(mysqli_query($dbc,"SELECT milestone_name FROM pm_milestones WHERE id='".$milestone_id."'"));
  $milestone_name = $milestone_name['milestone_name'];

  $project_name_row = mysqli_fetch_array(mysqli_query($dbc,"SELECT project_name FROM pm_projects WHERE project_id='".$project_id."'"));
  $project_name = $project_name_row['project_name'];

  $sql_activity_owner = mysqli_query($dbc,"SELECT resource_name FROM pm_resources WHERE activity_id='".$task_id."'") or die(mysqli_error($dbc));
  if(mysqli_num_rows($sql_activity_owner) > 0)
  {
    while ($owners = mysqli_fetch_array($sql_activity_owner))
    {
      $active_resource = mysqli_fetch_array(mysqli_query($dbc,"SELECT Email,Name FROM staff_users WHERE Name='".$owners['resource_name']."' "));
      $active_resource_email = $active_resource['Email'];
      $active_resource_name = $active_resource['Name'];

      $email[] = $active_resource_email;
      $name[] = $active_resource_name;
    }
    $to = implode(", ", $email);
    $name = implode(", ", $name);

  }

  $subject = 'PPRMIS Project Task Notification';
  $message = "Dear ".$name.", <br/><br/><br/>

  The activity: <u>".$activity_name."</u>, for the project ".$project_name.", under the ".$milestone_name." milestone has been updated to <u>".$task_status."</u><br/><br/>
  The activity was updated by ".$updated_by.".<br/><br/>
  The comments on this activity update are: ".$comments."

  <br/><br/><br/>
  <i>This is an automated message, please do not reply</i>";

  $send_mail = mail($to,$subject,$message,$headers);
  if($send_mail)
  {
    $date_sent = date("d-m-Y h:i:sa");
    $message = mysqli_real_escape_string($dbc,$message);
    $store_sent_mail = mysqli_query($dbc,"INSERT INTO sent_mails (sent_from,sent_to,triggered_by,message_subject,message_body,date_sent)
                                                  VALUES
                                                  ('".$headers."','".$to."','".$_SESSION['name']."','".$subject."','".$message."','".$date_sent."')"
                                   ) or die (mysqli_error($dbc));
    exit("success");
  }
  else
  {
    exit("mail not sent");
  }

}
*/
 ?>
