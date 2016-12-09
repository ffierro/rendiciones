	<?php
		include('../php/conexion.php');

			// $mysqli = new mysqli("localhost", "root", "", "rendicion");
			$rut = $_GET['rut'];
			$nom = $_GET['nombre'];
			$ap = $_GET['apellido'];

			$sqlq = "INSERT INTO profesional (rut_profesional, nom_profesional, ape_profesional) values ('$rut', '$nom', '$ap')";						
			$resultado = mysqli_query($conexion, $sqlq);

	?>	

		    <SCRIPT LANGUAGE="javascript"> 
            alert("Contacto Registrado"); 
            </SCRIPT> 
            <META HTTP-EQUIV="Refresh" CONTENT="0; URL=listar.php">
