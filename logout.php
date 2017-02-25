<?php
 session_start();
 unset($_SESSION['leadername']);
 header('Location: index.php');
?>