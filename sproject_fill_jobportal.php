<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <form action="sproject_job_application.php" method="post" >
        <?php 
        if(isset($_SESSION['status']) && $_SESSION['status']==  "exist")
        echo "<p style= 'color:red'>".$_SESSION['value']."<p>";
        ?>

        <h2>Job Application Form</h2>
        
        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="phone">Phone Number:</label>
        <input type="tel" name="phone" required>

        <label for="position">Desired Position:</label>
        <input type="text" name="position" required>

        <label for="resume">Resume (PDF or Word):</label>
        <input type="file" name="resume" accept=".pdf, .doc, .docx" required>

        <button type="submit">Submit Application</button>
    </form>

</body>
</html>
