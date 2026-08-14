<?php
include("connection.php");

$id = $_GET['id'];

$sql = "DELETE FROM faculty WHERE id='$id'";

if(mysqli_query($conn,$sql))
{
    header("Location:view_faculty.php");
    exit();
}
else
{
    echo "Delete Failed";
}
?>