<?php

$students = array (
    array ("class"=>"CA101", "name"=>"Mohamed", "phone"=>"061223344", "address"=>"Hodan"),
    array ("class"=>"CA102", "name"=>"Abdi", "phone"=>"0614455667", "address"=>"Shangani"),
    array ("class"=>"CA103", "name"=>"Jamac", "phone"=>"0612336699", "address"=>"Xamarweyne")
);

echo "<div style='margin: 50px;'>";

echo "<table border='1' cellpadding='10' cellspacing='0'>";

echo "<tr style='background-color: gray;'>";
echo "<th style='background-color: gray;'>Class</th>";
echo "<th>Name</th>";
echo "<th>Phone</th>";
echo "<th>Address</th>";
echo "</tr>";

foreach ($students as $student) {

    echo "<tr>";

    foreach ($student as $key => $value) {

        if ($key == "class") {
            echo "<td style='background-color: gray;'>$value</td>";
        } else {
            echo "<td>$value</td>";
        }

    }

    echo "</tr>";
}

echo "</table>";

echo "</div>";

?>