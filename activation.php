<!DOCTYPE html>
<html lang="en">
<?php
    include "connect.php";
    session_start();
    $menu1="Login";
    $menu1link="login.php";
    $menu2="Register";
    $menu2link="register.php";
    $menu3="";
    $menu3link="";
    $msg='';
    if(isset($_SESSION['username']) && $_SESSION['username']!="")
	{
		$menu1="Logout";
                $menu1link="logout.php";
                $menu2="Profile";
                $menu2link="profile.php";
                $menu3="Edit information";
                $menu3link="edit_info.php";
	}
    if(!empty($_GET['code']) && isset($_GET['code']))
    {
        $code=mysqli_real_escape_string($link,$_GET['code']);

        $c=mysqli_query($link,"SELECT ID FROM users WHERE activation='$code'");

        if(mysqli_num_rows($c) > 0)
        {

            $count=mysqli_query($link,"SELECT ID FROM users WHERE activation='$code' and status='0'");

            if(mysqli_num_rows($count) == 1)
            {
            mysqli_query($link,"UPDATE users SET status='1' WHERE activation='$code'");
            $msg="Your account is activated";	
            }
            else
            {
                $msg ="Your account is already active, no need to activate again";
            }

        }
        else
        {
            $msg ="Wrong activation code.";
        }

    }
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AEGEAN COMMUNITY</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/one-page-wonder.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="js/newjavascript.js"></script>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">AEGEAN COMMUNITY</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <form name="myform" action="search.php" method="POST">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php echo$menu1link;?>"><?php echo$menu1;?></a>
                    </li>
                    <li>
                        <a href="<?php echo$menu2link;?>"><?php echo$menu2;?></a>
                    </li>
                    <li>
                        <a href="<?php echo$menu3link;?>"><?php echo$menu3;?></a>
                    </li>
                    
                    <li>
                        <a>                       </a>
                    </li>
                    <li><input value="search" type="text" id="search1" onfocus="make_blank(this);"  onblur="restore_placeholder(this);" name="search"></li>
                    <li><input id="search2" type="image" src="img/search2.png" name="image" width="40" height="40"></li>
                </ul>
                </form>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Full Width Image Header -->
    <header class="header-image">
        <div class="headline">
            <div class="container">
                <h3><?php echo $msg; ?></h3>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <div class="container">
        <hr class="featurette-divider">

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2016</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
