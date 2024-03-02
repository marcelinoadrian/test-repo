<?php
include 'dbconnection.php';
$conn = OpenCon();

if(isset($_POST['submit']))
{
    $fu_name = $_POST['fu_name'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $email = $_POST['email'];


    $query = "INSERT INTO `user_data` (`full_name`, `passw`, `address`, `email`) VALUES ('$fu_name', '$password', '$address', '$email')";

    if(mysqli_query($conn, $query))
    {
        header("location: ./index.php");
    }
    else
    {
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }

     mysqli_close($conn);
}


?>