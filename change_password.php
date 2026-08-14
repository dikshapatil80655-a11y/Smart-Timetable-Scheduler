<?php

include("connection.php");

if(isset($_POST['change']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "UPDATE admin
            SET password='$password'
            WHERE username='$username'";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('Password Changed Successfully');</script>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Change Password</title>
<link rel="stylesheet" href="faculty.css">
</head>
<body>

<div class="container">

<h2>Change Password</h2>

<form method="POST">

<input type="text"
name="username"
placeholder="Username"
required>

<input type="password"
name="password"
placeholder="New Password"
required>

<button type="submit" name="change">
Change Password
</button>

</form>

</div>

</body>
</html>