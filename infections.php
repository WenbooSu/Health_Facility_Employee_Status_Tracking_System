<?php
include "configuration.php";
echo "<h1>Infections</h1>";
$db = getConnect();
$sql = "SELECT * FROM Infection";
$result = $db->query($sql);
/*echo "<table><thead><tr><th>EID</th><th>infection_count</th><th>infection_date</th><th>nature</th></tr></thead>";
while ($row = $result->fetch_assoc()) {
    echo "<td>".$row["EID"]."</td><td>". $row["infection_count"]."</td><td>".$row["infection_date"]."</td><td>".$row["nature"]."</td></tr>";
}
echo "</tbody></table>";*/
displayQuery($result);
