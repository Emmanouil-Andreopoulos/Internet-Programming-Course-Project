<!DOCTYPE html>
<html lang="en">
<?php
    include "connect.php";
    include "check.php";
    $msg = '';
    if( $_SESSION['errorm']!="")
    {
	$msg = $_SESSION['errorm'];
	$_SESSION['errorm']="";
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
    if(e.value=="0"){
        $("[id=1st_1]").hide();
        $("[id=2nd_2]").hide();
        $("[id=3rd_3]").hide();
    }
    else if(e.value=="1"){
        $("[id=1st_1]").show();
        $("[id=2nd_2]").hide();
        $("[id=3rd_3]").hide();
    }
    else if(e.value == "2"){
        $("[id=1st_1]").show();
        $("[id=2nd_2]").show();
        $("[id=3rd_3]").hide();
    }
    else if(e.value == "3"){
        $("[id=1st_1]").show();
        $("[id=2nd_2]").show();
        $("[id=3rd_3]").show();
    } 
}
    </script>
    <script>
    $(document).ready(function() {
      $("[id=1st_1]").hide();
      $("[id=2nd_2]").hide();
      $("[id=3rd_3]").hide();
    });
    </script>

<script>
    jQuery(function(){
    var max = 3;
    var checkboxes = $('input[name="pos_cat[]"]');

    checkboxes.change(function(){
        var current = checkboxes.filter(':checked').length;
        checkboxes.filter(':not(:checked)').prop('disabled', current >= max);
    });
});
</script>

<script>
    jQuery(function(){
    var max = 3;
    var checkboxes = $('input[name="edu[]"]');

    checkboxes.change(function(){
        var current = checkboxes.filter(':checked').length;
        checkboxes.filter(':not(:checked)').prop('disabled', current >= max);
    });
});
</script>
</head>
<?php

