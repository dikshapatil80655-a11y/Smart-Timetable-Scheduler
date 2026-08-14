<?php
include("connection.php");

$id=$_GET['id'];

$sql="SELECT * FROM subjects WHERE id='$id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $name=$_POST['subject_name'];
    $code=$_POST['subject_code'];
    $semester=$_POST['semester'];

    $update="UPDATE subjects
             SET subject_name='$name',
                 subject_code='$code',
                 semester='$semester'
             WHERE id='$id'";

    if(mysqli_query($conn,$update))
    {
        header("Location:view_subject.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Subject</title>
<link rel="stylesheet" href="faculty.css">
</head>
<body>

<div class="container">

<h2>Edit Subject</h2>

<form method="POST">

<input type="text"
name="subject_name"
value="<?php echo $row['subject_name']; ?>"
required>

<input type="text"
name="subject_code"
value="<?php echo $row['subject_code']; ?>"
required>

<input type="text"
name="semester"
value="<?php echo $row['semester']; ?>"
required>

<button type="submit" name="update">
Update Subject
</button>

</form>

</div>

</body>
</html>