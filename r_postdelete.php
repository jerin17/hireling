<?php  

include 'config.php';
$j_id=$_GET['id'];

$sql="DELETE FROM jobs WHERE j_id='$j_id'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
// sleep(2);

header('Location: r_dashboard.php');


?>