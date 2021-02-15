<?php include 'header_admin.php';
     include "db.php";
    session_start();
$dist_id=$_SESSION['uid'];

$query="select p.product_id,p.pname,p.photo,p.quantity,c.cname from product p,category c where p.cat_id=c.cat_id and p.user_id='$dist_id'";
    $result=mysqli_query($mysqli,$query);
     ?>
<!DOCTYPE html>
<html>
<body>
    <?php include"dist_nav.php";?>
    <div class="container" style="padding-top:20px;">
    <a class="btn btn-info btn-block" href="insertprod.php" role="button">+ Add product</a>
    </div>
    
    <div class="container" style="padding-top:20px;">
        <table class="table table-bordered text-center container">
       <thead class="thead-color">
           <tr>
               <th scope="col">Product</th>
               <th scope="col">Name</th>
               <th scope="col">Category</th>
               <th scope="col">Quantity Remain</th>
           </tr>
       </thead>
       <tbody>
           
             <?php

     while ($row=mysqli_fetch_assoc($result)){
           echo "<tr>";?>
              <td><img class="img-fluid img-thumbnail" src="<?php echo $row['photo']?>" alt="image" height="100" width="100"></td>
               <?php echo "<td>".$row['pname']."</td>";
               echo "<td>".$row['cname']."</td>";
           echo "<td>"?>
           <form action="updateq.php?pid=<?php echo $row['product_id']?>" method="POST">
           <input type="text" name="quant" id="quant1" class="form-control" value="<?php echo $row['quantity'];?>">
           <button type="submit" class="btn btn-success" name="updateq">Upload</button>
           </form>
           <?php echo "</td>";
              

           echo "</tr>";

     }
?>            
       </tbody>
   </table></div>
    <?php echo $_SESSION['uid'];?>
</body>
</html>