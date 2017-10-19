<?php  

session_start();
session_destroy();
echo "logging out...";
include 'index.php';
?>