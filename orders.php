<?php include 'header_admin.php';
     include "db.php";
    session_start();
$dist_id=$_SESSION['uid'];
$query="SELECT c.cart_id,p.pname,p.photo,c.quantity,c.cost from product as p,cart as c where p.user_id=$dist_id and c.ordered=1 and p.product_id=c.product_id and c.delivery=0";
    $result=mysqli_query($mysqli,$query);
     ?>
<!DOCTYPE html>
<html>
<body>
    <?php include"dist_nav.php";?>
     <div class="container" style="padding-top:20px;">
   
    </div>
    
    <div class="container" style="padding-top:20px;">
        <form action="" method="post">
        <table class="table table-bordered text-center container">
       <thead class="thead-color">
           <tr>
               <th scope="col">Product</th>
               <th scope="col">Name</th>
               <th scope="col">Quantity</th>
               <th scope="col">price</th>
               <th scope="col"></th>
           </tr>
       </thead>
       <tbody>
           
             <?php

     while ($row=mysqli_fetch_assoc($result)){
           echo "<tr>";
           $cid=$row['cart_id'];?>
              <td><img class="img-fluid img-thumbnail" src="<?php echo $row['photo']?>" alt="image" height="100" width="100"></td>
               <?php echo "<td>".$row['pname']."</td>";
               echo "<td>".$row['quantity']."</td>";
         echo "<td>".$row['cost']."</td>";
           echo "<td>"?>
           
          <a href="deliver.php?cid=<?php echo $cid;?>" class="btn btn-success">Deliver</a>
           <?php echo "</td>";
              

           echo "</tr>";

     }
?>            
       </tbody>
   </table>
        </form></div>
    
    
    </body>
</html>