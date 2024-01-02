<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$dbname = "srisailam3";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usernameh = $conn->real_escape_string($_POST['username2']);
    $passwordh = $conn->real_escape_string($_POST['password2']);

    $sql = "SELECT username, password FROM login1 WHERE password='$passwordh'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        if (mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);

            if ($row['username'] === $usernameh && $row['password'] === $passwordh) {
                $_SESSION['status'] = 'success';
                $_SESSION['value'] = 'Login successful!';
                header('Location:sproject_fill_jobportal.php');
                exit;
            } else {
                $_SESSION['status'] = 'error';
                $_SESSION['error'] = 'Wrong login details...';
                exit;
            }
        } else {
            $_SESSION['status'] = 'error';
            $_SESSION['error'] = 'Wrong login details...';
            exit;
        }
    } else {
        $_SESSION['status'] = 'error';
        $_SESSION['error'] = 'Database error...';
        
    }
}

$conn->close();
?>