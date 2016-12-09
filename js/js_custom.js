$(document).ready(function() {
    $('#dataTables-example').DataTable({
            responsive: true
    });
});

function carga_subcategoria(){
	var id_categoria=$("#categoria").val();

	$.ajax({
		url: 'carga_subcategoria.php',
		data: {categoria: id_categoria},
		type: 'POST',
		success: function (data)
		{
			$("#subcategoria").html(data);
		}
	})
}

function mostrarPro(id_prod){
	id_pro_global = id_prod
	$.ajax({
		url: 'mostrarPro.php',
		data: {id_prod: id_prod},
		type: 'POST',
		success: function (data)
		{
			$('#mensaje').html(data)
		}
	})
}

function mostrarUsr(id_usr){
	id_usr_global = id_usr
	$.ajax({
		url: 'mostrarUsr.php',
		data: {id_usr: id_usr},
		type: 'POST',
		success: function (data)
		{
			$('#msjDel').html(data)
		}
	})
}

function mostrarCat(id_cat){
	id_cat_global = id_cat
	$.ajax({
		url: 'mostrarCat.php',
		data: {id_cat: id_cat},
		type: 'POST',
		success: function (data)
		{
			$('#msjDelCat').html(data)
		}
	})
}

function des_publicar(id_prod){
	$.ajax({
		url: 'des_publicar.php',
		data: {id_prod: id_pro_global},
		type: 'POST',
		success: function (data)
		{
			$('#mensaje').html(data)
		}
	})
}

function publicar(id_prod){
	$.ajax({
		url: 'publicar.php',
		data: {id_prod: id_pro_global},
		type: 'POST',
		success: function (data)
		{
			$('#mensaje').html(data)
		}
	})
}

function delUsr(id_usr){
	$.ajax({
		url: 'del_usuario.php',
		data: {id_usr: id_usr_global},
		type: 'POST',
		success: function (data)
		{
			$('#msjDel').html(data)
		}
	})
}
