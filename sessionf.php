<?php 
	if(!isset($_SESSION['f_id']))
	{ header('location: loginf.php');} 
 	
 	else 
 		{$f_id = $_SESSION['f_id'];}      
?>

