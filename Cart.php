<?php include'header1.php';
include "db.php";
session_start();
if(isset($_SESSION['uid']))
{
    
    ?><div class="alert alert-success" style="padding-top:100px;">
    <strong>Welcome!</strong><?php?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php }
else
{
    echo '<div class="alert alert-danger" role="alert" style="padding-top:100px;" id="err">
		<strong>Hello!</strong> Please Login to checkout the products
			<a class="btn btn-danger" href="logincart.php?type=3" role="button">Login</a>
			
		
</div>';
}
?>
<html>

<body>
    <form method="post" action="">
        <div class="container">
            <table class="table table-bordered text-center container">
                <thead class="thead-color">
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">cost</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
           $query="select c.cart_id,c.product_id,p.pname,p.photo,c.quantity,p.price from product as p,cart as c WHERE c.product_id=p.product_id and c.ordered=0";
          $result=mysqli_query($mysqli,$query);
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
               echo "<td>"?><div class="form-group">
                        <div class="row align-center">

                           
                            <div class="col-sm-4">
                               <?php echo $row['quantity'];?>
                            </div>
                           

                        </div>


                    </div><?php echo"</td>";
           echo "<td>"?>

                    <?php 
                $total1=$row['quantity']*$row['price'];
                echo $total1;
echo "</td>";?>
                    <td>    
                        <span><a class="btn btn-danger" href="deletepro.php?cartid=<?php echo $row['cart_id'];?>" role="button">Delete</a></span></td>
                    <?php echo "</tr>";

     }
?>
                </tbody>
            </table>
        </div>
    </form>

    <form action="clearcart.php?clear=1" method="post">
        <div class="container">
            <center>
            <a class="btn btn-success" href="final_buy.php" role="button">BUY NOW</a>';
                
        
            </center>
        </div>

    </form>
</body>

</html>