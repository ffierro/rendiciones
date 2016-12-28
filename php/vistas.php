<html>
	<head>
		<meta charset="UTF-8">
	</head>

</html>

<?php 
include ('../php/conexion.php');


function menuAdm($level, $usr) {
	$menu = "<h2>Administrador</h2>";
	$menu .= "<nav class='navbar navbar-default'>";
	  $menu .= "<div class='container-fluid'>";
	    
	    $menu .= "<div class='navbar-header'>";
	      $menu .= "<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1' aria-expanded='false'>";
	        $menu .= "<span class='sr-only'>Toggle navigation</span>";
	        $menu .= "<span class='icon-bar'></span>";
	        $menu .= "<span class='icon-bar'></span>";
	        $menu .= "<span class='icon-bar'></span>";
	      $menu .= "</button>";

	    $menu .= "</div>";

	    $menu .= "<div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>";
	      $menu .= "<ul class='nav navbar-nav'>";
	        $menu .= "<li class='active'><a href='../admin/index.php'>Inicio <span class='sr-only'>(current)</span></a></li>";

	        $menu .= "<li class='dropdown'>";
	          $menu .= "<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Proyectos <span class='caret'></span></a>";
	          $menu .= "<ul class='dropdown-menu'>";
	            $menu .= "<li><a href='../hseledon/listar2.php'>Nuevo Proyecto</a></li>";
	            $menu .= "<li><a href='publicar_editar.php' >Gestionar Proyecto </a></li>"; 
	            $menu .= "<li><a href='todos_productos.php' >Todos los Proyectos</a></li>";           
	            $menu .= "<li role='separator' class='divider'></li>";
	            $menu .= "<li><a href='#'>Nueva Categoria</a></li>";
	            $menu .= "<li><a href='../ecarrion/index.php'>Carrion</a></li>";     
	          $menu .= "</ul>";
	        $menu .= "</li>";
                
	        $menu .= "<li class='dropdown'>";
	          $menu .= "<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Profesionales <span class='caret'></span></a>";
	          $menu .= "<ul class='dropdown-menu'>";
	            $menu .= "<li><a href='../hseledon/listar.php'>Nuevo Profesional</a></li>";
	            $menu .= "<li><a href='publicar_editar.php' >Gestionar Profesional </a></li>"; 
	            $menu .= "<li><a href='todos_productos.php' >Todos los Profesionales</a></li>";           
	          $menu .= "</ul>";
	        $menu .= "</li>";
                
	        $menu .= "<li class='dropdown'>";
	          $menu .= "<a href='../ffierro/usuarios.php' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Usuarios <span class='caret'></span></a>";
	          $menu .= "<ul class='dropdown-menu'>";
	            $menu .= "<li><a href='../ffierro/agregar_usuario.php'>Nuevo Usuario</a></li>";
	            $menu .= "<li><a href='../ffierro/usuarios.php'>Editar Usuario </a></li>";                              
	          $menu .= "</ul>";
	        $menu .= "</li>";


	      $menu .= "</ul>";
	    $menu .= "</div>";
	  $menu .= "</div>";
	$menu .= "</nav>";

	return printf($menu);
}

function mostrarDatos(){
//	$mysql = conexion();
	global $conexion;

	$sql = "SELECT * FROM emp_intervenida";
	$resultado = mysqli_query($conexion, $sql);
	$tabla = "<tbody class='text-center'>";
	while ($fila = mysqli_fetch_array($resultado)) {
		$tabla .= "<tr>";
			$tabla .= "<td>".$fila[0]."</td>";
			$tabla .= "<td>".$fila[1]."</td>";
			$tabla .= "<td>".$fila[2]."</td>";
			$tabla .= "<td>".$fila[3]."</td>";
			$tabla .= "<td>".$fila[4]."</td>";
			$tabla .= "<td>".$fila[5]."</td>";
			$tabla .= "<td>".$fila[6]."</td>";
			$tabla .= "<td>".$fila[7]."</td>";
		$tabla .= "</tr>";
	}
	$tabla .= "</tbody>";
	return printf($tabla);
}

?>