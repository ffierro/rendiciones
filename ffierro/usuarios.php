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


	$sql="select * from usuarios";
	$resultado= mysqli_query($conexion,$sql);
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

	<div id="page-wrapper">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-lg-8">
	                <h3 class="page-header">Listado de Empresas</h3>
	                <div class="table-responsive">
	                    <table class="table table-striped table-bordered table-hover tabla-usuarios" id="dataTables-example">

		                    <thead style="text-align: center; background: #eaeaea;">
		                        <tr>
		                            <th style="text-align: center;"> N°</th>
		                            <th style="text-align: center;"> Nombre Usuario</th>
		                            <th style="text-align: center;"> Nombre</th> -->
		                            <th style="text-align: center;"> Apellido</th>
		                            <th style="text-align: center;"> Privilegio</th>
		                            <th style="text-align: center;"> Accion</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    <?php
								while ($row=mysqli_fetch_array($resultado)){
								echo "<tr>";
								echo "<td> $row[0] </td>";
								echo "<td> $row[1] </td>";
								echo "<td> $row[3] </td>";
								echo "<td> $row[4] </td>";
								
								echo "<td> $row[4] </td>";
								
								echo "<td> <a href='#'><i class='fa fa-edit fa-2x'></i></a>";
								echo "<a href='#'><i class='fa fa-trash fa-2x' style='color: red;'></i></a> </td>";

							}	?> 
		                    </tbody>
	            		</table>
	        		</div>
				</div>
			</div>
		</div>
	</div>
</section>


<script src="../js/jquery-3.1.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap.min.js"></script>
<script src="../js/js_custom.js"></script>


</body>
</html>
