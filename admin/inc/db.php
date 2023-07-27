<?php  
	$db = mysqli_connect("localhost", "root", "", "project");

	if ($db) {
		// echo "Database Connection Successfully";
	}
	else {
		die("mysqli Error!" . mysqli_error($db));
	}
?>