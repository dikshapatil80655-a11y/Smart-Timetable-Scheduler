<?php
include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>View Student</title>
<link rel="stylesheet" href="timetable.css">
</head>
<body>

<h2>Student Details</h2>

<table>

<tr>
    <th>ID</th>
    <th>Student Name</th>
    <th>Roll No</th>
    <th>Class</th>
    <th>Action</th>
</tr>

<?php

$sql = "SELECT * FROM students";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result))
{
?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['student_name']; ?></td>
<td><?php echo $row['roll_no']; ?></td>
<td><?php echo $row['class']; ?></td>

<td>
<a href="edit_student.php?id=<?php echo $row['id']; ?>">
Edit
</a>

|

<a href="delete_student.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Are you sure?')">
Delete
</a>
</td>

</tr>

<?php
}
?>

</table>

</body>
</html>