<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "timetable_db",
    3303
);

if(!$conn)
{
    die("Connection Failed: " . mysqli_connect_error());
}

?>