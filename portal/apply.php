<?php
    include("../database.php");

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Form</title>

    <!-- link the external CSS -->
    <link rel="stylesheet" href="apply.css">
</head>
<body>

    <div class="container">
        <p>Apply page — fill up the form and send your request</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" name="fullname" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="submit" name="submit_application" value="Submit Application">
        </form>

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_application'])) {
                // In a real system you could save to DB or redirect here
                
                $applicant_name = $_POST['fullname'];
                $applicant_email = $_POST['email'];
                
                $sql = "INSERT INTO `applications` (`applicant_id`, `name`, `email`, `date`) 
                    VALUES (NULL, '$applicant_name' , '$applicant_email', current_timestamp())";
                
                try {
                    mysqli_query($conn, $sql);
                    echo "<p class='success'>Application submitted successfully!</p>";
                    echo "<p class='success'>Please wait until we review your application! we will send an email eme eme!</p>";
                }
                catch (mysqli_sql_exception) {
                    echo "Could not register";
                }
            }
        ?>
    </div>

</body>
</html>

<?php
    mysqli_close($conn);


?>