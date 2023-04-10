<?php
include "Functions.php";
echo "<h1>"."Experiences"."</h1>"."<br>";
$db = getConnect();
$sql = "SELECT * FROM Experiences";
$result = $db->query($sql);
displayQuery($result);
