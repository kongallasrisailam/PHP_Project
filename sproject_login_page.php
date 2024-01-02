<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page/registration page</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="container" style="display:flex">
        <div class="login_page">
            <h2>User Login</h2>
            <form action="sproject_login.php" method="post">
                <label for="username2">Username:</label>
                <input type="text" name="username2" required><br>

                <label for="password2">Password:</label>
                <input type="password" name="password2" required><br>

                <button type="submit">Login</button>
            </form>
            <?php
            if (isset($_SESSION['status']) && $_SESSION['status'] == "error") {
                echo '<p style="color:red">' . $_SESSION['error'] . '</p>';
            }
            ?>
        </div>
        <div class="Register_page">
            <h2>User Registration</h2>
            <form action="sproject_Registration.php" method="post">
                <label for="username1">Username:</label>
                <input type="text" name="username1" required><br>
                <label for="password1">Password:</label>
                <input type="password" name="password1" required><br>
                <button type="submit">Register</button>
            </form>
            <?php
            if (isset($_SESSION['status']) && $_SESSION['status'] === "success") {
                echo '<p style="color:red">' . $_SESSION['value'] . '</p>';
            } elseif (isset($_SESSION['status']) && $_SESSION['status'] === "exist") {
                echo '<p style="color:red">' . $_SESSION['value'] . '</p>';
            }
            ?>
        </div>
    </div>

    <?php
    session_destroy();
    ?>
</body>
</html>