<?php
include "configuration.php";
$db = getConnect();
$sql = "select fac_type, fac_name from Facilities";
$result = $db->query($sql);
displayQuery($result);
