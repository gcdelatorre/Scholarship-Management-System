<?php
// This file should be included in applications.php

function addToScholars($name, $email, $conn) {
    // Basic SQL concatenation - VULNERABLE TO SQL INJECTION
    $sql = "INSERT INTO `scholars` (`name`, `email`, `date`) 
            VALUES ('$name', '$email' , current_timestamp())";

    try {
        mysqli_query($conn, $sql);
        $_SESSION['message'] = "<p style='color:green;'>Scholar added successfully!</p>";
    }
    catch (mysqli_sql_exception $e) {
        $_SESSION['message'] = "<p style='color:red;'>Could not add scholar: " . $e->getMessage() . "</p>";
    }
}

function removeApplication($applicant_id, $conn) {
    // Basic SQL concatenation - VULNERABLE TO SQL INJECTION
    $sql = "DELETE FROM `applications` WHERE `applicant_id` = $applicant_id";

    try {
        mysqli_query($conn, $sql);
        $_SESSION['message'] .= "<p style='color:green;'>Application removed successfully!</p>";
    }
    catch (mysqli_sql_exception $e) {
        $_SESSION['message'] .= "<p style='color:red;'>Could not remove application: " . $e->getMessage() . "</p>";
    }
}
?>