<?php
include("conn.php");

function load_val($sql)
{

    global $conn;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    return $options;
}
function loadTable($sql)
{
    global $conn;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    foreach ($options as $option) {
        $ak = array_keys($option);
        echo "<tr> ";
        foreach ($ak as $key) {
            echo   "<td>$option[$key] </td>";
        }
        echo "</tr>";
    }
}
