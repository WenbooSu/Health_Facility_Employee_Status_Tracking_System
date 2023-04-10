<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "Functions.php";
$db = getConnect();
$EID = "";
$dose = "";
if (isset($_POST['edit']) && isset($_POST['EID']) && isset($_POST['dose'])) {
    $EID = $_POST['EID'];
    $dose = $_POST['dose'];
    $sql = "SELECT * FROM Vaccines WHERE EID = $EID AND dose = $dose";
    //$sql = "SELECT * FROM Facilities WHERE fac_name = '$fac_name'";
    //echo $sql;
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        $fac_data = $result->fetch_assoc();
    }
}
if (isset($_POST['update'])) {
    $EID = $_POST['EID'];
    $dose = $_POST['dose'];
    $vac_date = $_POST['vac_date'];
    $vac_type = $_POST['vac_type'];

    $sql = "UPDATE Vaccines SET vac_date = '$vac_date', vac_type = '$vac_type' WHERE EID = $EID AND dose = $dose";
    //EID 在第一个post的时候丢失了
    //print $sql;
    echo $sql;
    $db->query($sql);
    header("Location: Vaccines.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Facility</title>
</head>
<body>
<h1>Edit Employee</h1>
<form action="EditVaccines.php" method="POST">
    <input type="hidden" name="EID" value="<?php echo $EID; ?>">
    <input type="hidden" name="dose" value="<?php echo $dose; ?>">

    <label for="vac_date">Vaccine Date:</label>
    <input type="text" id="vac_date" name="vac_date" placeholder="<?php echo isset($fac_data) ? $fac_data['vac_date'] : ''; ?>">
    <br><br>

    <label for="vac_type">Vaccine Type:</label>
    <input type="text" id="vac_type" name="vac_type" placeholder="<?php echo isset($fac_data) ? $fac_data['vac_type'] : ''; ?>">
    <br><br>

    <input type="submit" name="update" value="Update">
</form>
</body>
</html>
