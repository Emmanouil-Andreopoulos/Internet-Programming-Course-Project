<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    include "connect.php";
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
        
    $ID_p = mysqli_real_escape_string($link, $_GET["id"]);
    $sql = "SELECT * FROM `processes` WHERE `ID` = '$ID_p'";
    $retval = mysqli_query($link, $sql) or die(header("Location: error.php?msg=dat_er"));
    $count = mysqli_num_rows($retval);
    if($count<1)
    {
        header("location: index.php");
    }
    if (!$retval) {
        die('Could not get data: ' . mysql_error());
    }
    if(mysqli_real_escape_string($link, $_GET["id"])=="")
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
    
    <script src="dist/vis.js"></script>
    <link href="dist/vis.css" rel="stylesheet" type="text/css" />
    <style type="text/css"> 

    /* create a custom sized dot at the bottom of the red item */
    
    .vis-item.vis-dot.red_i {
      border-radius: 7px;
      border-width: 7px;
      border-color: red;
    }
    .vis-item.vis-dot.red {
      border-color: red;
    }

    .vis-item.vis-dot.green_i {
      border-radius: 7px;
      border-width: 7px;
      border-color: green;
    }
    .vis-item.vis-dot.green {
      border-color: green;
    }
    
    .vis-item.vis-dot.blue_i {
      border-radius: 7px;
      border-width: 7px;
      border-color: blue;
    }
    .vis-item.vis-dot.blue {
      border-color: blue;
    }
    
    .vis-item.vis-dot.orange_i {
      border-radius: 7px;
      border-width: 7px;
      border-color: orange;
    }
    .vis-item.vis-dot.orange {
      border-color: orange;
    }
    
    .vis-item.vis-dot.magenta_i {
      border-radius: 7px;
      border-width: 7px;
      border-color: magenta;
    }
    .vis-item.vis-dot.magenta {
      border-color: magenta;
    }

    /* our custom classes overrule the styles for selected events,
       so lets define a new style for the selected events */
    .vis-item.vis-selected {
      background-color: white;
      border-color: black;
      color: black;
      box-shadow: 0 0 10px gray;
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
    
    $row = mysqli_fetch_array($retval);
    
    $titlos = $row['titlos'];
    $perigrafi = $row['perigrafi'];
    $ID_u = $row['User_ID'];
    $count123=0;
    for ($x=1;$x<=10;$x++)
    {
        if($row["step$x"]!=NULL || $row["step$x"]!="")
        {
            $count123++;
        }
            
    }
    $sql2 = "SELECT * FROM `attachments` WHERE `ID_p` = '$ID_p'";
    $retval2 = mysqli_query($link, $sql2) or die(header("Location: error.php?msg=dat_er"));
    $count2 = mysqli_num_rows($retval2);
    
    $sql44 = "SELECT username FROM `users` WHERE `ID` = '$ID_u'";
    $retval44 = mysqli_query($link, $sql44) or die(header("Location: error.php?msg=dat_er"));
    $row44 = mysqli_fetch_array($retval44);
    
    $user_name= $row44['username'];
    
    
    ?>
    <!-- Full Width Image Header -->
    <header class="header-image">
        <div class="headline">
            <div class="container">
                <div id="w">
                    <div id="content" class="clearfix">                        
                        <h1 id="h1-name"><?php echo$titlos; ?></h1>
                        <section id="bio">
                            <p id="p_2_2_22">Started by: <?php echo$user_name; ?></p>
                            
                            <div id="visualization"></div>
                            <p></p>
                            <div id="log"></div>
                            <script type="text/javascript">
                                var items = new vis.DataSet([
                                  <?php
                                    $jj=0;
                                    while ($row2 = mysqli_fetch_assoc($retval2)) {
                                        $jj++;
                                        $item = $row2['titlos'];
                                        $y= $row2['imerominia'];
                                        $q2=$row2['katigoria'];
                                        $q3=$row2['rating'];
                                        $q4=$row2['rating_n'];
                                        $q="";
                                        if ($q2=="Επιστημονικό Άρθρο")
                                        {
                                            $q="red";
                                        }
                                        else if($q2 =="Δημόσια Αρχή")
                                        {
                                            $q="green";
                                        }
                                        else if($q2 =="Εταιρικό Έγγραφο")
                                        {
                                            $q="blue";
                                        }
                                        else if($q2 =="Προσωπική Άποψη/blog")
                                        {
                                            $q="orange";
                                        }
                                        else if($q2 =="Άλλο")
                                        {
                                            $q="magenta";
                                        }
                                        if($q3!=0 && $q4!=0)
                                        {
                                            if (($q3/$q4)>15)
                                            {
                                                $q=$q."_i";
                                            }
                                        }
                                        
                                        echo "{id: $jj, content: '$item', start: '$y', type: 'point','className': '$q'},";
                                        echo"\r\n";
                                    }
                                    for ($x=1;$x<$count123;$x++)
                                    {
                                        $y="step$x"."b";
                                        $y=$row[$y];
                                        $j="step$x"."e";
                                        $j=$row[$j];    
                                        $item = $row["step$x"];
                                        $zz=$x+$count2;
                                        echo "{id: $zz, content: '$item', start: '$y', end: '$j'},";
                                        echo"\r\n";
                                    }
                                    if ($count123!=0)
                                    {
                                        $zz=$count123+$count2;
                                        $y="step$count123"."b";
                                        $y=$row[$y];
                                        $j="step$count123"."e";
                                        $j=$row[$j];
                                        $item = $row["step$count123"];
                                    echo"{id: $zz, content: '$item', start: '$y', end: '$j'}";
                                    }
                                  ?>
                                ]);

                                var container = document.getElementById('visualization');
                                var options = {
                                  editable: false
                                };
                                var timeline = new vis.Timeline(container, items, options);

                                timeline.on('select', function (properties) {
                                  logEvent('select', properties);
                                });

                                function logEvent(event, properties) {
                                  var log = document.getElementById('log');
                                  var msg = document.createElement('div');
                                  var test = JSON.stringify(properties);
                                  
                                  <?php
                                  
                                    
                                    $jj=0;
                                    $retval3 = mysqli_query($link, $sql2) or die(header("Location: error.php?msg=dat_er"));
                                    while ($row3 = mysqli_fetch_assoc($retval3)) {
                                        $jj++;
                                        $ID_aa = $row3['ID'];
                                        echo "if (test . indexOf('";echo'{"items"';echo":[$jj]') >= 0) {";
                                             echo' window.location.assign';echo'("';echo"attachment.php?id=$ID_aa";echo'")
                                          }';
                                        echo"\r\n";
                                    }
                                    
                                ?>
                                }
                            </script>
                            <center>
                                <p id="p_2_2"><font color="red">■</font> Επιστημονικό Άρθρο <font color="green">■</font> Δημόσια Αρχή <font color="blue">■</font> Εταιρικό Έγγραφο <font color="orange">■</font> Προσωπική Άποψη/blog <font color="magenta">■</font> Άλλο</p>
                                <?php
                                if($check_user_1==1)
                                {?>
                                    <form name="upload" action="upload_at.php?id=<?php echo$ID_p?>" method="post">
                                    <table border="0">
                                         <tr><td><p> </p></td></tr>
                                         <tr>
                                            <td><input type="submit" value="Upload Attachment"/></td>
                                        </tr>
                                    </table> </form>
                                <?php
                                }
                                ?>
                                </center>
                            
                            
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
