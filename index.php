<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sing Up</title>
<style>
 label{
  width:100px;
  float:left;
 }
</style>
</head>
<body>
<?php 
 require_once("configdb.php");
 session_start();
 if(isset($_SESSION['error']))
 {
  echo '<p>'.$_SESSION['error']['leadersname'].'</p>';
  echo '<p>'.$_SESSION['error']['email'].'</p>';
  echo '<p>'.$_SESSION['error']['password'].'</p>';
  unset($_SESSION['error']);
 }
?>
<div class="signup_form">
<form action="register.php" method="post" >
 <p>
  <label for="leadername">Leader Name:</label>
  <input name="leadername" type="text" id="leadername" size="30"/>
 </p>
  <p>
  <label for="nationname">Nation Name:</label>
  <input name="nationname" type="text" id="nationname" size="30"/>
 </p>
 <p>
  <label for="email">E-mail:</label>
  <input name="email" type="text" id="email" size="30"/>
 </p>
 <p>
  <label for="password">Password:</label>
  <input name="password" type="password" id="password" size="30 "/>
 </p>
 <p>
  <input name="submit" type="submit" value="Submit"/>
 </p>
</form>
</div>
<p><a href="login.php">Login</a></p>
</body>
</html>