<?php


//question one

$data = array(

    "Somalia" => array(
        "Capital" => "Mogadishu"
    ),

    "Kenya" => array(
        "Capital" => "Nairobi"
    ),

    "Ethiopia" => array(
        "Capital" => "Addis Ababa"
    ),

    "Djibouti" => array(
        "Capital" => "Djibouti"
    ),

    "Uganda" => array(
        "Capital" => "Kampala"
    ),

    "Tanzania" => array(
        "Capital" => "Dodoma"
    )

);

function PrintCapital($country) {
    global $data;

    if (isset($data[$country])) {

        echo "The capital of $country is: ";
        echo $data[$country]["Capital"];

    } else {

        echo "$country 's capital not found";
    }
}


PrintCapital("Kenya");

 echo "<br> <br> <br>";

 echo "all countries with thier capital";

  echo "<br> <br>";


foreach ($data as $country => $details) {

    echo "Country: " . $country . "<br>";
    echo "Capital: " . $details["Capital"] . "<br><br>";

}

//question two

$numbers = array(10, 20, 30, 40, 50);


function sumArray($arr) {

    $sum = 0;

    for ($i = 0; $i < count($arr); $i++) {

        $sum += $arr[$i];

    }

    return $sum;
}


$result = sumArray($numbers);


echo "The sum of the array elements = " . $result;

 echo "<br> <br> <br>";



//question three

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
            "Total" => 55,
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

?>

<style>

table {
    border-collapse: collapse;
    width: 80%;
    text-align: center;
}

th, td {
    border: 1px solid black;
    padding: 10px;
}

th {
    background-color: #333;
    color: white;
}


.semester {
    background-color: white;
    color: black;
    font-weight: bold;
}


.warning {
    background-color: yellow;
}


.danger {
    background-color: red;
    color: white;
}


.gray {
    background-color: gray;
    color: white;
}

</style>


<table>

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


<?php

foreach ($transcript as $semester => $subjects) {

    $firstRow = true;

    foreach ($subjects as $subject => $marks) {

        $total = $marks["Total"];


        
        if ($total >= 50 && $total <= 60) {

            $rowClass = "warning";

        } elseif ($total < 50) {

            $rowClass = "danger";

        } else {

            $rowClass = "gray";

        }


        echo "<tr class='$rowClass'>";


        
        if ($firstRow) {

            echo "
            <td class='semester' rowspan='3'>
                $semester
            </td>
            ";

            $firstRow = false;
        }


        echo "<td>" . $subject . "</td>";

        echo "<td>" . $marks["CW1"] . "</td>";

        echo "<td>" . $marks["MidTerm"] . "</td>";

        echo "<td>" . $marks["CW2"] . "</td>";

        echo "<td>" . $marks["Final"] . "</td>";

        echo "<td>" . $marks["Total"] . "</td>";

        echo "<td>" . $marks["Status"] . "</td>";

        echo "</tr>";
    }
}




?>