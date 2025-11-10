<nav>
        <a href="profile.php">Profile</a> |
        <a href="renewal.php">Renewal of Scholarship</a>

        <form  method="post">
                <input type="submit" name="logout" value="Log Out">
            </form>
    </nav>

<?php
if (!isset($_SESSION)) { session_start(); }

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: ../portal/login.php");
    exit();
}
?>