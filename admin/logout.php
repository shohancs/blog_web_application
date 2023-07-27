<?php 

	ob_start();

	session_start(); //session ta start obistai chilo

	session_unset(); //jokhon logout ea click korbo

	session_destroy(); // session ta benge jabe

	header("Location: index.php"); //index ea move korbe

	ob_end_flush();

?>