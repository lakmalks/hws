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
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.php">HWS</a>
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
                                <li><a class="dropdown-item" href="newWorkshop.php">New Workshop</a></li>
                                <li><a class="dropdown-item" href="#">Last Workshop</a></li>
                                <li><a class="dropdown-item" href="#">Your workshops</a></li>

                                <!-- <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                            </ul>
                        </li>
                    </ul>
                </div>
                <form class="d-flex text-light fs-3 text-center ">
                    <label id="user_lbl" class="pe-3"><?php echo $user ?> </label>
                    <button class="btn btn-outline-danger" type="submit">Logout</button>
                </form>
            </div>
        </nav>
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
                            <th>School</th>
                            <th>Level</th>
                            <th>Allocate</th>
                            <th>Expenses</th>
                            <th>Date started</th>
                            <th>Date Completed</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $sql = "SELECT * FROM workshop";
                        loadTable($sql);

                        ?>
                    </tbody>
                </table>

            </div>



        </div>



</body>

</html>