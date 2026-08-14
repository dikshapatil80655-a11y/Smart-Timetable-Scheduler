<?php
include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Print Timetable</title>

<style>

body{
    font-family:Arial;
}

table{
    width:100%;
    border-collapse:collapse;
}

th,td{
    border:1px solid black;
    padding:10px;
    text-align:center;
}

button{
    padding:10px 20px;
    margin:20px;
}

@media print{
    button{
        display:none;
    }
}

</style>

</head>
<body>

<button onclick="window.print()">
Print Timetable
</button>

<h2 align="center">
Timetable Report
</h2>

<table>

<tr>
    <th>ID</th>
    <th>Faculty</th>
    <th>Subject</th>
    <th>Class</th>
    <th>Day</th>
    <th>Time</th>
</tr>

<?php

$sql="SELECT * FROM timetable";
$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['faculty_name']; ?></td>
<td><?php echo $row['subject_name']; ?></td>
<td><?php echo $row['class_name']; ?></td>
<td><?php echo $row['day_name']; ?></td>
<td><?php echo $row['lecture_time']; ?></td>

</tr>

<?php
}
?>

</table>

</body>
</html>