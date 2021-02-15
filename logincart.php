<?php include 'header1.php';
include 'db.php';
//session_start();

		if(isset($_POST['login']))
{		echo $_POST['Ausername'];
    
		$Aun =$_POST['Ausername'];
		$Apw =$_POST['Apassword'];

					$result =mysqli_query($mysqli,"select * from users where email='$Aun' and password='$Apw'");
                    $row=mysqli_fetch_array($result);
					if($row>0)
					{
                        $_SESSION['uid']=$row['id'];
                        $uid=$row['id'];
                        $queryu="update cart set user_id='$uid' where user_id=9999" ;
                        $resultu=mysqli_query($mysqli,$queryu);
						header("location: Cart.php");
                    }
					else
					{
						$err = "Your Login Name or Password is invalid";
					}
}

			

?>
<?php
    if(isset($_GET['type']))
    {
        $utype=$_GET['type'];
        echo'<div class="container" style="padding-bottom:50px;">
        <div class="row my-login">
  
          <div class="col-lg-6">
    <div class="text-center">
    <form class="form-signin" action="" method="post">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="" name="Ausername">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="" name="Apassword">
      <p style="color:red;">';echo @$err; 
        echo'</p>    
      <br/>
      <button class="btn btn-lg btn-my btn-success btn-block" type="submit" name="login">Sign in</button> 
    </form> 
  
            </div>
        </div>
    </div>';
          }
    ?>