<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    include 'dbconnection.php';
    $conn = OpenCon();
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
</tr>





<?php
}
                }else{
               echo "<h2>No Users Added</h2>";
            };
?>
        </table>

    </section>
</body>
</html>