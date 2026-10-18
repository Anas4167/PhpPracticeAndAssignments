
<?php
session_start();

if (!isset($_SESSION["student"])) {
    header("Location: studentRegistration.php");
    exit;
}

$student = $_SESSION["student"];

function e($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, "UTF-8");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-success text-white text-center">
            <h2>Student Registration Successful</h2>
        </div>

        <div class="card-body">

            <h4>Personal Information</h4>

            <?php if (!empty($student["image"])): ?>
                <img src="<?= e($student["image"]) ?>"
                     alt="Student Image"
                     width="120"
                     class="img-thumbnail mb-3">
            <?php endif; ?>

            <table class="table table-bordered table-striped">
                <tr><th>Name</th><td><?= e($student["name"]) ?></td></tr>
                <tr><th>POB</th><td><?= e($student["pob"]) ?></td></tr>
                <tr><th>DOB</th><td><?= e($student["dob"]) ?></td></tr>
                <tr><th>Address</th><td><?= e($student["address"]) ?></td></tr>
                <tr><th>Gender</th><td><?= e($student["gender"]) ?></td></tr>
                <tr><th>Telephone</th><td><?= e($student["telephone"]) ?></td></tr>
                <tr><th>Email</th><td><?= e($student["email"]) ?></td></tr>
            </table>

            <h4>Parent Information</h4>

            <table class="table table-bordered table-striped">
                <tr><th>Name</th><td><?= e($student["parent_name"]) ?></td></tr>
                <tr><th>Telephone</th><td><?= e($student["parent_telephone"]) ?></td></tr>
                <tr><th>Relationship</th><td><?= e($student["relationship"]) ?></td></tr>
            </table>

            <h4>Academic Information</h4>

            <table class="table table-bordered table-striped">
                <tr><th>ID</th><td><?= e($student["student_id"]) ?></td></tr>
                <tr><th>Faculty</th><td><?= e($student["faculty"]) ?></td></tr>
                <tr><th>Department</th><td><?= e($student["department"]) ?></td></tr>
                <tr><th>Class</th><td><?= e($student["class"]) ?></td></tr>
                <tr><th>Registration Date</th><td><?= e($student["registration_date"]) ?></td></tr>
            </table>

            <a href="studentRegistration.php" class="btn btn-primary">
                Register Another Student
            </a>

        </div>
    </div>
</div>

</body>
</html>
