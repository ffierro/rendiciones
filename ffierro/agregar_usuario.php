<?php 
include('../php/conexion.php');

	$sql ="SELECT * FROM profesional";

	$resultado = mysqli_query($conexion, $sql) or die('Error en la consulta');

	// $fila = mysqli_fetch_array($resultado);

 ?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>CRUD php Mysql + bootstrap</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/estiloshs.css">	
	<script src="../js/metodos.js"></script>
</head>
<body>
	<header>
		<nav class="navbar navbar-default navbar-static-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
						<span class="sr-only">Desplegar / Ocultar Menu</span>	
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="#" class="navbar-brand">Administración de Usuarios</a>
				</div>
				<div class="collapse navbar-collapse" id="navegacion-fm">
					<ul class="nav navbar-nav">
						<li><a href="../index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>							
						<li><a href="cerrars.php"><span class="glyphicon glyphicon-remove"></span>Salir</a></li>						
					</ul>
					<ul class="nav navbar-nav navbar-right">				      
				    </ul>			
				</div>
			</div>
		</nav>
	</header>
	<div class="container">
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
                       <form action="insertar.php" method="GET">              		
                       		
                       		<div class="form-group">
                       			<label for="nombre">Nombre Usuario:</label>
                       			<input class="form-control" id="nombre_usuario" name="nombre" type="text" placeholder="Nombre de Usuario"></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="nombre">Password Usuario:</label>
                       			<input class="form-control" id="nombre_usuario" name="nombre" type="text" placeholder="Pasword Usuario"></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="rut">Nombre:</label>
                       			<input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre"></input>
                       			<!-- <input class="form-control" id="validar_rut" name="rut" type="text" placeholder="Rut"></input> -->
                       		</div>
                       		<div class="form-group">
                       			<label for="apellido">Apellido:</label>
                       			<input class="form-control" id="apellido" name="apellido" type="text" placeholder="Apellido"></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="apellido">Privilegio:</label>
                       			<input class="form-control" id="privilegio" name="privilegio" type="text" placeholder="Privilegio"></input>
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
	<script src="../js/jquery-1.12.3.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>	
	<script src="../js/jquery.Rut.min.js"></script>	
	<script src="../js/jquery.Rut.js"></script>	


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