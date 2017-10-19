<?php

session_start();
include 'config.php';
$j_id=$_GET['id'];
$f_id=$_SESSION['f_id'];
$app=1;

$sql="INSERT INTO apply (f_id,j_id,app) VALUES ('$f_id','$j_id','$app') ";

if ($conn->query($sql) === TRUE)
    echo "New record created successfully";

else 
    echo "Error: " . $sql . "<br>" . $conn->error;

header('Location:f_job.php');
?>
