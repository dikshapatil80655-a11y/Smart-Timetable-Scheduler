<?php
include("connection.php");

$faculty = $_POST['faculty_name'];
$subject = $_POST['subject_name'];
$class = $_POST['class_name'];
$day = $_POST['day_name'];
$time = $_POST['lecture_time'];

$sql = "INSERT INTO timetable
(faculty_name,subject_name,class_name,day_name,lecture_time)
VALUES
('$faculty','$subject','$class','$day','$time')";

if(mysqli_query($conn,$sql))
{
    echo "<script>alert('Timetable Generated Successfully');</script>";
}
else
{
    echo mysqli_error($conn);
}
?>