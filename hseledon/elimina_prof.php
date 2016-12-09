<?php
include('../php/conexion.php');

	$id = $_POST['id_prof'];
	$sql = "DELETE FROM profesional WHERE id_profesional = $id";
	$resultado = mysqli_query($conexion, $sql) or die('Error en la consulta');

	echo "Profesional Eliminado";

	// echo "eliminado";
	// echo "<script>alert('dato eliminado')</script>";
	// echo"<META HTTP-EQUIV='Refresh' CONTENT='0; URL=listar.php'>";
?>
