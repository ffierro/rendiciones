<?php 

	include ('../php/seguridad.php');
	include ('../php/vistas.php');
	

	function crearMenu(){
		global $privilegio, $nombre;
		switch ($privilegio){
			case '0': 
				menuAdm($privilegio, $nombre);
				break;

			case '1': 
				menuStd($privilegio, $nombre);
				break;

			case '2': 
				menuMan($privilegio, $nombre);
				break;
		}
	}
 ?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/font-awesome.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<link rel="stylesheet" href="../css/estilos.css">


<!-- CCS para taba dinamica avanzada -->
    <link href="../css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../css/dataTables.responsive.css" rel="stylesheet">

	<title>Administracion Rendiciones</title>
</head>
<body>
	<header class="superior">
		<ul class="nav navbar-top-links navbar-right">
	   		<li class="dropdown">
	        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
	            <i class="fa fa-user fa-fw"></i> <?php echo $nombre; ?> <i class="fa fa-caret-down"></i>
	        </a>
		        <ul class="dropdown-menu dropdown-user">
		            <li><a href="<?php echo 'edit_perfil.php?id='.$id_user; ?>">
		            <i class="fa fa-user fa-fw"></i> Editar Perfil</a>
		            </li>
		            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configuraciones</a>
		            </li>
		            <li class="divider"></li>
		            <li><a href="../php/cerrar.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión</a>
		            </li>
		        </ul>
	    	</li>
		</ul>
	</header>

<section class="principal">

	<?php crearMenu(); ?>
	<div class="dashboard">

	</div>
</section>


<script src="../js/jquery-3.1.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap.min.js"></script>
<script src="../js/js_custom.js"></script>


</body>
</html>
