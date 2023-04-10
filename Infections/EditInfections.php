<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "Functions.php";
$db = getConnect();
$EID = "";
$infection_count = "";
if (isset($_POST['edit']) && isset($_POST['EID']) && isset($_POST['infection_count'])) {
    $EID = $_POST['EID'];
    $infection_count = $_POST['infection_count'];
    $sql = "SELECT * FROM Infection WHERE EID = $EID AND infection_count = $infection_count";
    //$sql = "SELECT * FROM Facilities WHERE fac_name = '$fac_name'";
    //echo $sql;
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        $fac_data = $result->fetch_assoc();
    }
}
if (isset($_POST['update'])) {
    $EID = $_POST['EID'];
    $infection_count = $_POST['infection_count'];
    $inf_date = $_POST['inf_date'];
    $nature = $_POST['nature'];

    $sql = "UPDATE Infection SET infection_date = '$inf_date', nature = '$nature' WHERE EID = $EID AND infection_count = $infection_count";
    //EID 在第一个post的时候丢失了
    //print $sql;
    echo $sql;
    $db->query($sql);
    header("Location: Infections.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Infection</title>
</head>
<body>
<h1>Edit Infection</h1>
<form action="EditInfections.php" method="POST">
    <input type="hidden" name="EID" value="<?php echo $EID; ?>">
    <input type="hidden" name="infection_count" value="<?php echo $infection_count; ?>">

    <label for="inf_date">Infection Date:</label>
    <input type="text" id="inf_date" name="inf_date" placeholder="<?php echo isset($fac_data) ? $fac_data['infection_date'] : ''; ?>">
    <br><br>

    <label for="nature">Vaccine Type:</label>
    <input type="text" id="nature" name="nature" placeholder="<?php echo isset($fac_data) ? $fac_data['nature'] : ''; ?>">
    <br><br>

    <input type="submit" name="update" value="Update">
</form>
</body>
</html>
