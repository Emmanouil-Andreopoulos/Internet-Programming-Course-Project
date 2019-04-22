<!DOCTYPE html>
<html lang="en">
<?php
    include "connect.php";
    session_start();
    if(isset($_SESSION['username']) && $_SESSION['username']!="")
	{
		header("location: profile.php");
		exit;
	}
        $msg = '';
    if (!empty($_POST['email']) && isset($_POST['email']) && !empty($_POST['pword']) && isset($_POST['pword'])&& !empty($_POST['uname']) && isset($_POST['uname']) && !empty($_POST['pword2']) && isset($_POST['pword2']) && !empty($_POST['onoma_1']) && isset($_POST['onoma_1']) && !empty($_POST['eponimo_1']) && isset($_POST['eponimo_1'])) {
    // username,email and password sent from Form
        $email = mysqli_real_escape_string($link, $_POST['email']);
        $password = mysqli_real_escape_string($link, $_POST['pword']);
        $password2 = mysqli_real_escape_string($link, $_POST['pword2']);
        $uname = mysqli_real_escape_string($link, $_POST['uname']);
        $onoma = mysqli_real_escape_string($link, $_POST['onoma_1']);
        $eponimo = mysqli_real_escape_string($link, $_POST['eponimo_1']);
        
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
        
        if ($password==$password2)
        {
            if (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[0-9])(?=.*\W).*$#", $password)) {
                if (preg_match($regex, $email)) {
                $password = md5($password); // Encrypted password
                $activation = md5($email . time()); // Encrypted email+timestamp
                $count = mysqli_query($link, "SELECT ID FROM users WHERE username='$uname'");
                if (mysqli_num_rows($count) >= 1) {
                    $msg = '<font color="#cc0000">The Username is already taken, please try new.</font>';
                }
                else
                {
                    $count = mysqli_query($link, "SELECT ID FROM users WHERE email='$email'");
                    if (mysqli_num_rows($count) < 1) {
                        $ID1 = mysqli_query($link, "SELECT ID FROM users");
                        $ID = mysqli_num_rows($ID1);
                        mysqli_query($link, "INSERT INTO `users`(`ID`,`email`,`Username`,`Password`,`activation`,`Onoma`,`Eponimo`) VALUES('$ID','$email','$uname','$password','$activation','$onoma','$eponimo')");

                        include 'smtp/Send_Mail.php';
                        $to = $email;
                        $subject = "Email verification";
                        $body = 'Hi, <br/> <br/> We need to make sure you are human. Please verify your email and get started using your Website account. <br/> <br/> <a href="' . $base_url . 'activation.php?code=' . $activation . '">' . $base_url . 'activation.php?code=' . $activation . '</a>';
                        Send_Mail($to, $subject, $body);

                        $msg = '<font color="#00cc00">Registration successful, please activate email.</font>';
                    } else {
                        $msg = '<font color="#cc0000">The email is already taken, please try new.</font>';
                    }
                }   
                } else {
                    $msg = '<font color="#cc0000">The email you have entered is invalid, please try again.</font>';
                }
            } else {
                $msg = '<font color="#cc0000">Your password must contain at least 6 characters, 1 number and 1 special character.</font>';
            }
        }
        else
        {
            $msg = '<font color="#cc0000">Your password does not match.</font>';
        }
    }
?>
    
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
                <p id="p_size">Create Account</p>
                <p><?php echo $msg; ?></p>
                <form name="register_form" action="register.php" method="post">
                <table border="0">
                        <tr>
                            <td><b>First Name:</b></td>
                            <td><input type="text" name="onoma_1"></td>
                        </tr>
                        <tr><td><p></p></td></tr>
                        <tr>
                            <td><b>Last Name:</b></td>
                            <td><input type="text" name="eponimo_1"></td>
                        </tr>
                        <tr><td><p></p></td></tr>
                        <tr>
                            <td><b>Username:</b></td>
                            <td><input type="text" name="uname"></td>
                        </tr>
                        <tr><td><p></p></td></tr>
                        <tr>
                            <td><b>E-mail:</b></td>
                            <td><input type="text" name="email"></td>    
                        </tr>
                        <tr><td><p></p></td></tr>
                        <tr>
                            <td><b> Password:</b></td>
                            <td><input type="password" name="pword"></td>
                        </tr>
                        <tr><td><p></p></td></tr>
                        <tr>
                            <td><b>Re-enter<br>password</b></td>
                            <td><input type="password" name="pword2"></td>
                        </tr>
                        <tr><td><p></p></td></tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Register"></td>
                        </tr>
                        
                </table></form> </center>
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
