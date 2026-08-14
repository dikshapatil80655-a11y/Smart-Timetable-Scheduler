<!DOCTYPE html>
<html>
<head>
    <title>Generate Timetable</title>
    <link rel="stylesheet" href="generate_timetable.css">
</head>
<body>

<div class="container">

<h2>Generate Timetable</h2>

<form action="save_timetable.php" method="POST">
<?php include("connection.php"); ?>

<label>Department</label>

<select name="department" required>

<option value="">Select Department</option>
<option>Computer</option>
<option>IT</option>
<option>Electronics and Computer</option>
<option>Mechanical</option>
<option>Civil</option>
<option>Electrical</option>
<option>Mechatronics</option>
<option>Automation and Robotics</option>

</select>

<label>Faculty</label>

<select name="faculty_name" required>

<option value="">Select Faculty</option>

<?php
$result = mysqli_query($conn,"SELECT faculty_name FROM faculty");

while($row = mysqli_fetch_assoc($result))
{
?>
<option value="<?php echo $row['faculty_name']; ?>">
<?php echo $row['faculty_name']; ?>
</option>
<?php
}
?>

</select>

<label>Subject</label>

<select name="subject_name" required>

<option value="">Select Subject</option>

<?php
$result = mysqli_query($conn,"SELECT subject_name FROM subjects");

while($row = mysqli_fetch_assoc($result))
{
?>
<option value="<?php echo $row['subject_name']; ?>">
<?php echo $row['subject_name']; ?>
</option>
<?php
}
?>

</select>

<label>Class</label>

<select name="class_name" required>

<option value="">Select Class</option>
<option>FY</option>
<option>SY</option>
<option>TY</option>
<option>B.Tech</option>

</select>


<label>Lecture Date</label>

<input
type="date"
name="lecture_date"
required>


<label>Day</label>

<select name="day_name" required>
    <option value="">Select Day</option>
    <option>Monday</option>
    <option>Tuesday</option>
    <option>Wednesday</option>
    <option>Thursday</option>
    <option>Friday</option>
    <option>Saturday</option>
</select>

<label>Lecture Time</label>

<select name="lecture_time" required>
    <option value="">Select Time</option>
    <option>09:30 AM - 10:30 AM</option>
    <option>10:30 AM - 11:30 AM</option>
    <option>12:10 AM - 01:10 PM</option>
    <option>01:10 PM - 02:10 PM</option>
    <option>02:20 PM - 03:20 PM</option>
    <option>03:20 PM - 04:20 PM</option>
    
</select>

<button type="submit">
Generate Timetable
</button>
</form>
</div>

</body>
</html>