<!DOCTYPE html>
<html lang="en">
<?php
    include "connect.php";
    include "check.php";
    $msg = '';
    $menu1="Login";
    $menu1link="login.php";
    $menu2="Register";
    $menu2link="register.php";
    $menu3="";
    $menu3link="";
    $menu4="";
    $menu4link="";
    $link_post_1="";
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
    if(mysqli_real_escape_string($link, $_GET["id"])=="")
    {
        header("location: index.php");
    }
    $Process_ID = mysqli_real_escape_string($link, $_GET["id"]);
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="js/newjavascript.js"></script>
    <script type="text/javascript">
    window.test = function(e){
    if(e.value=="url"){
        $("[id=1st_1]").show();
        $("[id=2nd_2]").hide();
    }
    else if(e.value=="pdf"){
        $("[id=1st_1]").hide();
        $("[id=2nd_2]").show();
    }
    }
    </script>
    
    <script>
    $(document).ready(function() {
      $("[id=1st_1]").hide();
      $("[id=2nd_2]").hide();
      $("[id=table_2]").hide();
    });
    </script>
</head>
<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST" && (isset($_POST['submit1'])) && ($_POST['submit1'] == 'Submit'))
    {
        
        $ID2 = mysqli_query($link, "SELECT ID FROM attachments");
        $ID_a = mysqli_num_rows($ID2);
        mysqli_query($link, "INSERT INTO `attachments`(`ID`,`ID_p`) VALUES('$ID_a','$Process_ID')");
        
        if ((isset($_POST['title'])) && ($_POST['title'] !=""))
            {
                $Title = mysqli_real_escape_string($link, $_POST['title']);
                mysqli_query($link,"UPDATE attachments SET titlos='$Title' WHERE ID='$ID_a'");
            }
        
        if ((isset($_POST['arxeio'])) && ($_POST['arxeio'] !=""))
            {
                $Arxeio = mysqli_real_escape_string($link, $_POST['arxeio']);
                if ($Arxeio=='url')
                {
                    if ((isset($_POST['url'])) && ($_POST['url'] !=""))
                    {
                        $URL = mysqli_real_escape_string($link, $_POST['url']);
                        mysqli_query($link,"UPDATE attachments SET pdf='$URL' WHERE ID='$ID_a'");
                    }
                }    
                else if ($Arxeio=='pdf')
                {
                    if (!empty($_FILES["pdff"])) {
            

                        if (!file_exists("files/$Process_ID/$ID_a")) {
                            mkdir("files/$Process_ID/$ID_a", 0777, true);
                        }

                        define("UPLOAD_DIR", "files/$Process_ID/$ID_a/");

                        if (!empty($_FILES["pdff"])) {
                            $myFile = $_FILES["pdff"];

                            if ($myFile["error"] !== UPLOAD_ERR_OK) {
                                echo "<p>An error occurred.</p>";
                            } else {
                                if (file_exists("files/$Process_ID/$ID_a/a.pdf")) {
                                    unlink("files/$Process_ID/$ID_a/a.pdf");
                                }
                                // ensure a safe filename
                                $name = preg_replace("/[^A-Z0-9._-]/i", "_", 'a.pdf');

                                // don't overwrite an existing file
                                $i = 0;
                                $parts = pathinfo($name);
                                while (file_exists(UPLOAD_DIR . $name)) {
                                    $i++;
                                    $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
                                }

                                // preserve file from temporary directory
                                $success = move_uploaded_file($myFile["tmp_name"], UPLOAD_DIR . $name);
                                if (!$success) {
                                    echo "<p>Unable to save file.</p>";
                                }

                                // set proper permissions on the new file
                                chmod(UPLOAD_DIR . $name, 0644);
                            }
                        }
                        $PDF = $base_url2 . "files/$Process_ID/$ID_a/a.pdf";
                        mysqli_query($link, "UPDATE attachments SET pdf='$PDF' WHERE ID='$ID_a'");
                    }
                }
            }
        if ((isset($_POST['auth'])) && ($_POST['auth'] !=""))
            {
                $Suggr = mysqli_real_escape_string($link, $_POST['auth']);
                mysqli_query($link,"UPDATE attachments SET siggrafeas='$Suggr' WHERE ID='$ID_a'");
            }
            else
            {
                $Suggr = ($_SESSION['username']);
                mysqli_query($link,"UPDATE attachments SET siggrafeas='$Suggr' WHERE ID='$ID_a'");
            }
        if ((isset($_POST['date'])) && ($_POST['date'] !=""))
            {
                $Date = mysqli_real_escape_string($link, $_POST['date']);
                mysqli_query($link,"UPDATE attachments SET imerominia='$Date' WHERE ID='$ID_a'");
            }
            else
            {
                $imerominia_c = date('Y-m-d');
                mysqli_query($link,"UPDATE attachments SET imerominia='$imerominia_c' WHERE ID='$ID_a'");
            }
        if ((isset($_POST['descrip'])) && ($_POST['descrip'] !=""))
            {
                $Perigr = mysqli_real_escape_string($link, $_POST['descrip']);
                mysqli_query($link,"UPDATE attachments SET perigrafi='$Perigr' WHERE ID='$ID_a'");
            } 
        if ((isset($_POST['category'])) && ($_POST['category'] !=""))
        {
            $Category = mysqli_real_escape_string($link, $_POST['category']);
            if ($Category=='scien_a')
            {
                $Category="Επιστημονικό Άρθρο";
            }
            else if ($Category=='pub_a')
            {
                $Category="Δημόσια Αρχή";
            }
            else if ($Category=='cor_d')
            {
                $Category="Εταιρικό Έγγραφο";
            }
            else if ($Category=='per_o')
            {
                $Category="Προσωπική Άποψη/blog";
            }
            else if ($Category=='other')
            {
                $Category="Άλλο";
            }
            mysqli_query($link,"UPDATE attachments SET katigoria='$Category' WHERE ID='$ID_a'");
        }   
        $msg='<font color="#00cc00">Attachment successfully created!</font>';
        echo'<script>
        $(document) . ready(function() {
                $("[id=table_1]") . hide();
                $("[id=table_2]").show();
            });
        </script>';
        $link_post_1="process.php?id=$Process_ID";
            
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
    <!-- Full Width Image Header -->
    <header class="header-image">
        <div class="headline">
            <div class="container"><center>
                <p id="p_size">New Attachment</p>
                <p><?php echo $msg; ?></p>
                <form name="upload_form" action="upload_at.php?id=<?php echo$Process_ID?>" method="post" enctype="multipart/form-data">
                <table id="table_1" border="0">
                    <tr>
                        <td><b>Τίτλος:</b></td>
                        <td><input type="text" name="title"></td>    
                    </tr>
                    <tr><td><p></p></td></tr>
                    <tr>
                        <td><b>Αρχείο:</b></td>
                        <td><select name="arxeio" id='up_type' onchange="test(this);">
                            <option value="0"selected="selected"></option>
                            <option value="url">URL του Αρχείου</option>
                            <option value="pdf">PDF</option>
                        </td>
                    </tr>
                    <tr id="1st_1"><td><p></p></td></tr>
                    <tr id="1st_1">
                        <td><b>URL:</b></td>
                        <td><input type="text" name="url"></td>    
                    </tr>
                    <tr id="2nd_2"><td><p></p></td></tr>
                    <tr id="2nd_2">
                        <td><b>PDF Αρχείο:</b></td>
                        <td><input type="file" name="pdff" accept="file/*"/></td>
                    </tr>
                    <tr><td><p></p></td></tr>
                    <tr>
                        <td><b>Συγγραφέας:</b></td>
                        <td><input type="text" name="auth"></td>    
                    </tr>
                    <tr><td><p></p></td></tr>
                    <tr>
                        <td><b>Ημερομηνία:</b></td>
                        <td><input type="date" name="date"></td>    
                    </tr>
                    <tr><td><p></p></td></tr>
                    <tr>
                        <td><b>Περιγραφή:</b></td>
                        <td><textarea id="word_count" cols="40" rows="5" name="descrip"></textarea></td>
                    </tr>
                    <tr><td><p></p></td></tr>
                    <tr>
                        <td><b>Κατηγορία:</b></td>
                        <td><select name="category">
                                <option value="scien_a">Επιστημονικό Άρθρο</option>
                                <option value="pub_a">Δημόσια Αρχή</option>
                                <option value="cor_d">Εταιρικό Έγγραφο</option>
                                <option value="per_o">Προσωπική Άποψη/blog</option>
                                <option value="other">Άλλο</option>
                        </select></td>
                    </tr>
                    <tr><td><p></p></td></tr>
                    <tr>
                        <td></td>
                        <td><input type="Submit" name="submit1" value="Submit"></td>
                    </tr>
                        
                </table></form> 
                 <form name="process_form" action="<?php echo$link_post_1;?>" method="post" enctype="multipart/form-data">
                    <table id="table_2" border="0">
                        <tr><td><p></p></td></tr>
                        <tr>
                            <td><p>Click the button to go back to Process</p></td>
                        </tr>
                        <tr><td><p></p></td></tr>
                        <tr>
                            <td><center><input type="Submit" name="submit2" value="Process"></center></td>
                        </tr>
                    </table>
                </form>
                </center>
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
<script>
    $(document).ready(function() {
    $("#word_count").on('keyup', function() {
        var words = this.value.match(/\S+/g).length;
        if (words > 100) {
            // Split the string on first 100 words and rejoin on spaces
            var trimmed = $(this).val().split(/\s+/, 100).join(" ");
            // Add a space at the end to keep new typing making new words
            $(this).val(trimmed + " ");
        }
        else {
            $('#display_count').text(words);
            $('#word_left').text(100-words);
        }
    });
 }); 
</script>
</html>
