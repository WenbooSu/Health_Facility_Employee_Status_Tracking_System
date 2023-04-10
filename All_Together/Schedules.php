<?php
include "Functions.php";
echo "<h1>"."Schedules"."</h1>"."<br>";
$db = getConnect();
$sql = "SELECT * FROM Schedule";
$result = $db->query($sql);
displaySch($result);
