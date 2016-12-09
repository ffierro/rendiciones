$(document).ready(function(){
	$("#nuevo_usuario").submit(darAltaUsuario)

	function darAltaUsuario(evento){
		evento.preventDefault()
		var datos = $("#nuevo_usuario").serialize()
		var url = '../procesos/add_user.php';

		$.ajax({
        url: url,
        data: datos,
        type: 'POST',
        success: function(response){
            alert('')
            //$("#text_usr").html(response);
    	}
	    });

	}

})