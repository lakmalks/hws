<?php
session_start();
include("conn.php");


if (isset($_SESSION['username'])) {
  $user = $_SESSION['username'];
} else {
  $user = "Login";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Hardware System - Workshop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <style>
    .divback {
      align-items: left;
      text-align: left;
      font-size: 25px;
      font-weight: 500;
    }

    .back-color {
      background-color: tomato;
      width: 400px;
    }
  </style>

</head>

<body>
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Workshop
              </a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                <li><a class="dropdown-item" href="#">Last Workshop</a></li>
                <li><a class="dropdown-item" href="newWorkshop.php">New Workshop</a></li>
                <!-- <li><a class="dropdown-item" href="#">Something else here</a></li> -->
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <br>
    <div class="container">

      <div class="row">
        <div class="col">

          <div class="card back-color shadow-lg p-3 mb-5 rounded">
            <!-- <img class="card-img-top" src="img_avatar1.png" alt="Card image"> -->
            <img class="card-img-top" alt="Card image">
            <div class="card-body">
              <h4 class="card-title">Last Workshop</h4>
              <p class="card-text">Some example text.</p>
              <a href="#" class="btn btn-primary">See Profile</a>
            </div>
          </div>
        </div>


        <div class="col">
          <div class="card back-color shadow-lg p-3 mb-5 rounded">
            <!-- <img class="card-img-top" src="img_avatar1.png" alt="Card image"> -->
            <img class="card-img-top" alt="Card image">
            <div class="card-body">
              <h4 class="card-title">Last Workshop</h4>
              <p class="card-text">Some example text.</p>
              <a href="#" class="btn btn-primary">See Profile</a>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card back-color shadow-lg p-3 mb-5 rounded">
            <!-- <img class="card-img-top" src="img_avatar1.png" alt="Card image"> -->
            <img class="card-img-top" alt="Card image">
            <div class="card-body">
              <h4 class="card-title">Last Workshop</h4>
              <p class="card-text">Some example text.</p>
              <a href="#" class="btn btn-primary">See Profile</a>
            </div>
          </div>
        </div>

      </div>
    </div>


  </div>
</body>

</html>