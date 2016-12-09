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
	        $menu .= "<li class='active'><a href='index.php'>Inicio <span class='sr-only'>(current)</span></a></li>";

	        $menu .= "<li class='dropdown'>";
	          $menu .= "<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Productos <span class='caret'></span></a>";
	          $menu .= "<ul class='dropdown-menu'>";
	            $menu .= "<li><a href='#' data-toggle='modal' data-target='#productModal'>Nuevo Producto</a></li>";
	            $menu .= "<li><a href='publicar_editar.php' >Gestionar Producto </a></li>"; 
	            $menu .= "<li><a href='todos_productos.php' >Todos los Productos</a></li>";           
	            $menu .= "<li role='separator' class='divider'></li>";
	            $menu .= "<li><a href='#' data-toggle='modal' data-target='#categoryModal'>Nueva Categoria</a></li>";
	            // $menu .= "<li><a href='todas_categorias.php'>Editar Categoria</a></li>";     
	           	$menu .= "<li role='separator' class='divider'></li>";
	            $menu .= "<li><a href='#' data-toggle='modal' data-target='#subcategoryModal'>Nueva Sub-Categoria</a></li>";
	            // $menu .= "<li><a href='todas_subcategorias.php'>Editar Sub-Categoria</a></li>";  

	          $menu .= "</ul>";
	        $menu .= "</li>";

	        $menu .= "<li class='dropdown'>";
	          $menu .= "<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Usuarios <span class='caret'></span></a>";
	          $menu .= "<ul class='dropdown-menu'>";
	            $menu .= "<li><a href='#' data-toggle='modal' data-target='#userModal'>Nuevo Usuario</a></li>";
	            $menu .= "<li><a href='todos_usuarios.php'>Editar Usuario </a></li>";                              
	          $menu .= "</ul>";
	        $menu .= "</li>";


	      $menu .= "</ul>";
	    $menu .= "</div>";
	  $menu .= "</div>";
	$menu .= "</nav>";

	return printf($menu);
}

?>