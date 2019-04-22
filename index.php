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
                
                if( ($_SESSION['edit_info_1'])=="0")
            {
                $_SESSION['errorm']='<font color="#ff0000">Παρακαλώ συμπληρώστε τα στοιχεία</font>';
                header("location: edit_info.php");
                exit;
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
    <style type="text/css">
 
table {
	font-family:Arial, Helvetica, sans-serif;
	color:#666;
	font-size:12px;
	text-shadow: 1px 1px 0px #fff;
	background:#eaebec;
	margin:20px;
	border:#ccc 1px solid;

	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border-radius:3px;

	-moz-box-shadow: 0 1px 2px #d1d1d1;
	-webkit-box-shadow: 0 1px 2px #d1d1d1;
	box-shadow: 0 1px 2px #d1d1d1;
}

    </style>
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
    $ID1 = mysqli_query($link, "SELECT ID FROM users");
    $ID = mysqli_num_rows($ID1);
    $positions=0;
    $degrees=0;
    $languages=0;
    for ($x = 0; $x < 10; $x++) {
        $username[$x] = "";
        $rank[$x] =0;
        $flag[$x]="";
        $onoma_eponimo[$x]=" ";
        $organismos_123[$x]=" ";
        $katigoria123[$x]=" ";
    }
    $x=-1;
    $retval = mysqli_query($link, "SELECT Username,Organismos,Thesi, Onoma, Eponimo, Katigoria1, Katigoria2, Katigoria3, Spoudes1, Spoudes2, Spoudes3, Ksenes1, Ksenes2, Ksenes3,Ethnikotita FROM users");
    while ($row = mysqli_fetch_array($retval)) {
        $x++;
        $onoma_eponimo[$x]=$row['Onoma']." ".$row['Eponimo'];
        $username[$x] = $row['Username'];
        $flag[$x]=$row['Ethnikotita'];
        $organismos_123[$x]=$row['Organismos'];
        $katigoria123[$x]=$row['Thesi'];
        if ($row['Katigoria1']!=NULL)
        {
            $positions=$positions+1;
        }
        if ($row['Katigoria2']!=NULL)
        {
            $positions=$positions+1;
        }
        if ($row['Katigoria3']!=NULL)
        {
            $positions=$positions+1;
        }
        if ($row['Spoudes1']!=NULL)
        {
            $degrees=$degrees+1;
        }
        if ($row['Spoudes2']!=NULL)
        {
            $degrees=$degrees+1;
        }
        if ($row['Spoudes3']!=NULL)
        {
            $degrees=$degrees+1;
        }
        if ($row['Ksenes1']!=NULL)
        {
            $languages=$languages+1;
        }
        if ($row['Ksenes2']!=NULL)
        {
            $languages=$languages+1;
        }
        if ($row['Ksenes3']!=NULL)
        {
            $languages=$languages+1;
        }
        $rank[$x] = $positions*10+$degrees*15+$languages*5;
        $positions=0;
        $degrees=0;
        $languages=0;
    }
    array_multisort($rank,$username,$flag,$onoma_eponimo,$organismos_123,$katigoria123);
    $yourID="";
    $xx=sizeof($username)+1;
    if(isset($_SESSION['username']) && $_SESSION['username']!="")
    {
        
        for ($x = 0; $x < sizeof($username); $x++)
        {
            $xx=$xx-1;
            if ($username[$x]==$_SESSION['username'])
            {
                $yourID=$xx;
            }
        }
    }
    for ($x=0;$x<10;$x++)
    {
     $imageurl[$x]="images/$username[$x]/avatar.png";
        if (!file_exists($imageurl[$x])) {
            $imageurl[$x]="images/avatar.png";
        }
    }
    for ($x=0;$x<10;$x++)
    {
     $flagurl[$x]="img/flags/$flag[$x].png";
        if (!file_exists($flagurl[$x])) {
            $flagurl[$x]="img/flags/other.png";
        }
    }
    
    
?>
    <!-- Full Width Image Header -->
    <header class="header-image">
        <div class="headline">
            <div class="container">
                <?php if($yourID!=""){echo"<p>Your Rank is: $yourID</p>";}?>
                <table  border="0">
                    <tr>
                        <td>
                            <table  border="0" > 
                                <tr>
                                    <td><a href="display.php?uname=<?php echo$username[9];?>"><img id="image1" src="<?php echo$imageurl[9];?>" alt="100x100" style="width:100px;height:100px;"><img id="flag1" src="<?php echo$flagurl[9];?>"></a></td>
                                </tr>
                                <tr>
                                    <td style="width:300px;height:20px;"><a href="display.php?uname=<?php echo$username[9];?>"><?php echo$onoma_eponimo[9];?></a></td>
                                </tr>
                                <tr>
                                    <td style="width:300px;height:20px;"><a href="display.php?uname=<?php echo$username[9];?>"><?php echo$organismos_123[9];?></a></td>
                                </tr>
                                <tr>
                                    <td style="width:300px;height:20px;"><a href="display.php?uname=<?php echo$username[9];?>"><?php echo$katigoria123[9];?></a></td>
                                </tr>
                            
                            </table>
                        </td>
                        <td>
                            <table  border="0"> 
                                <tr>
                                    <td><a href="display.php?uname=<?php echo$username[8];?>"><img id="image1" src="<?php echo$imageurl[8];?>" alt="100x100" style="width:100px;height:100px;"><img id="flag1" src="<?php echo$flagurl[8];?>"></a></td>
                                </tr>
                                <tr>
                                    <td style="width:300px;height:20px;"><a href="display.php?uname=<?php echo$username[8];?>"><?php echo$onoma_eponimo[8];?></a></td>
                                </tr>
                                <tr>
                                    <td style="width:300px;height:20px;"><a href="display.php?uname=<?php echo$username[8];?>"><?php echo$organismos_123[8];?></a></td>
                                </tr>
                                <tr>
                                    <td style="width:300px;height:20px;"><a href="display.php?uname=<?php echo$username[8];?>"><?php echo$katigoria123[8];?></a></td>
                                </tr>
                            
                            </table>
                        </td>
                        <td>
                            <table  border="0"> 
                                <tr>
                                    <td><a href="display.php?uname=<?php echo$username[7];?>"><img id="image1" src="<?php echo$imageurl[7];?>" alt="100x100" style="width:100px;height:100px;"><img id="flag1" src="<?php echo$flagurl[7];?>"></a></td>
                                </tr>
                                <tr>
                                    <td style="width:300px;height:20px;"><a href="display.php?uname=<?php echo$username[7];?>"><?php echo$onoma_eponimo[7];?></a></td>
                                </tr>
                                <tr>
                                    <td style="width:300px;height:20px;"><a href="display.php?uname=<?php echo$username[7];?>"><?php echo$organismos_123[7];?></a></td>
                                </tr>
                                <tr>
                                    <td style="width:300px;height:20px;"><a href="display.php?uname=<?php echo$username[7];?>"><?php echo$katigoria123[7];?></a></td>
                                </tr>
                            
                            </table>
                        </td>
                        <td>
                            <table  border="0"> 
                                <tr>
                                    <td><a href="display.php?uname=<?php echo$username[6];?>"><img id="image1" src="<?php echo$imageurl[6];?>" alt="100x100" style="width:100px;height:100px;"><img id="flag1" src="<?php echo$flagurl[6];?>"></a></td>
                                </tr>
                                <tr>
                                    <td style="width:300px;height:20px;"><a href="display.php?uname=<?php echo$username[6];?>"><?php echo$onoma_eponimo[6];?></a></td>
                                </tr>
                                <tr>
                                    <td style="width:300px;height:20px;"><a href="display.php?uname=<?php echo$username[6];?>"><?php echo$organismos_123[6];?></a></td>
                                </tr>
                                <tr>
                                    <td style="width:300px;height:20px;"><a href="display.php?uname=<?php echo$username[6];?>"><?php echo$katigoria123[6];?></a></td>
                                </tr>
                            
                            </table>
                        </td>
                        <td>
                            <table  border="0"> 
                                <tr>
                                    <td><a href="display.php?uname=<?php echo$username[5];?>"><img id="image1" src="<?php echo$imageurl[5];?>" alt="100x100" style="width:100px;height:100px;"><img id="flag1" src="<?php echo$flagurl[5];?>"></a></td>
                                </tr>
                                <tr>
                                    <td style="width:300px;height:20px;"><a href="display.php?uname=<?php echo$username[5];?>"><?php echo$onoma_eponimo[5];?></a></td>
                                </tr>
                                <tr>
                                    <td style="width:300px;height:20px;"><a href="display.php?uname=<?php echo$username[5];?>"><?php echo$organismos_123[5];?></a></td>
                                </tr>
                                <tr>
                                    <td style="width:300px;height:20px;"><a href="display.php?uname=<?php echo$username[5];?>"><?php echo$katigoria123[5];?></a></td>
                                </tr>
                            
                            </table>
                        </td>
                        </tr>
                        <tr>
                        <td>
                            <table  border="0" > 
                                <tr>
                                    <td><a href="display.php?uname=<?php echo$username[4];?>"><img id="image1" src="<?php echo$imageurl[4];?>" alt="100x100" style="width:100px;height:100px;"><img id="flag1" src="<?php echo$flagurl[4];?>"></a></td>
                                </tr>
                                <tr>
                                    <td style="width:300px;height:20px;"><a href="display.php?uname=<?php echo$username[4];?>"><?php echo$onoma_eponimo[4];?></a></td>
                                </tr>
                                <tr>
                                    <td style="width:300px;height:20px;"><a href="display.php?uname=<?php echo$username[4];?>"><?php echo$organismos_123[4];?></a></td>
                                </tr>
                                <tr>
                                    <td style="width:300px;height:20px;"><a href="display.php?uname=<?php echo$username[4];?>"><?php echo$katigoria123[4];?></a></td>
                                </tr>
                            
                            </table>
                        </td>
                        <td>
                            <table  border="0"> 
                                <tr>
                                    <td><a href="display.php?uname=<?php echo$username[3];?>"><img id="image1" src="<?php echo$imageurl[3];?>" alt="100x100" style="width:100px;height:100px;"><img id="flag1" src="<?php echo$flagurl[3];?>"></a></td>
                                </tr>
                                <tr>
                                    <td style="width:300px;height:20px;"><a href="display.php?uname=<?php echo$username[3];?>"><?php echo$onoma_eponimo[3];?></a></td>
                                </tr>
                                <tr>
                                    <td style="width:300px;height:20px;"><a href="display.php?uname=<?php echo$username[3];?>"><?php echo$organismos_123[3];?></a></td>
                                </tr>
                                <tr>
                                    <td style="width:300px;height:20px;"><a href="display.php?uname=<?php echo$username[3];?>"><?php echo$katigoria123[3];?></a></td>
                                </tr>
                            
                            </table>
                        </td>
                        <td>
                            <table  border="0"> 
                                <tr>
                                    <td><a href="display.php?uname=<?php echo$username[2];?>"><img id="image1" src="<?php echo$imageurl[2];?>" alt="100x100" style="width:100px;height:100px;"><img id="flag1" src="<?php echo$flagurl[2];?>"></a></td>
                                </tr>
                                <tr>
                                    <td style="width:300px;height:20px;"><a href="display.php?uname=<?php echo$username[2];?>"><?php echo$onoma_eponimo[2];?></a></td>
                                </tr>
                                <tr>
                                    <td style="width:300px;height:20px;"><a href="display.php?uname=<?php echo$username[2];?>"><?php echo$organismos_123[2];?></a></td>
                                </tr>
                                <tr>
                                    <td style="width:300px;height:20px;"><a href="display.php?uname=<?php echo$username[2];?>"><?php echo$katigoria123[2];?></a></td>
                                </tr>
                            
                            </table>
                        </td>
                        <td>
                            <table  border="0"> 
                                <tr>
                                    <td><a href="display.php?uname=<?php echo$username[1];?>"><img id="image1" src="<?php echo$imageurl[1];?>" alt="100x100" style="width:100px;height:100px;"><img id="flag1" src="<?php echo$flagurl[1];?>"></a></td>
                                </tr>
                                <tr>
                                    <td style="width:300px;height:20px;"><a href="display.php?uname=<?php echo$username[1];?>"><?php echo$onoma_eponimo[1];?></a></td>
                                </tr>
                                <tr>
                                    <td style="width:300px;height:20px;"><a href="display.php?uname=<?php echo$username[1];?>"><?php echo$organismos_123[1];?></a></td>
                                </tr>
                                <tr>
                                    <td style="width:300px;height:20px;"><a href="display.php?uname=<?php echo$username[1];?>"><?php echo$katigoria123[1];?></a></td>
                                </tr>
                            
                            </table>
                        </td>
                        <td>
                            <table  border="0"> 
                                <tr>
                                    <td><a href="display.php?uname=<?php echo$username[0];?>"><img id="image1" src="<?php echo$imageurl[0];?>" alt="100x100" style="width:100px;height:100px;"><img id="flag1" src="<?php echo$flagurl[0];?>"></a></td>
                                </tr>
                                <tr>
                                    <td style="width:300px;height:20px;"><a href="display.php?uname=<?php echo$username[0];?>"><?php echo$onoma_eponimo[0];?></a></td>
                                </tr>
                                <tr>
                                    <td style="width:300px;height:20px;"><a href="display.php?uname=<?php echo$username[0];?>"><?php echo$organismos_123[0];?></a></td>
                                </tr>
                                <tr>
                                    <td style="width:300px;height:20px;"><a href="display.php?uname=<?php echo$username[0];?>"><?php echo$katigoria123[0];?></a></td>
                                </tr>
                            
                            </table>
                        </td>
                        </tr>
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
