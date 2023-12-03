<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: search.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hardcoded username and password for demonstration (replace with your database logic)
    $validUsername = 'user';
    $hashedPassword = password_hash('password', PASSWORD_DEFAULT);

    if ($username === $validUsername && password_verify($password, $hashedPassword)) {
        $_SESSION['username'] = $username;
        header("Location: search.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<?php if (isset($error)): ?>
    <p><?php echo $error; ?></p>
<?php endif; ?>

<form method="POST" action="">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>

    <button type="submit">Login</button>
</form>

</body>
</html>
                