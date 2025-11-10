<?php
if (!isset($_SESSION)) { session_start(); }

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: ../portal/login.php");
    exit();
}
?>

<div class="navbar">
    <h1>navbar</h1>
    <div class="nav-links">
        <a href="accounts.php">Accounts</a>
        <a href="applications.php">Applications</a>
        <a href="renewals.php">Renewals</a>
        <a href="scholars.php">Scholars</a>

        <form method="post" style="display:inline;">
            <input type="submit" name="logout" value="logout">
        </form>
    </div>
</div>
