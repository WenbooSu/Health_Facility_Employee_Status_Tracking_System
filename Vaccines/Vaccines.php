<?php
include "Functions.php";
echo "<h1>"."Vaccines"."</h1>"."<br>";
$db = getConnect();
$sql = "SELECT * FROM Vaccines";
$result = $db->query($sql);
displayVac($result);
