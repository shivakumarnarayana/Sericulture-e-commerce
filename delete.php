<?php
include "db.php";
session_start();
$id=$_GET['Uid'];
mysqli_query($mysqli,"delete from users where id='$id'"); 
header("location:Adminpage.php");    
?>