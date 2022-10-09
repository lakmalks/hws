<?php
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
?>


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
      background-color: blueviolet;
      width: 400px;
    }

    .user_lbl {
      font-size: 25px;
      font-weight: 500;
    }
  </style>

</head>

<body>
  <div class="container-fluid">
    
  <div id="nav-placeholder">        </div>

<script>
    $(function() {
        $("#nav-placeholder").load("nav.php");
    });
</script>

  
</body>