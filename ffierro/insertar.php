<?php 
include('../php/conexion.php');

$nusr = $_POST['nom_usr'];
$pusr = $_POST['pas_usr'];
$nomusr = $_POST['nombre_usr'];
$apusr = $_POST['apellido_usr'];
$pvusr =$_POST['priv_usr'];


$sqlconsul = "SELECT * FROM usuarios WHERE n_usuario = '$nusr'";

$resultado = mysqli_query($conexion, $sqlconsul) or die('Error en la consulta');

if ('1' == mysqli_num_rows($resultado)) {
	echo "<script languaje=javascript>
	alert('El Usuario $nusr, ya Existe')
	window.location.href='agregar_usuario.php'
	</script>";

}else {
	$sql = "INSERT INTO usuarios (n_usuario, pass_usuario, nombre_usuario, apellido_usuario, privilegio) 
		VALUES ('$nusr', md5('$pusr'), '$nomusr', '$apusr', '$pvusr')";
	echo $sql;
    mysqli_query($conexion, $sql) or die('Error en la consulta');
	echo "<script languaje=javascript>
	alert('El Usuario $nusr, El Usuario $nusr Fue creado exitosamente...')
	window.location.href='agregar_usuario.php'
	</script>";

}

?> 