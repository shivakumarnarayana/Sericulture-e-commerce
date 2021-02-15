<?php
session_start();
unset($_SESSION['uid']);
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/home.php");
?>