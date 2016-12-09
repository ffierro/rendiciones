<?php 
	include('../php/conexion.php');
	$id_prof = $_POST['id_prof'];
	$sql = "SELECT nom_profesional, ape_profesional FROM profesional WHERE id_profesional = $id_prof";
	$resultado = mysqli_query($conexion, $sql) or die('Error en la consulta de eliminar profesional');
	$fila = mysqli_fetch_array($resultado);
	$respuesta = $fila[0]." ".$fila[1];
	echo $respuesta;
 ?>