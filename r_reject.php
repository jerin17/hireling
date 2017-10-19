<?php  

include 'config.php';
$f_id=$_GET['f_id'];
$j_id=$_GET['j_id'];


	$sql="DELETE FROM apply WHERE f_id='$f_id' AND j_id='$j_id'";

	if ($conn->query($sql) === TRUE) {
	    echo "Record deleted successfully";
	} else {
	    echo "Error deleting record: " . $conn->error;
	}


	$rej=2;
	$sql2="INSERT INTO reject (f_id,j_id,rej) VALUES ('$f_id','$j_id','$rej') ";

	if ($conn->query($sql2) === TRUE)
	    echo "New record created successfully";

	else 
	    echo "Error: " . $sql2 . "<br>" . $conn->error;


header('Location: r_postview.php?id='.$j_id);

?>