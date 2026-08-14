<?php
include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>View Subject</title>
<link rel="stylesheet" href="timetable.css">
</head>
<body>

<h2>Subject Details</h2>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Subject Name</th>
    <th>Subject Code</th>
    <th>Semester</th>
    <th>Department</th>
    <th>Action</th>
</tr>

<?php

$sql = "SELECT * FROM subjects";
$result = mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result))
{
?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['subject_name']; ?></td>
<td><?php echo $row['subject_code']; ?></td>
<td><?php echo $row['semester']; ?></td>
<td><?php echo $row['department']; ?></td>


<td>
<a href="edit_subject.php?id=<?php echo $row['id']; ?>">Edit</a>
|
<a href="delete_subject.php?id=<?php echo $row['id']; ?>"
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