<?php
include 'dbconnection.php';
$conn = OpenCon();

function invalidEmail($email_add)
    {
        $result;
        if(!filter_var($email_add, FILTER_VALIDATE_EMAIL))
        {
            $result = true;
        }
        else
        {
            $result = false;
        }

        return $result;
    }



if(isset($_POST['submit']))
{
    $fu_name = $_POST['fu_name'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $email = $_POST['email'];


    

    $query = "INSERT INTO `user_data` (`full_name`, `passw`, `address`, `email`, `acc_type`) VALUES ('$fu_name', '$password', '$address', '$email', 'user')";

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

if(isset($_POST['register']))
{
    $fu_name = $_POST['fu_name'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $email = $_POST['email'];

       if (invalidEmail($email_add) !== false)
      {
        header("location: ../test-repo/registration.php?error=invalidemail");
      }


        $query = "INSERT INTO `user_data` (`full_name`, `passw`, `address`, `email`, `acc_type`) VALUES ('$fu_name', '$password', '$address', '$email', 'user')";

        if(mysqli_query($conn, $query))
        {
        header("location: ./login.php");
        }
        else
         {
        echo "Error: " . $sql . "" . mysqli_error($conn);
        }

   
      
    mysqli_close($conn);
      
  
}




?>