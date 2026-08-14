<?php
include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Faculty</title>
    <link rel="stylesheet" href="view_faculty.css">
</head>
<body>

<h2>Faculty Details</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Faculty Name</th>
        <th>Email</th>
        <th>Department</th>
         <th>Action</th>
    </tr>

<?php

$sql = "SELECT * FROM faculty";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result))
{
?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['faculty_name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['department']; ?></td>

    <td>
        <a href="edit_faculty.php?id=<?php echo $row['id']; ?>">
            Edit
        </a>

        |

        <a href="delete_faculty.php?id=<?php echo $row['id']; ?>"
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