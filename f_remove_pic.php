<?php 
session_start();
include 'config.php';
$f_id=$_GET['f_id'];
$image="favatar.png";

$sql = "UPDATE freelancers SET f_image='$image' WHERE f_id='$f_id'" ;
if ($conn->query($sql) === TRUE)
{echo $msg="Record updated successfully! ";
}
else 
    echo "Error: " . $sql . "<br>" . $conn->error;

echo $_SESSION['f_image'] = $image;
header('Location:f_setting_picture.php');
?>
