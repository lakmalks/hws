<?php

use LDAP\Result;

session_start();
include("conn.php");
include("allFun.php");




if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
} else {
    $newURL = "index.php";
    header('Location: ' . $newURL);
    // $user = "Login";
}



$ws_id = $_POST["nc_ws_id"];

$sql_task = "SELECT max(task_id) FROM task_school WHERE ws_id='$ws_id'";

$result = $conn->query($sql_task);
if ($result){
    
    if ($result->num_rows > 0) {
        $temp_v = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $val=$temp_v[0]["max(task_id)"]+1;
        
        // $val=$v['max'];
    }else{
        $val=1;
        
    }
}

$_SESSION["task_id"]=$val;
$pr="Workshop ID :".$ws_id." Task ID : ".$val;
echo "<h3>$pr</h3>";

?>