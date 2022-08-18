<?php
session_start();
include("conn.php");
 

if(isset($_SESSION['username'])) {
    $user=$_SESSION['username'];
}else{
    $user="Login";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hardware System - Workshop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<style>
    .divback{
    
    text-align: left;
    font-size: 25px;
    font-weight: 500;
}
</style>

</head>
<body>

<nav class="navbar navbar-inverse divback">
  <div class="container-fluid ">
    <div class="navbar-header">
      <a class="navbar-brand divback" href="home.php">HWS</a>
    </div>
    <ul class="nav navbar-nav">
      
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Workshop<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="newWorkshop.php">New Workshop</a></li>
          <li><a href="#">Previous Workshops</a></li>
          <li><a href="#">Advanced Editings</a></li>
        </ul>
      </li>
      <li><a href="#">Page 2</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> <?php echo $user ?></a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  <h3>Right Aligned Navbar</h3>
  <p>The .navbar-right class is used to right-align navigation bar buttons.</p>
</div>

</body>
</html>
