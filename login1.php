<!DOCTYPE html>
<?php
		include "db.php";
		session_start();
		if(isset($_POST['login']))
{		echo $_POST['Ausername'];
    
		$Aun =$_POST['Ausername'];
		$Apw =$_POST['Apassword'];

					$result =mysqli_query($mysqli,"select * from users where email='$Aun' and password='$Apw'and status=1");
                    $row=mysqli_fetch_array($result);
					if($row>0)
					{
                        echo"hin ddouod";
                        if($row['type']==1)
                        {
                        $_SESSION['uid']=$row['id'];
						header("Location: Adminpage.php");
						}
                        if($row['type']==2)
                        {
                        $_SESSION['uid']=$row['id'];
						header("Location: distpage.php");
						}
                        if($row['type']==3)
                        {
                        $_SESSION['uid']=$row['id'];
						header("Location: Cart.php");
						}
                    }
					else
					{
						$err = "Your Login Name or Password is invalid";
					}
}

				?>

<html lang="en">
<?php include 'header1.php'; ?>
<body>
    
<center><h1 style="position: relative;padding-top: 100px">LOGIN/REGISTER AS!</h1>
  <h1><?php echo'<p style="color:red;">';
    echo @$err; 
      echo'</p>';?></h1></center>
<div class="container">
    
    <form action="#" method="post">
<div class="row my-login">
          <div class="col-lg-4">
           <center><label for="radi" name="Admin" value="1"><input type="submit" name="Admin" id="radi" value="1">
            <img id="radi" class="rounded-circle" src="images/admin.png" alt="Generic placeholder image" width="200" height="200"><h1>Admin</h1></label></center>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <center><label for="radi1"><input type="submit" name="Admin" id="radi1" value="2">
                <img id="radi1"  src="images/distributors_icon.png" alt="Generic placeholder image" width="200" height="200"><h1>Distrubutor</h1></label></center>
        </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <center><label for="radi2"><input type="submit" name="Admin" id="radi2" value="3">
                <img id="radi2" class="rounded-circle" src="images/farmer.png" alt="Generic placeholder image" width="200" height="200"><h1>Consumer</h1></label></center>
          </div><!-- /.col-lg-4 -->
        </div>
     
    </form>
    
    
    </div>
    
   
    <?php
    if(isset($_POST['Admin']))
    {
        $utype=$_POST['Admin'];
        echo $utype;
        echo'<div class="container" style="padding-bottom:50px;">
        <div class="row my-login">
  
          <div class="col-lg-6">
    <div class="text-center">
    <form class="form-signin" action="#" method="post">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="" name="Ausername">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="" name="Apassword">
      <br/>
      <button class="btn btn-lg btn-my btn-success btn-block" type="submit" name="login">Sign in</button> 
    </form>';?>
    
    <form action="register.php?utype=<?php echo $utype;?>" method="post">
        <?php
        
    echo '<button class="btn btn-lg btn-success btn-block" type="submit">Sign up</button>
    </form>
    </div>
            </div>
        </div>
    </div>';
          }
    ?>
   
     <?php //include 'foot.php'; ?>
      
    </form>
</body>
    
</html>