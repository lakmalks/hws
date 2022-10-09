<?php
session_start();
include("conn.php");
require_once("allFun.php");

$nc_ws_id_tem = $_POST["nc_ws_id_tem"];
$nc_task_id_tem = $_POST["nc_task_id_tem"];

$sql="SELECT DISTINCT sch_id FROM task_school where ws_id=$nc_ws_id_tem AND task_id=$nc_task_id_tem";
$sch_temp=load_val($sql);
$sch=$sch_temp[0]['sch_id'];
print_r($sch_temp);

$_SESSION['sch']=$sch;
$_SESSION['nc_ws_id']=$nc_ws_id_tem;
$_SESSION['task_id']=$nc_task_id_tem;




mysqli_close($link);
?>