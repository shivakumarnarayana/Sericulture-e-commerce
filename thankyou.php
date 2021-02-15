<?php include'header1.php';
session_start();
$userid=$_SESSION['uid'];
include 'db.php';
 


$query="select c.product_id,p.pname,p.photo,c.quantity,p.price from product as p,cart as c WHERE c.product_id=p.product_id and c.ordered=0";
$result=mysqli_query($mysqli,$query);
while ($row=mysqli_fetch_assoc($result)){
    $pid=$row['product_id'];
$total=$row['quantity']*$row['price'];
    mysqli_query($mysqli,"update cart set cost=$total where product_id=$pid");
}




$query1="update cart set ordered=1 where user_id='$userid'";
mysqli_query($mysqli,$query1);

$query2="SELECT product_id,quantity from cart where user_id=$userid";
$result2=mysqli_query($mysqli,$query2);
while($row=mysqli_fetch_array($result2))
    {
    $pid=$row['product_id'];
    $quant=$row['quantity'];
    $query1="update product set Quantity=Quantity-$quant where product_id=$pid";
    mysqli_query($mysqli,$query1);
    }
?>
<div class="container" style="padding-top:300px;">
    <h1 style="color:#67b360;">YOUR ORDER IS CONFIRMED.</h1>
    <?php 
    
    ?>
</div>