<?php
include "Functions.php";
echo "<h1>"."Employees"."</h1>"."<br>";
$db = getConnect();
$sql = "SELECT * FROM Employees";
$result = $db->query($sql);
displayEmp($result);


