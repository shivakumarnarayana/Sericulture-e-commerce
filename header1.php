<html lang="en">
<?php session_start();
    include 'db.php';
    $query="select * from category;";
    $result=mysqli_query($mysqli,$query);
    ?>

<head>
    <title>Sericulture</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/jquery-3.4.1.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-md  bg-navv navbar-dark justify-content-between fixed-top">
        <a class="navbar-brand" href="home.php">Sericulture</a>
        <div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item my_align">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item my_align">
                        <a class="nav-link" href="#about">About us</a>
                    </li>
                    <li class="nav-item my_align">
                        <div class="dropdown">
                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                Buy
                            </button>
                            <div class="dropdown-menu">
                                <?php while ($row=mysqli_fetch_assoc($result)){?>
                                <a class="dropdown-item" href="catgories.php?cid=<?php echo $row['cat_id']?>"><?php echo $row['cname']?></a>
                               <?php }?>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item my_align">
                        <a class="nav-link" href="Cart.php"><img class="img-fluid rounded-circle img-thumbnail" src="images/cart.png" alt="image" height="40px;" width="40px;"></a>
                    </li>
                    <?php
        if(isset($_SESSION['uid']))
        {
            echo
      '<li class="nav-item my_align">
      <a class="btn btn-outline-success my_btn" href="logout.php" role="button">logout</a>
      </li>';
        }
        else
        {
            echo'<li class="nav-item my_align">
      <a class="btn btn-outline-success my_btn" href="login1.php" role="button">Login</a>
      </li>'; 
        }
        ?>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>