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
    if(mysqli_real_escape_string($link, $_GET["uname"])=="")
    {
        header("location: index.php");
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
    <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
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
    <?php
    $username = mysqli_real_escape_string($link, $_GET["uname"]);
    $sql = "SELECT * FROM `Users` WHERE `Username` = '$username'";
    $retval = mysqli_query($link, $sql) or die(header("Location: error.php?msg=dat_er"));
    if (!$retval) {
        die('Could not get data: ' . mysql_error());
    }
    $row = mysqli_fetch_array($retval);
    $onoma = $row['Onoma'];
    $eponimo = $row['Eponimo'];
    $username = $row['Username'];
    
    $imageurl="images/$username/avatar.png";
    if (!file_exists($imageurl)) {
        $imageurl="images/avatar.png";
    }
    
    ?>
    <!-- Full Width Image Header -->
    <header class="header-image">
        <div class="headline">
            <div class="container">
                <div id="w">
                    <div id="content" class="clearfix">
                        <div id="userphoto"><img src="<?php echo$imageurl;?>" style="width:150px;height:150px;" alt="default avatar"></div>
                        
                        <h1 id="h1-name"><?php echo$onoma; echo" "; echo$eponimo; ?></h1>

                        <section id="bio">
                            <?php
                            $Eksidikefsi = $row['Eksidikefsi'];
                            $Thesi = $row['Thesi'];
                            $Katigoria_thesis1 = $row['Katigoria1'];
                            $Katigoria_thesis2 = $row['Katigoria2'];
                            $Katigoria_thesis3 = $row['Katigoria3'];
                            $Organismos = $row['Organismos'];
                            $Katigoria_Organismou = $row['Katigoria_o'];
                            $Filo = $row['Filo'];
                            $Spoudes1 = $row['Spoudes1'];
                            $Spoudes2 = $row['Spoudes2'];
                            $Spoudes3 = $row['Spoudes3'];
                            $Ksenes1 = $row['Ksenes1'];
                            $Ksenes2 = $row['Ksenes2'];
                            $Ksenes3 = $row['Ksenes3'];
                            $Ethnikotita = $row['Ethnikotita'];
                            $Poli_Diamonis = $row['Poli'];

                            mysqli_close($link);
                            
                            
                            if ($Eksidikefsi!=NULL)
                            {
                                echo "<p id='eksid'>Εξειδίκευση: $Eksidikefsi</p>";
                            }
                            if ($Thesi!=NULL)
                            {
                                echo "<p id='thesi'>Θέση: $Thesi</p>";
                            }
                            if ($Katigoria_thesis1!=NULL)
                            {
                                echo "<p id='cat_thesi1'>Κατηγορία θέσης: $Katigoria_thesis1</p>";
                            }
                            if ($Katigoria_thesis2!=NULL)
                            {
                                echo "<p id='cat_thesi2'>Κατηγορία θέσης: $Katigoria_thesis2</p";
                                echo "<br>";
                            }
                            
                            if ($Katigoria_thesis3!=NULL)
                            {
                                echo "<p id='cat_thesi3'>Κατηγορία θέσης: $Katigoria_thesis3</p>";
                            }
                            if ($Organismos!=NULL)
                            {
                                echo "<p id='organ'>Οργανισμός: $Organismos</p>";
                            }
                            if ($Katigoria_Organismou!=NULL)
                            {
                                echo "<p id-='cat_org'>Κατηγορία οργανισμού: $Katigoria_Organismou</p>";
                            }
                            if ($Filo!=NULL)
                            {
                                echo "<p id='filo'>Φύλο: $Filo</p>";
                            }
                            if ($Spoudes1!=NULL)
                            {
                                echo "<p id='spoud1'>Σπουδές: $Spoudes1</p>";
                            }
                            if ($Spoudes2!=NULL)
                            {
                                echo "<p id='spoud1'>Σπουδές: $Spoudes2</p>";
                            }
                            if ($Spoudes3!=NULL)
                            {
                                echo "<p id='spoud1'>Σπουδές: $Spoudes3</p>";
                            }
                            if ($Ksenes1!=NULL)
                            {
                                echo "<p id='ks_gl1'>Ξένη γλώσσα: $Ksenes1</p>";
                            }
                            if ($Ksenes2!=NULL)
                            {
                                echo "<p id='ks_gl1'>Ξένη γλώσσα: $Ksenes2</p>";
                            }
                            if ($Ksenes3!=NULL)
                            {
                                echo "<p id='ks_gl1'>Ξένη γλώσσα: $Ksenes3</p>";
                            }
                            if ($Ethnikotita!=NULL)
                            {
                                echo "<p id='ethn'>Εθνικότητα: $Ethnikotita</p>";
                            }
                            if ($Poli_Diamonis!=NULL)
                            {
                                echo "<p id='city'>Πόλη διαμονής: $Poli_Diamonis</p>";
                            }
                            ?>
                        </section>
                    </div><!-- @end #content -->
                </div><!-- @end #w -->
                <script type="text/javascript">
                $(function(){
                  $('#profiletabs ul li a').on('click', function(e){
                    e.preventDefault();
                    var newcontent = $(this).attr('href');
    
                    $('#profiletabs ul li a').removeClass('sel');
                    $(this).addClass('sel');
    
                    $('#content section').each(function(){
                      if(!$(this).hasClass('hidden')) { $(this).addClass('hidden'); }
                    });
    
                    $(newcontent).removeClass('hidden');
                  });
                });
                </script>
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
                    <p id="p-copyr">Copyright &copy; Your Website 2016</p>
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
