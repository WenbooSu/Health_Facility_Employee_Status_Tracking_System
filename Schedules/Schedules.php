<?php
include "Functions.php";
echo "<h1>"."Schedules"."</h1>"."<br>";
echo "<form action='AssignSchedules.php' method='POST'>";
echo "<input type='submit' name='assign' value='Assign'>";
echo "</form>";
$db = getConnect();
$sql = "SELECT * FROM Schedule";
$result = $db->query($sql);
displaySch($result);