if ($_SERVER['REQUEST_METHOD'] == "POST" && (isset($_POST['submit1'])) && ($_POST['submit1'] == 'Finish')) {
$_SESSION['edit_info_1']='1';
$username123=$_SESSION['username'];
mysqli_query($link,"UPDATE users SET edit_info_1='1' WHERE Username='$username123'");

if (!file_exists("images/$username123")) {
    mkdir("images/$username123", 0777, true);
}

define("UPLOAD_DIR", "images/$username123/");

if (!empty($_FILES["myFile"])) {
    $myFile = $_FILES["myFile"];

    if ($myFile["error"] !== UPLOAD_ERR_OK) {
        echo "<p>An error occurred.</p>";
        
    }
    else
    {
        if (file_exists("images/$username123/avatar.png")) {
            unlink("images/$username123/avatar.png");
        }
        // ensure a safe filename
        $name = preg_replace("/[^A-Z0-9._-]/i", "_", 'avatar.png');

        // don't overwrite an existing file
        $i = 0;
        $parts = pathinfo($name);
        while (file_exists(UPLOAD_DIR . $name)) {
            $i++;
            $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
        }

        // preserve file from temporary directory
        $success = move_uploaded_file($myFile["tmp_name"],
            UPLOAD_DIR . $name);
        if (!$success) { 
            echo "<p>Unable to save file.</p>";
            
        }

        // set proper permissions on the new file
        chmod(UPLOAD_DIR . $name, 0644);
    }
}


    if ((isset($_POST['area_exp'])) && ($_POST['area_exp'] !=""))
    {
        $Eksidikefsi = mysqli_real_escape_string($link, $_POST['area_exp']);
        if ($Eksidikefsi=='none')
        {
            $Eksidikefsi="";
        }
        else if ($Eksidikefsi=='enviroment')
        {
            $Eksidikefsi="Περιβάλλον";
        }
        else if ($Eksidikefsi=='soc_admin')
        {
            $Eksidikefsi="Κοινωνία-Διοίκιση";
        }
        else if ($Eksidikefsi=='art')
        {
            $Eksidikefsi="Τέχνες";
        }
        else if ($Eksidikefsi=='science')
        {
            $Eksidikefsi="Θετικές Επιστήμες";
        }
        else if ($Eksidikefsi=='human')
        {
            $Eksidikefsi="Ανθρωπιστικές Επιστήμες";
        }
        else if ($Eksidikefsi=='agri')
        {
            $Eksidikefsi="Γεωργία";
        }
        else if ($Eksidikefsi=='lstock')
        {
            $Eksidikefsi="Κτηνοτροφία";
        }
        mysqli_query($link,"UPDATE users SET Eksidikefsi='$Eksidikefsi' WHERE Username='$username123'");
    }
    if ((isset($_POST['pos'])) && ($_POST['pos'] !=""))
    {
        $Thesi = mysqli_real_escape_string($link, $_POST['pos']);
        mysqli_query($link,"UPDATE users SET Thesi='$Thesi' WHERE Username='$username123'");
    }
    else
    {
        mysqli_query($link,"UPDATE users SET Thesi='' WHERE Username='$username123'");
    }
    
        if ((isset($_POST['pos_cat'])) && ($_POST['pos_cat'] !=""))
        {
            $Katigoria_thesis1 = $_POST['pos_cat'];
            if (!empty($Katigoria_thesis1[0])) {
                
                if ($Katigoria_thesis1[0] == "admin") {
                    $Katigoria_thesis1[0] = "Διοικητική";
                } else if ($Katigoria_thesis1[0]=="acad") {
                    $Katigoria_thesis1[0] = "Ακαδημαϊκή";
                } else if($Katigoria_thesis1[0]=="for_ch") {
                    $Katigoria_thesis1[0] = "Προϊστάμενος-Πρόεδρος";
                } else if($Katigoria_thesis1[0]=="selfe") {
                    $Katigoria_thesis1[0] = "Αυτοαπασχολούμενος";
                } else if($Katigoria_thesis1[0]=="une") {
                    $Katigoria_thesis1[0] = "Άνεργος";
                }
            mysqli_query($link,"UPDATE users SET Katigoria1='$Katigoria_thesis1[0]' WHERE Username='$username123'");
            }
            else
            {
                mysqli_query($link,"UPDATE users SET Katigoria1='' WHERE Username='$username123'");
            }
            
            if (!empty($Katigoria_thesis1[1])) {
                if ($Katigoria_thesis1[1] == "admin") {
                    $Katigoria_thesis1[1] = "Διοικητική";
                } else if ($Katigoria_thesis1[1]=="acad") {
                    $Katigoria_thesis1[1] = "Ακαδημαϊκή";
                } else if($Katigoria_thesis1[1]=="for_ch") {
                    $Katigoria_thesis1[1] = "Προϊστάμενος-Πρόεδρος";
                } else if($Katigoria_thesis1[1]=="selfe") {
                    $Katigoria_thesis1[1] = "Αυτοαπασχολούμενος";
                } else if($Katigoria_thesis1[1]=="une") {
                    $Katigoria_thesis1[1] = "Άνεργος";
                }
                mysqli_query($link,"UPDATE users SET Katigoria2='$Katigoria_thesis1[1]' WHERE Username='$username123'");
            }
            else
            {
                mysqli_query($link,"UPDATE users SET Katigoria2='' WHERE Username='$username123'");
            }

            if (!empty($Katigoria_thesis1[2])) {
                if ($Katigoria_thesis1[2] == "admin") {
                    $Katigoria_thesis1[2] = "Διοικητική";
                } else if ($Katigoria_thesis1[2]=="acad") {
                    $Katigoria_thesis1[2] = "Ακαδημαϊκή";
                } else if($Katigoria_thesis1[2]=="for_ch") {
                    $Katigoria_thesis1[2] = "Προϊστάμενος-Πρόεδρος";
                } else if($Katigoria_thesis1[2]=="selfe") {
                    $Katigoria_thesis1[2] = "Αυτοαπασχολούμενος";
                } else if($Katigoria_thesis1[2]=="une") {
                    $Katigoria_thesis1[2] = "Άνεργος";
                }
                mysqli_query($link,"UPDATE users SET Katigoria3='$Katigoria_thesis1[2]' WHERE Username='$username123'");
            }
            else
            {
                mysqli_query($link,"UPDATE users SET Katigoria3='' WHERE Username='$username123'");
            }
        }
        else
        {
            mysqli_query($link,"UPDATE users SET Katigoria1='' WHERE Username='$username123'");
            mysqli_query($link,"UPDATE users SET Katigoria2='' WHERE Username='$username123'");
            mysqli_query($link,"UPDATE users SET Katigoria3='' WHERE Username='$username123'");
        }
        
    if ((isset($_POST['org'])) && ($_POST['org'] !=""))
    {
        $Organismos = mysqli_real_escape_string($link, $_POST['org']);
        mysqli_query($link,"UPDATE users SET Organismos='$Organismos' WHERE Username='$username123'");
    }
    else
    {
        mysqli_query($link,"UPDATE users SET Organismos='' WHERE Username='$username123'");
    }
     
    

            
    if ((isset($_POST['org_cat'])) && ($_POST['org_cat'] !=""))
    {
        $Katigoria_Organismou = mysqli_real_escape_string($link, $_POST['org_cat']);
        if ($Katigoria_Organismou=="p_sec")
        {
            $Katigoria_Organismou="Δημόσιος Τομέας";
        }
        else if ($Katigoria_Organismou=="none")
        {
            $Katigoria_Organismou="";
        }
        else if ($Katigoria_Organismou=="multi_nation")
        {
            $Katigoria_Organismou="Πολυεθνική";
        }
        else if ($Katigoria_Organismou=="middle")
        {
            $Katigoria_Organismou="Μικρομεσαία Επιχείριση";
        }
        else if ($Katigoria_Organismou=="small")
        {
            $Katigoria_Organismou="Μικρή ή Ατομική Επιχείριση";
        }
        else if ($Katigoria_Organismou=="mko")
        {
            $Katigoria_Organismou="Μ.Κ.Ο.";
        }
        mysqli_query($link,"UPDATE users SET Katigoria_o='$Katigoria_Organismou' WHERE Username='$username123'");
    }
    if ((isset($_POST['gender'])) && ($_POST['gender'] !=""))
    {
        $Filo = mysqli_real_escape_string($link, $_POST['gender']);
        if ($Filo=="male")
        {
            $Filo="Άνδρας";
        }
        else if ($Filo=="female")
        {
            $Filo="Γυναίκα";
        }
        mysqli_query($link,"UPDATE users SET Filo='$Filo' WHERE Username='$username123'");
    }
    if ((isset($_POST['edu'])) && ($_POST['edu'] !=""))
        {
            $Spoudes1 = $_POST['edu'];
            if (!empty($Spoudes1[0])) {
                if ($Spoudes1[0] == "tei") {
                    $Spoudes1[0] = "ΤΕΙ";
                } else if ($Spoudes1[0]=="aei") {
                    $Spoudes1[0] = "ΑΕΙ";
                } else if($Spoudes1[0]=="master") {
                    $Spoudes1[0] = "MASTER";
                } else if($Spoudes1[0]=="phd") {
                    $Spoudes1[0] = "PHD";
                } 
                mysqli_query($link,"UPDATE users SET Spoudes1='$Spoudes1[0]' WHERE Username='$username123'");
            }
            else
            {
                mysqli_query($link,"UPDATE users SET Spoudes1='' WHERE Username='$username123'");
            }
            
            if (!empty($Spoudes1[1])) {
                if ($Spoudes1[1] == "tei") {
                    $Spoudes1[1] = "ΤΕΙ";
                } else if ($Spoudes1[1]=="aei") {
                    $Spoudes1[1] = "ΑΕΙ";
                } else if($Spoudes1[1]=="master") {
                    $Spoudes1[1] = "MASTER";
                } else if($Spoudes1[1]=="phd") {
                    $Spoudes1[1] = "PHD";
                } 
                mysqli_query($link,"UPDATE users SET Spoudes2='$Spoudes1[1]' WHERE Username='$username123'");
            }
            else
            {
                mysqli_query($link,"UPDATE users SET Spoudes2='' WHERE Username='$username123'");
            }

            if (!empty($Spoudes1[2])) {
                if ($Spoudes1[2] == "tei") {
                    $Spoudes1[2] = "ΤΕΙ";
                } else if ($Spoudes1[2]=="aei") {
                    $Spoudes1[2] = "ΑΕΙ";
                } else if($Spoudes1[2]=="master") {
                    $Spoudes1[2] = "MASTER";
                } else if($Spoudes1[2]=="phd") {
                    $Spoudes1[2] = "PHD";
                } 
                mysqli_query($link,"UPDATE users SET Spoudes3='$Spoudes1[2]' WHERE Username='$username123'");
            }
            else
            {
                mysqli_query($link,"UPDATE users SET Spoudes3='' WHERE Username='$username123'");
            }
        }
        else
        {
            mysqli_query($link,"UPDATE users SET Spoudes1='' WHERE Username='$username123'");
            mysqli_query($link,"UPDATE users SET Spoudes2='' WHERE Username='$username123'");
            mysqli_query($link,"UPDATE users SET Spoudes3='' WHERE Username='$username123'");
        }
    
    if ((isset($_POST['for_lang'])) && ($_POST['for_lang'] !=""))
    {
        $Arithmos_G = mysqli_real_escape_string($link, $_POST['for_lang']);
        if ($Arithmos_G=='0')
        {
            $Arithmos_G="0";
            mysqli_query($link,"UPDATE users SET Ksenes1='' WHERE Username='$username123'");
            mysqli_query($link,"UPDATE users SET Ksenes2='' WHERE Username='$username123'");
            mysqli_query($link,"UPDATE users SET Ksenes3='' WHERE Username='$username123'");
            mysqli_query($link,"UPDATE users SET ks1_s='' WHERE Username='$username123'");
            mysqli_query($link,"UPDATE users SET ks2_s='' WHERE Username='$username123'");
            mysqli_query($link,"UPDATE users SET ks3_s='' WHERE Username='$username123'");
            mysqli_query($link,"UPDATE users SET ks1_w='' WHERE Username='$username123'");
            mysqli_query($link,"UPDATE users SET ks2_w='' WHERE Username='$username123'");
            mysqli_query($link,"UPDATE users SET ks3_w='' WHERE Username='$username123'");
        }
        else if ($Arithmos_G=='1')
        {
            if ((isset($_POST['1lang'])) && ($_POST['1lang'] !=""))
            {
                $Ksenes1 = mysqli_real_escape_string($link, $_POST['1lang']);
                mysqli_query($link,"UPDATE users SET Ksenes1='$Ksenes1' WHERE Username='$username123'");
            }
            if ((isset($_POST['1s'])) && ($_POST['1s'] !=""))
                {
                    $Ks1s = mysqli_real_escape_string($link, $_POST['1s']);
                    if ($Ks1s=="1sa1")
                    {
                        $Ks1s="A1";
                    }
                    else if ($Ks1s=="1sa2")
                    {
                        $Ks1s="A2";
                    }
                    else if ($Ks1s=="1sb1")
                    {
                        $Ks1s="B1";
                    }
                    else if ($Ks1s=="1sb2")
                    {
                        $Ks1s="B2";
                    }
                    else if ($Ks1s=="1sc1")
                    {
                        $Ks1s="C1";
                    }
                    else if ($Ks1s=="1sc2")
                    {
                        $Ks1s="C2";
                    }
                    mysqli_query($link,"UPDATE users SET ks1_s='$Ks1s' WHERE Username='$username123'");
                }
                if ((isset($_POST['1w'])) && ($_POST['1w'] !=""))
                {
                    $Ks1w = mysqli_real_escape_string($link, $_POST['1w']);
                    if ($Ks1w=="1wa1")
                    {
                        $Ks1w="A1";
                    }
                    else if ($Ks1w=="1wa2")
                    {
                        $Ks1w="A2";
                    }
                    else if ($Ks1w=="1wb1")
                    {
                        $Ks1w="B1";
                    }
                    else if ($Ks1w=="1wb2")
                    {
                        $Ks1w="B2";
                    }
                    else if ($Ks1w=="1wc1")
                    {
                        $Ks1w="C1";
                    }
                    else if ($Ks1w=="1wc2")
                    {
                        $Ks1w="C2";
                    }
                    mysqli_query($link,"UPDATE users SET ks1_w='$Ks1w' WHERE Username='$username123'");
                }
        }
        else if ($Arithmos_G=='2')
        {
            if ((isset($_POST['1lang'])) && ($_POST['1lang'] !=""))
            {
                $Ksenes1 = mysqli_real_escape_string($link, $_POST['1lang']);
                mysqli_query($link,"UPDATE users SET Ksenes1='$Ksenes1' WHERE Username='$username123'");
            }
            if ((isset($_POST['1w'])) && ($_POST['1w'] !=""))
                    {
                        $Ks1w = mysqli_real_escape_string($link, $_POST['1w']);
                        if ($Ks1w=="1wa1")
                        {
                            $Ks1w="A1";
                        }
                        else if ($Ks1w=="1wa2")
                        {
                            $Ks1w="A2";
                        }
                        else if ($Ks1w=="1wb1")
                        {
                            $Ks1w="B1";
                        }
                        else if ($Ks1w=="1wb2")
                        {
                            $Ks1w="B2";
                        }
                        else if ($Ks1w=="1wc1")
                        {
                            $Ks1w="C1";
                        }
                        else if ($Ks1w=="1wc2")
                        {
                            $Ks1w="C2";
                        }
                        mysqli_query($link,"UPDATE users SET ks1_w='$Ks1w' WHERE Username='$username123'");
                    }
                    if ((isset($_POST['1s'])) && ($_POST['1s'] !=""))
                    {
                        $Ks1s = mysqli_real_escape_string($link, $_POST['1s']);
                        if ($Ks1s=="1sa1")
                        {
                            $Ks1s="A1";
                        }
                        else if ($Ks1s=="1sa2")
                        {
                            $Ks1s="A2";
                        }
                        else if ($Ks1s=="1sb1")
                        {
                            $Ks1s="B1";
                        }
                        else if ($Ks1s=="1sb2")
                        {
                            $Ks1s="B2";
                        }
                        else if ($Ks1s=="1sc1")
                        {
                            $Ks1s="C1";
                        }
                        else if ($Ks1s=="1sc2")
                        {
                            $Ks1s="C2";
                        }
                        mysqli_query($link,"UPDATE users SET ks1_s='$Ks1s' WHERE Username='$username123'");
                    }
                    if ((isset($_POST['2lang'])) && ($_POST['2lang'] !=""))
                    {
                        $Ksenes2 = mysqli_real_escape_string($link, $_POST['2lang']);
                        mysqli_query($link,"UPDATE users SET Ksenes2='$Ksenes2' WHERE Username='$username123'");
                    }
                    if ((isset($_POST['2w'])) && ($_POST['2w'] !=""))
                    {
                        $Ks2w = mysqli_real_escape_string($link, $_POST['2w']);
                        if ($Ks2w=="2wa1")
                        {
                            $Ks2w="A1";
                        }
                        else if ($Ks2w=="2wa2")
                        {
                            $Ks2w="A2";
                        }
                        else if ($Ks2w=="2wb1")
                        {
                            $Ks2w="B1";
                        }
                        else if ($Ks2w=="2wb2")
                        {
                            $Ks2w="B2";
                        }
                        else if ($Ks2w=="2wc1")
                        {
                            $Ks2w="C1";
                        }
                        else if ($Ks2w=="2wc2")
                        {
                            $Ks2w="C2";
                        }
                        mysqli_query($link,"UPDATE users SET ks2_w='$Ks2w' WHERE Username='$username123'");
                    }
                    if ((isset($_POST['2s'])) && ($_POST['2s'] !=""))
                    {
                        $Ks2s = mysqli_real_escape_string($link, $_POST['2s']);
                        if ($Ks2s=="2sa1")
                        {
                            $Ks2s="A1";
                        }
                        else if ($Ks2s=="2sa2")
                        {
                            $Ks2s="A2";
                        }
                        else if ($Ks2s=="2sb1")
                        {
                            $Ks2s="B1";
                        }
                        else if ($Ks2s=="2sb2")
                        {
                            $Ks2s="B2";
                        }
                        else if ($Ks2s=="2sc1")
                        {
                            $Ks2s="C1";
                        }
                        else if ($Ks2s=="2sc2")
                        {
                            $Ks2s="C2";
                        }
                        mysqli_query($link,"UPDATE users SET ks2_s='$Ks2s' WHERE Username='$username123'");
                    }
        }
        else if ($Arithmos_G=='3')
        {
            if ((isset($_POST['1lang'])) && ($_POST['1lang'] !=""))
            {
                $Ksenes1 = mysqli_real_escape_string($link, $_POST['1lang']);
                mysqli_query($link,"UPDATE users SET Ksenes1='$Ksenes1' WHERE Username='$username123'");
            }
            if ((isset($_POST['1w'])) && ($_POST['1w'] !=""))
                {
                    $Ks1w = mysqli_real_escape_string($link, $_POST['1w']);
                    if ($Ks1w=="1wa1")
                    {
                        $Ks1w="A1";
                    }
                    else if ($Ks1w=="1wa2")
                    {
                        $Ks1w="A2";
                    }
                    else if ($Ks1w=="1wb1")
                    {
                        $Ks1w="B1";
                    }
                    else if ($Ks1w=="1wb2")
                    {
                        $Ks1w="B2";
                    }
                    else if ($Ks1w=="1wc1")
                    {
                        $Ks1w="C1";
                    }
                    else if ($Ks1w=="1wc2")
                    {
                        $Ks1w="C2";
                    }
                    mysqli_query($link,"UPDATE users SET ks1_w='$Ks1w' WHERE Username='$username123'");
                }
                if ((isset($_POST['1s'])) && ($_POST['1s'] !=""))
                {
                    $Ks1s = mysqli_real_escape_string($link, $_POST['1s']);
                    if ($Ks1s=="1sa1")
                    {
                        $Ks1s="A1";
                    }
                    else if ($Ks1s=="1sa2")
                    {
                        $Ks1s="A2";
                    }
                    else if ($Ks1s=="1sb1")
                    {
                        $Ks1s="B1";
                    }
                    else if ($Ks1s=="1sb2")
                    {
                        $Ks1s="B2";
                    }
                    else if ($Ks1s=="1sc1")
                    {
                        $Ks1s="C1";
                    }
                    else if ($Ks1s=="1sc2")
                    {
                        $Ks1s="C2";
                    }
                    mysqli_query($link,"UPDATE users SET ks1_s='$Ks1s' WHERE Username='$username123'");
                }
                if ((isset($_POST['2lang'])) && ($_POST['2lang'] !=""))
                {
                    $Ksenes2 = mysqli_real_escape_string($link, $_POST['2lang']);
                    mysqli_query($link,"UPDATE users SET Ksenes2='$Ksenes2' WHERE Username='$username123'");
                }
                if ((isset($_POST['2w'])) && ($_POST['2w'] !=""))
                {
                    $Ks2w = mysqli_real_escape_string($link, $_POST['2w']);
                    if ($Ks2w=="2wa1")
                    {
                        $Ks2w="A1";
                    }
                    else if ($Ks2w=="2wa2")
                    {
                        $Ks2w="A2";
                    }
                    else if ($Ks2w=="2wb1")
                    {
                        $Ks2w="B1";
                    }
                    else if ($Ks2w=="2wb2")
                    {
                        $Ks2w="B2";
                    }
                    else if ($Ks2w=="2wc1")
                    {
                        $Ks2w="C1";
                    }
                    else if ($Ks2w=="2wc2")
                    {
                        $Ks2w="C2";
                    }
                    mysqli_query($link,"UPDATE users SET ks2_w='$Ks2w' WHERE Username='$username123'");
                }
                if ((isset($_POST['2s'])) && ($_POST['2s'] !=""))
                {
                    $Ks2s = mysqli_real_escape_string($link, $_POST['2s']);
                    if ($Ks2s=="2sa1")
                    {
                        $Ks2s="A1";
                    }
                    else if ($Ks2s=="2sa2")
                    {
                        $Ks2s="A2";
                    }
                    else if ($Ks2s=="2sb1")
                    {
                        $Ks2s="B1";
                    }
                    else if ($Ks2s=="2sb2")
                    {
                        $Ks2s="B2";
                    }
                    else if ($Ks2s=="2sc1")
                    {
                        $Ks2s="C1";
                    }
                    else if ($Ks2s=="2sc2")
                    {
                        $Ks2s="C2";
                    }
                    mysqli_query($link,"UPDATE users SET ks2_s='$Ks2s' WHERE Username='$username123'");
                }
                if ((isset($_POST['3lang'])) && ($_POST['3lang'] !=""))
                {
                    $Ksenes3 = mysqli_real_escape_string($link, $_POST['3lang']);
                    mysqli_query($link,"UPDATE users SET Ksenes3='$Ksenes3' WHERE Username='$username123'");
                }
                if ((isset($_POST['3w'])) && ($_POST['3w'] !=""))
                {
                    $Ks3w = mysqli_real_escape_string($link, $_POST['3w']);
                    if ($Ks3w=="3wa1")
                    {
                        $Ks3w="A1";
                    }
                    else if ($Ks3w=="3wa2")
                    {
                        $Ks3w="A2";
                    }
                    else if ($Ks3w=="3wb1")
                    {
                        $Ks3w="B1";
                    }
                    else if ($Ks3w=="3wb2")
                    {
                        $Ks3w="B2";
                    }
                    else if ($Ks3w=="3wc1")
                    {
                        $Ks3w="C1";
                    }
                    else if ($Ks3w=="3wc2")
                    {
                        $Ks3w="C2";
                    }
                    mysqli_query($link,"UPDATE users SET ks3_w='$Ks3w' WHERE Username='$username123'");
                }
                if ((isset($_POST['3s'])) && ($_POST['3s'] !=""))
                {
                    $Ks3s = mysqli_real_escape_string($link, $_POST['3s']);
                    if ($Ks3s=="3sa1")
                    {
                        $Ks3s="A1";
                    }
                    else if ($Ks3s=="3sa2")
                    {
                        $Ks3s="A2";
                    }
                    else if ($Ks3s=="3sb1")
                    {
                        $Ks3s="B1";
                    }
                    else if ($Ks3s=="3sb2")
                    {
                        $Ks3s="B2";
                    }
                    else if ($Ks3s=="3sc1")
                    {
                        $Ks3s="C1";
                    }
                    else if ($Ks3s=="3sc2")
                    {
                        $Ks3s="C2";
                    }
                    mysqli_query($link,"UPDATE users SET ks3_s='$Ks3s' WHERE Username='$username123'");
                }
        }
        mysqli_query($link,"UPDATE users SET Arithmos_G='$Arithmos_G' WHERE Username='$username123'");
    }
    if ((isset($_POST['s1'])) && ($_POST['s1'] !=""))
    {
        $Ethnikotita = mysqli_real_escape_string($link, $_POST['s1']);
        mysqli_query($link,"UPDATE users SET Ethnikotita='$Ethnikotita' WHERE Username='$username123'");
    }
    else
    {
        mysqli_query($link,"UPDATE users SET Ethnikotita='' WHERE Username='$username123'");
    }
    if ((isset($_POST['city'])) && ($_POST['city'] !=""))
    {
        $Poli_Diamonis = mysqli_real_escape_string($link, $_POST['city']);
        mysqli_query($link,"UPDATE users SET Poli='$Poli_Diamonis' WHERE Username='$username123'");
    }
    else
    {
        mysqli_query($link,"UPDATE users SET Poli='' WHERE Username='$username123'");
    }
    
      
}
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM `Users` WHERE `Username` = '$username'";
    $retval = mysqli_query($link, $sql) or die(header("Location: error.php?msg=dat_er"));
    if (!$retval) {
        die('Could not get data: ' . mysql_error());
    }
    $row = mysqli_fetch_array($retval);
    $thesi_11 = $row['Thesi'];
    $organismos_11 = $row['Organismos'];
    $poli_11 = $row['Poli'];
    $ethnikotita_11 = $row['Ethnikotita'];
    $Eksidikefsi_11 = $row['Eksidikefsi'];
    $Katigoria1_11 = $row['Katigoria1'];
    $Katigoria2_22 = $row['Katigoria2'];
    $Katigoria3_33 = $row['Katigoria3'];
    $Spoudes1_11 = $row['Spoudes1'];
    $Spoudes2_22 = $row['Spoudes2'];
    $Spoudes3_33 = $row['Spoudes3'];
    $Katigoria_Organismou_11 = $row['Katigoria_o'];
    $filo_11 = $row['Filo'];
    
        if ($Eksidikefsi_11=='')
        {
            $Eksidikefsi_11="none";
        }
        else if ($Eksidikefsi_11=='Περιβάλλον')
        {
            $Eksidikefsi_11="enviroment";
        }
        else if ($Eksidikefsi_11=='Κοινωνία-Διοίκιση')
        {
            $Eksidikefsi_11="soc_admin";
        }
        else if ($Eksidikefsi_11=='Τέχνες')
        {
            $Eksidikefsi_11="art";
        }
        else if ($Eksidikefsi_11=='Θετικές Επιστήμες')
        {
            $Eksidikefsi_11="science";
        }
        else if ($Eksidikefsi_11=='Ανθρωπιστικές Επιστήμες')
        {
            $Eksidikefsi_11="human";
        }
        else if ($Eksidikefsi_11=='Γεωργία')
        {
            $Eksidikefsi_11="agri";
        }
        else if ($Eksidikefsi_11=='Κτηνοτροφία')
        {
            $Eksidikefsi_11="lstock";
        }
        
        if ($Katigoria_Organismou_11=="Δημόσιος Τομέας")
        {
            $Katigoria_Organismou_11="p_sec";
        }
        else if ($Katigoria_Organismou_11=="")
        {
            $Katigoria_Organismou_11="none";
        }
        else if ($Katigoria_Organismou_11=="Πολυεθνική")
        {
            $Katigoria_Organismou_11="multi_nation";
        }
        else if ($Katigoria_Organismou_11=="Μικρομεσαία Επιχείριση")
        {
            $Katigoria_Organismou_11="middle";
        }
        else if ($Katigoria_Organismou_11=="Μικρή ή Ατομική Επιχείριση")
        {
            $Katigoria_Organismou_11="small";
        }
        else if ($Katigoria_Organismou_11=="Μ.Κ.Ο.")
        {
            $Katigoria_Organismou_11="mko";
        }
        
        if ($filo_11=="Άνδρας")
        {
            $filo_11="#radio_1";
        }
        else if ($filo_11=="Γυναίκα")
        {
            $filo_11="#radio_2";
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
                        <a href="logout.php">Logout</a>
                    </li>
                    <li>
                        <a href="profile.php">Profile</a>
                    </li>
                    <li>
                        <a href="edit_info.php">Edit information</a>
                    </li>
                    <li>
                        <a href="new_process.php">New Process</a>
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
                <p id="p_size">Edit Information</p>
                <p><?php echo $msg; ?></p>
                
                <form name="edit_form" action="edit_info.php" method="POST" enctype="multipart/form-data">
                <table border="0">
                        <tr>
                            <td><b>Εικόνα:</b></td>
                            <td><input type="file" name="myFile" accept="image/*"/></td>
                        </tr>
                        <tr><td><p></p></td></tr>
                        <tr>
                            <td><b>Εξειδίκευση:</b></td>
                            <td><select id="area_exp" name="area_exp">
                                <option value="none"></option>
                                <option value="enviroment">Περιβάλλον</option>
                                <option value="soc_admin">Κοινωνία-Διοίκιση</option>
                                <option value="art">Τέχνες</option>
                                <option value="science">Θετικές Επιστήμες</option>
                                <option value="human">Ανθρωπιστικές Επιστήμες</option>
                                <option value="agri">Γεωργία</option>
                                <option value="lstock">Κτηνοτροφία</option>
                              </select></td>
                        </tr>
                        <tr><td><p></p></td></tr>
                        <tr>
                            <td><b>Θέση:</b></td>
                            <td><input type="text" value="<?php echo$thesi_11;?>" name="pos"></td>    
                        </tr>
                        <tr><td><p></p></td></tr>
                        <tr>
                            <td><b> Κατηγορία Θέσης:</b></td>
                                <td>
                                    
                                    <input id="theseis_1" type="checkbox" name="pos_cat[]" value="admin">Διοικητική<br>
                                    <input id="theseis_2" type="checkbox" name="pos_cat[]" value="acad">Ακαδημαϊκή<br>
                                    <input id="theseis_3" type="checkbox" name="pos_cat[]" value="for_ch">Προϊστάμενος-Πρόεδρος<br>
                                    <input id="theseis_4" type="checkbox" name="pos_cat[]" value="selfe">Αυτοαπασχολούμενος<br>
                                    <input id="theseis_5" type="checkbox" name="pos_cat[]" value="une">Άνεργος
                                    
                                </td>
                             </tr>
                        <tr><td><p></p></td></tr>
                        <tr>
                            <td><b>Οργανισμός:</b></td>
                            <td><input type="text" value="<?php echo$organismos_11;?>" name="org"></td>
                        </tr>
                        <tr><td><p></p></td></tr>
                        <tr>
                            <td><b>Κατηγορία Οργανισμού:</b></td>
                            <td>
                                <select id="org_cat" name="org_cat">
                                    <option value="none"></option>
                                    <option value="p_sec">Δημόσιος Τομέας</option>
                                    <option value="multi_nation">Πολυεθνική</option>
                                    <option value="middle">Μικρομεσαία Επιχείριση</option>
                                    <option value="small">Μικρή ή Ατομική Επιχείριση</option>
                                    <option value="mko">Μ.Κ.Ο.</option>
                                </select>
                            </td>
                        </tr>
                        <tr><td><p></p></td></tr>
                        <tr>
                            <td><b>Φύλο:</b></td>
                            <td>
                                <input type="radio" id="radio_1" name="gender" value="male" checked> Άνδρας<br>
                                <input type="radio" id="radio_2" name="gender" value="female"> Γυναίκα<br>

                            </td>
                        </tr>
                        <tr><td><p></p></td></tr>
                        <tr>
                            <td><b>Σπουδές:</b></td>
                            <td>
                                <input id="spoudes_1" type="checkbox" name="edu[]" value="tei">ΤΕΙ<br>
                                <input id="spoudes_2" type="checkbox" name="edu[]" value="aei">ΑΕΙ<br>
                                <input id="spoudes_3" type="checkbox" name="edu[]" value="master">MASTER<br>
                                <input id="spoudes_4" type="checkbox" name="edu[]" value="phd">PHD
                            </td>
                        </tr>
                        <tr><td><p></p></td></tr>
                        <tr> 
                            <td><b>Ξένες Γλώσσες:</b></td>
                            <td>
                                <select name="for_lang" id='lang_num' onchange="test(this);">
                                    <option value="0" selected="selected">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </td>
                        </tr>
                        <tr id="1st_1"><td><p></p></td></tr>
                        <tr id="1st_1">
                            <td><b>1η Γλώσσα:</b></td>
                            <td><input type="text" name="1lang"></td>
                        </tr>
                        <tr id="1st_1"><td><p></p></td></tr>
                         <tr id="1st_1">
                            <td><b>Επίπεδο Κατανόησης Γραφής:</b></td>
                            <td>
                                <select name="1w">
                                    <option value="1wa1">A1</option>
                                    <option value="1wa2">A2</option>
                                    <option value="1wb1">B1</option>
                                    <option value="1wb2">B2</option>
                                    <option value="1wc1">C1</option>
                                    <option value="1wc2">C2</option>
                                 </select>
                            </td>
                        </tr>
                        <tr id="1st_1"><td><p></p></td></tr>
                         <tr id="1st_1">
                            <td><b>Επίπεδο Κατανόησης Ομιλίας: </b></td>
                            <td>
                                <select name="1s">
                                    <option value="1sa1">A1</option>
                                    <option value="1sa2">A2</option>
                                    <option value="1sb1">B1</option>
                                    <option value="1sb2">B2</option>
                                    <option value="1sc1">C1</option>
                                    <option value="1sc2">C2</option>
                                 </select>
                            </td>
                        </tr>
                        <tr id="2nd_2"><td><p></p></td></tr>
                        <tr id="2nd_2">
                            <td><b>2η Γλώσσα:</b></td>
                            <td><input type="text" name="2lang"></td>
                        </tr>
                        <tr id="2nd_2"><td><p></p></td></tr>
                        <tr id="2nd_2">
                            <td><b>Επίπεδο Κατανόησης Γραφής:</b></td>
                            <td>
                                <select name="2w">
                                    <option value="2wa1">A1</option>
                                    <option value="2wa2">A2</option>
                                    <option value="2wb1">B1</option>
                                    <option value="2wb2">B2</option>
                                    <option value="2wc1">C1</option>
                                    <option value="2wc2">C2</option>
                                 </select>
                            </td>
                        </tr>
                        <tr id="2nd_2"><td><p></p></td></tr>
                        <tr id="2nd_2">
                            <td><b>Επίπεδο Κατανόησης Ομιλίας:</b></td>
                            <td>
                                <select name="2s">
                                    <option value="2sa1">A1</option>
                                    <option value="2sa2">A2</option>
                                    <option value="2sb1">B1</option>
                                    <option value="2sb2">B2</option>
                                    <option value="2sc1">C1</option>
                                    <option value="2sc2">C2</option>
                                 </select>
                            </td>
                        </tr>
                        <tr id="3rd_3"><td><p></p></td></tr>
                        <tr id="3rd_3">
                            <td><b>3η Γλώσσα:</b></td>
                            <td><input type="text" name="3lang"></td>
                        </tr>
                        <tr id="3rd_3"><td><p></p></td></tr>
                        <tr id="3rd_3">
                            <td><b>Επίπεδο Κατανόησης Γραφής:</b></td>
                            <td>
                                <select name="3w">
                                    <option value="3wa1">A1</option>
                                    <option value="3wa2">A2</option>
                                    <option value="3wb1">B1</option>
                                    <option value="3wb2">B2</option>
                                    <option value="3wc1">C1</option>
                                    <option value="3wc2">C2</option>
                                 </select>
                            </td>
                        </tr>
                        <tr id="3rd_3"><td><p></p></td></tr>
                        <tr id="3rd_3">
                            <td><b>Επίπεδο Κατανόησης Ομιλίας:</b></td>
                            <td>
                                <select name="3s">
                                    <option value="3sa1">A1</option>
                                    <option value="3sa2">A2</option>
                                    <option value="3sb1">B1</option>
                                    <option value="3sb2">B2</option>
                                    <option value="3sc1">C1</option>
                                    <option value="3sc2">C2</option>
                                 </select>
                            </td>
                        </tr>
                        <tr><td><p></p></td></tr>
                        <tr>
                            <td><b>Εθνικότητα:</b></td>
                            <td>
                                <select id="s1" name="s1">
                                    <option value="" selected="selected"> </option>
                                    <?php
                                    foreach (glob(dirname(__FILE__) . '/img/flags/*') as $filename) {
                                        $filename = basename($filename);
                                        $filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
                                        echo "<option value='" . $filename . "'>" . $filename . "</option>";
                                    }
                                    ?>

                                </select> 
                            </td>
                        </tr>
                        <tr><td><p></p></td></tr>
                        <tr>
                            <td><b>Πόλη Διαμονής:</b></td>
                            <td><input type="text" value="<?php echo$poli_11;?>" name="city"></td>
                        </tr>
                        <tr><td><p></p></td></tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name ='submit1'value="Finish"></td>
                        </tr>
                        
                </table></form></center>
            </div>
        </div>
    </header>
<script type="text/javascript">
    $("#s1").val('<?php echo$ethnikotita_11;?>');
    $("#area_exp").val('<?php echo$Eksidikefsi_11;?>');
    $("#org_cat").val('<?php echo$Katigoria_Organismou_11;?>');
    $("<?php echo$filo_11;?>").prop("checked", true)
    
    <?php
        if ($Katigoria1_11 == "Διοικητική") {
            echo'$("#theseis_1").prop("checked", true);';
        } else if ($Katigoria1_11 == "Ακαδημαϊκή") {
            echo'$("#theseis_2").prop("checked", true);';
        } else if ($Katigoria1_11 == "Προϊστάμενος-Πρόεδρος") {
            echo'$("#theseis_3").prop("checked", true);';
        } else if ($Katigoria1_11 == "Αυτοαπασχολούμενος") {
            echo'$("#theseis_4").prop("checked", true);';
        } else if ($Katigoria1_11 == "Άνεργος") {
            echo'$("#theseis_5").prop("checked", true);';
        }
        if ($Katigoria2_22 == "Διοικητική") {
            echo'$("#theseis_1").prop("checked", true);';
        } else if ($Katigoria2_22 == "Ακαδημαϊκή") {
            echo'$("#theseis_2").prop("checked", true);';
        } else if ($Katigoria2_22 == "Προϊστάμενος-Πρόεδρος") {
            echo'$("#theseis_3").prop("checked", true);';
        } else if ($Katigoria2_22 == "Αυτοαπασχολούμενος") {
            echo'$("#theseis_4").prop("checked", true);';
        } else if ($Katigoria2_22 == "Άνεργος") {
            echo'$("#theseis_5").prop("checked", true);';
        }
        if ($Katigoria3_33 == "Διοικητική") {
            echo'$("#theseis_1").prop("checked", true);';
        } else if ($Katigoria3_33 == "Ακαδημαϊκή") {
            echo'$("#theseis_2").prop("checked", true);';
        } else if ($Katigoria3_33 == "Προϊστάμενος-Πρόεδρος") {
            echo'$("#theseis_3").prop("checked", true);';
        } else if ($Katigoria3_33 == "Αυτοαπασχολούμενος") {
            echo'$("#theseis_4").prop("checked", true);';
        } else if ($Katigoria3_33 == "Άνεργος") {
            echo'$("#theseis_5").prop("checked", true);';
        }
        if ($Spoudes1_11 == "ΤΕΙ") {
            echo'$("#spoudes_1").prop("checked", true);';
        } else if ($Spoudes1_11=="ΑΕΙ") {
            echo'$("#spoudes_2").prop("checked", true);';
        } else if($Spoudes1_11=="MASTER") {
            echo'$("#spoudes_3").prop("checked", true);';
        } else if($Spoudes1_11=="PHD") {
            echo'$("#spoudes_4").prop("checked", true);';
        } 
        if ($Spoudes2_22 == "ΤΕΙ") {
            echo'$("#spoudes_1").prop("checked", true);';
        } else if ($Spoudes2_22=="ΑΕΙ") {
            echo'$("#spoudes_2").prop("checked", true);';
        } else if($Spoudes2_22=="MASTER") {
            echo'$("#spoudes_3").prop("checked", true);';
        } else if($Spoudes2_22=="PHD") {
            echo'$("#spoudes_4").prop("checked", true);';
        } 
        if ($Spoudes3_33 == "ΤΕΙ") {
            echo'$("#spoudes_1").prop("checked", true);';
        } else if ($Spoudes3_33=="ΑΕΙ") {
            echo'$("#spoudes_2").prop("checked", true);';
        } else if($Spoudes3_33=="MASTER") {
            echo'$("#spoudes_3").prop("checked", true);';
        } else if($Spoudes3_33=="PHD") {
            echo'$("#spoudes_4").prop("checked", true);';
        } 
    ?>
    
    
</script>
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
