<?php
include("database.php");

$password = 'admin123';
$hashed = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO accounts (username, password, role, scholar_id, unhashedPassword) VALUES ('admin', '$hashed', 'admin', 5, '$password')";

if (mysqli_query($conn, $sql)) {
    echo "Admin account created successfully!<br>";
    echo "Username: admin<br>";
    echo "Password: admin123<br>";
    echo "You can now login at portal/login.php";
} else {
    echo "Error creating admin account: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
