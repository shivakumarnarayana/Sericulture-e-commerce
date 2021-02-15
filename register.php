<!DOCTYPE html>
<?php
include "db.php";
    session_start();
$query="select * from village;";
    $result=mysqli_query($mysqli,$query);
$type=$_GET['utype'];

if(isset($_POST['signup']))
{
    
    $name=$_POST['Name'];
    $email=$_POST['Email'];
    $password=$_POST['Password'];
    $gender=$_POST['gender'];
    $phone=$_POST['Phone'];
    $village_id=$_POST['village'];
    $query="INSERT INTO users(email,password,Name,gender,phone,type,village_id) values('$email','$password','$name','$gender','$phone','$type','$village_id')";
   
    $result=mysqli_query($mysqli,$query) or die(mysqli_error($mysqli));
    if($result)
    {
    header("Location:login1.php");
    }
    else
    {
        echo mysqli_error($mysqli);
    }
}
?>
<html lang="en">
<?php include 'header_reg.php'; ?>
<body>
<div class="container" style="padding-top:100px;">
<form action="" method="POST" class="text-center">
    <img class="img-fluid rounded" src="images/logo.png" alt="image" height="300px;" width="300px;">
      <div class="form-group row">
    <label class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="" name="Name">
    </div>
    </div>
      <div class="form-group row">
    <label class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="Email" class="form-control" value="" name="Email">
    </div>
    </div>
         <div class="form-group row">
    <label class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" value="" name="Password">
    </div>
    </div>
    <div class="form-group row">
    <label class="col-sm-2 col-form-label">Gender</label>
    <div class="col-sm-5">
      <input type="radio" class="form-control" value="male" name="gender">Male
        </div>
        <div class="col-sm-5">
       <input type="radio" class="form-control" value="female" name="gender">Female
    </div>
    </div>
      <div class="form-group row">
    <label class="col-sm-2 col-form-label">Address</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="" name="Address">
    </div>
    </div>
      <div class="form-group row">
    <label class="col-sm-2 col-form-label">Phone</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="" name="Phone">
    </div>
    </div>
    <div class="form-group row">
    <label class="col-sm-2 col-form-label">village</label>
    <div class="col-sm-10">
      <select class="custom-select my-1 mr-sm-10" name="village">
   <?php while ($row=mysqli_fetch_assoc($result)){
    echo '<option value="'.$row[v_id].'">'.$row[v_name].'</option>';
}
        ?>
  </select>
    </div>
    </div>
    <button type="submit" class="btn btn-success" name="signup">Sign up</button>
   </form>
    </div>

</body>
    
</html>