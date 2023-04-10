<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "Functions.php";
$db = getConnect();

if (isset($_POST['delete']) && isset($_POST['EID']) && isset($_POST['infection_count'])) {
    $EID = $_POST['EID'];
    $infection_count = $_POST['infection_count'];
    $sql = "DELETE FROM Infection WHERE EID = $EID AND infection_count = $infection_count";
    echo $sql;
    $db->query($sql);
}

$db->close();
header("Location: Infections.php");
exit();
