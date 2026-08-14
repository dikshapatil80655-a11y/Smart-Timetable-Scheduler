<?php

include("connection.php");

$id=$_GET['id'];

$sql="DELETE FROM subjects WHERE id='$id'";

if(mysqli_query($conn,$sql))
{
    header("Location:view_subject.php");
    exit();
}
else
{
    echo "Delete Failed";
}

?>