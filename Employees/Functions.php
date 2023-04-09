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
            echo "<form action='DeleteEmployee.php' method='POST'>";
            echo "<input type='hidden' name='EID' value='" . $row['EID'] . "'>";
            echo "<input type='submit' name='delete' value='Delete'>";
            echo "</form>";
            echo "<form action='EditEmployee.php' method='POST'>";
            echo "<input type='hidden' name='EID' value='" . $row['EID'] . "'>";
            echo "<input type='submit' name='edit' value='Edit'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }

        // Close the HTML table
        echo "</table>";
    } else {
        echo "No results found.";
    }
}
