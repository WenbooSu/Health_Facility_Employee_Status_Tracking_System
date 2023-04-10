<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "Functions.php";
$db = getConnect();
$employee_id = "";
if (isset($_POST['edit']) && isset($_POST['EID'])) {
    $employee_id = $_POST['EID'];
    //$buffer_id = $employee_id;
    $sql = "SELECT * FROM Employees WHERE EID = " . $employee_id;
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        $employee_data = $result->fetch_assoc();
    } else {
        echo "No employee found.";
        exit();
    }
}
if (isset($_POST['update'])) {
    $employee_id = $_POST['employee_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $med_card = $_POST['med'];
    $role = $_POST['role'];
    $citizenship = $_POST['ctz'];
    $emp_phone = $_POST['phone'];
    $emp_email = $_POST['emp_email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $pc = $_POST['postal'];

    $sql = "UPDATE Employees SET first_name = '$first_name', last_name = '$last_name', date_of_birth='$dob'
, med_card='$med_card', role='$role', citizenship='$citizenship', emp_phone='$emp_phone', emp_email='$emp_email'
, address='$address', city='$city', province='$province', postal_code='$pc' WHERE EID = '$employee_id'";
    //EID 在第一个post的时候丢失了
    //print $sql;
    echo $sql;
    $db->query($sql);
    header("Location: Employees.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
</head>
<body>
<h1>Edit Employee</h1>
<form action="EditEmployees.php" method="POST">
    <input type="hidden" name="employee_id" value="<?php echo $employee_id; ?>">

    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" placeholder="<?php echo isset($employee_data) ? $employee_data['first_name'] : ''; ?>">
    <br><br>

    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" placeholder="<?php echo isset($employee_data) ? $employee_data['last_name'] : ''; ?>">
    <br><br>

    <label for="dob">Date of Birth:</label>
    <input type="text" id="dob" name="dob" placeholder="<?php echo isset($employee_data) ? $employee_data['date_of_birth'] : ''; ?>">
    <br><br>

    <label for="med">Med Card:</label>
    <input type="text" id="med" name="med" placeholder="<?php echo isset($employee_data) ? $employee_data['med_card'] : ''; ?>">
    <br><br>

    <label for="role">Role:</label>
    <input type="text" id="role" name="role" placeholder="<?php echo isset($employee_data) ? $employee_data['role'] : ''; ?>">
    <br><br>

    <label for="ctz">Citizenship:</label>
    <input type="text" id="ctz" name="ctz" placeholder="<?php echo isset($employee_data) ? $employee_data['citizenship'] : ''; ?>">
    <br><br>

    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" placeholder="<?php echo isset($employee_data) ? $employee_data['emp_phone'] : ''; ?>">
    <br><br>

    <label for="emp_email">E-mail:</label>
    <input type="text" id="emp_email" name="emp_email" placeholder="<?php echo isset($employee_data) ? $employee_data['emp_email'] : ''; ?>">
    <br><br>

    <label for="address">Address:</label>
    <input type="text" id="address" name="address" placeholder="<?php echo isset($employee_data) ? $employee_data['address'] : ''; ?>">
    <br><br>

    <label for="city">City:</label>
    <input type="text" id="city" name="city" placeholder="<?php echo isset($employee_data) ? $employee_data['city'] : ''; ?>">
    <br><br>

    <label for="province">Province:</label>
    <input type="text" id="province" name="province" placeholder="<?php echo isset($employee_data) ? $employee_data['province'] : ''; ?>">
    <br><br>

    <label for="postal">Postal Code:</label>
    <input type="text" id="postal" name="postal" placeholder="<?php echo isset($employee_data) ? $employee_data['postal_code'] : ''; ?>">
    <br><br>
    <input type="submit" name="update" value="Update">
</form>
</body>
</html>





