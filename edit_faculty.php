<?php
include("connection.php");

$id = $_GET['id'];

$sql = "SELECT * FROM faculty WHERE id='$id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $name = $_POST['faculty_name'];
    $email = $_POST['email'];
    $department = $_POST['department'];

    $update = "UPDATE faculty
               SET faculty_name='$name',
                   email='$email',
                   department='$department'
               WHERE id='$id'";

    if(mysqli_query($conn,$update))
    {
        header("Location:view_faculty.php");
        exit();
    }
    else
    {
        echo "Update Failed";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Faculty</title>
    <link rel="stylesheet" href="view_faculty.css">
</head>
<body>

<div class="container">

    <h2>Edit Faculty</h2>

    <form method="POST">

        <input type="text"
               name="faculty_name"
               value="<?php echo $row['faculty_name']; ?>"
               required>

        <input type="email"
               name="email"
               value="<?php echo $row['email']; ?>"
               required>

        <input type="text"
               name="department"
               value="<?php echo $row['department']; ?>"
               required>

        <button type="submit" name="update">
            Update Faculty
        </button>

    </form>

</div>

</body>
</html>