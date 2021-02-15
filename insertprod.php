<?php
include 'header_admin.php';
include "db.php";
    session_start();
$query="select * from category;";
    $result=mysqli_query($mysqli,$query);
$dist_id=$_SESSION['uid'];

if(isset($_POST['upload']))
{
    
    $cata_id=$_POST['cato'];
    $name=$_POST['Name'];
    $descrip=$_POST['descrip'];
    $rs=$_POST['price'];
    $quant=$_POST['quanty'];
    if(isset($_FILES['file_img'])){
	$filetmp = $_FILES["file_img"]["tmp_name"];
	$filename = $_FILES["file_img"]["name"];
	$filetype = $_FILES["file_img"]["type"];
	$filepath = "img/".$filename;
    move_uploaded_file($filetmp,$filepath);
    }
    $query1="INSERT INTO product(cat_id,user_id,pname,description,price,photo,Quantity) VALUES('$cata_id','$dist_id','$name','$descrip','$rs','$filepath','$quant')";
    $result1=mysqli_query($mysqli,$query1) or die(mysqli_error($mysqli));
    if($result1)
    {
    header("Location:distpage.php");
    }
    else
    {
        echo mysqli_error($mysqli);
    }
    
	
	

}
?>

<html>
<body>
    <div class="container" style="padding-top:100px;">
<form action="" method="POST" enctype="multipart/form-data" class="text-center">
    <img class="img-fluid rounded" src="images/logo.png" alt="image" height="300px;" width="300px;">
      <div class="form-group row">
    <label class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="" name="Name">
    </div>
    </div>
      <div class="form-group row">
    <label class="col-sm-2 col-form-label">Catogary</label>
    <div class="col-sm-10">
      <select class="custom-select my-1 mr-sm-10" name="cato">
   <?php while ($row=mysqli_fetch_assoc($result)){
    echo '<option value="'.$row['cat_id'].'">'.$row['cname'].'</option>';
}
        ?>
  </select>
    </div>
    </div>
      <div class="form-group row">
    <label class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
      <textarea class="form-control" value="" name="descrip" style="height:80px;"></textarea>
    </div>
    </div>
         <div class="form-group row">
    <label class="col-sm-2 col-form-label">Photo</label>
    <div class="col-sm-10">
      <input type="file" name="file_img" />
        
    </div>
    </div>
    
      <div class="form-group row">
    <label class="col-sm-2 col-form-label">Price</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="" name="price">
    </div>
    </div>
      <div class="form-group row">
    <label class="col-sm-2 col-form-label">Quantity available</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="" name="quanty">
    </div>
    </div>
  
    <button type="submit" class="btn btn-success" name="upload">Upload</button>
   </form>
    </div>

</body>
</html>