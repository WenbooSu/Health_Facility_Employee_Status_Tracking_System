<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "Functions.php";
$db = getConnect();

if (isset($_POST['submit'])) {
    $EID = $_POST['EID'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $date = $_POST['date'];

    if(isDocNurse($db, $EID))
    {
        if (!checkScheduleConflict($db, $EID, $start_time, $end_time, $date)) {
            $sql = "INSERT INTO Schedule (EID, start_time, end_time, date) VALUES ($EID, '$start_time', '$end_time','$date')";
            echo $sql;
            $db->query($sql);
            header("Location: Schedules.php");
            exit();
        } else {
            echo "Time Conflict Detected !";
        }
    }
    else{
        echo "Not a Doctor nor Nurse";
    }
    //$sql = "INSERT INTO Schedule VALUES EID = '$EID' start_time = '$start_time', end_time = '$end_time', date = '$date'";

    //EID 在第一个post的时候丢失了
    //print $sql;
    //header("Location: Schedules.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Schedules</title>
</head>
<body>
<h1>Assign Schedules</h1>
<form action="AssignSchedules.php" method="POST">

    <label for="EID">EID:</label>
    <input type="text" id="EID" name="EID">
    <br><br>

    <label for="start_time">Start Time:</label>
    <input type="text" id="start_time" name="start_time">
    <br><br>

    <label for="end_time">End Time::</label>
    <input type="text" id="end_time" name="end_time">
    <br><br>

    <label for="date">Date::</label>
    <input type="text" id="date" name="date">
    <br><br>

    <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>


