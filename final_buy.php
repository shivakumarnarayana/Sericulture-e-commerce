//to-do confirm purchase
//requirements:user must be logged in
//change table stock i.e decrease after purchase
<?php include 'header1.php';
//session_start();
?>
<html>
<body>
    <form action="" method="post">
    <div class="container" style="padding-top:150px;">
        <div class="border border-success">
           
         <div class="container">
        <table class="table table-bordered text-center container">
       <thead class="thead-color">
           <tr>
               <th scope="col">Product</th>
               <th scope="col">Name</th>
               <th scope="col">Price</th>
               <th scope="col">Quantity</th>
               <th scope="col">cost</th>
           </tr>
       </thead>
       <tbody>
           
             <?php
           $query="select p.pname,p.photo,c.quantity,p.price from product as p,cart as c WHERE c.product_id=p.product_id and c.ordered=0";
          $result=mysqli_query($mysqli,$query);
           //$row1=mysqli_fetch_assoc($result);
    // $value=$row1['quantity'];
           $value=1;
    if(isset($_POST['add']))
    {
        $value=$_POST['quant'];
        $value=$value+1;
        
    }
    if(isset($_POST['minus']))
    {
        $value=$_POST['quant'];
        if($value>0)
        {
        $value=$value-1;
        }
    }
     while ($row=mysqli_fetch_assoc($result)){
           echo "<tr>";?>
              <td><img class="img-fluid img-thumbnail" src="<?php echo $row['photo']?>" alt="image" height="100" width="100"></td>
               <?php echo "<td>".$row['pname']."</td>";
                    echo "<td>".$row['price']."</td>";
               echo "<td>"?>
                                
            				<?php echo $row['quantity'];?>
                             
        
						
<?php echo"</td>";
           echo "<td>"?>
           <?php 
                $total=$row['quantity']*$row['price'];
                echo $total;
echo "</td>";
           echo "</tr>";

     }
?>            
       </tbody>
   </table></div>
   
            
         </div>
    </div>
         </form> 
    <form method="post" action="checkout.php"> 
    <div class="container">
        <div class="row">
          <div class="col col-lg-6">
              <button type="submit" class="btn btn-primary" name="confirm">Confirm checkout</button>
            
        </div> 
           <div class="col col-lg-6">
        <h4>Total:<?php include 'calculate.php';    
            
            ?></h4>
            </div>
        </div>
        </div>
    </form>
</body>
</html>