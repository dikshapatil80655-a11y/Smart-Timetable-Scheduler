<?php

include("connection.php");

$id=$_GET['id'];

$sql="SELECT * FROM timetable WHERE id='$id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $faculty=$_POST['faculty_name'];
    $subject=$_POST['subject_name'];
    $class=$_POST['class_name'];
    $day=$_POST['day_name'];
    $time=$_POST['lecture_time'];

    $update="UPDATE timetable
             SET faculty_name='$faculty',
                 subject_name='$subject',
                 class_name='$class',
                 day_name='$day',
                 lecture_time='$time'
             WHERE id='$id'";

    if(mysqli_query($conn,$update))
    {
        header("Location:view_timetable.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Timetable</title>
<link rel="stylesheet" href="faculty.css">
</head>
<body>

<div class="container">

<h2>Edit Timetable</h2>

<form method="POST">

<input type="text"
name="faculty_name"
value="<?php echo $row['faculty_name']; ?>"
required>

<input type="text"
name="subject_name"
value="<?php echo $row['subject_name']; ?>"
required>

<input type="text"
name="class_name"
value="<?php echo $row['class_name']; ?>"
required>

<input type="text"
name="day_name"
value="<?php echo $row['day_name']; ?>"
required>

<input type="text"
name="lecture_time"
value="<?php echo $row['lecture_time']; ?>"
required>

<button type="submit" name="update">
Update Timetable
</button>

</form>

</div>

</body>
</html>