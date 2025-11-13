<?php
session_start();
include __DIR__ . '/../database.php';

// Admin check - adjust to your session/auth logic
if (!isset($_SESSION['account_id'])) {
    die('Forbidden');
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    die('Invalid id');
}

$stmt = $conn->prepare("SELECT renewal_id, scholar_id, name, certificate_of_birth, certificate_of_indigency, message FROM renewals WHERE renewal_id = ?");
$stmt->bind_param('i', $id);
$stmt->execute();
$res = $stmt->get_result();
if (!$res || $res->num_rows === 0) {
    die('Not found');
}
$row = $res->fetch_assoc();
$stmt->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Renewal #<?php echo htmlspecialchars($row['renewal_id']); ?></title>
    <style>img{max-width:600px;display:block;margin-bottom:10px;}</style>
</head>
<body>
    <h2>Renewal for <?php echo htmlspecialchars($row['name']); ?></h2>
    <p><strong>Message:</strong> <?php echo nl2br(htmlspecialchars($row['message'])); ?></p>

    <h3>Certificate of Birth</h3>
    <p><a href="serve_file.php?id=<?php echo $row['renewal_id']; ?>&amp;type=birth" target="_blank">Open full image</a></p>
    <img src="serve_file.php?id=<?php echo $row['renewal_id']; ?>&amp;type=birth" alt="Certificate of Birth">

    <h3>Certificate of Indigency</h3>
    <p><a href="serve_file.php?id=<?php echo $row['renewal_id']; ?>&amp;type=indigency" target="_blank">Open full image</a></p>
    <img src="serve_file.php?id=<?php echo $row['renewal_id']; ?>&amp;type=indigency" alt="Certificate of Indigency">

    <p><a href="renewals.php">Back to list</a></p>
</body>
</html>
