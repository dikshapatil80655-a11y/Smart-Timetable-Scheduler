<?php
include("connection.php");

if(isset($_POST['save']))
{
    echo "Button Clicked";
    $name = $_POST['student_name'];
    $roll = $_POST['roll_no'];
    $class = $_POST['class'];

    $sql = "INSERT INTO students(student_name,roll_no,class)
            VALUES('$name','$roll','$class')";
            echo $sql;

    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('Student Added Successfully');</script>";
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
    <title>Add Student</title>
    <link rel="stylesheet" href="faculty.css">
</head>
<body>

<div class="container">

<h2>Add Student</h2>
<div style="text-align:right; margin-bottom:15px;">
    <a href="view_student.php">
        <button type="button">View Student</button>
    </a>
</div>

<form action="" method="POST">

<input type="text"
       name="student_name"
       placeholder="Student Name"
       required>

<input type="text"
       name="roll_no"
       placeholder="Roll Number"
       required>

<input type="text"
       name="class"
       placeholder="Class"
       required>

<button type="submit" name="save">
    Add Student
</button>

</form>

</div>

</body>
</html>