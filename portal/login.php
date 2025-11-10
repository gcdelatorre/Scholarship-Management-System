<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>

<h2>Login</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <input type="submit" name="login_submit" value="Log In">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login_submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Dummy accounts
    $accounts = [
        "admin" => ["password" => "admin123", "role" => "admin"],
        "student" => ["password" => "student123", "role" => "student"]
    ];

    if (isset($accounts[$username]) && $accounts[$username]['password'] === $password) {
        // Login successful
        if ($accounts[$username]['role'] === 'admin') {
            $_SESSION['admin_username'] = $username;
            header("Location: ../admin/dashboard.php");
            exit();
        } else if ($accounts[$username]['role'] === 'student') {
            $_SESSION['student_username'] = $username;
            header("Location: ../scholar/profile.php");
            exit();
        }
    } else {
        echo "<p style='color:red;'>Invalid username or password.</p>";
    }
}
?>

</body>
</html>
