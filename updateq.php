<?php
 include "db.php";
if(isset($_POST['updateq']))
{
        $pid=$_GET['pid'];
        $new=$_POST['quant'];
    $query1="update product set Quantity='$new' WHERE product_id='$pid'";
    $result1=mysqli_query($mysqli,$query1) or die(mysqli_error($mysqli));
    if($result1)
    {
    header("Location:distpage.php");
    }
    else
    {
        echo mysqli_error($mysqli);
    }
}
?>