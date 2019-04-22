<!DOCTYPE html>
<html lang="en">
<?php
    include "connect.php";
    session_start();
    
    if(!isset($_SESSION['errorm']) || $_SESSION['errorm']==""){
        $error="";
    }
    else {
        $error=$_SESSION['errorm'];
    }
    if($_SERVER["REQUEST_METHOD"] == "POST")
        {
        $username = mysqli_real_escape_string($link, $_POST['uname']);
        $password = mysqli_real_escape_string($link, $_POST['pword']);
        $password=md5($password);

        if (empty($username) || empty($password)) {
            $error="Πρέπει να συμπληρώσετε και τα 2 πεδία (όνομα και κωδικό χρήστη)";
        }
        else{
            $sql = "SELECT ID,Username,Password,status,edit_info_1 FROM Users WHERE Username='$username' and Password='$password'";
            $result = mysqli_query($link, $sql) or die(mysqli_error($link));
            $count = mysqli_num_rows($result);
            
            if ($count == 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['status']==0)
                {
                    $error="Ο χρήστης δεν είναι ενεργοποιημένος";
                }
                else
                {
                    $ID = $row['ID'];

                    $_SESSION['username'] = $username;
                    
                    $_SESSION['edit_info_1'] = $row['edit_info_1'];

                    $_SESSION['ID'] = $ID;
                    header("location: profile.php");
            }
                
            } else {
                $error="Λάθος στοιχεία";
            }
        }
    }
    if(isset($_SESSION['username']) && $_SESSION['username']!="")
	{
		header("location: profile.php");
		exit;
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
                        <a href="login.php">Login</a>
                    </li>
                    <li>
                        <a href="register.php">Register</a>
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
            <div class="container"><center>
                <p id="p_size">Account Login</p>
                <p style="color:red;"><?php echo$error?></p><?php $_SESSION['errorm']="" ?>
                <form name="login_form" action="login.php" method="post">
                    <table border="0">
                        <tr>
                            <td><b>Username:</b></td>
                            <td><input type="text" name="uname"/></td>
                        </tr>
                        <tr><td><p></p></td></tr>
                        <tr>
                            <td><b> Password:</b></td>
                            <td><input type="password" name="pword"/></td>
                        </tr>
                        <tr><td><p></p></td></tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Login"/></td>
                        </tr>
                    </table> </form></center>
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
