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
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>

   <div class="sidebar">
    <h2>Timetable</h2>

    <ul>
        <li><a href="dashboard.php">🏠 Dashboard</a></li>
        <li><a href="faculty.php">👨‍🏫 Faculty</a></li>
        <li><a href="student.php">🎓 Student</a></li>
        <li><a href="subject.php">📚 Subject</a></li>
        <li><a href="generate_timetable.php">📅 Generate Timetable</a></li>
        <li><a href="view_timetable.php">📖 View Timetable</a></li>
        <li><a href="reports.php">📊 Reports</a></li>
        <li><a href="holiday.php">🗓 Holiday Calendar</a></li>
        <li><a href="logout.php">🚪 Logout</a></li>
    </ul>
</div>

<div class="main-content">

    <h1>Admin Dashboard</h1>
    <p style="font-size:18px; margin-bottom:20px; color:#555;">
Welcome, Administrator 👋
</p>

    <div class="cards">

        <a href="view_faculty.php" class="card-link">
<div class="card">
    <h3>Total Faculty</h3>
    <p><?php echo $faculty; ?></p>
</div>
</a>

        <a href="view_student.php" class="card-link">
<div class="card">
    <h3>Total Students</h3>
    <p><?php echo $students; ?></p>
</div>
</a>

        <a href="view_subject.php" class="card-link">
<div class="card">
    <h3>Subjects</h3>
    <p><?php echo $subjects; ?></p>
</div>
</a>

        <a href="view_timetable.php" class="card-link">
<div class="card">
    <h3>Total Timetables</h3>
    <p><?php echo $timetable; ?></p>
</div>
</a>

    </div>

</div>

</body>
</html>