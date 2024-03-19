<?php
include 'dbconnection.php';
$conn = OpenCon();
session_start();


if(isset($_POST['login']))
{
    $i_email = $_POST['i_email'];
    $i_passw = $_POST['i_passw'];

    $query = "SELECT * FROM `user_data` WHERE email = '$i_email' AND passw = '$i_passw'";
    $result = mysqli_query($conn, $query);
     if(mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_assoc($result);
            if($row['acc_type'] === 'admin')
            {
                $_SESSION['userid'] = $row['id'];
                $_SESSION['acc_type'] = $row['acc_type'];       
                $_SESSION['fullname'] = $row['full_name'];
                header("location: ../test-repo/index.php");
            }
            else if($row['acc_type'] === 'user')
            {
                $_SESSION['userid'] = $row['id'];
                $_SESSION['acc_type'] = $row['acc_type']; 
                $_SESSION['fullname'] = $row['full_name'];
                header("location: ../test-repo/landingpage.php");
            }
            
        }
        else
            {
                exit;
            }

}

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
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav><h2 class="title">CRUD REVIEW</h2></nav>
    </header>
    <h1>Login</h1>
    <div class="container">
        <form action="" method="POST">
            <label for="i_email">Email: </label>
            <input type="email" name="i_email" id="i_email">
            <label for="i_passw">Password: </label>
            <input type="password" name="i_passw" id="i_passw">
            <br>
            <input type="submit" name="login" value="Login">
            <br>
            <a href="registration.php">Don't have an account? Sign-in Instead.</a>
            
        </form>
    </div>
</body>
</html>