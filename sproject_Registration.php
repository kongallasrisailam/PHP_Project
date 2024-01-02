<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$dbname = "srisailam3";

$conn = mysqli_connect($host,$username,$password,$dbname);

if(!$conn)
{
    echo "not connected";
    die();
}
else{

    $user = mysqli_real_escape_string($conn, $_POST["username1"]);
    $pass = mysqli_real_escape_string($conn, $_POST["password1"]);

    $check ="select * from login1
            where username='$user'";
    
    $num = mysqli_num_rows(mysqli_query($conn,$check));
    
    if($num>0)
    {
        $_SESSION['status'] ="exist";
        $_SESSION['value'] = "Already exist login datails";
        header('Location:sproject_login_page.php?result=exist');
        die();
    }
    else{
        $sql = "insert into login1(username,password) values('$user','$pass')";
        $result= mysqli_query($conn,$sql);

        if($result)
        {
            $_SESSION['status'] ="success";
            $_SESSION['value'] = "registration sucsessfull...";
            header('Location:sproject_login_page.php?result=success');
            die();
        }
        
    }
    
    
    
}
mysqli_close($conn);



// Database connection parameters
// $host = "localhost";
// $username = "root";
// $password = "";
// $dbname = "srisailam3";

// $conn = mysqli_connect($host, $username, $password, $dbname);

// if (!$conn) {
//     echo "not connected";
// } else {
//     $user = mysqli_real_escape_string($conn, $_POST["username1"]);
//     $pass = mysqli_real_escape_string($conn, $_POST["password1"]);

//     // Use single quotes around string values in the SQL query
//     $sql = "INSERT INTO login1 (username, password) VALUES ('$user', '$pass')";

//     if (mysqli_query($conn, $sql)) {
//         echo "Registration successful";
//     } else {
//         echo "Not registered: " . mysqli_error($conn);
//     }

//     mysqli_close($conn);
// }

?>
