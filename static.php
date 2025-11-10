<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
    <style>
        form {
            display: flex;
            flex-direction: column;
            width: 200px;
            margin: 20px 0;
        }
        input {
            margin: 5px 0;
            padding: 8px;
            font-size: 16px;
        }
    </style>

    <p>nasa page kang sa static may clickable</p>

    <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
        <input type="submit" name="apply" value="Apply Now">
        <input type="submit" name="login" value="Log In">
    </form>
    
</body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['apply'])) {
            header("Location: ./portal/apply.php");
            exit();
        } elseif (isset($_POST['login'])) {
            header("Location: ./portal/login.php");
            exit();
        }
    }

?>