<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('Functions.php');
echo "<h1>"."Quebec Doctors"."</h1>";
$db = getConnect();
$url1 = "home.html";
$text1 = "Go back to home page";
echo "<a href='$url1'>$text1</a>";
echo "<br><br>";
$sql = "SELECT e.first_name, e.last_name, e.city,
       COUNT(DISTINCT ex.fac_name) AS num_facilities
FROM Employees e
         INNER JOIN Experiences ex ON e.EID = ex.EID
         INNER JOIN Facilities f ON ex.fac_name = f.fac_name
WHERE e.role = 'doctor'
  AND e.province = 'Quebec'
GROUP BY e.EID, e.first_name, e.last_name, e.city
ORDER BY e.city ASC, num_facilities DESC;";
$result = $db->query($sql);
displayQuery($result);
