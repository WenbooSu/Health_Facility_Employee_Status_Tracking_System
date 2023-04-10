<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('Functions.php');
echo "<h1>"." Nurses"."</h1>";
$db = getConnect();
$url1 = "home.html";
$text1 = "Go back to home page";
echo "<a href='$url1'>$text1</a>";
echo "<br><br>";
$sql = "SELECT e.first_name, e.last_name, e.date_of_birth, e.emp_email, MIN(s.date) AS first_day_of_work, e.role,
       SUM(s.end_time - s.start_time) AS total_hour_scheduled,
       COUNT(i.EID) AS infection_count
FROM Employees e
         INNER JOIN Schedule s ON e.EID = s.EID
         INNER JOIN Infection i ON e.EID = i.EID
WHERE i.nature = 'COVID-19'
    AND e.role = 'doctor'or'nurse'
GROUP BY e.EID, e.first_name, e.last_name, e.date_of_birth, e.emp_email, e.role
HAVING COUNT(i.EID) >= 3
ORDER BY e.role ASC, e.first_name ASC, e.last_name ASC;
";
$result = $db->query($sql);
displayQuery($result);
