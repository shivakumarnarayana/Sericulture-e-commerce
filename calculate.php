<?php
include 'db.php';
$userid=$_SESSION['uid'];
$query="SELECT p.price,c.quantity from product as p,cart as c where p.product_id=c.product_id and c.user_id=$userid and ordered=0";
$result=mysqli_query($mysqli,$query);
$total=0;

while($row=mysqli_fetch_assoc($result))
{
    
    $total=$total+$row['price']*$row['quantity'];
}
echo $total;
?>