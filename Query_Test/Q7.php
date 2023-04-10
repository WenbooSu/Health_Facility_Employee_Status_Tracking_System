<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('Functions.php');
echo "<h1>"."Search Facility"."</h1>";
$db = getConnect();

$url1 = "home.html";
$text1 = "Go back to home page";
echo "<a href='$url1'>$text1</a>";
echo "<br><br>";

if (isset($_POST['search']))
{
    $fac_name = $_POST['fac_name'];
    $sql = "SELECT e.first_name, e.last_name, e.date_of_birth, e.med_card, e.emp_phone, e.address, e.city, e.province, e.postal_code, e.citizenship, e.emp_email, w.start_date, e.role
FROM Employees e
         INNER JOIN work_in w ON e.EID = w.Eid
WHERE w.fac_name = '$fac_name'
ORDER BY e.role ASC, e.first_name ASC, e.last_name ASC;";
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
<form action="Q7.php" method="POST">

    <label for="fac_name">Enter Facility Name:</label>
    <input type="text" id="fac_name" name="fac_name">
    <br><br>
    <input type="submit" name="search" value="Search">
</form>
</body>
</html>
