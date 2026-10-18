
<?php
session_start();

$success = true;

$nameErr = "";
$pobErr = "";
$dobErr = "";
$addressErr = "";
$genderErr = "";
$telephoneErr = "";
$emailErr = "";
$imageErr = "";

$parentNameErr = "";
$parentTelephoneErr = "";
$relationshipErr = "";

$studentIdErr = "";
$facultyErr = "";
$departmentErr = "";
$classErr = "";
$registrationDateErr = "";

$name = "";
$pob = "";
$dob = "";
$address = "";
$gender = "";
$telephone = "";
$email = "";

$parentName = "";
$parentTelephone = "";
$relationship = "";

$studentId = "";
$faculty = "";
$department = "";
$class = "";
$registrationDate = "";

if (isset($_POST["submit"])) {

    $name = trim($_POST["name"] ?? "");
    $pob = trim($_POST["pob"] ?? "");
    $dob = trim($_POST["dob"] ?? "");
    $address = trim($_POST["address"] ?? "");
    $gender = $_POST["gender"] ?? "";
    $telephone = trim($_POST["telephone"] ?? "");
    $email = trim($_POST["email"] ?? "");

    $parentName = trim($_POST["parent_name"] ?? "");
    $parentTelephone = trim($_POST["parent_telephone"] ?? "");
    $relationship = trim($_POST["relationship"] ?? "");

    $studentId = trim($_POST["student_id"] ?? "");
    $faculty = trim($_POST["faculty"] ?? "");
    $department = trim($_POST["department"] ?? "");
    $class = trim($_POST["class"] ?? "");
    $registrationDate = trim($_POST["registration_date"] ?? "");


    if (empty($name)) {
        $success = false;
        $nameErr = "Please fill in the name. This field is required.";
    } elseif (!preg_match('/^[\p{L} ]+$/u', $name)) {
        $success = false;
        $nameErr = "Name must contain letters and spaces only.";
    }

    if (empty($pob)) {
        $success = false;
        $pobErr = "Please fill in the place of birth.";
    }

    if (empty($dob)) {
    $success = false;
    $dobErr = "Please select your date of birth.";
    } else {
        $date = DateTime::createFromFormat("!Y-m-d", $dob);
        $today = new DateTime("today");

        if (!$date || $date->format("Y-m-d") !== $dob) {
            $success = false;
            $dobErr = "Please enter a valid date of birth.";
        } elseif ($date > $today) {
            $success = false;
            $dobErr = "Date of birth cannot be in the future.";
        }
    }

    if (empty($address)) {
        $success = false;
        $addressErr = "Please fill in your address.";
    }

    if (empty($gender)) {
        $success = false;
        $genderErr = "Please select your gender.";
    } elseif (!in_array($gender, ["Male", "Female"], true)) {
        $success = false;
        $genderErr = "Please select a valid gender.";
    }

    if (empty($telephone)) {
        $success = false;
        $telephoneErr = "Please fill in your telephone number.";
    }

    if (empty($email)) {
        $success = false;
        $emailErr = "Please fill in your email. This field is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $success = false;
        $emailErr = "Please enter a valid email address.";
    }


    if (
        !isset($_FILES["image"]) ||
        $_FILES["image"]["error"] === UPLOAD_ERR_NO_FILE
    ) {
        $success = false;
        $imageErr = "Please upload your student image.";
    } elseif ($_FILES["image"]["error"] !== UPLOAD_ERR_OK) {
        $success = false;
        $imageErr = "There was a problem uploading the image.";
    } elseif ($_FILES["image"]["size"] > 2 * 1024 * 1024) {
        $success = false;
        $imageErr = "Image size must not exceed 2 MB.";
    } else {
        $imageInfo = @getimagesize($_FILES["image"]["tmp_name"]);

        $allowedTypes = [
            "image/jpeg" => "jpg",
            "image/png"  => "png",
            "image/gif"  => "gif"
        ];

        if (
            $imageInfo === false ||
            !isset($allowedTypes[$imageInfo["mime"]])
        ) {
            $success = false;
            $imageErr = "Only PNG, JPG, JPEG, and GIF images are allowed.";
        }
    }

    if (empty($parentName)) {
        $success = false;
        $parentNameErr = "Please fill in the parent name.";
    } elseif (!preg_match('/^[\p{L} ]+$/u', $parentName)) {
        $success = false;
        $parentNameErr = "Parent name must contain letters and spaces only.";
    }

    if (empty($parentTelephone)) {
        $success = false;
        $parentTelephoneErr = "Please fill in the parent telephone number.";
    }

    if (empty($relationship)) {
        $success = false;
        $relationshipErr = "Please fill in the relationship.";
    }


    if (empty($studentId)) {
        $success = false;
        $studentIdErr = "Please fill in the student ID.";
    }

    if (empty($faculty)) {
        $success = false;
        $facultyErr = "Please select your faculty.";
    }

    if (empty($department)) {
        $success = false;
        $departmentErr = "Please fill in the department.";
    }

    if (empty($class)) {
        $success = false;
        $classErr = "Please fill in your class.";
    }

    if (empty($registrationDate)) {
    $success = false;
    $registrationDateErr = "Please select the registration date.";
    } else {
        $date = DateTime::createFromFormat("!Y-m-d", $registrationDate);
        $today = new DateTime("today");

        if (!$date || $date->format("Y-m-d") !== $registrationDate) {
            $success = false;
            $registrationDateErr = "Please enter a valid registration date.";
        } elseif ($date > $today) {
            $success = false;
            $registrationDateErr = "Registration date cannot be in the future.";
        }
    }


    if ($success) {

        $uploadDir = __DIR__ . "/Images/";

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $extension = $allowedTypes[$imageInfo["mime"]];
        $fileName = bin2hex(random_bytes(16)) . "." . $extension;
        $destination = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $destination)) {

            $_SESSION["student"] = [
                "name" => $name,
                "pob" => $pob,
                "dob" => $dob,
                "address" => $address,
                "gender" => $gender,
                "telephone" => $telephone,
                "email" => $email,
                "image" => "Images/" . $fileName,

                "parent_name" => $parentName,
                "parent_telephone" => $parentTelephone,
                "relationship" => $relationship,

                "student_id" => $studentId,
                "faculty" => $faculty,
                "department" => $department,
                "class" => $class,
                "registration_date" => $registrationDate
            ];

            header("Location: display.php");
            exit;

        } else {
            $success = false;
            $imageErr = "Unable to save the image. Please try again.";
        }
    }
}

