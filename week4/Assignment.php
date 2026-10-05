<?php

/* =========================================================
   MAIN PAGE DESIGN
========================================================= */

echo "
<style>

    * {
        box-sizing: border-box;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
        background: #f4f6f9;
        margin: 0;
        padding: 30px;
        color: #222;
    }

    .container {
        max-width: 1100px;
        margin: auto;
    }

    .question {
        background: white;
        margin-bottom: 35px;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.10);
        border: 1px solid #ddd;
    }

    .question-title {
        background: #333;
        color: white;
        padding: 14px 18px;
        border-radius: 8px;
        font-size: 22px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin: 15px auto;
        font-size: 17px;
        background: white;
    }

    th {
        background: #e5e5e5;
        font-weight: bold;
    }

    th, td {
        border: 1px solid #555;
        padding: 11px 14px;
        text-align: center;
    }

    tr:hover td {
        background: #f5f5f5;
    }

    .result-table {
        max-width: 800px;
    }

    .array-table {
        width: 300px;
        margin-left: 0;
    }

    .array-table td {
        font-size: 20px;
        font-weight: bold;
        padding: 14px;
    }

    .gray {
        background: #888 !important;
        color: white;
    }

    .result {
        background: #f7f7f7;
        border: 1px solid #ccc;
        padding: 14px 18px;
        margin: 8px 0;
        border-radius: 6px;
        font-size: 18px;
    }

    .pass {
        color: green;
        font-weight: bold;
    }

    .fail {
        color: red;
        font-weight: bold;
    }

    .semester {
        background: #d9d9d9;
        font-weight: bold;
    }

</style>

<div class='container'>
";


//QUESTION 1

echo "
<div class='question'>

    <div class='question-title'>
        Question 1
    </div>
";


$numbers = array(
    5, -7, 12, 10, -7, 11,
    -6, 12, 1, -7, 2, 9
);


/* All elements */

echo "<div class='result'><b>All elements:</b> ";

foreach ($numbers as $number) {
    echo $number . ", ";
}

echo "</div>";


/* Total */

$total = 0;

foreach ($numbers as $number) {
    $total = $total + $number;
}

echo "
<div class='result'>
    <b>Total of all elements:</b> $total
</div>
";


/* Even */

$evenTotal = 0;

foreach ($numbers as $number) {

    if ($number % 2 == 0) {
        $evenTotal = $evenTotal + $number;
    }
}

echo "
<div class='result'>
    <b>Total of even elements:</b> $evenTotal
</div>
";


/* Odd */

$oddTotal = 0;

foreach ($numbers as $number) {

    if ($number % 2 != 0) {
        $oddTotal = $oddTotal + $number;
    }
}

echo "
<div class='result'>
    <b>Total of odd elements:</b> $oddTotal
</div>
";


/* Minimum */

$minimum = $numbers[0];
$minPositions = array();

foreach ($numbers as $index => $number) {

    if ($number < $minimum) {

        $minimum = $number;
        $minPositions = array($index);

    }
    elseif ($number == $minimum) {

        $minPositions[] = $index;

    }
}

echo "
<div class='result'>
    <b>Minimum element:</b> $minimum
</div>

<div class='result'>
    <b>Minimum positions:</b>
";

foreach ($minPositions as $position) {
    echo $position . " ";
}

echo "</div>";


/* Maximum */

$maximum = $numbers[0];
$maxPositions = array();

foreach ($numbers as $index => $number) {

    if ($number > $maximum) {

        $maximum = $number;
        $maxPositions = array($index);

    }
    elseif ($number == $maximum) {

        $maxPositions[] = $index;

    }
}

echo "
<div class='result'>
    <b>Maximum element:</b> $maximum
</div>

<div class='result'>
    <b>Maximum positions:</b>
";

foreach ($maxPositions as $position) {
    echo $position . " ";
}

echo "
</div>

</div>
";


// QUESTION 2

echo "
<div class='question'>

    <div class='question-title'>
        Question 2
    </div>
";


$data = array(

    "Light" => array(
        "Red" => "Light Red",
        "Green" => "Light Green",
        "Blue" => "Light Blue"
    ),

    "Normal" => array(
        "Red" => "Normal Red",
        "Green" => "Normal Green",
        "Blue" => "Normal Blue"
    ),

    "Dark" => array(
        "Red" => "Dark Red",
        "Green" => "Dark Green",
        "Blue" => "Dark Blue"
    )

);


echo "<table>";

echo "
<tr>
    <th></th>
    <th>Red</th>
    <th>Green</th>
    <th>Blue</th>
</tr>
";


foreach ($data as $rowName => $row) {

    echo "<tr>";

    echo "<th>$rowName</th>";

    foreach ($row as $value) {

        echo "<td>$value</td>";

    }

    echo "</tr>";
}


echo "
</table>

</div>
";


// QUESTION 3

echo "
<div class='question'>

    <div class='question-title'>
        Question 3
    </div>
";


$numbers = array(

    array(2, -6, 8),

    array(-6, 1, 6),

    array(7, 8, -6)

);


/* Odd */

$oddTotal = 0;

foreach ($numbers as $row) {

    foreach ($row as $number) {

        if ($number % 2 != 0) {

            $oddTotal = $oddTotal + $number;

        }
    }
}


/* Even */

$evenTotal = 0;

