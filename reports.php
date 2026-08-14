<?php
include("connection.php");

$faculty = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM faculty"));
$students = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM students"));
$subjects = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM subjects"));
$timetable = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM timetable"));
?>

<!DOCTYPE html>
<html>
<head>
<title>Reports</title>
<link rel="stylesheet" href="faculty.css">
</head>
<body>

<div class="container">

<h2>Project Reports</h2>

<h3>Total Faculty : <?php echo $faculty; ?></h3>

<h3>Total Students : <?php echo $students; ?></h3>

<h3>Total Subjects : <?php echo $subjects; ?></h3>

<h3>Total Timetable Entries : <?php echo $timetable; ?></h3>

<br><br>

<a href="pdf_timetable.php">
    <button type="button">📄 Download Timetable PDF</button>
</a>

<br><br>

<a href="print_timetable.php">
    <button type="button">🖨 Print Timetable</button>
</a>

</div>

</body>
</html>