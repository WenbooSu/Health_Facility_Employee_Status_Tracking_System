<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('Functions.php');
echo "<h1>"."Tired Nurses"."</h1>";
$db = getConnect();
$url1 = "home.html";
$text1 = "Go back to home page";
echo "<a href='$url1'>$text1</a>";
echo "<br><br>";
$sql = "SELECT e.first_name, e.last_name, MIN(s.date) AS first_day_of_work, e.date_of_birth, e.emp_email,
       MAX(s.end_time - s.start_time) AS total_hours
FROM Employees e
         INNER JOIN Schedule s ON e.EID = s.EID
WHERE e.role = 'nurse'
  AND s.date >='2023-04-03'
GROUP BY e.EID, e.first_name, e.last_name, e.date_of_birth, e.emp_email
ORDER BY total_hours DESC;";
$result = $db->query($sql);
displayQuery($result);
