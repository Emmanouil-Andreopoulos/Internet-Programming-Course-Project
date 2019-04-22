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
    $msg="";
    $check_user_1=1;
    if(!isset($_SESSION['username']) || $_SESSION['username']=="")
	{
                $check_user_1=0;
                
	}
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
    /*if(mysqli_real_escape_string($link, $_GET["id"])=="")
    {
        header("location: index.php");
    }*/
    
    
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="css/comments/styles.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Wellfleet">
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
    
    <script src="dist/vis.js"></script>
    <link href="dist/vis.css" rel="stylesheet" type="text/css" />
    
    
</head>
<?php
    //Comments
    $ID_a = mysqli_real_escape_string($link, $_GET["id"]);
    if ($_SERVER['REQUEST_METHOD'] == "POST" && (isset($_POST['submit1'])) && ($_POST['submit1'] == 'Submit'))
    {
        $ID1 = mysqli_query($link, "SELECT ID FROM comments");
        $ID_c = mysqli_num_rows($ID1);
        $username234 = $_SESSION['username'];
        if ((isset($_POST['perigr'])) && ($_POST['perigr'] !=""))
        {
            $imerominia_c = date('Y-m-d');
            $text13 = mysqli_real_escape_string($link, $_POST['perigr']);
            mysqli_query($link, "INSERT INTO `comments`(`ID`,`ID_a`,`Username`,`text`,`imerominia`) VALUES('$ID_c','$ID_a','$username234','$text13','$imerominia_c')");
        }
        
    }
    
    
    //Rating
    if ($_SERVER['REQUEST_METHOD'] == "POST" && (isset($_POST['submit2'])) && ($_POST['submit2'] == 'Rate'))
    {
        $ID_a = mysqli_real_escape_string($link, $_GET["id"]);
        if(isset($_POST['acc']))
            {
            $acc = mysqli_real_escape_string($link, $_POST['acc']);
            }
        if(isset($_POST['rem']))
            {
            $rem = mysqli_real_escape_string($link, $_POST['rem']);
            }
        if(isset($_POST['rel']))
            {
            $rel = mysqli_real_escape_string($link, $_POST['rel']);
            }
        if(isset($_POST['agree']))
            {
            $agree = mysqli_real_escape_string($link, $_POST['agree']);
            }  
        $rating = $acc+$rem+$rel+$agree;
        $rating22 = mysqli_query($link, "SELECT rating,rating_n FROM attachments WHERE ID='$ID_a'");
        $row23 = mysqli_fetch_array($rating22);
        $rating2= $row23['rating'];
        $sum = $rating + $rating2;
        mysqli_query($link,"UPDATE attachments SET rating='$sum' WHERE ID='$ID_a'");
        $rating_n2= $row23['rating_n'];
        $rating_n2= $rating_n2+1;
        mysqli_query($link,"UPDATE attachments SET rating_n='$rating_n2' WHERE ID='$ID_a'");
        
    }  
    
    
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
    <?php
    
    $sql = "SELECT * FROM `attachments` WHERE `ID` = '$ID_a'";
    $retval = mysqli_query($link, $sql) or die(header("Location: error.php?msg=dat_er"));
    $count = mysqli_num_rows($retval);
    if($count<1)
    {
        header("location: index.php");
    }
    if (!$retval) {
        die('Could not get data: ' . mysql_error());
    }
    $row = mysqli_fetch_array($retval);
    $titlos = $row['titlos'];
    $pdf = "http://".$row['pdf'];
    $siggrafeas = $row['siggrafeas'];
    $imerominia = $row['imerominia'];
    $perigrafi = $row['perigrafi'];
    $katigoria = $row['katigoria'];
    $views=$row['views'];
    $vathmologia=$row['rating'];
    
    $sql2 = "SELECT `Username`,`ID`, `text`,`imerominia` FROM `comments` WHERE `ID_a` ='$ID_a'";
    $result2 = mysqli_query($link, $sql2) or die(header("Location: error.php?msg=dat_er"));
    
    $views2=$views+1;
    $sql3 = "UPDATE `attachments` SET views='$views2' WHERE `ID` ='$ID_a'";
    mysqli_query($link, $sql3) or die(header("Location: error.php?msg=dat_er"));
    
    
    ?>
    <!-- Full Width Image Header -->
    <header class="header-image">
        <div class="headline">
            <div class="container">
                <div id="w">
                    <div id="content" class="clearfix">
                        <h1 id="h1-name"><?php echo$titlos; ?></h1>
                        <nav id="profiletabs">
                            
                            <ul class="clearfix">
                                <li><a href="#info" class="sel">Informations</a></li>
                                <?php
                                if ($check_user_1 == 1) {
                                ?>
                                <li><a href="#rating">Rating</a></li>
                                <?php
                                }
                                ?>
                                <li><a href="#comments2">Comments</a></li>
                                
                            </ul>
                        </nav>
                        <section id="info">
                            <?php
                            if ($pdf!=NULL)
                            {
                                echo"<a id='p_1_1' href='$pdf' target='_blank'><font color='blue'>PDF</font></a>";
                            }
                            if ($siggrafeas!=NULL)
                            {
                                echo "<p>Συγγραφέας: $siggrafeas</p>";
                            }
                            if ($imerominia!=NULL)
                            {
                                echo "<p>Ημερομήνια: $imerominia</p>";
                            }
                            if ($perigrafi!=NULL)
                            {
                                echo "<p>Περιγραφή: $perigrafi</p>";
                            }
                            if ($katigoria!=NULL)
                            {
                                echo "<p>Κατηγορία: $katigoria</p>";
                            }
                            if ($views!=NULL)
                            {
                                echo "<p>Προβολές: $views</p>";
                            }
                            if ($vathmologia!=NULL)
                            {
                                echo "<p>Βαθμολογία: $vathmologia</p>";
                            }
                            
                            
                            ?>
                        </section>
                        <?php
                            if ($check_user_1 == 1) {
                                ?>
                        <section id="rating" class="hidden">
                                <form name="erotimatologio" action="attachment.php?id=<?php echo$ID_a ?>" method="post">
                                    <table id="form1_1" border="0">
                                        <tr><td><p> </p></td></tr>
                                        <tr>
                                            <td><b id="test_123">Είναι το έγγραφο ακριβές;</b></td>
                                            <td>
                                                <input type="radio" name="acc" value="1" checked>1
                                                <input type="radio" name="acc" value="2">2
                                                <input type="radio" name="acc" value="3">3
                                                <input type="radio" name="acc" value="4">4
                                                <input type="radio" name="acc" value="5">5
                                            </td>
                                        </tr>
                                        <tr><td><p></p></td></tr>
                                        <tr>
                                            <td><b id="test_1233">Είναι το έγγραφο αξιόλογο;</b></td>
                                            <td>
                                                <input type="radio" name="rem" value="1" checked>1
                                                <input type="radio" name="rem" value="2">2
                                                <input type="radio" name="rem" value="3">3
                                                <input type="radio" name="rem" value="4">4
                                                <input type="radio" name="rem" value="5">5
                                            </td>
                                        </tr>
                                        <tr><td><p></p></td></tr>
                                        <tr>
                                            <td><b id="test_12333">Είναι το έγγραφο συναφές;</b></td>
                                            <td>
                                                <input type="radio" name="rel" value="1" checked>1
                                                <input type="radio" name="rel" value="2">2
                                                <input type="radio" name="rel" value="3">3
                                                <input type="radio" name="rel" value="4">4
                                                <input type="radio" name="rel" value="5">5
                                            </td>
                                        </tr>
                                        <tr><td><p></p></td></tr>
                                        <tr>
                                            <td><b>Συμφωνείτε με το περιεχόμενο του εγγράφου;</b></td>
                                            <td>
                                                <input type="radio" name="agree" value="1" checked>1
                                                <input type="radio" name="agree" value="2">2
                                                <input type="radio" name="agree" value="3">3
                                                <input type="radio" name="agree" value="4">4
                                                <input type="radio" name="agree" value="5">5
                                            </td>
                                        </tr>
                                        <tr><td><p></p></td></tr>
                                        <td></td>
                                            <td><input type="submit" name="submit2" value="Rate"/></td>
                                        </tr>
                                    </table> </form>
                                
                        </section>
                        <?php
                            }
                            ?>
                        <section id="comments2" class="hidden">
                            <ul id="comments">
                                <?php
                                    while ($row2 = mysqli_fetch_array($result2)) {
                                ?>
                                <li class="cmmnt">
                                    <div class="avatar"><a href="display.php?uname=<?php echo$row2['Username']; ?>"><img src="images/<?php echo$row2['Username']; ?>/avatar.png" width="55" height="55" alt="Avatar"></a></div>
                                    <div class="cmmnt-content">
                                        <header><a id="a_new" href="display.php?uname=<?php echo$row2['Username']; ?>" class="userlink"><?php echo$row2['Username']; ?></a> - <span id="a_new2" class="pubdate">posted <?php echo$row2['imerominia']; ?></span></header>
                                        <p id="p_2_2"><?php echo$row2['text']; ?></p>
                                    </div>
                                </li>
                                
                            <?php
                            }
                            ?>
                                <?php
                                    if ($check_user_1 == 1) {
                                ?><li class="cmmnt"></li>
                                 <?php
                                }
                            ?>
                            </ul>
                            <br>
                            <?php
                            if ($check_user_1 == 1) {
                                ?>
                            <form name="comment_form" action="attachment.php?id=<?php echo$ID_a ?>" method="post" enctype="multipart/form-data">
                                <table border="0">
                                    <p id="table1">Add new comment:</p>
                                    <tr>
                                        <td><textarea rows="10" id="table1" name="perigr"></textarea></td>
                                    </tr>
                                    <tr><td><p> </p></td></tr>
                                    <tr>
                                        <td><input type="Submit" name="submit1" value="Submit"></td>
                                    </tr>
                                </table>
                            </form>
                             <?php
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
