<?php

//1 Integer numbers

$a = 12;
$b = 45;
$c = 7;

// Find greatest
if ($a >= $b && $a >= $c) {
    $greatest = $a;
} elseif ($b >= $a && $b >= $c) {
    $greatest = $b;
} else {
    $greatest = $c;
}

// Find smallest
if ($a <= $b && $a <= $c) {
    $smallest = $a;
} elseif ($b <= $a && $b <= $c) {
    $smallest = $b;
} else {
    $smallest = $c;
}

echo "<div style='font-family: Arial, sans-serif; background:#f4f4f4; padding:20px; border-radius:10px; width:300px;'>";
echo "<h3 style='color:#333;'>1 Integer Numbers Comparison</h3>";
echo "<p style='color:blue;'>Numbers: <b>$a, $b, $c</b></p>";
echo "<p style='color:green;'>Greatest number: <b>$greatest</b></p>";
echo "<p style='color:red;'>Smallest number: <b>$smallest</b></p>";
echo "</div>";


//2 number divisible by 3,5

$number = 15; 

switch (true) {
    case $number % 3 == 0 && $number % 5 == 0:
        $result = "divisible by both 3 and 5";
        $color = "purple";
        break;

    case $number % 3 == 0:
        $result = "divisible by 3";
        $color = "green";
        break;

    case $number % 5 == 0:
        $result = "divisible by 5";
        $color = "blue";
        break;

    default:
        $result = "divisible by neither 3 nor 5";
        $color = "red";
}

echo "<div style='font-family: Arial, sans-serif; margin-top: 20px; background:#f4f4f4; padding:20px; border-radius:10px; width:300px;'>";
echo "<h3 style='color:black;'>2 Divisibility Check</h3>";
echo "<p style='color:blue;'>Number: <b>$number</b></p>";
echo "<p style='color:$color;'>Result: <b>$result</b></p>";
echo "</div>";



//3 odd and even numbers

//Odd numbers from 2 to 20
$odds = "";
for ($i = 2; $i <= 20; $i++) {
    if ($i % 2 != 0) {
        $odds .= $i . " ";
    }
}

// Even numbers from 35 down to 7
$evens = "";
for ($i = 35; $i >= 7; $i--) {
    if ($i % 2 == 0) {
        $evens .= $i . " ";
    }
}

echo "<div style='font-family: Arial, sans-serif; margin-top: 20px; background:#f4f4f4; padding:20px; border-radius:10px; width:300px;'>";
echo "<h3 style='color:black;'>3 Odd & Even Numbers</h3>";
echo "<p style='color:green;'>Odd numbers from 2 to 20: <b>$odds</b></p>";
echo "<p style='color:blue;'>Even numbers from 35 to 7: <b>$evens</b></p>";
echo "</div>";


//4 Numbers divisible by both 2 and 5, from 50 down to 2

$result = "";
for ($i = 50; $i >= 2; $i--) {
    if ($i % 2 == 0 && $i % 5 == 0) {
        $result .= $i . " ";
    }
}

echo "<div style='font-family: Arial, sans-serif; margin-top: 20px; background:#f4f4f4; padding:20px; border-radius:10px; width:300px;'>";
echo "<h3 style='color:#333;'> 4 Divisible by 2 and 5</h3>";
echo "<p style='color:navy;'>Numbers from 50 to 2: <b>$result</b></p>";
echo "</div>";

//5 reverse of a given number

$number = 12345;
$original = $number;
$reversed = 0;

while ($number > 0) {

    $digit = $number % 10;

    $reversed = $reversed * 10 + $digit;

    $number = intdiv($number, 10);
}

echo "<div style='font-family: Arial, sans-serif; margin-top: 20px; background:#f4f4f4; padding:20px; border-radius:10px; width:300px;'>";
echo "<h3 style='color:#333;'>5 Reverse a Number</h3>";
echo "<p style='color:#555;'>Original number: <b>$original</b></p>";
echo "<p style='color:teal;'>Reversed number: <b>$reversed</b></p>";
echo "</div>";


//6 LCM

$a = 4;
$b = 6;

if ($a > $b) {
    $start = $a;
} else {
    $start = $b;
}

for ($i = $start; ; $i++) {

    if ($i % $a == 0 && $i % $b == 0) {
        $lcm = $i;
        break;
    }
}


echo "<div style='font-family: Arial, sans-serif; margin-top: 20px; background:#f4f4f4; padding:20px; border-radius:10px; width:300px;'>";
echo "<h3 style='color:#333;'>6 LCM Calculator</h3>";
echo "<p style='color:#555;'>Numbers: <b>$a</b> and <b>$b</b></p>";
echo "<p style='color:teal;'>LCM: <b>$lcm</b></p>";
echo "</div>";


//7 HCF

$a = 20;
$b = 26;

$hcf = 1;

for ($i = 1; $i <= $a && $i <= $b; $i++) {

    if ($a % $i == 0 && $b % $i == 0) {
        $hcf = $i;
    }
}


echo "<div style='font-family: Arial, sans-serif; margin-top: 20px; background:#f4f4f4; padding:20px; border-radius:10px; width:300px;'>";
echo "<h3 style='color:#333;'>7 HCF Calculator</h3>";
echo "<p style='color:#555;'>Numbers: <b>$a</b> and <b>$b</b></p>";
echo "<p style='color:darkorange;'>HCF: <b>$hcf</b></p>";
echo "</div>";

//8 table

echo "<div style='font-family: Georgia, serif; text-align:left;'>";
echo "<h2 style='color:#a0522d; padding-left:60px;'>Multiplication Table</h2>";

echo "<table style='border-collapse:collapse; margin:left; width:300px;'>";

for ($i = 1; $i <= 12; $i++) {
    echo "<tr>";
    for ($j = 1; $j <= 12; $j++) {
        $product = $i * $j;
        echo "<td style='border:1px solid #333; padding:2px 4px; color:navy; font-weight:bold;'>$product</td>";
    }
    echo "</tr>";
}

echo "</table>";
echo "</div>";


//9 whether the number is a prime or non-prime

$number = 53;
$count = 0;

for ($i = 1; $i <= $number; $i++) {

    if ($number % $i == 0) {
        $count++;
    }
}

if ($count == 2) {
    $isPrime = true;
} else {
    $isPrime = false;
}

echo "<div style='font-family: Arial, sans-serif; margin-top: 20px; background:#f4f4f4; padding:20px; border-radius:10px; width:300px;'>";
echo "<h3 style='color:#333;'>9 Prime Number Check</h3>";
echo "<p style='color:#555;'>Number: <b>$number</b></p>";

if ($isPrime) {
    echo "<p style='color:green;'>Result: <b>$number is a prime number</b></p>";
} else {
    echo "<p style='color:red;'>Result: <b>$number is not a prime number</b></p>";
}

echo "</div>";

//10 prime numbers 10 to 50

$start = 10;
$end = 50;

echo "<div style='font-family: Arial, sans-serif; margin-top: 20px; background:#f4f4f4; padding:20px; border-radius:10px; width:300px;'>";
echo "<h3 style='color:#333;'>10 Prime Numbers from $start to $end</h3>";
echo "<p style='color:green;'>";

for ($number = $start; $number <= $end; $number++) {

    $count = 0;

    for ($i = 1; $i <= $number; $i++) {

        if ($number % $i == 0) {
            $count++;
        }
    }

    if ($count == 2) {
        echo "$number ";
    }
}

echo "</p>";
echo "</div>";

?>

