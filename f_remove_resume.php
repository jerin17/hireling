<?php 
session_start();
include 'config.php';
$f_id=$_GET['f_id'];
$f_resume="";

$sql = "UPDATE freelancers SET f_resume='$f_resume' WHERE f_id='$f_id'" ;
if ($conn->query($sql) === TRUE)
{echo $msg="Record updated successfully! ";
}
else 
    echo "Error: " . $sql . "<br>" . $conn->error;

header('Location:f_setting_resume.php');
?>
