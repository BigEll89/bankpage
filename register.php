<?php
session_start();
require_once("configdb.php");
if(isset($_POST['submit']))
{
 //whether the leadername is blank
 if($_POST['leadername'] == '')
 {
  $_SESSION['error']['leadername'] = "leaders Name is required.";
 }
 //whether the email is blank
 if($_POST['email'] == '')
 {
  $_SESSION['error']['email'] = "E-mail is required.";
 }
 else
 {
  //whether the email format is correct
  if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9._-]+)+$/", $_POST['email']))
  {
   //if it has the correct format whether the email has already exist
   $email= $_POST['email'];
   $sql1 = "SELECT * FROM leaders WHERE email = '$email'";
   $result1=mysql_query($sql1);
   if (mysql_num_rows($result1) > 0)
            {
    $_SESSION['error']['email'] = "This Email is already used.";
   }
  }
  else
  {
   //this error will set if the email format is not correct
   $_SESSION['error']['email'] = "Your email is not valid.";
  }
 }
 //whether the password is blank
 if($_POST['password'] == '')
 {
  $_SESSION['error']['password'] = "Password is required.";
 }
 
 //if the error exist, we will go to registration form
 if(isset($_SESSION['error']))
 {
  header("Location: index.php");
  exit;
 }
 else
 {
  $leadername = $_POST['leadername'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $com_code = md5(uniqid(rand()));

  $sql2 = "INSERT INTO leaders (leadername, email, password, com_code) VALUES ('$leadername', '$email', '$password', '$com_code')";
  $result2 = mysql_query($sql2) or die(mysql_error());

  if($result2)
  {
   $to = $email;
   $subject = "Terra Account Verification for $leadername";
   $header = "Verify your email on Terra";
   $message = "We just need you to verify your account real quick! ~~Terra. rn";
   $message .= "http://www.web13.webuda.com/confirm.php?passkey=$com_code";

   $sentmail = mail($to,$subject,$message,$header);

   if($sentmail)
            {
   echo "A Verification Code has been sent to your Email. This may take up to 10 minutes.";
   }
   else
         {
    echo "Cannot send Confirmation link to your e-mail address";
   }
  }
  else {
	echo("No Results");
  }
 }
}
?>