<?php
include("connection.php");

if(isset($_POST['save']))
{
    $name = $_POST['faculty_name'];
    $email = $_POST['email'];
    $department = $_POST['department'];

    $sql = "INSERT INTO faculty
            (faculty_name,email,department)
            VALUES
            ('$name','$email','$department')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('Faculty Added Successfully');</script>";
    }
    else
{
    echo mysqli_error($conn);
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Faculty</title>
    <link rel="stylesheet" href="faculty.css">
</head>
<body>

<div class="container">

    <h2>Add Faculty</h2>
    <div style="text-align:right; margin-bottom:15px;">
    <a href="view_faculty.php">
        <button type="button">View Faculty</button>
    </a>
</div>

    <form method="POST">

        <input type="text"
               name="faculty_name"
               placeholder="Faculty Name"
               required>

        <input type="email"
               name="email"
               placeholder="Email"
               required>

        <input type="text"
               name="department"
               placeholder="Department"
               required>

        <button type="submit"
                name="save">
            Add Faculty
        </button>

    </form>

</div>

</body>
</html>