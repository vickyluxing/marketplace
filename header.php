<html>
<body>

</body>
</html>

<!DOCTYPE html>
<!-- Template by Quackit.com -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/bg.css" rel="stylesheet">
    <link href="css/modal.css" rel="stylesheet">
    <link href="css/star-rating.min.css" media="all" type="text/css"/>



</head>

   <div class="bg">
 </div>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Logo and responsive toggle -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <span class="glyphicon glyphicon-gift"></span> 
                </a>
            </div>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav">

                    <li>
                       <a href= "index.php">Home</a>
                    </li>
  <!--                   <li>
                        <a href="/vicky/about.php">About</a>
                    </li> -->
                     <li>
                        <a href="products.php">All Products</a>
                    </li>

                    <li>
                        <a href="company1.php">Ms. Brown's</a>
                    </li>
                    <li>
                        <a href="company2.php">Kitka</a>
                    </li>
                    <li>
                        <a href="company3.php">Daisydanlu</a>
                    </li>
                    <li>
                        <a href="company4.php">FLUIGENT</a>
                    </li>
                     <li>
                        <a href="company5.php">Doll Shop</a>
                    </li>
                    <?php
                     session_start();
                    if (isset($_SESSION["login_as"])) {
                     echo "<li>";
                    echo "<a href=\"/history.php\">History</a>";
                    echo "</li>";
                    
                 } 
                ?>

                </ul>
 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
                <?php
                
                if (!isset($_SESSION["login_as"])) {
                    echo "<ul class=\"nav navbar-nav navbar-right\">";
                    echo "<li>";
                    echo "<a href=\"login.php\">Log in</a>";
                    echo "</li>";
                    echo "</ul>";
                } else {
                    echo "<ul class=\"nav navbar-nav navbar-right\">";
                    echo "<li>"; 
                    echo "<form><input type=\"submit\" name=\"log-out\" class=\"button button-block\" value=\"Log out\"></form>";
                    // echo "<a href=\"index.php\">Log in as " . $_SESSION["login_as"] . ", Log out</a>";
                     if($_SERVER["REQUEST_METHOD"] == "POST")  { 
                        session_unset();                    
                        session_destroy(); 
                        header("Location: index.php"); 
                    }
                    echo "</li>";
                    echo "</ul>";
                }
                ?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

  

    

