<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "Functions.php";
$db = getConnect();
$fac_name = "";
if (isset($_POST['edit']) && isset($_POST['fac_name'])) {
    $fac_name = $_POST['fac_name'];
    //$buffer_id = $employee_id;
    $sql = "SELECT * FROM Facilities WHERE fac_name = " . "'".$fac_name."'";
    //$sql = "SELECT * FROM Facilities WHERE fac_name = '$fac_name'";
    //echo $sql;
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        $fac_data = $result->fetch_assoc();
    }
}
if (isset($_POST['update'])) {
    $fac_name = $_POST['fac_name'];
    $fac_type = $_POST['fac_type'];
    $fac_web = $_POST['fac_web'];
    $capacity = $_POST['capacity'];
    $fac_phone = $_POST['fac_phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $postal_code = $_POST['postal_code'];

    $sql = "UPDATE Facilities SET fac_type = '$fac_type', fac_web = '$fac_web', capacity = '$capacity', 
            fac_phone = '$fac_phone', address = '$address', city = '$city', province = '$province', 
            postal_code = '$postal_code' WHERE fac_name ="."'".$fac_name."'";
    //EID 在第一个post的时候丢失了
    //print $sql;
    echo $sql;
    $db->query($sql);
    header("Location: Facilities.php");
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
<form action="EditFacilities.php" method="POST">
    <input type="hidden" name="fac_name" value="<?php echo $fac_name; ?>">

    <label for="fac_type">Facility Type:</label>
    <input type="text" id="fac_type" name="fac_type" placeholder="<?php echo isset($fac_data) ? $fac_data['fac_type'] : ''; ?>">
    <br><br>

    <label for="fac_web">Facility Website:</label>
    <input type="text" id="fac_web" name="fac_web" placeholder="<?php echo isset($fac_data) ? $fac_data['fac_web'] : ''; ?>">
    <br><br>

    <label for="capacity">Capacity:</label>
    <input type="number" id="capacity" name="capacity" placeholder="<?php echo isset($fac_data) ? $fac_data['capacity'] : ''; ?>">
    <br><br>

    <label for="fac_phone">Phone:</label>
    <input type="text" id="fac_phone" name="fac_phone" placeholder="<?php echo isset($fac_data) ? $fac_data['fac_phone'] : ''; ?>">
    <br><br>

    <label for="address">Address:</label>
    <input type="text" id="address" name="address" placeholder="<?php echo isset($fac_data) ? $fac_data['address'] : ''; ?>">
    <br><br>

    <label for="city">City:</label>
    <input type="text" id="city" name="city" placeholder="<?php echo isset($fac_data) ? $fac_data['city'] : ''; ?>">
    <br><br>

    <label for="province">Province:</label>
    <input type="text" id="province" name="province" placeholder="<?php echo isset($fac_data) ? $fac_data['province'] : ''; ?>">
    <br><br>

    <label for="postal_code">Postal Code:</label>
    <input type="text" id="postal_code" name="postal_code" placeholder="<?php echo isset($fac_data) ? $fac_data['postal_code'] : ''; ?>">
    <br><br>
    <input type="submit" name="update" value="Update">
</form>
</body>
</html>





