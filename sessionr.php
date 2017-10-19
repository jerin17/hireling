<?php 
	if(!isset($_SESSION['r_id']))
	{ 
		header('Location: loginr.php');
	}

 	else 
 		{$r_id = $_SESSION['r_id'];}      
?>

