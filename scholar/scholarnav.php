<link rel="stylesheet" href="../styles.css">
<nav class="navbar" style="background:transparent;color:inherit;padding:8px 0;">
    <div style="display:flex;gap:12px;align-items:center;">
        <a class="nav-links" href="profile.php">Profile</a>
        <a class="nav-links" href="renewal.php">Renewal</a>
    </div>
    <div>
        <form method="post" style="display:inline;">
            <button class="btn" type="submit" name="logout">Log Out</button>
        </form>
    </div>
</nav>

<?php
if (!isset($_SESSION)) { session_start(); }

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: ../portal/login.php");
    exit();
}
?>