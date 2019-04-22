<?php
$base_url='http://localhost/Project/';
$base_url2='localhost/Project/';
/*
 * Configuration information is stored here.
 */
$conf['db']['db_Host'] = 'localhost';
$conf['db']['db_Login'] = 'dokimi123';
$conf['db']['db_PWord'] = '123456';
$conf['db']['db_Name'] = 'dokimi';
$conf['db']['db_Port'] = '3306';

$link = mysqli_connect($conf['db']['db_Host'], $conf['db']['db_Login'], $conf['db']['db_PWord'], $conf['db']['db_Name'], $conf['db']['db_Port']);
mysqli_query($link, 'SET NAMES utf8');
//session_start();

if (!$link) {
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}
?>
