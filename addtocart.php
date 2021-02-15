
<html>
    <?php include'header1.php';
        include "db.php";
    
    $proid=$_GET['pid'];
    $query="select * from product where product_id='$proid';";
    $result=mysqli_query($mysqli,$query);
    ?>
    <script> 
    function add()
        {
            var x=document.getElementById('no');
            x.value=Number(x.value)+1;
        }
        function minus()
        {
            var x=document.getElementById('no');
            if(x.value>0)
            x.value=x.value-1;
        }
    </script>
<body>
    <?php
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
    if(isset($_POST['addit'])){
    $quantity=$_POST['quant'];
    session_start();
    if (isset($_SESSION['cid'])) {
        $uid=$_SESSION['cid'];
    $query1="INSERT INTO cart(user_id,product_id,quantity) VALUES('$uid','$proid','$quantity')";
    $result1=mysqli_query($mysqli,$query1);
        if($result1)
        {?>
            <div class="container" style="padding-top:100px;">
                <span class="badge badge-success">Item added to cart</span>
    </div>
       <?php }
        else
        {
            echo"eoorrrr";
        }
    }
else{
    $query2="INSERT INTO cart(product_id,quantity) VALUES('$proid','$quantity')";
    $result2=mysqli_query($mysqli,$query2);
        if($result2)
        {?>
            <div class="container" style="padding-top:100px;">
                <span class="alert alert-success">Item added to cart</span>
    </div>

<?php }
    else
        {
            echo"eoorrrr";
        }
    
    }
    }
    ?>
<div class="container" style="padding-top:150px;">
             <?php
    
     $row=mysqli_fetch_assoc($result)?>
     <div class="row">
          <div class="col-lg-6">
           <img class="img-fluid rounded" src="<?php echo $row['photo']?>" alt="no image" width="300px;" height="300px;">
             
              
         </div>
         <div class="col-lg-6">
             <h4>Description</h4>
             <?php echo $row['description'];?>
              
         </div>
    </div>
  <form method="post" action="">
         <div class="row">
         <div class="col-lg-12">
            <h2><?php echo $row['pname']?></h2>
             <h3>RS.<?php echo $row['price']?></h3>
            <br/>
           <div class="form-group">
                            <div class="row">
                                <div class="col-sm-1">
							<span>
            					<button type="submit" class="btn btn-primary" name="minus">-</button>
            				</span>
                                    </div>
                                <div class="col-sm-5">
            				<input type="text" class="form-control" value="<?php echo $value;?>" id="no" name="quant">
                                </div>
                                <div class="col-sm-1">
				            <span>
				                <button type="submit" name="add" class="btn btn-primary">+
				                </button>
				            </span>
                                </div>
             </div>
            
						
   </div>
<br/>
        <p><button type="submit" class="btn btn-primary" name="addit">Add to cart</button>
          </div><!-- /.col-lg-4 -->
    
    </div>
    
    </form>
      </div>
    </body>
    </html>