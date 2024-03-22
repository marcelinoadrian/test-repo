<?php
include 'dbconnection.php';
$conn = OpenCon();
session_start();

if(isset($_SESSION['userid']))
{
    if($_SESSION['acc_type'] === 'user')
    {
        header("location: ../test-repo/landingpage.php");
    }
    else if($_SESSION['acc_type'] === 'admin')
    {
        header("location: ../test-repo/index.php");
    }    
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
     <header>
        <nav><h2 class="title">CRUD REVIEW</h2></nav>
    </header>
    <h1>Sign-Up</h1>
    <div class="container">
        <form action="addrecord.php" method="POST">
            <label for="fu-name">Full Name: </label>
            <input type="text" name="fu_name" id="fu-name" required>
            <label for="password">Password: </label>
            <input type="password" name="password" id="password" required>
            <label for="address">Address: </label>
            <input type="text" name="address" id="address" required>
            <label for="email">E-mail: </label>
            <input type="text" name="email" id="email" required>
            <br>
            <input type="submit" name="register">
            <br>
            <?php
            if (isset($_GET['error']))
            {
                $error = $_GET['error'];
                if($error === "invalidemail")
                {
                    echo '<p id="error">Please enter valid email.</p>';
                }
            };
            ?>
            <a href="login.php">Already have an account? Sign-in Instead.</a>
        </form>
        
    </div>
    
</body>
</html>