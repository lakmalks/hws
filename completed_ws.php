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
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hardware System - Completed Workshops</title>
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
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#id</th>
                            <th>WS id</th>
                            <th>District</th>
                            <th>Zone</th>
                            <th>Level</th>
                            <th>Coordinator</th>
                            <th>Allocate</th>
                            <th>Expenses</th>
                            <th>Date started</th>
                            <th>Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $sql = "SELECT * FROM workshop where coordinator='$user' and state=1";
                        loadTable($sql);

                        ?>
                    </tbody>
                </table>

            </div>



        </div>



</body>

</html>