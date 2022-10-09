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

$sql_completed="SELECT count('ws_id') FROM workshop where coordinator='$user' and state=1";
$Completed_ws=load_val($sql_completed)[0]["count('ws_id')"];

$sql_nc_ws="SELECT count('ws_id') FROM workshop where coordinator='$user' and state=0";
$nc_ws=load_val($sql_nc_ws)[0]["count('ws_id')"];


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
  <link rel="stylesheet" type="text/css" href="./css/stylesOther.css">
  <style>
    .divback {
      align-items: left;
      text-align: left;
      font-size: 25px;
      font-weight: 500;
    }

    .back-color {
      background-color: rgb(38, 41, 80);
      width: 400px;
      color :aliceblue;
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




    <br>
    <div class="container">

      <div class="row">
        <div class="col">

          <div class="card back-color shadow-lg p-3 mb-5 rounded">
            <!-- <img class="card-img-top" src="img_avatar1.png" alt="Card image"> -->
            <!-- <img class="card-img-top" alt="Card image"> -->
            <div class="card-body">
              <h4 class="card-title">Completed Workshops : [<?php echo $Completed_ws ?>]</h4>
              <!-- <p class="card-text">Completed Workshops</p> -->
              <p class="card-text" id="card_completed">You have done # <?php echo $Completed_ws ?> workshops</p>
              
              <a href="completed_ws.php" class="btn btn-secondary">More Info</a>
            </div>
          </div>
        </div>


        <div class="col">
          <div class="card back-color shadow-lg p-3 mb-5 rounded">
            <!-- <img class="card-img-top" src="img_avatar1.png" alt="Card image"> -->
            <!-- <img class="card-img-top" alt="Card image"> -->
            <div class="card-body">
              <h4 class="card-title">Ongoing Workshops : [<?php echo $nc_ws ?>]</h4>
              <p class="card-text">You have # <?php echo $nc_ws ?> ongoing Workshops</p>
              <a href="on_going_ws.php" class="btn btn-secondary">More Info</a>
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
              <h4 class="card-title">Resource person</h4>
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