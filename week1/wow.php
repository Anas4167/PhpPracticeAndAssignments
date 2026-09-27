
<?php

$name = "Mohamed Ali";
$age = 22;
$course = "Computer Science";

$message = "Hello, my name is $name. I am $age years old and I study $course.";

echo "<h2>👤 Student Information</h2>";
echo $message;

echo "<br><br>";

echo "Welcome, " . $name;

echo "<h2>📝 String Functions</h2>";

$greeting = "Good Evening";

echo "Greeting: $greeting";
echo "<br>";

echo "Length of \"$greeting\": " . strlen($greeting);

$text = "PHP is a powerful programming language";

echo "<br><br>";

echo "Text: $text";
echo "<br>";

echo "Number of words: " . str_word_count($text);
echo "<br>";

echo "Character at position [4]: " . $text[4];
echo "<br>";

echo "Position of \"powerful\": " . strpos($text, "powerful");
echo "<br>";

echo "Replace PHP with Java: " . str_replace("PHP", "Java", $text);

define("TAX", 0.10);

$price = 50;

$taxAmount = $price * TAX;
$total = $price + $taxAmount;

echo "<h2>💰 Price Calculation</h2>";

echo "Original Price: $" . $price;
echo "<br>";

echo "Tax Rate: " . (TAX * 100) . "%";
echo "<br>";

echo "Tax Amount: $" . $taxAmount;
echo "<br>";

echo "Total Price: $" . $total;

echo "<h2>🎓 Age Check</h2>";

$age = 22;

$status = ($age >= 18) ? "Adult" : "Child";

echo "Age: $age";
echo "<br>";

echo "Status: $status";

echo "<h2>🔢 Numbers</h2>";

$x = 10;
$y = 7;

echo "Original X: $x";
echo "<br>";

echo "Original Y: $y";
echo "<br>";

echo "After ++X: " . ++$x;

echo "<br><br>";

echo ($x > $y)
    ? "$x is greater than $y"
    : "$x is less than $y";

echo "<h2>🧠 Logical Operators</h2>";

$result = (5 + 3 * 2) > 10 && 8 > 4;

echo "Expression: (5 + 3 * 2) > 10 && 8 > 4";
echo "<br>";

echo "Result: ";

echo $result ? "TRUE" : "FALSE";

echo "<h2>✅ Boolean</h2>";

$isStudent = true;

echo "Is student: ";

echo $isStudent ? "YES" : "NO";

?>
