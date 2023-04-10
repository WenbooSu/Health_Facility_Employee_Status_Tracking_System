<?php
include "Functions.php";
echo "<h1>"."Facilities"."</h1>"."<br>";
$db = getConnect();
$sql = "SELECT * FROM Facilities";
$result = $db->query($sql);
displayFac($result);
