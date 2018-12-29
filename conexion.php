<?php

	$host="localhost";
	$user="root";
	$pw="";
	$db="escuela";
	$con= mysqli_connect($host,$user,$pw,$db);
mysqli_query($con,'SET NAMES UTF8');
	if ($con) {
		# code...
	}else{
		echo "Error al conectar";
	}
?>