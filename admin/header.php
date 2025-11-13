<?php
if (!isset($_SESSION)) { session_start(); }

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: ../portal/login.php");
    exit();
}
?>
<link rel="stylesheet" href="../styles.css">

<div class="navbar">
    <h1>Scholarship Portal — Admin</h1>
    <div class="nav-links">
        <a href="accounts.php">Accounts</a>
        <a href="applications.php">Applications</a>
        <a href="renewals.php">Renewals</a>
        <a href="scholars.php">Scholars</a>

        <form method="post" style="display:inline; margin-left:10px;">
            <button class="btn" type="submit" name="logout">Logout</button>
        </form>
    </div>
</div>
