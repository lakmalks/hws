<?php
include("conn.php");
$school = $_POST["sch"];
$ws_level = $_POST["ws_level"];
$expType = $_POST["exp"];
$date = $_POST["date"];
$expVal=$_POST['exp_val'];

session_start();

$_SESSION['sch'] = $school; 
$_SESSION['ws_level'] = $ws_level; 
$_SESSION['expType'] = $expType; 
$_SESSION['date'] = $date; 
$_SESSION['exp_val'] = $expVal; 
print_r($_SESSION);
echo '<script type="text/javascript">';
echo ' alert("JavaScript Alert Box by PHP")';  //not showing an alert box.
echo '</script>';
?>