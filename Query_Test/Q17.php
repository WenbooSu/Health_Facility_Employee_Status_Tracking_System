<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('Functions.php');
echo "<h1>"."Lucky Doctors and Nurses"."</h1>";
$db = getConnect();
$url1 = "home.html";
$text1 = "Go back to home page";
echo "<a href='$url1'>$text1</a>";
echo "<br><br>";
$sql = "SELECT e.first_name, e.last_name, e.date_of_birth, e.emp_email, MIN(s.date) AS first_day_of_work, e.role,
       SUM(s.end_time - s.start_time) AS total_hour_scheduled
FROM Employees e
         INNER JOIN Schedule s ON e.EID = s.EID
WHERE  e.role = 'doctor'or'nurse'
    AND e.EID NOT IN (SELECT i.EID
                      FROM Infection i)
GROUP BY e.EID, e.first_name, e.last_name, e.date_of_birth, e.emp_email, e.role
ORDER BY e.role ASC, e.first_name ASC, e.last_name ASC;";
$result = $db->query($sql);
displayQuery($result);

