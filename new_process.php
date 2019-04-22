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
    if(e.value=="1"){
        $("[id=1st_1]").show();
        $("[id=2nd_2]").hide();
        $("[id=3rd_3]").hide();
        $("[id=4th_4]").hide();
        $("[id=5th_5]").hide();
        $("[id=6th_6]").hide();
        $("[id=7th_7]").hide();
        $("[id=8th_8]").hide();
        $("[id=9th_9]").hide();
        $("[id=10th_10]").hide();
    }
    else if(e.value=="2"){
        $("[id=1st_1]").show();
        $("[id=2nd_2]").show();
        $("[id=3rd_3]").hide();
        $("[id=4th_4]").hide();
        $("[id=5th_5]").hide();
        $("[id=6th_6]").hide();
        $("[id=7th_7]").hide();
        $("[id=8th_8]").hide();
        $("[id=9th_9]").hide();
        $("[id=10th_10]").hide();
    }
    else if(e.value == "3"){
        $("[id=1st_1]").show();
        $("[id=2nd_2]").show();
        $("[id=3rd_3]").show();
        $("[id=4th_4]").hide();
        $("[id=5th_5]").hide();
        $("[id=6th_6]").hide();
        $("[id=7th_7]").hide();
        $("[id=8th_8]").hide();
        $("[id=9th_9]").hide();
        $("[id=10th_10]").hide();
    }
    else if(e.value == "4"){
        $("[id=1st_1]").show();
        $("[id=2nd_2]").show();
        $("[id=3rd_3]").show();
        $("[id=4th_4]").show();
        $("[id=5th_5]").hide();
        $("[id=6th_6]").hide();
        $("[id=7th_7]").hide();
        $("[id=8th_8]").hide();
        $("[id=9th_9]").hide();
        $("[id=10th_10]").hide();
    }
    else if(e.value == "5"){
        $("[id=1st_1]").show();
        $("[id=2nd_2]").show();
        $("[id=3rd_3]").show();
        $("[id=4th_4]").show();
        $("[id=5th_5]").show();
        $("[id=6th_6]").hide();
        $("[id=7th_7]").hide();
        $("[id=8th_8]").hide();
        $("[id=9th_9]").hide();
        $("[id=10th_10]").hide();
    }
    else if(e.value == "6"){
        $("[id=1st_1]").show();
        $("[id=2nd_2]").show();
        $("[id=3rd_3]").show();
        $("[id=4th_4]").show();
        $("[id=5th_5]").show();
        $("[id=6th_6]").show();
        $("[id=7th_7]").hide();
        $("[id=8th_8]").hide();
        $("[id=9th_9]").hide();
        $("[id=10th_10]").hide();
    }
    else if(e.value == "7"){
        $("[id=1st_1]").show();
        $("[id=2nd_2]").show();
        $("[id=3rd_3]").show();
        $("[id=4th_4]").show();
        $("[id=5th_5]").show();
        $("[id=6th_6]").show();
        $("[id=7th_7]").show();
        $("[id=8th_8]").hide();
        $("[id=9th_9]").hide();
        $("[id=10th_10]").hide();
    }
    else if(e.value == "8"){
        $("[id=1st_1]").show();
        $("[id=2nd_2]").show();
        $("[id=3rd_3]").show();
        $("[id=4th_4]").show();
        $("[id=5th_5]").show();
        $("[id=6th_6]").show();
        $("[id=7th_7]").show();
        $("[id=8th_8]").show();
        $("[id=9th_9]").hide();
        $("[id=10th_10]").hide();
    }
    else if(e.value == "9"){
        $("[id=1st_1]").show();
        $("[id=2nd_2]").show();
        $("[id=3rd_3]").show();
        $("[id=4th_4]").show();
        $("[id=5th_5]").show();
        $("[id=6th_6]").show();
        $("[id=7th_7]").show();
        $("[id=8th_8]").show();
        $("[id=9th_9]").show();
        $("[id=10th_10]").hide();
    }
    else if(e.value == "10"){
        $("[id=1st_1]").show();
        $("[id=2nd_2]").show();
        $("[id=3rd_3]").show();
        $("[id=4th_4]").show();
        $("[id=5th_5]").show();
        $("[id=6th_6]").show();
        $("[id=7th_7]").show();
        $("[id=8th_8]").show();
        $("[id=9th_9]").show();
        $("[id=10th_10]").show();
    }
}
    </script>
    <script>
    $(document).ready(function() {
      $("[id=1st_1]").hide();
      $("[id=2nd_2]").hide();
      $("[id=3rd_3]").hide();
      $("[id=4th_4]").hide();
      $("[id=5th_5]").hide();
      $("[id=6th_6]").hide();
      $("[id=7th_7]").hide();
      $("[id=8th_8]").hide();
      $("[id=9th_9]").hide();
      $("[id=10th_10]").hide();
      $("[id=table_2]").hide();
    });
    </script>
    
