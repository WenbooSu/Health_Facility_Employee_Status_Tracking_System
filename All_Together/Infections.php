<?php
include "Functions.php";
echo "<h1>"."Infections"."</h1>"."<br>";
$db = getConnect();
$sql = "SELECT * FROM Infection";
$result = $db->query($sql);
displayInf($result);
