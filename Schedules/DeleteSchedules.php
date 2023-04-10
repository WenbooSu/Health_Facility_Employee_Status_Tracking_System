<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "Functions.php";
$db = getConnect();

if (isset($_POST['delete']) && isset($_POST['ID'])) {
    $ID = $_POST['ID'];
    $sql = "DELETE FROM Schedule WHERE ID = $ID";
    echo $sql;
    $db->query($sql);
}

$db->close();
header("Location: Schedules.php");
exit();
