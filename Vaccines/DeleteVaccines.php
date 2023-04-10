<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "Functions.php";
$db = getConnect();

if (isset($_POST['delete']) && isset($_POST['EID']) && isset($_POST['dose'])) {
    $EID = $_POST['EID'];
    $dose = $_POST['dose'];
    $sql = "DELETE FROM Vaccines WHERE EID = $EID AND dose = $dose";
    echo $sql;
    $db->query($sql);
}

$db->close();
header("Location: Vaccines.php");
exit();

