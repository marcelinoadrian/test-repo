<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
    <link rel="stylesheet" href="style.css">
    <style>
        
    </style>
</head>
<body>
    <?php
    include 'dbconnection.php';
    $conn = OpenCon();



    if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `user_data` WHERE id = $delete_id ") or die('query failed');

   if($delete_query){
      header('location:index.php');
   } 
};

 
if(isset($_POST['u_submit']))
{
    $u_id = $_POST['u_id'];
    $u_name = $_POST['u_name'];
    $u_password = $_POST['u_password'];
    $u_address = $_POST['u_address'];
    $u_email = $_POST['u_email'];


    $update_query = mysqli_query($conn, "UPDATE `user_data` SET full_name = '$u_name', passw = '$u_password', address = '$u_address', email = '$u_email' WHERE id = '$u_id'");


    if($update_query)
    {
        header("location: ./index.php");
    }
    else
    {
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }

     mysqli_close($conn);
};

    ?>

    <header>
        <nav><h2 class="title">CRUD REVIEW</h2></nav>
    </header>
    <h1>Simple Registration Page</h1>
    <div class="container">
        <form action="addrecord.php" method="POST">
            <label for="fu-name">Full Name: </label>
            <input type="text" name="fu_name" id="fu-name">
            <label for="password">Password: </label>
            <input type="password" name="password" id="password">
            <label for="address">Address: </label>
            <input type="text" name="address" id="address">
            <label for="email">E-mail: </label>
            <input type="text" name="email" id="email">
            <br>
            <input type="submit" name="submit">
        </form>
    </div>

    <section class="records-list">
        <h3>User Records</h3>
        <table>
            <thead>
                <th>Full Name</th>
                <th>Password</th>
                <th>Address</th>
                <th>Email</th>
                <th>Action</th>
            </thead>

            <?php
                $users = mysqli_query($conn, "SELECT * FROM `user_data`");
                if(mysqli_num_rows($users) > 0)
                {
                    while ($row = mysqli_fetch_assoc($users))
                    {

            ?>
<tr>
    <td><?php echo $row['full_name']; ?></td>
    <td><?php echo $row['passw']; ?></td>
    <td><?php echo $row['address']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><a href="index.php?edit=<?php echo $row['id']; ?>">Edit</a>     <a href="index.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Remove User from Database?')">Delete</a></td>
</tr>





<?php
}
                }else{
               echo "<h2>No Users Added</h2>";
            };
?>
        </table>

    </section>

    <section class="edit-form">
        <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `user_data` WHERE id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="POST">
            
            <input type="hidden" name="u_id" value="<?php echo $fetch_edit['id']; ?>">
            <label for="fu-name">Full Name: </label>
            <input type="text" name="u_name" id="u_name" value="<?php echo $fetch_edit['full_name']; ?> ">
            <label for="password">Password: </label>
            <input type="password" name="u_password" id="u_password" value="<?php echo $fetch_edit['passw']; ?> ">
            <label for="address">Address: </label>
            <input type="text" name="u_address" id="u_address" value="<?php echo $fetch_edit['address']; ?> ">
            <label for="email">E-mail: </label>
            <input type="text" name="u_email" id="u_email" value="<?php echo $fetch_edit['email']; ?> ">
            <br>
            <input type="submit" name="u_submit">
            <br>
            <input type="reset" value="cancel" id="close-edit" class="btn">
   </form>

   <?php
         }
        }
         echo "<script>document.querySelector('.edit-form').style.display = 'flex';</script>";
    }
   ?>
    </section>

</body>
  <script>
      document.querySelector('#close-edit').onclick = () => 
      {
      document.querySelector('.edit-form').style.display = 'none';
      window.location.href = 'index.php';
      }    </script>


</html>