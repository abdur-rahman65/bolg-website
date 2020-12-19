<?php 

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect Database".mysqli_connect_errno();
}

 ?>