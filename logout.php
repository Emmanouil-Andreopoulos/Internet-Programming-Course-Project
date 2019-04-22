<?php

session_start();
session_destroy();
session_start();
$_SESSION['errorm']='<font color="#00cc00">Αποσυνδεθήκατε με επιτυχία</font>';
header("Location: " . "login.php");
exit();
?>
