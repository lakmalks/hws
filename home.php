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

$sql="SELECT count('ws_id') FROM workshop where coordinator='$user'";
$opt=load_val($sql)[0]["count('ws_id')"];
// print_r($opt);


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




    <br>
    <div class="container">

      <div class="row">
        <div class="col">

          <div class="card back-color shadow-lg p-3 mb-5 rounded">
            <!-- <img class="card-img-top" src="img_avatar1.png" alt="Card image"> -->
            <!-- <img class="card-img-top" alt="Card image"> -->
            <div class="card-body">
              <h4 class="card-title">Completed Workshops</h4>
              <!-- <p class="card-text">Completed Workshops</p> -->
              <p class="card-text" id="card_completed">You have done # <?php echo $opt ?> workshops</p>
              
              <a href="completed_ws.php" class="btn btn-secondary">More Info</a>
            </div>
          </div>
        </div>


        <div class="col">
          <div class="card back-color shadow-lg p-3 mb-5 rounded">
            <!-- <img class="card-img-top" src="img_avatar1.png" alt="Card image"> -->
            <!-- <img class="card-img-top" alt="Card image"> -->
            <div class="card-body">
              <h4 class="card-title">Ongoing Workshops</h4>
              <p class="card-text">You have # ongoing Workshops</p>
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