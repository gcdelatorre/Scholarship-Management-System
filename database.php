<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "systemdb";
    
    try {
        $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
        if (!$conn) {
            throw new Exception("Connection failed: " . mysqli_connect_error());
            echo "connected";
        }
    } catch (Exception $e) {
        die("Database connection error: " . $e->getMessage());
    }
?>