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
    <title>Add new job to On-Going task</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>
    <script src="./js/scriptAddJobOGT.js"></script>
    <div class="container-fluid">
        <div id="nav-placeholder"> </div>

        <script>
            $(function() {
                $("#nav-placeholder").load("nav.php");
            });
        </script>


        <br>

        <div class="container-fluid">
            <h2>
                Add new JOB to ON-GOING task
            </h2>
            <form>
                <div class="row">

                    <div class="form-group col-md-4 p-3">
                        <select class="form-control" id="ws_id" name="ws_id" onchange="loadTaskSo()">
                            <option value="*"> Select Workshop</option>

                            <?php
                            $sql = "SELECT DISTINCT workshop.ws_id,workshop.id
                         FROM workshop
                         INNER JOIN task_school ON task_school.ws_id=workshop.id and task_school.st=0 and task_school.user='$user' AND task_school.st=0";
                            $x = load_val($sql);
                            // print_r($x);

                            foreach ($x as $row) {
                                print_r($row);
                            ?>
                                <option value="<?php echo $row["id"]; ?>"><?php echo $row["ws_id"]; ?></option>
                            <?php
                            }
                            ?>

                        </select>
                    </div>
                    <div class="form-group col-md-4 p-3">
                        <select class="form-control" id="task_id" name="task_id" onchange="filterTable()">
                            <option value="*">Select Task ID</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4 p-3">

                        <div class="d-grid gap-2 col-12 mx-auto">
                            <button class="btn btn-danger" type="button" id="btn_add_job_to_task" onclick="passData()">Add new JOB to this task</button>

                        </div>
                    </div>
                </div>
            </form>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="all_task_table" name="all_task_table">
                        <thead class="table-dark">
                            <tr>
                                <th>#id</th>
                                <th>WS id</th>
                                <th>School</th>
                                <th>Task ID</th>
                                <th>Coordinator</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody id="tbody_all_task_table" name="tbody_all_task_table">
                            <?php $sql = "SELECT * FROM task_school where user='$user' AND st=0";
                            loadTable($sql);

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>