<?php
include("connection.php");

$id = $_GET['id'];

$sql = "SELECT * FROM students WHERE id='$id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $name = $_POST['student_name'];
    $roll = $_POST['roll_no'];
    $class = $_POST['class'];

    $update = "UPDATE students
               SET student_name='$name',
                   roll_no='$roll',
                   class='$class'
               WHERE id='$id'";

    if(mysqli_query($conn,$update))
    {
        header("Location:view_student.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Student</title>
<link rel="stylesheet" href="form.css">
</head>
<body>

<div class="container">

<h2>Edit Student</h2>

<form method="POST">

<input type="text"
name="student_name"
value="<?php echo $row['student_name']; ?>"
required>

<input type="text"
name="roll_no"
value="<?php echo $row['roll_no']; ?>"
required>

<input type="text"
name="class"
value="<?php echo $row['class']; ?>"
required>

<button type="submit" name="update">
Update Student
</button>

</form>

</div>

</body>
</html>