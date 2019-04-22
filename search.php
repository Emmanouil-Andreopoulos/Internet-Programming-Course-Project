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
    $menu4="";
    $menu4link="";
    if(isset($_SESSION['username']) && $_SESSION['username']!="")
	{
		$menu1="Logout";
                $menu1link="logout.php";
                $menu2="Profile";
                $menu2link="profile.php";
                $menu3="Edit information";
                $menu3link="edit_info.php";
                $menu4="New Process";
                $menu4link="new_process.php";
                
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
    <style>
    #table123 {
    border-bottom: 1px solid #ddd;
    }
    </style>
</head>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $searchtext = mysqli_real_escape_string($link, $_POST['search']);
    }
$sql = "SELECT `Username`,`Onoma`,`Eponimo`,`Eksidikefsi`,`Ethnikotita` FROM `users` WHERE `Username` ='$searchtext' OR `Eponimo` ='$searchtext' OR `Onoma` ='$searchtext'";
$sql2 = "SELECT `titlos`,`ID`, `perigrafi` FROM `processes` WHERE `titlos` ='$searchtext' OR `perigrafi` ='$searchtext'";
$result = mysqli_query($link, $sql) or die(header("Location: error.php?msg=dat_er"));
$result2 = mysqli_query($link, $sql2) or die(header("Location: error.php?msg=dat_er"));
?>
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
                        <a href="<?php echo$menu4link;?>"><?php echo$menu4;?></a>
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
                <table  border="0" id="table1">
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td><a href="display.php?uname=<?php echo$row['Username'];?>"><img src="images/<?php echo$row['Username'];?>/avatar.png" alt="100x100" style="width:100px;height:100px;"></a></td>
                                    <td><p> </p></td>
                                    <td>
                                        <table border="1">
                                            <tr>
                                                <td style="width:500px;height:50px;" id="table123">
                                                    <b><?php echo$row['Onoma']; ?> <?php echo$row['Eponimo']; ?></b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width:500px;height:50px;">
                                                    <p>Εξειδίκευση: <?php echo$row['Eksidikefsi']; ?>     Εθνικότητα: <?php echo$row['Ethnikotita']; ?></p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr><td><p></p></td></tr>
                    <?php
                    }
                    ?>
                    <?php
                    while ($row = mysqli_fetch_array($result2)) {
                        ?>
                        <tr>
                            <td>
                                <table>
                                    <tr>
                                        <td><a href="process.php?id=<?php echo$row['ID']; ?>"><img src="img/process.png" alt="100x100" style="width:100px;height:100px;"></a></td>
                                        <td><p> </p></td>
                                        <td>
                                            <table border="1">
                                                <tr>
                                                    <td style="width:500px;height:50px;" id="table123">
                                                        <b><?php echo$row['titlos']; ?></b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:500px;height:50px;">
                                                        <p>Περιγραφή: <?php echo$row['perigrafi']; ?></p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr><td><p></p></td></tr>
                        <?php
                    }
                    ?>
                </table> 
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
