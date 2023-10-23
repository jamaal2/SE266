<!DOCTYPE html>
<html>
<head>
    <title>Patient Intake Form</title>
</head>
<body>
    <h1>Patient Intake Form</h1>

    <?php
    // define functions
    function age($bdate) {
       $date = new DateTime($bdate);
       $now = new DateTime();
       $interval = $now->diff($date);
       return $interval->y;
    }

    function isDate($dt) {
       $date_arr  = explode('-', $dt);
       return checkdate($date_arr[1], $date_arr[2], $date_arr[0]);
    }

    function bmi($ft, $inch, $weight) {
       $height_meters = ($ft * 12 + $inch) * 0.0254;
       $weight_kg = $weight / 2.20462;
       return round($weight_kg / ($height_meters * $height_meters), 1);
    }

    function bmiDescription($bmi) {
       if ($bmi < 18.5) {
           return "underweight";
       } elseif ($bmi >= 18.5 && $bmi < 25) {
           return "normal weight";
       } elseif ($bmi >= 25 && $bmi < 30) {
           return "overweight";
       } else {
           return "obese";
       }
    }

    // process data
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $married = $_POST['married'];
        $birth_date = $_POST['birth_date'];
        $height_ft = $_POST['height_ft'];
        $height_inch = $_POST['height_inch'];
        $weight = $_POST['weight'];

        // validation
        $errors = array();

        if (empty($first_name)) {
            $errors[] = "First name cannot be empty.";
        }
        if (empty($last_name)) {
            $errors[] = "Last name cannot be empty.";
        }
        if (empty($married)) {
            $errors[] = "Please select an option for Married.";
        }
        if (!isDate($birth_date)) {
            $errors[] = "Invalid birth date.";
        }
        if ($height_ft <= 0 || $height_inch < 0) {
            $errors[] = "Invalid height.";
        }
        if ($weight <= 0) {
            $errors[] = "Invalid weight.";
        }

        if (empty($errors)) {
            $age = age($birth_date);
            $bmi = bmi($height_ft, $height_inch, $weight);
            $bmi_classification = bmiDescription($bmi);

            // fisplay confirmation page
            echo "<h2>Confirmation Page</h2>";
            echo "<p><strong>First Name:</strong> $first_name</p>";
            echo "<p><strong>Last Name:</strong> $last_name</p>";
            echo "<p><strong>Married:</strong> $married</p>";
            echo "<p><strong>Birth Date:</strong> $birth_date</p>";
            echo "<p><strong>Height:</strong> $height_ft feet $height_inch inches</p>";
            echo "<p><strong>Weight:</strong> $weight pounds</p>";
            echo "<p><strong>Patient Age:</strong> $age years</p>";
            echo "<p><strong>Patient's BMI:</strong> $bmi</p>";
            echo "<p><strong>Classification of BMI:</strong> $bmi_classification</p>";
        } else {
            // Display validation errors
            echo "<h2>Form Submission Failed</h2>";
            echo "<ul>";
            foreach ($errors as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul>";
        }
    }
    ?>

    <form action="" method="post">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required><br>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required><br>

        <label for="married">Married:</label>
        <input type="radio" name="married" value="yes" required> Yes
        <input type="radio" name="married" value="no" required> No<br>

        <label for="birth_date">Birth Date:</label>
        <input type="date" name="birth_date" required><br>

        <label for="height_ft">Height (feet):</label>
        <input type="number" name="height_ft" required><br>

        <label for="height_inch">Height (inches):</label>
        <input type="number" name="height_inch" required><br>

        <label for="weight">Weight (pounds):</label>
        <input type="number" name="weight" required><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
