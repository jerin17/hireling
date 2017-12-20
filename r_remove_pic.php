<?php 
session_start();
include 'config.php';
$r_id=$_GET['r_id'];
$image="ravatar.png";

$sql = "UPDATE recruiters SET r_image='$image' WHERE r_id='$r_id'" ;
if ($conn->query($sql) === TRUE)
{echo $msg="Record updated successfully! ";
}
else 
    echo "Error: " . $sql . "<br>" . $conn->error;

echo $_SESSION['r_image'] = $image;
header('Location:r_setting_picture.php');
?>
