<?php
	$conexion = mysqli_connect("localhost", "root", "", "rendicion");

	if (mysqli_connect_errno())
	  {
	  echo "Falla al conectar a MySQL: " . mysqli_connect_error();
	  }
?>