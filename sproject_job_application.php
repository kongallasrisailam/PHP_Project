<?php
session_start();
$conn = mysqli_connect('localhost','root','','srisailam3');

if(!$conn)
{
    echo "not connected to database";
    die();
}
else{
   // if($_SERVER("REQUEST_METHOD")=="POST")
  //  {
        $name = $conn->real_escape_string($_POST['name']);
        $email = $conn->real_escape_string($_POST['email']);
        $phone = $conn->real_escape_string($_POST['phone']);
        $position = $conn->real_escape_string($_POST['position']);
        $resume = $conn->real_escape_string($_POST['resume']);


        $sql = "select * from jobs
                where email='$email'";

        $numb = mysqli_num_rows(mysqli_query($conn,$sql));
        if($numb>0)
        {
            $_SESSION['status']= "exist";
            $_SESSION['value']= "This email id already exist....";
            header('Location:sproject_fill_jobportal.php?result=exist');
        }
        else{
            $sql = "insert into jobs(name,email,phone,position,resume) values('$name','$email','$phone','$position','$resume')";

            $query = mysqli_query($conn,$sql);
            if(!$query)
            {
                echo "not completed";
            }
            else{
                
                header('Location:sproject_completed.php');

            }
        }



   // }


}
mysqli_close($conn);
