<?php
include 'db.php';
$id=$_GET['cartid'];
$query="delete from cart where cart_id='$id'";
$result=mysqli_query($mysqli,$query);
if($result)
{
   header("location:Cart.php");
}
else
{
    echo"ERROR";
}
?>