<?php

include'db.php';
$pid=$_GET['pno'];
$quant=$_GET['quant'];
$cost=$_GET['cost'];
$query="update cart set quantity='$quant',cost='$cost' where product_id='$pid'";
$result=mysqli_query($mysqli,$query);
if($result)
{
header("Location:Cart.php");    
}
else
{
    echo"error";
}
?>