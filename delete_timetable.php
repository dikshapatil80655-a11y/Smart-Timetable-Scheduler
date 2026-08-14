<?php

include("connection.php");

$id=$_GET['id'];

$sql="DELETE FROM timetable WHERE id='$id'";

if(mysqli_query($conn,$sql))
{
    header("Location:view_timetable.php");
    exit();
}
else
{
    echo "Delete Failed";
}

?>