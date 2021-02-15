<html>
    <?php include'header1.php';
        include "db.php";
    $catid=$_GET['cid'];
    $query="select * from product where cat_id='$catid';";
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
<div class="container" style="padding-top:100px;">
             <?php
    
     while ($row=mysqli_fetch_assoc($result)){?>
     <div class="row border border-success ">
          <div class="col-lg-6">
           <a class="btn" href="addtocart.php?pid=<?php echo $row['product_id'];?>" role="button"><img class="img-fluid img-thumbnail" src="<?php echo $row['photo']?>" alt="no image" width="400" height="120"></a>
              
         </div>
         <div class="col-lg-6">
            <h2><?php echo $row['pname']?></h2>
             <h3>RS.<?php echo $row['price']?></h3>
            <br/>
             <?php
             if($row['Quantity']>0)
             {
                 echo '<p Style="color:Green">Stock Available:'.$row['Quantity'].'</p>';?>
                 <br/>
           <a class="btn btn-primary" href="addtocart.php?pid=<?php echo $row['product_id'];?>" role="button">Add to cart</a>
           <?php  }
            else
            {
                echo '<p Style="color:red">Out of stock</p>';
            }
                                                  
                            
             ?>
            

          </div><!-- /.col-lg-4 -->
    
    </div>
        <?php  }?>
      </div>
    </body>
    </html>