foreach ($numbers as $row) {

    foreach ($row as $number) {

        if ($number % 2 == 0) {

            $evenTotal = $evenTotal + $number;

        }
    }
}


/* Total */

$total = 0;

foreach ($numbers as $row) {

    foreach ($row as $number) {

        $total = $total + $number;

    }
}


/* Minimum */

$minimum = $numbers[0][0];

$minPositions = array();

for ($i = 0; $i < 3; $i++) {

    for ($j = 0; $j < 3; $j++) {

        if ($numbers[$i][$j] < $minimum) {

            $minimum = $numbers[$i][$j];

            $minPositions = array("[$i,$j]");

        }
        elseif ($numbers[$i][$j] == $minimum) {

            $minPositions[] = "[$i,$j]";

        }
    }
}


/* Maximum */

$maximum = $numbers[0][0];

$maxPositions = array();

for ($i = 0; $i < 3; $i++) {

    for ($j = 0; $j < 3; $j++) {

        if ($numbers[$i][$j] > $maximum) {

            $maximum = $numbers[$i][$j];

            $maxPositions = array("[$i,$j]");

        }
        elseif ($numbers[$i][$j] == $maximum) {

            $maxPositions[] = "[$i,$j]";

        }
    }
}


/* Display results */

echo "
<div class='result'>
    <b>Total odd elements:</b> $oddTotal
</div>

<div class='result'>
    <b>Total even elements:</b> $evenTotal
</div>
";


/* Array table */

echo "
<table class='array-table'>
";

foreach ($numbers as $i => $row) {

    echo "<tr>";

    foreach ($row as $j => $number) {

        if (
            ($i == 0 && $j == 0) ||
            ($i == 2 && $j == 2)
        ) {

            echo "<td class='gray'>$number</td>";

        } else {

            echo "<td>$number</td>";

        }

    }

    echo "</tr>";
}

echo "</table>";


echo "
<div class='result'>
    <b>Total all elements:</b> $total
</div>

<div class='result'>
    <b>Minimum element:</b> $minimum
    <br>
    <b>Positions:</b> " . implode(", ", $minPositions) . "
</div>

<div class='result'>
    <b>Maximum element:</b> $maximum
    <br>
    <b>Positions:</b> " . implode(", ", $maxPositions) . "
</div>

</div>
";


// QUESTION 4

echo "
<div class='question'>

    <div class='question-title'>
        Question 4
    </div>
";


$students = array(

    "CA221" => array(
        "Name" => "Mohamed Ahmed Ali",
        "Phone" => "0648440403",
        "Address" => "Laba Dhagax, Wardhiigley"
    ),

    "CA223" => array(
        "Name" => "Ahmed Abdi Jama",
        "Phone" => "0647223201",
        "Address" => "Taleex, Hodan"
    ),

    "CA221_2" => array(
        "Name" => "Amina Nur Adan",
        "Phone" => "0646990276",
        "Address" => "Macmacaanka, Dharkeynley"
    )

);


echo "<table>";

echo "
<tr>
    <th>Student ID</th>
    <th>Name</th>
    <th>Phone</th>
    <th>Address</th>
</tr>
";


foreach ($students as $id => $student) {

    echo "<tr>";

    echo "<th>$id</th>";

    echo "<td>" . $student["Name"] . "</td>";

    echo "<td>" . $student["Phone"] . "</td>";

    echo "<td>" . $student["Address"] . "</td>";

    echo "</tr>";
}


echo "
</table>

</div>
";


// QUESTION 5

echo "
<div class='question'>

    <div class='question-title'>
        Question 5
    </div>
";


$transcript = array(

    "Semester 1" => array(

        "subject1" => array(
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 40,
            "Total" => 85,
            "Status" => "Pass"
        ),

        "subject2" => array(
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 40,
            "Total" => 85,
            "Status" => "Pass"
        ),

        "subject3" => array(
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 40,
            "Total" => 85,
            "Status" => "Pass"
        )

    ),

    "Semester 2" => array(

        "subject1" => array(
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 40,
            "Total" => 85,
            "Status" => "Pass"
        ),

        "subject2" => array(
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 0,
            "Total" => 45,
            "Status" => "Fail"
        ),

        "subject3" => array(
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 40,
            "Total" => 85,
            "Status" => "Pass"
        )

    )

);


echo "<table>";

echo "
<tr>
    <th>Semester</th>
    <th>Course</th>
    <th>CW1</th>
    <th>MidTerm</th>
    <th>CW2</th>
    <th>Final</th>
    <th>Total</th>
    <th>Status</th>
</tr>
";


foreach ($transcript as $semester => $subjects) {

    $firstRow = true;

    foreach ($subjects as $subject => $marks) {

        echo "<tr>";

        if ($firstRow) {

            echo "
            <td class='semester' rowspan='3'>
                $semester
            </td>
            ";

            $firstRow = false;
        }

        echo "<td>$subject</td>";

        echo "<td>" . $marks["CW1"] . "</td>";

        echo "<td>" . $marks["MidTerm"] . "</td>";

        echo "<td>" . $marks["CW2"] . "</td>";

        echo "<td>" . $marks["Final"] . "</td>";

        echo "<td>" . $marks["Total"] . "</td>";


        if ($marks["Status"] == "Pass") {

            echo "<td class='pass'>Pass</td>";

        } else {

            echo "<td class='fail'>Fail</td>";

        }

        echo "</tr>";
    }
}


echo "
</table>

</div>

</div>
";


?>