// Escape values when displaying them in HTML
function e($value)
{
    return htmlspecialchars((string)$value, ENT_QUOTES, "UTF-8");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Registration</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        .error {
            color: red;
            font-size: 14px;
        }

        fieldset {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
        }

        legend {
            color: #0d6efd;
            font-size: 21px;
            font-weight: bold;
            float: none;
            width: auto;
            padding: 0 8px;
        }
    </style>
</head>

<body class="bg-light">

<div class="container py-5">
    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white text-center py-3">
            <h1 class="h3 mb-0">Student Registration Form</h1>
        </div>

        <div class="card-body p-4">

            <form
                method="post"
                action=""
                enctype="multipart/form-data"
                novalidate
            >

                <fieldset>
                    <legend>Personal Information</legend>

                    <div class="mb-3">
                        <label class="form-label">Name *</label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="<?= e($name) ?>"
                        >

                        <span class="error"><?= e($nameErr) ?></span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Place of Birth *</label>

                        <input
                            type="text"
                            name="pob"
                            class="form-control"
                            value="<?= e($pob) ?>"
                        >

                        <span class="error"><?= e($pobErr) ?></span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Date of Birth *</label>

                        <input
                            type="date"
                            name="dob"
                            class="form-control"
                            value="<?= e($dob) ?>"
                        >

                        <span class="error"><?= e($dobErr) ?></span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address *</label>

                        <input
                            type="text"
                            name="address"
                            class="form-control"
                            value="<?= e($address) ?>"
                        >

                        <span class="error"><?= e($addressErr) ?></span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label d-block">Gender *</label>

                        <div class="form-check form-check-inline">
                            <input
                                type="radio"
                                name="gender"
                                value="Male"
                                id="male"
                                class="form-check-input"
                                <?= $gender === "Male" ? "checked" : "" ?>
                            >
                            <label for="male" class="form-check-label">
                                Male
                            </label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input
                                type="radio"
                                name="gender"
                                value="Female"
                                id="female"
                                class="form-check-input"
                                <?= $gender === "Female" ? "checked" : "" ?>
                            >
                            <label for="female" class="form-check-label">
                                Female
                            </label>
                        </div>

                        <br>
                        <span class="error"><?= e($genderErr) ?></span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Telephone *</label>

                        <input
                            type="tel"
                            name="telephone"
                            class="form-control"
                            value="<?= e($telephone) ?>"
                        >

                        <span class="error"><?= e($telephoneErr) ?></span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email *</label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="<?= e($email) ?>"
                        >

                        <span class="error"><?= e($emailErr) ?></span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Student Image *</label>

                        <input
                            type="file"
                            name="image"
                            class="form-control"
                            accept=".png,.jpg,.jpeg,.gif"
                        >

                        <small class="text-muted">
                            PNG, JPG, JPEG, or GIF. Maximum 2 MB.
                        </small>

                        <br>
                        <span class="error"><?= e($imageErr) ?></span>
                    </div>
                </fieldset>


                <fieldset>
                    <legend>Parent Information</legend>

                    <div class="mb-3">
                        <label class="form-label">Parent Name *</label>

                        <input
                            type="text"
                            name="parent_name"
                            class="form-control"
                            value="<?= e($parentName) ?>"
                        >

                        <span class="error"><?= e($parentNameErr) ?></span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Parent Telephone *</label>

                        <input
                            type="tel"
                            name="parent_telephone"
                            class="form-control"
                            value="<?= e($parentTelephone) ?>"
                        >

                        <span class="error"><?= e($parentTelephoneErr) ?></span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Relationship *</label>

                        <input
                            type="text"
                            name="relationship"
                            class="form-control"
                            placeholder="Father, Mother, Guardian..."
                            value="<?= e($relationship) ?>"
                        >

                        <span class="error"><?= e($relationshipErr) ?></span>
                    </div>
                </fieldset>


                <fieldset>
                    <legend>Academic Information</legend>

                    <div class="mb-3">
                        <label class="form-label">Student ID *</label>

                        <input
                            type="text"
                            name="student_id"
                            class="form-control"
                            value="<?= e($studentId) ?>"
                        >

                        <span class="error"><?= e($studentIdErr) ?></span>
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Faculty *</label>

                        <select name="faculty" class="form-select">
                            <option value="">Select Faculty</option>

                            <option
                                value="Computer and IT"
                                <?= $faculty === "Computer and IT" ? "selected" : "" ?>
                            >
                                Computer and IT
                            </option>

                            <option
                                value="Medicine and Health Science"
                                <?= $faculty === "Medicine and Health Science" ? "selected" : "" ?>
                            >
                                Medicine and Health Science
                            </option>

                            <option
                                value="Engineering"
                                <?= $faculty === "Engineering" ? "selected" : "" ?>
                            >
                                Engineering
                            </option>

                            <option
                                value="Business"
                                <?= $faculty === "Business" ? "selected" : "" ?>
                            >
                                Business
                            </option>
                        </select>

                        <span class="error"><?= e($facultyErr) ?></span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Department *</label>

                        <input
                            type="text"
                            name="department"
                            class="form-control"
                            value="<?= e($department) ?>"
                        >

                        <span class="error"><?= e($departmentErr) ?></span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Class *</label>

                        <input
                            type="text"
                            name="class"
                            class="form-control"
                            value="<?= e($class) ?>"
                        >

                        <span class="error"><?= e($classErr) ?></span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Registration Date *</label>

                        <input
                            type="date"
                            name="registration_date"
                            class="form-control"
                            value="<?= e($registrationDate) ?>"
                        >

                        <span class="error">
                            <?= e($registrationDateErr) ?>
                        </span>
                    </div>
                </fieldset>

                <button
                    type="submit"
                    name="submit"
                    class="btn btn-primary px-4"
                >
                    Register Student
                </button>

                <button
                    type="reset"
                    class="btn btn-secondary px-4"
                >
                    Clear
                </button>

            </form>
        </div>
    </div>
</div>

</body>
</html>
