<?php 
include('../php/conexion.php');

	$sql ="SELECT * FROM profesional";

	$resultado = mysqli_query($conexion, $sql) or die('Error en la consulta');

	// $fila = mysqli_fetch_array($resultado);

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
<html lang="en">
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
	<div class="container">
		<?php crearMenu(); ?>
		<div class="row">					
			<a class="btn btn-success" data-toggle="modal" data-target="#nuevoUsu">Nuevo Usuario</a><br><br>
			<table class='table'>
				<tr>
					<th>Id</th><th>Nombre Usuario</th><th>Clave Usuario</th><th>Nombre</th><th>Apellido</th><th>Privilegio</th><th><span class="glyphicon glyphicon-wrench"></span></th>
				</tr>			
<?php

				while ($fila=mysqli_fetch_array($resultado)) 
				{					
					echo "<tr>";
					echo "<td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td>";	
					echo"<td>";						
				    echo "<a data-toggle='modal' data-target='#editUsu' data-id='" .$fila[0] ."' data-nombre='" .$fila[1] ."' data-edad='" .$fila[2] ."' data-direccion='" .$fila[3] ."' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span>Editar</a> ";			
					echo "<a class='btn btn-danger' onClick='mostrarProf($fila[0])' data-toggle='modal' data-target='#DelUsu' href='#'><span class='glyphicon glyphicon-remove'></span>Eliminar</a>";							
					// echo "<a class='btn btn-danger' data-target='#DelUsu' href='elimina.php?id=" .$fila[0] ."'><span class='glyphicon glyphicon-remove'></span>Eliminar</a>";		
					echo "</td>";
					echo "</tr>";
				}
	
?>
	        </table>
		</div> 
		<div class="modal" id="nuevoUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Agregar Usuario</h4>                       
                    </div>
                    <div class="modal-body">
                       <form action="insertar.php" method="POST">              		
                       		
                       		<div class="form-group">
                       			<label for="nombre">Nombre Usuario:</label>
                       			<input class="form-control" id="nombre_usuario" name="nom_usr" type="email" placeholder="Nombre de Usuario" required></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="nombre">Password Usuario:</label>
                       			<input class="form-control" id="nombre_usuario" name="pas_usr" type="password" placeholder="Pasword Usuario"></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="rut">Nombre:</label>
                       			<input class="form-control" id="nombre" name="nombre_usr" type="text" placeholder="Nombre" required></input>
                       			<!-- <input class="form-control" id="validar_rut" name="rut" type="text" placeholder="Rut"></input> -->
                       		</div>
                       		<div class="form-group">
                       			<label for="apellido">Apellido:</label>
                       			<input class="form-control" id="apellido" name="apellido_usr" type="text" placeholder="Apellido" required></input>
                       		</div>
                       		<div class="form-group">
                       			<select name="priv_usr" class="form-control" required>
                       				<option value="" selected disabled>Elija el Rol del usuario</option>
  									<option value="0">Administrador</option>
									<option value="1">Usuario</option>
								</select>
                       		</div>

							<input type="submit" class="btn btn-success" value="Salvar">
                       </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> 

		<div class="modal" id="DelUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Eliminar Profesional</h4>                       
                    </div>
					<div class="modal-body">
						<p>Desea eliminar este usuario ?
						<div id="msjEliminar"></div>
						</p>
					</div>
						
                    <div class="modal-footer">
                        <button type="button" class="btn btn-normal" data-dismiss="modal" onClick="eliminar_prof();">Eliminar</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> 


        <div class="modal" id="editUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Editar Contacto</h4>
                    </div>
                    <div class="modal-body">                      
                       <form action="actualiza.php" method="POST">                       		
                       		        <input  id="id" name="id" type="hidden" ></input>   		
		                       		<div class="form-group">
		                       			<label for="rut">Rut:</label>
		                       			<input class="form-control" id="rut" name="rut" type="text" ></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="nombre">Nombre:</label>
		                       			<input class="form-control" id="nombre" name="nombre" type="text" ></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="apellido">Apellido:</label>
		                       			<input class="form-control" id="apellido" name="apellido" type="text" ></input>
		                       		</div>

									<input type="submit" class="btn btn-success">							
                       </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> 



	</div>

<script src="../js/jquery-3.1.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap.min.js"></script>
<script src="../js/js_custom.js"></script>


	<script>			 
		  $('#editUsu').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipient0 = button.data('id')
		  var recipient1 = button.data('rut_profesional')
		  var recipient2 = button.data('nom_profesional')
		  var recipient3 = button.data('ape_profesional')
		   // Extract info from data-* attributes
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		 
		  var modal = $(this)		 
		  modal.find('.modal-body #id').val(recipient0)
		  modal.find('.modal-body #rut').val(recipient1)
		  modal.find('.modal-body #nom').val(recipient2)
		  modal.find('.modal-body #ap').val(recipient3)		 
		});
		
	</script>
	<script type="text/javascript">
    $(document).ready(function(){
        // Rutina para validar RUT Chileno
        $('#validar_rut').Rut({
          on_error: function(){ 
            alert('Rut Incorrecto'); 
            location.reload();},
          format_on: 'keyup'
        });
    });

	function mostrarProf(id_prof){
		global_id = id_prof

		$.ajax({
			url: 'mostrar_prof.php',
			data: {id_prof: id_prof},
			type: 'POST',
			success: function (data)
			{
				$('#msjEliminar').html(data)
			}
		})
	}

	function eliminar_prof(){
		$.ajax({
			url: 'elimina_prof.php',
			data: {id_prof: global_id},
			type: 'POST',
			success: function (data)
			{
				$('#msjEliminar').html(data)
				window.location.href = 'listar.php'
			}
		})
	}
</script>
</body>
</html>