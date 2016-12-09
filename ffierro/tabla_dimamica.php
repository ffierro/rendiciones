<!-- CCS para taba dinamica avanzada -->
    <link href="css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/dataTables.responsive.css" rel="stylesheet">

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <h3 class="page-header">Listado de Empresas</h3>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover tabla-usuarios" id="dataTables-example">

	                    <thead style="text-align: center; background: #eaeaea;">
	                        <tr>
	                            <th style="text-align: center;"> Nombre Empresa</th>
	                            <th style="text-align: center;"> RUT</th>
	                            <th style="text-align: center;"> Direccion</th>
	                            <th style="text-align: center;"> Pais</th>
	                            <th style="text-align: center;"> Ciudad</th>
	                            <th style="text-align: center;"> Accion </th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    	<!-- <?php llenaTabla() ?> Esta funcion es propia para llegar la tabla--> 
	                    </tbody>
            		</table>
        		</div>
			</div>
		</div>
	</div>
</div>



<!-- SCRIPT para Tabla dimamica -->

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>

<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
            responsive: true
    });
});
</script>   