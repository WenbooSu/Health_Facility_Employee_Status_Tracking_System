<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "Functions.php";
$db = getConnect();

if (isset($_POST['delete']) && isset($_POST['fac_name'])) {
    $fac_name = $_POST['fac_name'];
    $sql = "DELETE FROM Facilities WHERE fac_name ="."'".$fac_name."'";
    $db->query($sql);
}

$db->close();
header("Location: Facilities.php");
exit();
