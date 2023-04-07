<?php
include "configuration.php";
echo "<h1>"."Employees"."</h1>"."<br>";
$db = getConnect();
$sql = "SELECT * FROM Employees";
$result = $db->query($sql);
/*echo "<table><thead><tr><th>EID</th><th>first_name</th><th>last_name</th><th>date_of_birth</th><th>med_card</th><th>role</th><th>citizenship</th><th>emp_phone</th><th>emp_email</th><th>address</th><th>city</th><th>province</th><th>postal_code</th></tr></thead>";
echo "<tbody>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["EID"]."</td><td>". $row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["date_of_birth"]."</td><td>".$row["med_card"]."</td><td>".$row["role"]."</td><td>".$row["citizenship"]."</td><td>".$row["emp_phone"]."</td><td>".$row["emp_email"]."</td><td>".$row["address"]."</td><td>".$row["city"]."</td><td>".$row["province"]."</td><td>".$row["postal_code"]."</td></tr>";
}
echo "</tody></table>";*/
displayQuery($result);



