<?php
function getConnect()
{
    return new mysqli("pbc353.encs.concordia.ca","pbc353_4","COMP6688","pbc353_4");
}

function displayQuery($result) {
    if ($result->num_rows > 0) {
        // Start the HTML table
        echo "<table border='1'>";

        // Display table headers
        $columnNames = $result->fetch_fields();
        echo "<tr>";
        foreach ($columnNames as $column) {
            echo "<th>" . $column->name . "</th>";
        }
        echo "</tr>";

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
        }

        // Close the HTML table
        echo "</table>";
    } else {
        echo "No results found.";
    }
}

function displayEmp($result) {
    if ($result->num_rows > 0) {
        // Start the HTML table
        echo "<table border='1'>";

        // Display table headers
        $columnNames = $result->fetch_fields();
        echo "<tr>";
        foreach ($columnNames as $column) {
            echo "<th>" . $column->name . "</th>";
        }
        echo "<th>Action</th>";
        echo "</tr>";

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "<td>";
            echo "<form action='DeleteEmployees.php' method='POST'>";
            echo "<input type='hidden' name='EID' value='" . $row['EID'] . "'>";
            echo "<input type='submit' name='delete' value='Delete'>";
            echo "</form>";
            echo "<form action='EditEmployees.php' method='POST'>";
            echo "<input type='hidden' name='EID' value='" . $row['EID'] . "'>";
            echo "<input type='submit' name='edit' value='Edit'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No results found.";
    }
}

function displaySch($result) {
    if ($result->num_rows > 0) {
        // Start the HTML table
        echo "<table border='1'>";

        // Display table headers
        $columnNames = $result->fetch_fields();
        echo "<tr>";
        foreach ($columnNames as $column) {
            echo "<th>" . $column->name . "</th>";
        }
        echo "<th>Action</th>";
        echo "</tr>";

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "<td>";
            echo "<form action='DeleteSchedules.php' method='POST'>";
            echo "<input type='hidden' name='ID' value='" . $row['ID'] . "'>";
            echo "<input type='submit' name='delete' value='Delete'>";
            echo "</form>";
            echo "<form action='EditSchedules.php' method='POST'>";
            echo "<input type='hidden' name='ID' value='" . $row['ID'] . "'>";
            echo "<input type='hidden' name='EID' value='" . $row['EID'] . "'>";
            echo "<input type='submit' name='edit' value='Edit'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No results found.";
    }
}

function checkScheduleConflict($db, $EID, $new_start_time, $new_end_time, $new_date) {
    $sql = "SELECT * FROM Schedule WHERE EID = '$EID' AND date = '$new_date'";
    $result = $db->query($sql);

    while ($row = $result->fetch_assoc()) {
        $existing_start_time = strtotime($row['start_time']);
        $existing_end_time = strtotime($row['end_time']);
        $new_start = strtotime($new_start_time);
        $new_end = strtotime($new_end_time);

        if (($new_start >= $existing_start_time && $new_start < $existing_end_time) ||
            ($new_end > $existing_start_time && $new_end <= $existing_end_time) ||
            ($new_start <= $existing_start_time && $new_end >= $existing_end_time)) {
            return true; // conflict detected
        }
    }

    return false; // no conflict
}

function isDocNurse($db, $EID)
{
    $sql = "SELECT * FROM Employees WHERE EID = '$EID'";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    if($row['role'] == 'doctor' || $row['role'] == 'nurse')
    {
        return true;
    }
    else
    {
        return false;
    }
}

function displayInf($result) {
    if ($result->num_rows > 0) {
        // Start the HTML table
        echo "<table border='1'>";

        // Display table headers
        $columnNames = $result->fetch_fields();
        echo "<tr>";
        foreach ($columnNames as $column) {
            echo "<th>" . $column->name . "</th>";
        }
        echo "<th>Action</th>";
        echo "</tr>";

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "<td>";
            echo "<form action='DeleteInfections.php' method='POST'>";
            echo "<input type='hidden' name='EID' value='" . $row['EID'] . "'>";
            echo "<input type='hidden' name='infection_count' value='" . $row['infection_count'] . "'>";
            echo "<input type='submit' name='delete' value='Delete'>";
            echo "</form>";
            echo "<form action='EditInfections.php' method='POST'>";
            echo "<input type='hidden' name='EID' value='" . $row['EID'] . "'>";
            echo "<input type='hidden' name='infection_count' value='" . $row['infection_count'] . "'>";
            echo "<input type='submit' name='edit' value='Edit'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No results found.";
    }
}
function displayVac($result) {
    if ($result->num_rows > 0) {
        // Start the HTML table
        echo "<table border='1'>";

        // Display table headers
        $columnNames = $result->fetch_fields();
        echo "<tr>";
        foreach ($columnNames as $column) {
            echo "<th>" . $column->name . "</th>";
        }
        echo "<th>Action</th>";
        echo "</tr>";

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "<td>";
            echo "<form action='DeleteVaccines.php' method='POST'>";
            echo "<input type='hidden' name='EID' value='" . $row['EID'] . "'>";
            echo "<input type='hidden' name='dose' value='" . $row['dose'] . "'>";
            echo "<input type='submit' name='delete' value='Delete'>";
            echo "</form>";
            echo "<form action='EditVaccines.php' method='POST'>";
            echo "<input type='hidden' name='EID' value='" . $row['EID'] . "'>";
            echo "<input type='hidden' name='dose' value='" . $row['dose'] . "'>";
            echo "<input type='submit' name='edit' value='Edit'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No results found.";
    }
}
function displayFac($result) {
    if ($result->num_rows > 0) {
        // Start the HTML table
        echo "<table border='1'>";

        // Display table headers
        $columnNames = $result->fetch_fields();
        echo "<tr>";
        foreach ($columnNames as $column) {
            echo "<th>" . $column->name . "</th>";
        }
        echo "<th>Action</th>";
        echo "</tr>";

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "<td>";
            echo "<form action='DeleteFacilities.php' method='POST'>";
            echo "<input type='hidden' name='fac_name' value='" . $row['fac_name'] . "'>";
            echo "<input type='submit' name='delete' value='Delete'>";
            echo "</form>";
            echo "<form action='EditFacilities.php' method='POST'>";
            echo "<input type='hidden' name='fac_name' value='" . $row['fac_name'] . "'>";
            echo "<input type='submit' name='edit' value='Edit'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No results found.";
    }
}
