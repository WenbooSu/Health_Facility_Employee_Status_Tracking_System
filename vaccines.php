<?php
include "configuration.php";
echo "<h1>Vaccines</h1>";
$db = getConnect();
$sql = "SELECT * FROM Vaccines";
$result = $db->query($sql);
/*echo "<table><thead><tr><th>EID</th><th>dose</th><th>vac_date</th><th>vac_type</th></tr></thead>";
while ($row = $result->fetch_assoc()) {
    echo "<td>".$row["EID"]."</td><td>". $row["dose"]."</td><td>".$row["vac_date"]."</td><td>".$row["vac_type"]."</td></tr>";
}
echo "</tbody></table>";*/
displayQuery($result);
