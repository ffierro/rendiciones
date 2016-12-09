<?php
	$mysqli = new mysqli("localhost", "root", "", "rendicion");	
	
	$id = $_POST['id'];
	$rut = $_POST['rut'];
	$nom =  $_POST['nombre'];
	$ap =  $_POST['apellido'];	

	$sql = "UPDATE profesional SET rut_profesional='$rut', nom_profesional='$nom', ape_profesional='$ap' WHERE id_profesional=$id";
	$sql = $mysqli->query($sql);
?>	

	 <SCRIPT LANGUAGE="javascript"> 
         alert("Contacto Actualizado"); 
     </SCRIPT> 
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=listar.php">


