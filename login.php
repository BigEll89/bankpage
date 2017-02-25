<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<style>
 label{
  width:100px;
  float:left;
 }
</style>
</head>
<body>
<?php
 session_start();
 require_once("configdb.php");
 if(isset($_POST['submit']))
 {
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);
  $query = "SELECT * FROM leaders WHERE email='$email' AND password='$password' AND com_code IS NULL";
  $result = mysql_query($query)or die(mysql_error());
  $num_row = mysql_num_rows($result);
  $row=mysql_fetch_array($result);
  if( $num_row ==1 )
         {
   $_SESSION['leadername']=$row['leadername'];
   header("Location: member.php");
   exit;
  }
  else
         {
   echo 'false';
  }
 }
?>
<div class="login_form">
<form action="login.php" method="post" >
 <p>
  <label for="email">E-mail:</label>
  <input name="email" type="text" id="email" size="30"/>
 </p>
 <p>
  <label for="password">Password:</label>
  <input name="password" type="password" id="password" size="30"/>
 </p>
 <p>
  <input name="submit" type="submit" value="Submit"/>
 </p>
</form>
</div>
</body>
</html>