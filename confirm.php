<?php
require_once("configdb.php");
 $passkey = $_GET['passkey'];
 $sql = "UPDATE leaders SET com_code=NULL WHERE com_code='$passkey'";
 $result = mysql_query($sql) or die(mysql_error());
 if($result)
 {
  echo '<div>Your account is now active. You may now <a href="login.php">Log in</a></div>';
}
 else
 {
  echo "Some error occur.";
 }
?>