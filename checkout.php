<?php
include'db.php';

                $uid=$_SESSION['uid'];
                $query="update cart set ordered=1 where user_id='$uid'";
                $result=mysqli_query($mysqli,$query);
                if($result)
                {
                    header("location:thankyou.php");
                }
                else
                {
                    echo'error';
                }
        
            
?>