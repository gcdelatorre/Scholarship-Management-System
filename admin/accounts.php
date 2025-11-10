<?php
    session_start(); // MUST be first
    include("../database.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>accounts page</title>
</head>
<body>

    <?php include 'header.php'; ?>  
    
    <h2>accounts page</h2>
    <p>Manage user accounts here (admin/scholars).</p>

    print or fetch the list of accounts from the database and print here
    admin can active or activate account here

    <?php

        $sql = "SELECT * FROM applications";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        echo "<table border='1'>
        <tr>
            <th>Applicant ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date</th>
        </tr>";

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['applicant_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                echo "<td>
                        <form method='POST'>
                        <input type='hidden' name='applicant_id' value='" . $row['applicant_id'] . "'>
                        <input type='hidden' name='name' value='" . $row['name'] . "'>
                        <input type='hidden' name='email' value='" . $row['email'] . "'>
                        <button type='submit' name='approve'>Approve</button>
                        <button type='submit' name='reject'>Reject</button>
                        </form>
                    </td>";
                echo "</tr>";
            }
        } else {    
            echo "<tr><td colspan='5'>No applications found</td></tr>";
        }
        echo "</table>";
    ?>

    
    

</body>
</html>