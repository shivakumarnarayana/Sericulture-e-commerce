<!DOCTYPE html>
<html>
    <head>
    
    </head>
    <?php
    include "db.php";
    session_start();
if (isset($_SESSION['uid'])) {
    $query="select id,email,Name,phone,status,v_name from users,village where village_id=v_id and type=2;";
    $result=mysqli_query($mysqli,$query);
    $query1="select id,email,Name,phone,status,v_name from users,village where village_id=v_id and type=3;";
    $result1=mysqli_query($mysqli,$query1);
    }
else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/login.php");
exit();
}?>
    <?php include 'header_admin.php';
    //include 'modal.php';?>
<body>
    
    <div class="container" style="padding-top:100px;">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link btn-success active" id="home-tab" data-toggle="tab" href="#Distubuter" role="tab" aria-controls="home" aria-selected="true">Distubuter</a>
  </li>
  <li class="nav-item">
    <a class="nav-link btn-success" id="profile-tab" data-toggle="tab" href="#consumer" role="tab" aria-controls="profile" aria-selected="false">Consumer</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="Distubuter" role="tabpanel" aria-labelledby="home-tab">
    <table class="table table-bordered text-center container" style="margin:100px;">
       <thead class="thead-color">
           <tr>
               <th scope="col">Name</th>
               <th scope="col">Email id</th>
               <th scope="col">Phone No</th>
               <th scope="col">Status</th>
               <th scope="col">Village</th>
               <th scope="col">       </th>
           </tr>
       </thead>
       <tbody>
           
             <?php

     while ($row=mysqli_fetch_assoc($result)){
           echo "<tr>";
               echo "<td>".$row['Name']."</td>";
               echo "<td>".$row['email']."</td>";
               echo "<td>".$row['phone']."</td>";
               echo "<td>";if($row['status']==1){echo "Active";} else{echo"inactive";}
           echo "</td>";
           echo "<td>".$row['v_name']."</td>"?>
               <td><span><?php
               if($row['status']==1)
               {?><a class="btn btn-primary" href="deactivate.php?Uid=<?php echo $row['id'];?>" role="button">Deactivate</a><?php }
         else
         {?>
                <a class="btn btn-primary" href="activate.php?Uid=<?php echo $row['id'];?>" role="button">Activate</a><?php }?></span>
               <span><a class="btn btn-danger" href="delete.php?Uid=<?php echo $row['id'];?>" role="button">Delete</a></span></td>
              <?php ;

           echo "</tr>";

     }
?>            
       </tbody>
   </table>
    </div>
  <div class="tab-pane fade" id="consumer" role="tabpanel" aria-labelledby="profile-tab">
     <div class="tab-pane fade show active" id="consumer" role="tabpanel" aria-labelledby="home-tab">
    <table class="table table-bordered text-center container" style="margin:100px;">
       <thead class="thead-color">
           <tr>
               <th scope="col">Name</th>
               <th scope="col">Email id</th>
               <th scope="col">Phone No</th>
               <th scope="col">Status</th>
               <th scope="col">Village</th>
               <th scope="col">       </th>
           </tr>
       </thead>
       <tbody>
           
             <?php

     while ($row1=mysqli_fetch_assoc($result1)){
           echo "<tr>";
               echo "<td>".$row1['Name']."</td>";
               echo "<td>".$row1['email']."</td>";
               echo "<td>".$row1['phone']."</td>";
               echo "<td>";if($row1['status']==1){echo "Active";} else{echo"inactive";}
           echo "</td>";
           echo "<td>".$row1['v_name']."</td>"?>
               <td><span><?php
               if($row1['status']==1)
               {?><a class="btn btn-primary" href="deactivate.php?Uid=<?php echo $row1['id'];?>" role="button">Deactivate</a><?php }
         else
         {?>
                <a class="btn btn-primary" href="activate.php?Uid=<?php echo $row1['id'];?>" role="button">Activate</a><?php }?></span>
               <span><a class="btn btn-danger" href="delete.php?Uid=<?php echo $row1['id'];?>" role="button">Delete</a></span></td>
              <?php ;

           echo "</tr>";

     }
?>            
       </tbody>
   </table>
    </div>
</div>
    </div>
    </div>
    </body>
</html>
