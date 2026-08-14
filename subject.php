<?php
include("connection.php");

if(isset($_POST['save']))
{
    

    $name = $_POST['subject_name'];
    $code = $_POST['subject_code'];
    $semester = $_POST['semester'];
    $department = $_POST['department'];

    $sql = "INSERT INTO subjects(subject_name,subject_code,semester,department)
            VALUES('$name','$code','$semester','$department')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('Subject Added Successfully');</script>";
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
    <title>Add Subject</title>
    <link rel="stylesheet" href="faculty.css">
</head>
<body>

<div class="container">

<h2>Add Subject</h2>
<div style="text-align:right; margin-bottom:15px;">
    <a href="view_subject.php">
        <button type="button">View Subject</button>
    </a>
</div>

<form action="" method="POST">

<input type="text"
       name="subject_name"
       placeholder="Subject Name"
       required>

<input type="text"
       name="subject_code"
       placeholder="Subject Code"
       required>

<input type="text"
       name="semester"
       placeholder="Semester"
       required>

<input type="text"
       name="department"
       placeholder="Department"
       required>

<button type="submit" name="save">
    Add Subject
</button>

</form>

</div>

</body>
</html>