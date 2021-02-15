<?php
include'db.php';
session_start();
    if(isset($_GET['clear']))
    {
        if(isset($_SESSION['uid']))
        {
            $uid=$_SESSION['uid'];
            echo $uid;
           $queryd="delete from cart where user_id='$uid'";
            $resultd=mysqli_query($mysqli,$queryd);
          header("Location: Cart.php");
        }
        else
        {
            $queryd="delete from cart where user_id=9999" ;
            $resultd=mysqli_query($mysqli,$queryd);
          header("Location: Cart.php");
        }
        }
    ?>