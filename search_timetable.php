<?php
include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Search Timetable</title>
<link rel="stylesheet" href="timetable.css">
</head>
<body>

<h2>Search Timetable</h2>

<form method="GET" style="text-align:center;margin:20px;">
    <input type="text"
           name="search"
           placeholder="Enter Faculty Name">

    <button type="submit">
        Search
    </button>
</form>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Faculty</th>
    <th>Subject</th>
    <th>Class</th>
    <th>Day</th>
    <th>Time</th>
</tr>

<?php

if(isset($_GET['search']))
{
    $search = $_GET['search'];

    $sql = "SELECT * FROM timetable
            WHERE faculty_name LIKE '%$search%'";

    $result = mysqli_query($conn,$sql);

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
}
?>

</table>

</body>
</html>