</head>
<?php

    $check1=0;
    $check2=0;
    $check3=0;
    $check4=0;
    $check5=0;
    $check6=0;
    $check7=0;
    $check8=0;
    $check9=0;
    $check10=0;
    $check11=0;
    $check12=0;
    $check13=0;
    $check14=0;
    $check15=0;
    $check16=0;
    $check17=0;
    $check18=0;
    if ((isset($_POST['step1b'])) && ($_POST['step1b'] !=""))
    {
        if((mysqli_real_escape_string($link, $_POST['step1b']))>(mysqli_real_escape_string($link, $_POST['step1e'])))
        {
            $check1=1;
        }
    }
    if ((isset($_POST['step2b'])) && ($_POST['step2b'] !=""))
    {
        if((mysqli_real_escape_string($link, $_POST['step2b']))>(mysqli_real_escape_string($link, $_POST['step2e'])))
        {
            $check2=1;
        }
    }
    if ((isset($_POST['step3b'])) && ($_POST['step3b'] !=""))
    {
        if((mysqli_real_escape_string($link, $_POST['step3b']))>(mysqli_real_escape_string($link, $_POST['step3e'])))
        {
            $check3=1;
        }
    }
    if ((isset($_POST['step4b'])) && ($_POST['step4b'] !=""))
    {
        if((mysqli_real_escape_string($link, $_POST['step4b']))>(mysqli_real_escape_string($link, $_POST['step4e'])))
        {
            $check4=1;
        }
    }
    if ((isset($_POST['step5b'])) && ($_POST['step5b'] !=""))
    {
        if((mysqli_real_escape_string($link, $_POST['step5b']))>(mysqli_real_escape_string($link, $_POST['step5e'])))
        {
            $check5=1;
        }
    }
    if ((isset($_POST['step6b'])) && ($_POST['step6b'] !=""))
    {
        if((mysqli_real_escape_string($link, $_POST['step6b']))>(mysqli_real_escape_string($link, $_POST['step6e'])))
        {
            $check6=1;
        }
    }
    if ((isset($_POST['step7b'])) && ($_POST['step7b'] !=""))
    {
        if((mysqli_real_escape_string($link, $_POST['step7b']))>(mysqli_real_escape_string($link, $_POST['step7e'])))
        {
            $check7=1;
        }
    }
    if ((isset($_POST['step8b'])) && ($_POST['step8b'] !=""))
    {
        if((mysqli_real_escape_string($link, $_POST['step8b']))>(mysqli_real_escape_string($link, $_POST['step8e'])))
        {
            $check8=1;
        }
    }
    if ((isset($_POST['step9b'])) && ($_POST['step9b'] !=""))
    {
        if((mysqli_real_escape_string($link, $_POST['step9b']))>(mysqli_real_escape_string($link, $_POST['step9e'])))
        {
            $check9=1;
        }
    }
    if ((isset($_POST['step10b'])) && ($_POST['step10b'] !=""))
    {
        if((mysqli_real_escape_string($link, $_POST['step10b']))>(mysqli_real_escape_string($link, $_POST['step10e'])))
        {
            $check10=1;
        }
    }
    if ((isset($_POST['step1e'])) && ($_POST['step2b'] !=""))
    {
        if((mysqli_real_escape_string($link, $_POST['step1e']))>(mysqli_real_escape_string($link, $_POST['step2b'])))
        {
            $check11=1;
        }
    }
    if ((isset($_POST['step2e'])) && ($_POST['step3b'] !=""))
    {
        if((mysqli_real_escape_string($link, $_POST['step2e']))>(mysqli_real_escape_string($link, $_POST['step3b'])))
        {
            $check12=1;
        }
    }
    if ((isset($_POST['step3e'])) && ($_POST['step4b'] !=""))
    {
        if((mysqli_real_escape_string($link, $_POST['step3e']))>(mysqli_real_escape_string($link, $_POST['step4b'])))
        {
            $check13=1;
        }
    }
    if ((isset($_POST['step4e'])) && ($_POST['step5b'] !=""))
    {
        if((mysqli_real_escape_string($link, $_POST['step4e']))>(mysqli_real_escape_string($link, $_POST['step5b'])))
        {
            $check14=1;
        }
    }
    if ((isset($_POST['step5e'])) && ($_POST['step6b'] !=""))
    {
        if((mysqli_real_escape_string($link, $_POST['step5e']))>(mysqli_real_escape_string($link, $_POST['step6b'])))
        {
            $check15=1;
        }
    }
    if ((isset($_POST['step7e'])) && ($_POST['step8b'] !=""))
    {
        if((mysqli_real_escape_string($link, $_POST['step7e']))>(mysqli_real_escape_string($link, $_POST['step8b'])))
        {
            $check16=1;
        }
    }
    if ((isset($_POST['step8e'])) && ($_POST['step9b'] !=""))
    {
        if((mysqli_real_escape_string($link, $_POST['step8e']))>(mysqli_real_escape_string($link, $_POST['step9b'])))
        {
            $check17=1;
        }
    }
    if ((isset($_POST['step9e'])) && ($_POST['step10b'] !=""))
    {
        if((mysqli_real_escape_string($link, $_POST['step9e']))>(mysqli_real_escape_string($link, $_POST['step10b'])))
        {
            $check18=1;
        }
    }
    
    $checktotal=0;
    if($check1==1||$check2==1||$check3==1||$check4==1||$check5==1||$check6==1||$check7==1||$check8==1||$check9==1||$check10==1||$check11==1||$check12==1||$check13==1||$check14==1||$check15==1||$check16==1||$check17==1||$check18==1)
    {
        $checktotal=1;
    }
    
    if ($_SERVER['REQUEST_METHOD'] == "POST" && (isset($_POST['submit1'])) && ($_POST['submit1'] == 'Submit'))
    {
    if($checktotal==0)
        {
        $ID1 = mysqli_query($link, "SELECT ID FROM processes");
        $ID_p = mysqli_num_rows($ID1);
        $User_ID = mysqli_real_escape_string($link,$_SESSION['username']);
        mysqli_query($link, "INSERT INTO `processes`(`ID`,`User_ID`) VALUES('$ID_p','$User_ID')");
        
    if ((isset($_POST['titlos'])) && ($_POST['titlos'] !=""))
            {
                $Titlos = mysqli_real_escape_string($link, $_POST['titlos']);
                mysqli_query($link,"UPDATE processes SET titlos='$Titlos' WHERE ID='$ID_p'");
            }
        if ((isset($_POST['perigr'])) && ($_POST['perigr'] !=""))
        {
            $perigr = mysqli_real_escape_string($link, $_POST['perigr']);
            mysqli_query($link,"UPDATE processes SET perigrafi='$perigr' WHERE ID='$ID_p'");
        }
        if ((isset($_POST['steps'])) && ($_POST['steps'] !=""))
        {
            $Steps = mysqli_real_escape_string($link, $_POST['steps']);
        }
        
        
        
            if ($Steps=='1')
        {
            if ((isset($_POST['step1'])) && ($_POST['step1'] !=""))
            {
                $step1 = mysqli_real_escape_string($link, $_POST['step1']);
                mysqli_query($link,"UPDATE processes SET step1='$step1' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step1b'])) && ($_POST['step1b'] !=""))
            {
                $st1b = mysqli_real_escape_string($link, $_POST['step1b']);
                mysqli_query($link,"UPDATE processes SET step1b='$st1b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step1e'])) && ($_POST['step1e'] !=""))
            {
                $st1e = mysqli_real_escape_string($link, $_POST['step1e']);
                mysqli_query($link,"UPDATE processes SET step1e='$st1e' WHERE ID='$ID_p'");
            }
        }
   
        else if ($Steps=='2')
        {
            if ((isset($_POST['step1'])) && ($_POST['step1'] !=""))
            {
                $step1 = mysqli_real_escape_string($link, $_POST['step1']);
                mysqli_query($link,"UPDATE processes SET step1='$step1' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step1b'])) && ($_POST['step1b'] !=""))
            {
                $st1b = mysqli_real_escape_string($link, $_POST['step1b']);
                mysqli_query($link,"UPDATE processes SET step1b='$st1b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step1e'])) && ($_POST['step1e'] !=""))
            {
                $st1e = mysqli_real_escape_string($link, $_POST['step1e']);
                mysqli_query($link,"UPDATE processes SET step1e='$st1e' WHERE ID='$ID_p'");
            }
            
            if ((isset($_POST['step2'])) && ($_POST['step2'] !=""))
            {
                $step2 = mysqli_real_escape_string($link, $_POST['step2']);
                mysqli_query($link,"UPDATE processes SET step2='$step2' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step2b'])) && ($_POST['step2b'] !=""))
            {
                $st2b = mysqli_real_escape_string($link, $_POST['step2b']);
                mysqli_query($link,"UPDATE processes SET step2b='$st2b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step2e'])) && ($_POST['step2e'] !=""))
            {
                $st2e = mysqli_real_escape_string($link, $_POST['step2e']);
                mysqli_query($link,"UPDATE processes SET step2e='$st2e' WHERE ID='$ID_p'");
            }
            if ($st1e > $st2b && $st1b < $st2e)
            {
                print "Οι ημερομηνίες δεν πρέπει να συμπίπτουν!";
            }
        }
        else if ($Steps=='3')
        {
           if ((isset($_POST['step1'])) && ($_POST['step1'] !=""))
            {
                $step1 = mysqli_real_escape_string($link, $_POST['step1']);
                mysqli_query($link,"UPDATE processes SET step1='$step1' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step1b'])) && ($_POST['step1b'] !=""))
            {
                $st1b = mysqli_real_escape_string($link, $_POST['step1b']);
                mysqli_query($link,"UPDATE processes SET step1b='$st1b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step1e'])) && ($_POST['step1e'] !=""))
            {
                $st1e = mysqli_real_escape_string($link, $_POST['step1e']);
                mysqli_query($link,"UPDATE processes SET step1e='$st1e' WHERE ID='$ID_p'");
            }
            
            if ((isset($_POST['step2'])) && ($_POST['step2'] !=""))
            {
                $step2 = mysqli_real_escape_string($link, $_POST['step2']);
                mysqli_query($link,"UPDATE processes SET step2='$step2' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step2b'])) && ($_POST['step2b'] !=""))
            {
                $st2b = mysqli_real_escape_string($link, $_POST['step2b']);
                mysqli_query($link,"UPDATE processes SET step2b='$st2b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step2e'])) && ($_POST['step2e'] !=""))
            {
                $st2e = mysqli_real_escape_string($link, $_POST['step2e']);
                mysqli_query($link,"UPDATE processes SET step2e='$st2e' WHERE ID='$ID_p'");
            }
            if ($st1e > $st2b && $st1b < $st2e)
    {
     
    }
            if ((isset($_POST['step3'])) && ($_POST['step3'] !=""))
            {
                $step3 = mysqli_real_escape_string($link, $_POST['step3']);
                mysqli_query($link,"UPDATE processes SET step3='$step3' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step3b'])) && ($_POST['step3b'] !=""))
            {
                $st3b = mysqli_real_escape_string($link, $_POST['step3b']);
                mysqli_query($link,"UPDATE processes SET step3b='$st3b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step3e'])) && ($_POST['step3e'] !=""))
            {
                $st3e = mysqli_real_escape_string($link, $_POST['step3e']);
                mysqli_query($link,"UPDATE processes SET step3e='$st3e' WHERE ID='$ID_p'");
            }
            if ($st2e > $st3b && $st2b < $st3e)
    {
     
    }
        }
        else if ($Steps=='4')
        {
            if ((isset($_POST['step1'])) && ($_POST['step1'] !=""))
            {
                $step1 = mysqli_real_escape_string($link, $_POST['step1']);
                mysqli_query($link,"UPDATE processes SET step1='$step1' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step1b'])) && ($_POST['step1b'] !=""))
            {
                $st1b = mysqli_real_escape_string($link, $_POST['step1b']);
                mysqli_query($link,"UPDATE processes SET step1b='$st1b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step1e'])) && ($_POST['step1e'] !=""))
            {
                $st1e = mysqli_real_escape_string($link, $_POST['step1e']);
                mysqli_query($link,"UPDATE processes SET step1e='$st1e' WHERE ID='$ID_p'");
            }
            
            if ((isset($_POST['step2'])) && ($_POST['step2'] !=""))
            {
                $step2 = mysqli_real_escape_string($link, $_POST['step2']);
                mysqli_query($link,"UPDATE processes SET step2='$step2' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step2b'])) && ($_POST['step2b'] !=""))
            {
                $st2b = mysqli_real_escape_string($link, $_POST['step2b']);
                mysqli_query($link,"UPDATE processes SET step2b='$st2b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step2e'])) && ($_POST['step2e'] !=""))
            {
                $st2e = mysqli_real_escape_string($link, $_POST['step2e']);
                mysqli_query($link,"UPDATE processes SET step2e='$st2e' WHERE ID='$ID_p'");
            }
            if ($st1e > $st2b && $st1b < $st2e)
    {
     
    }
            if ((isset($_POST['step3'])) && ($_POST['step3'] !=""))
            {
                $step3 = mysqli_real_escape_string($link, $_POST['step3']);
                mysqli_query($link,"UPDATE processes SET step3='$step3' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step3b'])) && ($_POST['step3b'] !=""))
            {
                $st3b = mysqli_real_escape_string($link, $_POST['step3b']);
                mysqli_query($link,"UPDATE processes SET step3b='$st3b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step3e'])) && ($_POST['step3e'] !=""))
            {
                $st3e = mysqli_real_escape_string($link, $_POST['step3e']);
                mysqli_query($link,"UPDATE processes SET step3e='$st3e' WHERE ID='$ID_p'");
            }
            if ($st2e > $st3b && $st2b < $st3e)
    {
     
    }
            if ((isset($_POST['step4'])) && ($_POST['step4'] !=""))
            {
                $step4 = mysqli_real_escape_string($link, $_POST['step4']);
                mysqli_query($link,"UPDATE processes SET step4='$step4' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step4b'])) && ($_POST['step4b'] !=""))
            {
                $st4b = mysqli_real_escape_string($link, $_POST['step4b']);
                mysqli_query($link,"UPDATE processes SET step4b='$st4b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step4e'])) && ($_POST['step4e'] !=""))
            {
                $st4e = mysqli_real_escape_string($link, $_POST['step4e']);
                mysqli_query($link,"UPDATE processes SET step4e='$st4e' WHERE ID='$ID_p'");
            }
            if ($st3e > $st4b && $st3b < $st4e)
    {
     
    }
        }
        else if ($Steps=='5')
        {
            if ((isset($_POST['step1'])) && ($_POST['step1'] !=""))
            {
                $step1 = mysqli_real_escape_string($link, $_POST['step1']);
                mysqli_query($link,"UPDATE processes SET step1='$step1' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step1b'])) && ($_POST['step1b'] !=""))
            {
                $st1b = mysqli_real_escape_string($link, $_POST['step1b']);
                mysqli_query($link,"UPDATE processes SET step1b='$st1b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step1e'])) && ($_POST['step1e'] !=""))
            {
                $st1e = mysqli_real_escape_string($link, $_POST['step1e']);
                mysqli_query($link,"UPDATE processes SET step1e='$st1e' WHERE ID='$ID_p'");
            }
            
            if ((isset($_POST['step2'])) && ($_POST['step2'] !=""))
            {
                $step2 = mysqli_real_escape_string($link, $_POST['step2']);
                mysqli_query($link,"UPDATE processes SET step2='$step2' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step2b'])) && ($_POST['step2b'] !=""))
            {
                $st2b = mysqli_real_escape_string($link, $_POST['step2b']);
                mysqli_query($link,"UPDATE processes SET step2b='$st2b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step2e'])) && ($_POST['step2e'] !=""))
            {
                $st2e = mysqli_real_escape_string($link, $_POST['step2e']);
                mysqli_query($link,"UPDATE processes SET step2e='$st2e' WHERE ID='$ID_p'");
            }
            if ($st1e > $st2b && $st1b < $st2e)
    {
     
    }
            if ((isset($_POST['step3'])) && ($_POST['step3'] !=""))
            {
                $step3 = mysqli_real_escape_string($link, $_POST['step3']);
                mysqli_query($link,"UPDATE processes SET step3='$step3' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step3b'])) && ($_POST['step3b'] !=""))
            {
                $st3b = mysqli_real_escape_string($link, $_POST['step3b']);
                mysqli_query($link,"UPDATE processes SET step3b='$st3b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step3e'])) && ($_POST['step3e'] !=""))
            {
                $st3e = mysqli_real_escape_string($link, $_POST['step3e']);
                mysqli_query($link,"UPDATE processes SET step3e='$st3e' WHERE ID='$ID_p'");
            }
            if ($st2e > $st3b && $st2b < $st3e)
    {
     
    }
            if ((isset($_POST['step4'])) && ($_POST['step4'] !=""))
            {
                $step4 = mysqli_real_escape_string($link, $_POST['step4']);
                mysqli_query($link,"UPDATE processes SET step4='$step4' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step4b'])) && ($_POST['step4b'] !=""))
            {
                $st4b = mysqli_real_escape_string($link, $_POST['step4b']);
                mysqli_query($link,"UPDATE processes SET step4b='$st4b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step4e'])) && ($_POST['step4e'] !=""))
            {
                $st4e = mysqli_real_escape_string($link, $_POST['step4e']);
                mysqli_query($link,"UPDATE processes SET step4e='$st4e' WHERE ID='$ID_p'");
            }
            if ($st3e > $st4b && $st3b < $st4e)
    {
     
    }
            if ((isset($_POST['step5'])) && ($_POST['step5'] !=""))
            {
                $step5 = mysqli_real_escape_string($link, $_POST['step5']);
                mysqli_query($link,"UPDATE processes SET step5='$step5' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step5b'])) && ($_POST['step5b'] !=""))
            {
                $st5b = mysqli_real_escape_string($link, $_POST['step5b']);
                mysqli_query($link,"UPDATE processes SET step5b='$st5b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step5e'])) && ($_POST['step5e'] !=""))
            {
                $st5e = mysqli_real_escape_string($link, $_POST['step5e']);
                mysqli_query($link,"UPDATE processes SET step5e='$st5e' WHERE ID='$ID_p'");
            }
            if ($st4e > $st5b && $st4b < $st5e)
    {
     
    }
        }
        else if ($Steps=='6')
        {
            if ((isset($_POST['step1'])) && ($_POST['step1'] !=""))
            {
                $step1 = mysqli_real_escape_string($link, $_POST['step1']);
                mysqli_query($link,"UPDATE processes SET step1='$step1' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step1b'])) && ($_POST['step1b'] !=""))
            {
                $st1b = mysqli_real_escape_string($link, $_POST['step1b']);
                mysqli_query($link,"UPDATE processes SET step1b='$st1b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step1e'])) && ($_POST['step1e'] !=""))
            {
                $st1e = mysqli_real_escape_string($link, $_POST['step1e']);
                mysqli_query($link,"UPDATE processes SET step1e='$st1e' WHERE ID='$ID_p'");
            }
            
            if ((isset($_POST['step2'])) && ($_POST['step2'] !=""))
            {
                $step2 = mysqli_real_escape_string($link, $_POST['step2']);
                mysqli_query($link,"UPDATE processes SET step2='$step2' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step2b'])) && ($_POST['step2b'] !=""))
            {
                $st2b = mysqli_real_escape_string($link, $_POST['step2b']);
                mysqli_query($link,"UPDATE processes SET step2b='$st2b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step2e'])) && ($_POST['step2e'] !=""))
            {
                $st2e = mysqli_real_escape_string($link, $_POST['step2e']);
                mysqli_query($link,"UPDATE processes SET step2e='$st2e' WHERE ID='$ID_p'");
            }
            if ($st1e > $st2b && $st1b < $st2e)
    {
     
    }
            if ((isset($_POST['step3'])) && ($_POST['step3'] !=""))
            {
                $step3 = mysqli_real_escape_string($link, $_POST['step3']);
                mysqli_query($link,"UPDATE processes SET step3='$step3' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step3b'])) && ($_POST['step3b'] !=""))
            {
                $st3b = mysqli_real_escape_string($link, $_POST['step3b']);
                mysqli_query($link,"UPDATE processes SET step3b='$st3b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step3e'])) && ($_POST['step3e'] !=""))
            {
                $st3e = mysqli_real_escape_string($link, $_POST['step3e']);
                mysqli_query($link,"UPDATE processes SET step3e='$st3e' WHERE ID='$ID_p'");
            }
            if ($st2e > $st3b && $st2b < $st3e)
    {
     
    }
            if ((isset($_POST['step4'])) && ($_POST['step4'] !=""))
            {
                $step4 = mysqli_real_escape_string($link, $_POST['step4']);
                mysqli_query($link,"UPDATE processes SET step4='$step4' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step4b'])) && ($_POST['step4b'] !=""))
            {
                $st4b = mysqli_real_escape_string($link, $_POST['step4b']);
                mysqli_query($link,"UPDATE processes SET step4b='$st4b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step4e'])) && ($_POST['step4e'] !=""))
            {
                $st4e = mysqli_real_escape_string($link, $_POST['step4e']);
                mysqli_query($link,"UPDATE processes SET step4e='$st4e' WHERE ID='$ID_p'");
            }
            if ($st3e > $st4b && $st3b < $st4e)
    {
     
    }
            if ((isset($_POST['step5'])) && ($_POST['step5'] !=""))
            {
                $step5 = mysqli_real_escape_string($link, $_POST['step5']);
                mysqli_query($link,"UPDATE processes SET step5='$step5' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step5b'])) && ($_POST['step5b'] !=""))
            {
                $st5b = mysqli_real_escape_string($link, $_POST['step5b']);
                mysqli_query($link,"UPDATE processes SET step5b='$st5b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step5e'])) && ($_POST['step5e'] !=""))
            {
                $st5e = mysqli_real_escape_string($link, $_POST['step5e']);
                mysqli_query($link,"UPDATE processes SET step5e='$st5e' WHERE ID='$ID_p'");
            }
            if ($st4e > $st5b && $st4b < $st5e)
    {
     
    }
            if ((isset($_POST['step6'])) && ($_POST['step6'] !=""))
            {
                $step6 = mysqli_real_escape_string($link, $_POST['step6']);
                mysqli_query($link,"UPDATE processes SET step6='$step6' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step6b'])) && ($_POST['step6b'] !=""))
            {
                $st6b = mysqli_real_escape_string($link, $_POST['step6b']);
                mysqli_query($link,"UPDATE processes SET step6b='$st6b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step6e'])) && ($_POST['step6e'] !=""))
            {
                $st6e = mysqli_real_escape_string($link, $_POST['step6e']);
                mysqli_query($link,"UPDATE processes SET step6e='$st6e' WHERE ID='$ID_p'");
            }
            if ($st5e > $st6b && $st5b < $st6e)
    {
     
    }
        }
        else if ($Steps=='7')
        {
            if ((isset($_POST['step1'])) && ($_POST['step1'] !=""))
            {
                $step1 = mysqli_real_escape_string($link, $_POST['step1']);
                mysqli_query($link,"UPDATE processes SET step1='$step1' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step1b'])) && ($_POST['step1b'] !=""))
            {
                $st1b = mysqli_real_escape_string($link, $_POST['step1b']);
                mysqli_query($link,"UPDATE processes SET step1b='$st1b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step1e'])) && ($_POST['step1e'] !=""))
            {
                $st1e = mysqli_real_escape_string($link, $_POST['step1e']);
                mysqli_query($link,"UPDATE processes SET step1e='$st1e' WHERE ID='$ID_p'");
            }
            
            if ((isset($_POST['step2'])) && ($_POST['step2'] !=""))
            {
                $step2 = mysqli_real_escape_string($link, $_POST['step2']);
                mysqli_query($link,"UPDATE processes SET step2='$step2' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step2b'])) && ($_POST['step2b'] !=""))
            {
                $st2b = mysqli_real_escape_string($link, $_POST['step2b']);
                mysqli_query($link,"UPDATE processes SET step2b='$st2b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step2e'])) && ($_POST['step2e'] !=""))
            {
                $st2e = mysqli_real_escape_string($link, $_POST['step2e']);
                mysqli_query($link,"UPDATE processes SET step2e='$st2e' WHERE ID='$ID_p'");
            }
            if ($st1e > $st2b && $st1b < $st2e)
    {
     
    }
            if ((isset($_POST['step3'])) && ($_POST['step3'] !=""))
            {
                $step3 = mysqli_real_escape_string($link, $_POST['step3']);
                mysqli_query($link,"UPDATE processes SET step3='$step3' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step3b'])) && ($_POST['step3b'] !=""))
            {
                $st3b = mysqli_real_escape_string($link, $_POST['step3b']);
                mysqli_query($link,"UPDATE processes SET step3b='$st3b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step3e'])) && ($_POST['step3e'] !=""))
            {
                $st3e = mysqli_real_escape_string($link, $_POST['step3e']);
                mysqli_query($link,"UPDATE processes SET step3e='$st3e' WHERE ID='$ID_p'");
            }
            if ($st2e > $st3b && $st2b < $st3e)
    {
     
    }
            if ((isset($_POST['step4'])) && ($_POST['step4'] !=""))
            {
                $step4 = mysqli_real_escape_string($link, $_POST['step4']);
                mysqli_query($link,"UPDATE processes SET step4='$step4' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step4b'])) && ($_POST['step4b'] !=""))
            {
                $st4b = mysqli_real_escape_string($link, $_POST['step4b']);
                mysqli_query($link,"UPDATE processes SET step4b='$st4b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step4e'])) && ($_POST['step4e'] !=""))
            {
                $st4e = mysqli_real_escape_string($link, $_POST['step4e']);
                mysqli_query($link,"UPDATE processes SET step4e='$st4e' WHERE ID='$ID_p'");
            }
            if ($st3e > $st4b && $st3b < $st4e)
    {
     
    }
            if ((isset($_POST['step5'])) && ($_POST['step5'] !=""))
            {
                $step5 = mysqli_real_escape_string($link, $_POST['step5']);
                mysqli_query($link,"UPDATE processes SET step5='$step5' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step5b'])) && ($_POST['step5b'] !=""))
            {
                $st5b = mysqli_real_escape_string($link, $_POST['step5b']);
                mysqli_query($link,"UPDATE processes SET step5b='$st5b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step5e'])) && ($_POST['step5e'] !=""))
            {
                $st5e = mysqli_real_escape_string($link, $_POST['step5e']);
                mysqli_query($link,"UPDATE processes SET step5e='$st5e' WHERE ID='$ID_p'");
            }
            if ($st4e > $st5b && $st4b < $st5e)
    {
     
    }
            if ((isset($_POST['step6'])) && ($_POST['step6'] !=""))
            {
                $step6 = mysqli_real_escape_string($link, $_POST['step6']);
                mysqli_query($link,"UPDATE processes SET step6='$step6' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step6b'])) && ($_POST['step6b'] !=""))
            {
                $st6b = mysqli_real_escape_string($link, $_POST['step6b']);
                mysqli_query($link,"UPDATE processes SET step6b='$st6b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step6e'])) && ($_POST['step6e'] !=""))
            {
                $st6e = mysqli_real_escape_string($link, $_POST['step6e']);
                mysqli_query($link,"UPDATE processes SET step6e='$st6e' WHERE ID='$ID_p'");
            }
            if ($st5e > $st6b && $st5b < $st6e)
    {
     
    }
            if ((isset($_POST['step7'])) && ($_POST['step7'] !=""))
            {
                $step7 = mysqli_real_escape_string($link, $_POST['step7']);
                mysqli_query($link,"UPDATE processes SET step7='$step7' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step7b'])) && ($_POST['step7b'] !=""))
            {
                $st7b = mysqli_real_escape_string($link, $_POST['step7b']);
                mysqli_query($link,"UPDATE processes SET step7b='$st7b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step7e'])) && ($_POST['step7e'] !=""))
            {
                $st7e = mysqli_real_escape_string($link, $_POST['step7e']);
                mysqli_query($link,"UPDATE processes SET step7e='$st7e' WHERE ID='$ID_p'");
            }
            if ($st6e > $st7b && $st6b < $st7e)
    {
     
    }
        }
        else if ($Steps=='8')
        {
            if ((isset($_POST['step1'])) && ($_POST['step1'] !=""))
            {
                $step1 = mysqli_real_escape_string($link, $_POST['step1']);
                mysqli_query($link,"UPDATE processes SET step1='$step1' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step1b'])) && ($_POST['step1b'] !=""))
            {
                $st1b = mysqli_real_escape_string($link, $_POST['step1b']);
                mysqli_query($link,"UPDATE processes SET step1b='$st1b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step1e'])) && ($_POST['step1e'] !=""))
            {
                $st1e = mysqli_real_escape_string($link, $_POST['step1e']);
                mysqli_query($link,"UPDATE processes SET step1e='$st1e' WHERE ID='$ID_p'");
            }
            
            if ((isset($_POST['step2'])) && ($_POST['step2'] !=""))
            {
                $step2 = mysqli_real_escape_string($link, $_POST['step2']);
                mysqli_query($link,"UPDATE processes SET step2='$step2' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step2b'])) && ($_POST['step2b'] !=""))
            {
                $st2b = mysqli_real_escape_string($link, $_POST['step2b']);
                mysqli_query($link,"UPDATE processes SET step2b='$st2b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step2e'])) && ($_POST['step2e'] !=""))
            {
                $st2e = mysqli_real_escape_string($link, $_POST['step2e']);
                mysqli_query($link,"UPDATE processes SET step2e='$st2e' WHERE ID='$ID_p'");
            }
            if ($st1e > $st2b && $st1b < $st2e)
    {
     
    }
            if ((isset($_POST['step3'])) && ($_POST['step3'] !=""))
            {
                $step3 = mysqli_real_escape_string($link, $_POST['step3']);
                mysqli_query($link,"UPDATE processes SET step3='$step3' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step3b'])) && ($_POST['step3b'] !=""))
            {
                $st3b = mysqli_real_escape_string($link, $_POST['step3b']);
                mysqli_query($link,"UPDATE processes SET step3b='$st3b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step3e'])) && ($_POST['step3e'] !=""))
            {
                $st3e = mysqli_real_escape_string($link, $_POST['step3e']);
                mysqli_query($link,"UPDATE processes SET step3e='$st3e' WHERE ID='$ID_p'");
            }
            if ($st2e > $st3b && $st2b < $st3e)
    {
     
    }
            if ((isset($_POST['step4'])) && ($_POST['step4'] !=""))
            {
                $step4 = mysqli_real_escape_string($link, $_POST['step4']);
                mysqli_query($link,"UPDATE processes SET step4='$step4' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step4b'])) && ($_POST['step4b'] !=""))
            {
                $st4b = mysqli_real_escape_string($link, $_POST['step4b']);
                mysqli_query($link,"UPDATE processes SET step4b='$st4b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step4e'])) && ($_POST['step4e'] !=""))
            {
                $st4e = mysqli_real_escape_string($link, $_POST['step4e']);
                mysqli_query($link,"UPDATE processes SET step4e='$st4e' WHERE ID='$ID_p'");
            }
            if ($st3e > $st4b && $st3b < $st4e)
    {
     
    }
            if ((isset($_POST['step5'])) && ($_POST['step5'] !=""))
            {
                $step5 = mysqli_real_escape_string($link, $_POST['step5']);
                mysqli_query($link,"UPDATE processes SET step5='$step5' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step5b'])) && ($_POST['step5b'] !=""))
            {
                $st5b = mysqli_real_escape_string($link, $_POST['step5b']);
                mysqli_query($link,"UPDATE processes SET step5b='$st5b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step5e'])) && ($_POST['step5e'] !=""))
            {
                $st5e = mysqli_real_escape_string($link, $_POST['step5e']);
                mysqli_query($link,"UPDATE processes SET step5e='$st5e' WHERE ID='$ID_p'");
            }
            if ($st4e > $st5b && $st4b < $st5e)
    {
     
    }
            if ((isset($_POST['step6'])) && ($_POST['step6'] !=""))
            {
                $step6 = mysqli_real_escape_string($link, $_POST['step6']);
                mysqli_query($link,"UPDATE processes SET step6='$step6' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step6b'])) && ($_POST['step6b'] !=""))
            {
                $st6b = mysqli_real_escape_string($link, $_POST['step6b']);
                mysqli_query($link,"UPDATE processes SET step6b='$st6b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step6e'])) && ($_POST['step6e'] !=""))
            {
                $st6e = mysqli_real_escape_string($link, $_POST['step6e']);
                mysqli_query($link,"UPDATE processes SET step6e='$st6e' WHERE ID='$ID_p'");
            }
            if ($st5e > $st6b && $st5b < $st6e)
    {
     
    }
            if ((isset($_POST['step7'])) && ($_POST['step7'] !=""))
            {
                $step7 = mysqli_real_escape_string($link, $_POST['step7']);
                mysqli_query($link,"UPDATE processes SET step7='$step7' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step7b'])) && ($_POST['step7b'] !=""))
            {
                $st7b = mysqli_real_escape_string($link, $_POST['step7b']);
                mysqli_query($link,"UPDATE processes SET step7b='$st7b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step7e'])) && ($_POST['step7e'] !=""))
            {
                $st7e = mysqli_real_escape_string($link, $_POST['step7e']);
                mysqli_query($link,"UPDATE processes SET step7e='$st7e' WHERE ID='$ID_p'");
            }
            if ($st6e > $st7b && $st6b < $st7e)
    {
     
    }
            if ((isset($_POST['step8'])) && ($_POST['step8'] !=""))
            {
                $step8 = mysqli_real_escape_string($link, $_POST['step8']);
                mysqli_query($link,"UPDATE processes SET step8='$step8' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step8b'])) && ($_POST['step8b'] !=""))
            {
                $st8b = mysqli_real_escape_string($link, $_POST['step8b']);
                mysqli_query($link,"UPDATE processes SET step8b='$st8b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step8e'])) && ($_POST['step8e'] !=""))
            {
                $st8e = mysqli_real_escape_string($link, $_POST['step8e']);
                mysqli_query($link,"UPDATE processes SET step8e='$st8e' WHERE ID='$ID_p'");
            }
            if ($st7e > $st8b && $st7b < $st8e)
    {
     
    }
        }
        else if ($Steps=='9')
        {
            if ((isset($_POST['step1'])) && ($_POST['step1'] !=""))
            {
                $step1 = mysqli_real_escape_string($link, $_POST['step1']);
                mysqli_query($link,"UPDATE processes SET step1='$step1' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step1b'])) && ($_POST['step1b'] !=""))
            {
                $st1b = mysqli_real_escape_string($link, $_POST['step1b']);
                mysqli_query($link,"UPDATE processes SET step1b='$st1b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step1e'])) && ($_POST['step1e'] !=""))
            {
                $st1e = mysqli_real_escape_string($link, $_POST['step1e']);
                mysqli_query($link,"UPDATE processes SET step1e='$st1e' WHERE ID='$ID_p'");
            }
            
            if ((isset($_POST['step2'])) && ($_POST['step2'] !=""))
            {
                $step2 = mysqli_real_escape_string($link, $_POST['step2']);
                mysqli_query($link,"UPDATE processes SET step2='$step2' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step2b'])) && ($_POST['step2b'] !=""))
            {
                $st2b = mysqli_real_escape_string($link, $_POST['step2b']);
                mysqli_query($link,"UPDATE processes SET step2b='$st2b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step2e'])) && ($_POST['step2e'] !=""))
            {
                $st2e = mysqli_real_escape_string($link, $_POST['step2e']);
                mysqli_query($link,"UPDATE processes SET step2e='$st2e' WHERE ID='$ID_p'");
            }
            if ($st1e > $st2b && $st1b < $st2e)
    {
     
    }
            if ((isset($_POST['step3'])) && ($_POST['step3'] !=""))
            {
                $step3 = mysqli_real_escape_string($link, $_POST['step3']);
                mysqli_query($link,"UPDATE processes SET step3='$step3' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step3b'])) && ($_POST['step3b'] !=""))
            {
                $st3b = mysqli_real_escape_string($link, $_POST['step3b']);
                mysqli_query($link,"UPDATE processes SET step3b='$st3b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step3e'])) && ($_POST['step3e'] !=""))
            {
                $st3e = mysqli_real_escape_string($link, $_POST['step3e']);
                mysqli_query($link,"UPDATE processes SET step3e='$st3e' WHERE ID='$ID_p'");
            }
            if ($st2e > $st3b && $st2b < $st3e)
    {
     
    }
            if ((isset($_POST['step4'])) && ($_POST['step4'] !=""))
            {
                $step4 = mysqli_real_escape_string($link, $_POST['step4']);
                mysqli_query($link,"UPDATE processes SET step4='$step4' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step4b'])) && ($_POST['step4b'] !=""))
            {
                $st4b = mysqli_real_escape_string($link, $_POST['step4b']);
                mysqli_query($link,"UPDATE processes SET step4b='$st4b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step4e'])) && ($_POST['step4e'] !=""))
            {
                $st4e = mysqli_real_escape_string($link, $_POST['step4e']);
                mysqli_query($link,"UPDATE processes SET step4e='$st4e' WHERE ID='$ID_p'");
            }
            if ($st3e > $st4b && $st3b < $st4e)
    {
     
    }
            if ((isset($_POST['step5'])) && ($_POST['step5'] !=""))
            {
                $step5 = mysqli_real_escape_string($link, $_POST['step5']);
                mysqli_query($link,"UPDATE processes SET step5='$step5' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step5b'])) && ($_POST['step5b'] !=""))
            {
                $st5b = mysqli_real_escape_string($link, $_POST['step5b']);
                mysqli_query($link,"UPDATE processes SET step5b='$st5b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step5e'])) && ($_POST['step5e'] !=""))
            {
                $st5e = mysqli_real_escape_string($link, $_POST['step5e']);
                mysqli_query($link,"UPDATE processes SET step5e='$st5e' WHERE ID='$ID_p'");
            }
            if ($st4e > $st5b && $st4b < $st5e)
    {
     
    }
            if ((isset($_POST['step6'])) && ($_POST['step6'] !=""))
            {
                $step6 = mysqli_real_escape_string($link, $_POST['step6']);
                mysqli_query($link,"UPDATE processes SET step6='$step6' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step6b'])) && ($_POST['step6b'] !=""))
            {
                $st6b = mysqli_real_escape_string($link, $_POST['step6b']);
                mysqli_query($link,"UPDATE processes SET step6b='$st6b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step6e'])) && ($_POST['step6e'] !=""))
            {
                $st6e = mysqli_real_escape_string($link, $_POST['step6e']);
                mysqli_query($link,"UPDATE processes SET step6e='$st6e' WHERE ID='$ID_p'");
            }
            if ($st5e > $st6b && $st5b < $st6e)
    {
     
    }
            if ((isset($_POST['step7'])) && ($_POST['step7'] !=""))
            {
                $step7 = mysqli_real_escape_string($link, $_POST['step7']);
                mysqli_query($link,"UPDATE processes SET step7='$step7' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step7b'])) && ($_POST['step7b'] !=""))
            {
                $st7b = mysqli_real_escape_string($link, $_POST['step7b']);
                mysqli_query($link,"UPDATE processes SET step7b='$st7b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step7e'])) && ($_POST['step7e'] !=""))
            {
                $st7e = mysqli_real_escape_string($link, $_POST['step7e']);
                mysqli_query($link,"UPDATE processes SET step7e='$st7e' WHERE ID='$ID_p'");
            }
            if ($st6e > $st7b && $st6b < $st7e)
    {
     
    }
            if ((isset($_POST['step8'])) && ($_POST['step8'] !=""))
            {
                $step8 = mysqli_real_escape_string($link, $_POST['step8']);
                mysqli_query($link,"UPDATE processes SET step8='$step8' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step8b'])) && ($_POST['step8b'] !=""))
            {
                $st8b = mysqli_real_escape_string($link, $_POST['step8b']);
                mysqli_query($link,"UPDATE processes SET step8b='$st8b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step8e'])) && ($_POST['step8e'] !=""))
            {
                $st8e = mysqli_real_escape_string($link, $_POST['step8e']);
                mysqli_query($link,"UPDATE processes SET step8e='$st8e' WHERE ID='$ID_p'");
            }
            if ($st7e > $st8b && $st7b < $st8e)
    {
     
    }
            if ((isset($_POST['step9'])) && ($_POST['step9'] !=""))
            {
                $step9 = mysqli_real_escape_string($link, $_POST['step9']);
                mysqli_query($link,"UPDATE processes SET step9='$step9' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step9b'])) && ($_POST['step9b'] !=""))
            {
                $st9b = mysqli_real_escape_string($link, $_POST['step9b']);
                mysqli_query($link,"UPDATE processes SET step9b='$st9b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step9e'])) && ($_POST['step9e'] !=""))
            {
                $st9e = mysqli_real_escape_string($link, $_POST['step9e']);
                mysqli_query($link,"UPDATE processes SET step9e='$st9e' WHERE ID='$ID_p'");
            }
            if ($st8e > $st9b && $st8b < $st9e)
    {
     
    }
        }
        else if ($Steps=='10')
        {
            if ((isset($_POST['step1'])) && ($_POST['step1'] !=""))
            {
                $step1 = mysqli_real_escape_string($link, $_POST['step1']);
                mysqli_query($link,"UPDATE processes SET step1='$step1' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step1b'])) && ($_POST['step1b'] !=""))
            {
                $st1b = mysqli_real_escape_string($link, $_POST['step1b']);
                mysqli_query($link,"UPDATE processes SET step1b='$st1b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step1e'])) && ($_POST['step1e'] !=""))
            {
                $st1e = mysqli_real_escape_string($link, $_POST['step1e']);
                mysqli_query($link,"UPDATE processes SET step1e='$st1e' WHERE ID='$ID_p'");
            }
            
            if ((isset($_POST['step2'])) && ($_POST['step2'] !=""))
            {
                $step2 = mysqli_real_escape_string($link, $_POST['step2']);
                mysqli_query($link,"UPDATE processes SET step2='$step2' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step2b'])) && ($_POST['step2b'] !=""))
            {
                $st2b = mysqli_real_escape_string($link, $_POST['step2b']);
                mysqli_query($link,"UPDATE processes SET step2b='$st2b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step2e'])) && ($_POST['step2e'] !=""))
            {
                $st2e = mysqli_real_escape_string($link, $_POST['step2e']);
                mysqli_query($link,"UPDATE processes SET step2e='$st2e' WHERE ID='$ID_p'");
            }
            if ($st1e > $st2b && $st1b < $st2e)
    {
     
    }
            if ((isset($_POST['step3'])) && ($_POST['step3'] !=""))
            {
                $step3 = mysqli_real_escape_string($link, $_POST['step3']);
                mysqli_query($link,"UPDATE processes SET step3='$step3' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step3b'])) && ($_POST['step3b'] !=""))
            {
                $st3b = mysqli_real_escape_string($link, $_POST['step3b']);
                mysqli_query($link,"UPDATE processes SET step3b='$st3b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step3e'])) && ($_POST['step3e'] !=""))
            {
                $st3e = mysqli_real_escape_string($link, $_POST['step3e']);
                mysqli_query($link,"UPDATE processes SET step3e='$st3e' WHERE ID='$ID_p'");
            }
            if ($st2e > $st3b && $st2b < $st3e)
    {
     
    }
            if ((isset($_POST['step4'])) && ($_POST['step4'] !=""))
            {
                $step4 = mysqli_real_escape_string($link, $_POST['step4']);
                mysqli_query($link,"UPDATE processes SET step4='$step4' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step4b'])) && ($_POST['step4b'] !=""))
            {
                $st4b = mysqli_real_escape_string($link, $_POST['step4b']);
                mysqli_query($link,"UPDATE processes SET step4b='$st4b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step4e'])) && ($_POST['step4e'] !=""))
            {
                $st4e = mysqli_real_escape_string($link, $_POST['step4e']);
                mysqli_query($link,"UPDATE processes SET step4e='$st4e' WHERE ID='$ID_p'");
            }
            if ($st3e > $st4b && $st3b < $st4e)
    {
     
    }
            if ((isset($_POST['step5'])) && ($_POST['step5'] !=""))
            {
                $step5 = mysqli_real_escape_string($link, $_POST['step5']);
                mysqli_query($link,"UPDATE processes SET step5='$step5' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step5b'])) && ($_POST['step5b'] !=""))
            {
                $st5b = mysqli_real_escape_string($link, $_POST['step5b']);
                mysqli_query($link,"UPDATE processes SET step5b='$st5b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step5e'])) && ($_POST['step5e'] !=""))
            {
                $st5e = mysqli_real_escape_string($link, $_POST['step5e']);
                mysqli_query($link,"UPDATE processes SET step5e='$st5e' WHERE ID='$ID_p'");
            }
            if ($st4e > $st5b && $st4b < $st5e)
    {
     
    }
            if ((isset($_POST['step6'])) && ($_POST['step6'] !=""))
            {
                $step6 = mysqli_real_escape_string($link, $_POST['step6']);
                mysqli_query($link,"UPDATE processes SET step6='$step6' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step6b'])) && ($_POST['step6b'] !=""))
            {
                $st6b = mysqli_real_escape_string($link, $_POST['step6b']);
                mysqli_query($link,"UPDATE processes SET step6b='$st6b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step6e'])) && ($_POST['step6e'] !=""))
            {
                $st6e = mysqli_real_escape_string($link, $_POST['step6e']);
                mysqli_query($link,"UPDATE processes SET step6e='$st6e' WHERE ID='$ID_p'");
            }
            if ($st5e > $st6b && $st5b < $st6e)
    {
     
    }
            if ((isset($_POST['step7'])) && ($_POST['step7'] !=""))
            {
                $step7 = mysqli_real_escape_string($link, $_POST['step7']);
                mysqli_query($link,"UPDATE processes SET step7='$step7' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step7b'])) && ($_POST['step7b'] !=""))
            {
                $st7b = mysqli_real_escape_string($link, $_POST['step7b']);
                mysqli_query($link,"UPDATE processes SET step7b='$st7b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step7e'])) && ($_POST['step7e'] !=""))
            {
                $st7e = mysqli_real_escape_string($link, $_POST['step7e']);
                mysqli_query($link,"UPDATE processes SET step7e='$st7e' WHERE ID='$ID_p'");
            }
            if ($st6e > $st7b && $st6b < $st7e)
    {
     
    }
            if ((isset($_POST['step8'])) && ($_POST['step8'] !=""))
            {
                $step8 = mysqli_real_escape_string($link, $_POST['step8']);
                mysqli_query($link,"UPDATE processes SET step8='$step8' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step8b'])) && ($_POST['step8b'] !=""))
            {
                $st8b = mysqli_real_escape_string($link, $_POST['step8b']);
                mysqli_query($link,"UPDATE processes SET step8b='$st8b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step8e'])) && ($_POST['step8e'] !=""))
            {
                $st8e = mysqli_real_escape_string($link, $_POST['step8e']);
                mysqli_query($link,"UPDATE processes SET step8e='$st8e' WHERE ID='$ID_p'");
            }
            if ($st7e > $st8b && $st7b < $st8e)
    {
     
    }
            if ((isset($_POST['step9'])) && ($_POST['step9'] !=""))
            {
                $step9 = mysqli_real_escape_string($link, $_POST['step9']);
                mysqli_query($link,"UPDATE processes SET step9='$step9' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step9b'])) && ($_POST['step9b'] !=""))
            {
                $st9b = mysqli_real_escape_string($link, $_POST['step9b']);
                mysqli_query($link,"UPDATE processes SET step9b='$st9b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step9e'])) && ($_POST['step9e'] !=""))
            {
                $st9e = mysqli_real_escape_string($link, $_POST['step9e']);
                mysqli_query($link,"UPDATE processes SET step9e='$st9e' WHERE ID='$ID_p'");
            }
            if ($st8e > $st9b && $st8b < $st9e)
    {
     
    }
            if ((isset($_POST['step10'])) && ($_POST['step10'] !=""))
            {
                $step10 = mysqli_real_escape_string($link, $_POST['step10']);
                mysqli_query($link,"UPDATE processes SET step10='$step10' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step10b'])) && ($_POST['step10b'] !=""))
            {
                $st10b = mysqli_real_escape_string($link, $_POST['step10b']);
                mysqli_query($link,"UPDATE processes SET step10b='$st10b' WHERE ID='$ID_p'");
            }
            if ((isset($_POST['step10e'])) && ($_POST['step10e'] !=""))
            {
                $st10e = mysqli_real_escape_string($link, $_POST['step10e']);
                mysqli_query($link,"UPDATE processes SET step10e='$st10e' WHERE ID='$ID_p'");
            }
            
            
            
        }
        $msg='<font color="#00cc00">Process successfully created!</font>';
        echo'<script>
        $(document) . ready(function() {
                $("[id=table_1]") . hide();
                $("[id=table_2]").show();
            });
        </script>';
        $link_post_1="process.php?id=$ID_p";
        }
        else
        {
            $msg = "<font color='#ff0000'>Time overlap error</font>";
        }
        

   
        
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
                <p id="p_size">New Process</p>
                <p><?php echo $msg; ?></p>
                <form name="process_form" action="new_process.php" method="post" enctype="multipart/form-data">
                <table id="table_1" border="0">
                        <tr>
                            <td><b>Title:</b></td>
                            <td><input type="text" name="titlos"></td>
                        </tr>
                        <tr><td><p></p></td></tr>
                        <tr>
                            <td><b>Description: </b></td>
                            <td><textarea id="word_count" cols="40" rows="5" name="perigr"></textarea></td>
                        </tr>
                        <tr><td><p></p></td></tr>
                        <tr> 
                            <td><b>Steps:</b></td>
                            <td>
                                <select name="steps" id='steps_num' onchange="test(this);">
                                    <option value="0" selected="selected"></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </td>
                        </tr>
                        <tr id="1st_1"><td><p></p></td></tr>
                        <tr id="1st_1">
                            <td><b><font color="#00cc00">Step 1:</font></b></td>
                            <td><input type="text" name="step1"></td>
                        </tr>
                        <tr id="1st_1"><td><p></p></td></tr>
                        <tr id="1st_1">
                            <td><b>Begins:</b></td>
                            <td><input type="date" name="step1b"></td>
                        </tr>
                        <tr id="1st_1"><td><p></p></td></tr>
                        <tr id="1st_1">
                            <td><b>Ends:</b></td>
                            <td><input type="date" name="step1e"></td>
                        </tr>
                        <tr id="2nd_2"><td><p></p></td></tr>
                        <tr id="2nd_2">
                            <td><b><font color="#00cc00">Step 2:</font></b></td>
                            <td><input type="text" name="step2"></td>
                        </tr>
                        <tr id="2nd_2"><td><p></p></td></tr>
                        <tr id="2nd_2">
                            <td><b>Begins:</b></td>
                            <td><input type="date" name="step2b"></td>
                        </tr>
                        <tr id="2nd_2"><td><p></p></td></tr>
                        <tr id="2nd_2">
                            <td><b>Ends:</b></td>
                            <td><input type="date" name="step2e"></td>
                        </tr>
                        <tr id="3rd_3"><td><p></p></td></tr>
                        <tr id="3rd_3">
                            <td><b><font color="#00cc00">Step 3:</font></b></td>
                            <td><input type="text" name="step3"></td>
                        </tr>
                        <tr id="3rd_3"><td><p></p></td></tr>
                        <tr id="3rd_3">
                            <td><b>Begins:</b></td>
                            <td><input type="date" name="step3b"></td>
                        </tr>
                        <tr id="3rd_3"><td><p></p></td></tr>
                        <tr id="3rd_3">
                            <td><b>Ends:</b></td>
                            <td><input type="date" name="step3e"></td>
                        </tr>
                        <tr id="4th_4"><td><p></p></td></tr>
                        <tr id="4th_4">
                            <td><b><font color="#00cc00">Step 4:</font></b></td>
                            <td><input type="text" name="step4"></td>
                        </tr>
                        <tr id="4th_4"><td><p></p></td></tr>
                        <tr id="4th_4">
                            <td><b>Begins:</b></td>
                            <td><input type="date" name="step4b"></td>
                        </tr>
                        <tr id="4th_4"><td><p></p></td></tr>
                        <tr id="4th_4">
                            <td><b>Ends:</b></td>
                            <td><input type="date" name="step4e"></td>
                        </tr>
                        <tr id="5th_5"><td><p></p></td></tr>
                        <tr id="5th_5">
                            <td><b><font color="#00cc00">Step 5:</font></b></td>
                            <td><input type="text" name="step5"></td>
                        </tr>
                        <tr id="5th_5"><td><p></p></td></tr>
                        <tr id="5th_5">
                            <td><b>Begins:</b></td>
                            <td><input type="date" name="step5b"></td>
                        </tr>
                        <tr id="5th_5"><td><p></p></td></tr>
                        <tr id="5th_5">
                            <td><b>Ends:</b></td>
                            <td><input type="date" name="step5e"></td>
                        </tr>
                        <tr id="6th_6"><td><p></p></td></tr>
                        <tr id="6th_6">
                            <td><b><font color="#00cc00">Step 6:</font></b></td>
                            <td><input type="text" name="step6"></td>
                        </tr>
                        <tr id="6th_6"><td><p></p></td></tr>
                        <tr id="6th_6">
                            <td><b>Begins:</b></td>
                            <td><input type="date" name="step6b"></td>
                        </tr>
                        <tr id="6th_6"><td><p></p></td></tr>
                        <tr id="6th_6">
                            <td><b>Ends:</b></td>
                            <td><input type="date" name="step6e"></td>
                        </tr>
                        <tr id="7th_7"><td><p></p></td></tr>
                        <tr id="7th_7">
                            <td><b><font color="#00cc00">Step 7:</font></b></td>
                            <td><input type="text" name="step7"></td>
                        </tr>
                        <tr id="7th_7"><td><p></p></td></tr>
                        <tr id="7th_7">
                            <td><b>Begins:</b></td>
                            <td><input type="date" name="step7b"></td>
                        </tr>
                        <tr id="7th_7"><td><p></p></td></tr>
                        <tr id="7th_7">
                            <td><b>Ends:</b></td>
                            <td><input type="date" name="step7e"></td>
                        </tr>
                        <tr id="8th_8"><td><p></p></td></tr>
                        <tr id="8th_8">
                            <td><b><font color="#00cc00">Step 8:</font></b></td>
                            <td><input type="text" name="step8"></td>
                        </tr>
                        <tr id="8th_8"><td><p></p></td></tr>
                        <tr id="8th_8">
                            <td><b>Begins:</b></td>
                            <td><input type="date" name="step8b"></td>
                        </tr>
                        <tr id="8th_8"><td><p></p></td></tr>
                        <tr id="8th_8">
                            <td><b>Ends:</b></td>
                            <td><input type="date" name="step8e"></td>
                        </tr>
                        <tr id="9th_9"><td><p></p></td></tr>
                        <tr id="9th_9">
                            <td><b><font color="#00cc00">Step 9:</font></b></td>
                            <td><input type="text" name="step9"></td>
                        </tr>
                        <tr id="9th_9"><td><p></p></td></tr>
                        <tr id="9th_9">
                            <td><b>Begins:</b></td>
                            <td><input type="date" name="step9b"></td>
                        </tr>
                        <tr id="9th_9"><td><p></p></td></tr>
                        <tr id="9th_9">
                            <td><b>Ends:</b></td>
                            <td><input type="date" name="step9e"></td>
                        </tr>
                        <tr id="10th_10"><td><p></p></td></tr>
                        <tr id="10th_10">
                            <td><b><font color="#00cc00">Step 10:</font></b></td>
                            <td><input type="text" name="step10"></td>
                        </tr>
                        <tr id="10th_10"><td><p></p></td></tr>
                        <tr id="10th_10">
                            <td><b>Begins:</b></td>
                            <td><input type="date" name="step10b"></td>
                        </tr>
                        <tr id="10th_10"><td><p></p></td></tr>
                        <tr id="10th_10">
                            <td><b>Ends:</b></td>
                            <td><input type="date" name="step10e"></td>
                        
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
                            <td><p>Click the button to see your new Process</p></td>
                        </tr>
                        <tr><td><p></p></td></tr>
                        <tr>
                            <td><center><input type="Submit" name="submit2" value="Show"></center></td>
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
