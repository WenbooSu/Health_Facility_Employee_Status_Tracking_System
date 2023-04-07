<?php
include "configuration.php";
$db = getConnect();
echo "<h1>Facilities</h1>";
$sql = "SELECT * FROM Facilities";
$result = $db->query($sql);
/*echo "<table><thead><tr><th>fac_name</th><th>fac_type</th><th>fac_web</th><th>capacity</th><th>fac_phone</th><th>address</th><th>city</th><th>province</th><th>postal_code</th></tr></thead>";
echo "<tbody>";
while ($row = $result->fetch_assoc()) {
    echo "<td>".$row["fac_name"]."</td><td>". $row["fac_type"]."</td><td>".$row["fac_web"]."</td><td>".$row["capacity"]."</td><td>".$row["fac_phone"]."</td><td>". $row["address"]."</td><td>".$row["city"]."</td><td>".$row["province"]."</td><td>".$row["postal_code"]."</td></tr>";
}
echo "</tbody>";
echo "</table>";*/
displayQuery($result);