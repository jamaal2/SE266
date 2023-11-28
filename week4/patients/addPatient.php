<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Patient</title>
</head>
<body>
    <h1>Add Patient</h1>
    <form action="/models/modelpatient.php" method="post">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required><br><br>

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required><br><br>

        <label for="married">Married:</label>
        <input type="radio" id="married" name="married" required><br><br>

        <label for="birthdate">Birthdate:</label>
        <input type="date" id="birthdate" name="birthdate" required><br><br>

        <input type="submit" value="Add Patient">
    </form>
    <a href="viewpatient.php">Cancel</a>
</body>
</html>
