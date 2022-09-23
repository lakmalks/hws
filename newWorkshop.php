<?php
// include("./func/func.php");
include("conn.php");

session_start();
if (!isset($_SESSION['username'])) {

    $newURL = "index.php";
    header('Location: ' . $newURL);
}
$q = "SELECT max(id) FROM workshop;";
$result = $conn->query($q);
if ($result->num_rows > 0) {
    $ws_id_arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $ws_id_ex = $ws_id_arr[0];
    $ws_count = $ws_id_ex["max(id)"]+1;

    $_SESSION["ws_count"] = $ws_count;
    // print_r($ws_id_ex);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New workshop</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->


    <style>
        .homebtn {
            background-color: rgb(71, 100, 161);
            /* Green */
            border: none;
            border-radius: 4px;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .summary {
            text-align: left;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="step">
            Logged in as <?php echo  $_SESSION['username']; ?>
        </div>
        <header>New Workshop 
        <div id="ws_coun"><?php echo $_SESSION["ws_count"] ?></div>
        </header>
        <div class="progress-bar">
            <div class="step">
                <p>Place</p>
                <div class="bullet">
                    <span>1</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="step">
                <p>Level</p>
                <div class="bullet">
                    <span>2</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="step">
                <p>Lab Type</p>
                <div class="bullet">
                    <span>3</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <!-- <div class="step">
                    <p>Debt</p>
                    <div class="bullet">
                        <span>4</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div> -->
            <!-- <div class="step">
                    <p>Adress</p>
                    <div class="bullet">
                        <span>5</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div> -->
            <div class="step">
                <p>Submit</p>
                <div class="bullet">
                    <span>4</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
        </div>
        <div class="form-outer">
            <form >


                <div class="page slide-page">
                    <div class="title">Place:</div>
                    <div class="field">
                        <div class="label">District</div>

                        <select name="district" id="district" onChange="loadZone()" required>
                            <option>Select District</option>
                            <?php
                            $q = "SELECT distinct district FROM school_id";
                            $result = $conn->query($q);

                            if ($result->num_rows > 0) {
                                $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            }
                            foreach ($options as $option) {
                            ?>
                                <option><?php echo $option['district']; ?> </option>
                            <?php
                            }
                            ?>
                        </select>

                    </div>
                    <div class="field">
                        <div class="label">Zone</div>
                        <!-- <select name="zone" id="zone" onChange="loadSchool()" required> -->
                        <select name="zone" id="zone" required>
                        </select>
                    </div>
                    <!-- <div class="field">
                        <div class="label">School</div>
                        <select name="school" id="school" required>
                        </select>
                    </div> -->
                    <div class="field btns">
                        <button class="firstNext next">Save and continue</button>
                    </div>

                    <div class="field">

                    </div>
                </div>

                <div class="page">
                    <div class="title">Level:</div>

                    <div class="field">
                        <div class="label">Level</div>
                        <select id="ws_level" name="ws_level">
                            <option value="Ministry">Ministry </option>
                            <option value="Province">Province </option>
                            <option value="Zone">Zone </option>
                            <option value="School">School </option>
                        </select>
                    </div>
                    <div class="field">
                        <div class="label">Expenditure</div>
                        <select id="expend_source" name="expend_source">
                            <option value="Ministry">Ministry </option>
                            <option value="Province">Province </option>
                            <option value="Zone">Zone </option>
                            <option value="School">School </option>
                            <option value="no">No Expense </option>
                        </select>
                    </div>
                    <div class="field">
                        <div class="label">Allocated Amount (Rs:)</div>
                        <input type="number" required id="allocated_amount" name="allocated_amount" />

                    </div>
                    <div class="field btns">
                        <button class="prev-1 prev">Previous</button>
                        <button class="next-1 next">Next</button>
                    </div>
                </div>
                <div class="page">
                    <div class="title" >Lab type :</div>
                    <div class="field">
                        <div class="label">Date</div>
                        <input type="date" id="ws_date" required />
                    </div>
                    <div class="field">
                        <div class="label">Type</div>
                        <select id="lab_type" name="lab_type">
                            <option value="Mahindodaya">Mahindodaya </option>
                            <option value="Other">Other </option>

                        </select>
                    </div>

                    <div class="field btns">
                        <button class="prev-2 prev">Previous</button>
                        <button class="next-2 next" onclick="addTempToVar()">Next</button>
                    </div>
                </div>
                <!-- <div class="page">
                        <div class="title">Contact Info 3:</div>
                        <div class="field">
                            <div class="label">Email Address</div>
                            <input type="text" required />
                        </div>
                        <div class="field">
                            <div class="label">Phone Number</div>
                            <input type="Number" required />
                        </div>
                        <div class="field btns">
                            <button class="prev-3 prev">Previous</button>
                            <button class="next-3 next">Next</button>
                        </div>
                    </div> -->

                <!-- <div class="page">
                        <div class="title">Date of Birth:</div>
                        <div class="field">
                            <div class="label">Date</div>
                            <input type="text" required />
                        </div>
                        <div class="field">
                            <div class="label">Gender</div>
                            <select required>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="field btns">
                            <button class="prev-4 prev">Previous</button>
                            <button class="next-4 next">Next</button>
                        </div>
                    </div> -->

                <div class="page">
                    <div class="title">Workshop Details:</div>

                    <div class="summary" id="ws_id_div"></div>
                    <div class="summary" id="dis"></div>
                    <div class="summary" id="zone_div"></div>
                    <div class="summary" id="sch_div"></div>
                    <div class="summary" id="ws_level_div"></div>
                    <div class="summary" id="exp_div"></div>
                    <div class="summary" id="allocated_div"></div>
                    <div class="summary" id="date_div"></div>
                    <div class="summary" id="lab_type_div"></div>

                    <div class="field btns">
                        <button class="prev-5 prev">Previous</button>
                        <button type="button" class="submit_b" onclick="addTempToDb()">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="field btns">
            <!-- <button class="homebtn" onclick="window.location.href='home.php';">Home</button> -->
        </div>


    </div>

    <script src="./js/script.js"></script>
</body>

</html>