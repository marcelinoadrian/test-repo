<?php
session_start();
include 'dbconnection.php';
$conn = OpenCon();
$name = $_SESSION['fullname'];

if(!isset($_SESSION['userid']))
{
        header("location: ../test-repo/login.php");

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello User</title>
</head>
<body>
    
    <h1>hi <?php 
        echo $name;
    ?> this is the landing page</h1>
    <a href="logout.php">Logout</a>
</body>
</html>