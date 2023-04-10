<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('Functions.php');
echo "<h1>"."Search Schedules"."</h1>";
$db = getConnect();
$url1 = "home.html";
$text1 = "Go back to home page";
echo "<a href='$url1'>$text1</a>";
echo "<br><br>";
$current_date = date('Y-m-d');
$two_weeks_earlier = date('Y-m-d', strtotime('-2 weeks', strtotime($current_date)));
echo "Current Date: " . $current_date . "\n";
echo "<br><br>";
echo "Two Weeks Earlier: " . $two_weeks_earlier;
echo "<br><br>";

if (isset($_POST['search']))
{
    $fac_name = $_POST['fac_name'];
    $sql = "SELECT e.first_name, e.last_name, e.role
FROM Employees e
WHERE e.EID  IN  (SELECT s.EID
                  FROM Schedule s, work_in w
                  WHERE s.date >= '$two_weeks_earlier'
                    AND
                          s.date <='$current_date'
                    AND
                          w.fac_name = '$fac_name'
)
  AND e.role IN ('doctor', 'nurse')
ORDER BY e.role ASC, e.first_name ASC;
";
    $result = $db->query($sql);
    displayQuery($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<form action="Q11.php" method="POST">

    <label for="fac_name">Enter Facility Name:</label>
    <input type="text" id="fac_name" name="fac_name">
    <br><br>
    <input type="submit" name="search" value="Search">
</form>
</body>
</html>
