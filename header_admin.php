<html lang="en">
    <?php session_start();?>
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
  <a class="navbar-brand" href="#">Sericulture</a>
  <div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
        <?php
        if(isset($_SESSION['uid']))
        {
            echo'<li class="nav-item my_align">
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
