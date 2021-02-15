<?php
include "db.php";
if(isset($_GET['cid']))
{
    $cid=$_GET['cid'];
    $query="update cart set delivery=1 where cart_id=$cid";
    $result=mysqli_query($mysqli,$query);
    if($result)
    {
        header("location:orders.php");
    }
}
?> 