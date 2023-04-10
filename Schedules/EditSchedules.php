<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "Functions.php";
$db = getConnect();
$fac_data='';
$EID = "";
$ID = "";
if (isset($_POST['edit']) && isset($_POST['ID'])) {
    $ID = $_POST['ID'];
    $sql = "SELECT * FROM Schedule WHERE ID = $ID";
    //$sql = "SELECT * FROM Facilities WHERE fac_name = '$fac_name'";
    //echo $sql;
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        $fac_data = $result->fetch_assoc();
    }
}
if (isset($_POST['update'])) {
    $EID = $_POST['EID'];
    $ID = $_POST['ID'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $date = $_POST['date'];

    $sql = "UPDATE Schedule SET start_time = '$start_time', end_time = '$end_time', date = '$date' WHERE EID = '$EID' AND ID = $ID";

    //EID 在第一个post的时候丢失了
    //print $sql;
    $db->query($sql);
   header("Location: Schedules.php");
    exit();
}
?>

    <!DOCTYPE html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Schedules</title>
</head>
<body>
<h1>Edit Schedules</h1>
<form action="EditSchedules.php" method="POST">
    <input type="hidden" name="EID" value="<?php echo isset($fac_data) ? $fac_data['EID'] : ''; ?>">
    <!--这里的EID获取在MAC和Windows上不一样-->
    <input type="hidden" name="ID" value="<?php echo $ID; ?>">

    <label for="start_time">Start Time:</label>
    <input type="text" id="start_time" name="start_time" placeholder="<?php echo isset($fac_data) ? $fac_data['start_time'] : ''; ?>">
    <br><br>

    <label for="end_time">End Time::</label>
    <input type="text" id="end_time" name="end_time" placeholder="<?php echo isset($fac_data) ? $fac_data['end_time'] : ''; ?>">
    <br><br>

    <label for="date">Date::</label>
    <input type="text" id="date" name="date" placeholder="<?php echo isset($fac_data) ? $fac_data['date'] : ''; ?>">
    <br><br>

    <input type="submit" name="update" value="Update">
</form>
</body>
    </html>
