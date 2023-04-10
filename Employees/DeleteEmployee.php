<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "Functions.php";
$db = getConnect();

if (isset($_POST['delete']) && isset($_POST['EID'])) {
    $employee_id = $_POST['EID'];
    $sql = "DELETE FROM Employees WHERE EID = ".$employee_id;
    $db->query($sql);
}

$db->close();
header("Location: Employees.php");
exit();
