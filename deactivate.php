<?php
include "db.php";
session_start();
$id=$_GET['Uid'];
mysqli_query($mysqli,"update users set status=0 where id='$id'"); 
header("location:Adminpage.php");    
?>