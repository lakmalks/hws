<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="hws";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$link = mysqli_connect($servername, $username, $password,$db);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?> 