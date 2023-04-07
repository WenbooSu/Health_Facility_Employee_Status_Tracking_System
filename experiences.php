<?php
include "configuration.php";
echo "<h1>Experiences</h1>";
$db = getConnect();
$sql = "SELECT * FROM Experiences";
$result = $db->query($sql);
/*echo "<table><thead><tr><th>EID</th><th>fac_name</th><th>start_date</th><th>end_date</th></tr></thead>";
while ($row = $result->fetch_assoc()) {
    echo "<td>".$row["EID"]."</td><td>". $row["fac_name"]."</td><td>".$row["start_date"]."</td><td>".$row["end_date"]."</td></tr>";
}
echo "</tbody></table>";*/
displayQuery($result);