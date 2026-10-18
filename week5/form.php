
<?php

$errMsg = [];

if (isset($_GET["submit"])) {

    if (empty(trim($_GET["fullname"] ?? ""))) {
        $errMsg["fullname"] = "Fullname is required.";
    }

    if (empty(trim($_GET["email"] ?? ""))) {
        $errMsg["email"] = "Email is required.";
    }

    if (empty(trim($_GET["pob"] ?? ""))) {
        $errMsg["pob"] = "Place of Birth is required.";
    }

    if (empty($_GET["gender"] ?? "")) {
        $errMsg["gender"] = "Gender is required.";
    }

    if (empty($_GET["faculty"] ?? "")) {
        $errMsg["faculty"] = "Faculty is required.";
    }

    if (empty($_GET["languages"] ?? [])) {
        $errMsg["languages"] = "Languages are required.";
    }

    if (empty(trim($_GET["comment"] ?? ""))) {
        $errMsg["comment"] = "Comment is required.";
    }
}

?>


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
</head>

<body>

<form method="get" action="">

    <h1>Student Registration Form</h1>

    <fieldset>
        <legend>Personal Info</legend>

 
        <label>Fullname:</label><br>

        <input type="text" name="fullname"
        value="<?php echo htmlspecialchars($_GET['fullname'] ?? ''); ?>">

        <?php
        if (isset($errMsg["fullname"]))
            echo "<font color='red'>" . $errMsg["fullname"] . "</font>";
        ?>

        <br><br>

   
        <label>Email:</label><br>

        <input type="email" name="email"
        value="<?php echo htmlspecialchars($_GET['email'] ?? ''); ?>">

        <?php
        if (isset($errMsg["email"]))
            echo "<font color='red'>" . $errMsg["email"] . "</font>";
        ?>

        <br><br>

      
        <label>Place of Birth:</label><br>

        <input type="text" name="pob"
        value="<?php echo htmlspecialchars($_GET['pob'] ?? ''); ?>">

        <?php
        if (isset($errMsg["pob"]))
            echo "<font color='red'>" . $errMsg["pob"] . "</font>";
        ?>

        <br><br>

   
        <label>Gender:</label><br>

        <input type="radio" name="gender" value="male"
        <?php if (($_GET["gender"] ?? "") == "male") echo "checked"; ?>>
        Male

        <input type="radio" name="gender" value="female"
        <?php if (($_GET["gender"] ?? "") == "female") echo "checked"; ?>>
        Female

        <?php
        if (isset($errMsg["gender"]))
            echo "<font color='red'>" . $errMsg["gender"] . "</font>";
        ?>

        <br><br>



        <label>Faculty:</label><br>

        <select name="faculty">

            <option value="">Select Faculty</option>

            <option value="computer"
            <?php if (($_GET["faculty"] ?? "") == "computer") echo "selected"; ?>>
                Computer and IT
            </option>

            <option value="medicine"
            <?php if (($_GET["faculty"] ?? "") == "medicine") echo "selected"; ?>>
                Medicine and Health Science
            </option>

            <option value="engineering"
            <?php if (($_GET["faculty"] ?? "") == "engineering") echo "selected"; ?>>
                Engineering
            </option>

            <option value="ecom"
            <?php if (($_GET["faculty"] ?? "") == "ecom") echo "selected"; ?>>
                Business
            </option>

        </select>

        <?php
        if (isset($errMsg["faculty"]))
            echo "<font color='red'>" . $errMsg["faculty"] . "</font>";
        ?>

        <br><br>


        <label>Languages:</label><br>

        <input type="checkbox" name="languages[]" value="Somali"
        <?php if (in_array("Somali", $_GET["languages"] ?? [])) echo "checked"; ?>>
        Somali

        <input type="checkbox" name="languages[]" value="English"
        <?php if (in_array("English", $_GET["languages"] ?? [])) echo "checked"; ?>>
        English

        <input type="checkbox" name="languages[]" value="Arabic"
        <?php if (in_array("Arabic", $_GET["languages"] ?? [])) echo "checked"; ?>>
        Arabic

        <input type="checkbox" name="languages[]" value="Chinese"
        <?php if (in_array("Chinese", $_GET["languages"] ?? [])) echo "checked"; ?>>
        Chinese

        <?php
        if (isset($errMsg["languages"]))
            echo "<font color='red'>" . $errMsg["languages"] . "</font>";
        ?>

        <br><br>


        <label>Comment:</label><br>

        <textarea name="comment" rows="4" cols="30"><?php
            echo htmlspecialchars($_GET['comment'] ?? '');
        ?></textarea>

        <?php
        if (isset($errMsg["comment"]))
            echo "<font color='red'>" . $errMsg["comment"] . "</font>";
        ?>

        <br><br>


        <input type="submit" name="submit" value="Register">
        <input type="reset" value="Clear">

    </fieldset>

</form>

<?php


if (isset($_GET["submit"]) && empty($errMsg)) {

    echo " <font color='red'> <h2>Student Information</h2> <font color='blue'>";

    echo "Fullname: <font color='green'> " . htmlspecialchars($_GET["fullname"]) . "<br> <font color='blue'>";
    echo "Email: <font color='green'> " . htmlspecialchars($_GET["email"]) . "<br> <font color='blue'>";
    echo "Place of Birth: <font color='green'> " . htmlspecialchars($_GET["pob"]) . "<br> <font color='blue'>";
    echo "Gender: <font color='green'>" . htmlspecialchars($_GET["gender"]) . "<br> <font color='blue'>";
    echo "Faculty: <font color='green'>" . htmlspecialchars($_GET["faculty"]) . "<br> <font color='blue'>";

    echo "Languages: <font color='green'>";

    foreach ($_GET["languages"] as $value) {
        echo htmlspecialchars($value) . ", ";
    }

    echo "<br> <font color='blue'>";

    echo "Comment: <font color='green'>" . nl2br(htmlspecialchars($_GET["comment"])) . "<br>";
}

?>

</body>
</html>
