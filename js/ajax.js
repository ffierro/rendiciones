function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxlml2.XMLHTTP");
	} catch (e) {
		try {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	} catch (E) {
		xmlhttp = false;
	}
}
if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
	xmlhttp = new XMLHttpRequest();
}
return xmlhttp;
}
function Registrar(){
	rut_profesional = document.frmprofesional.rut.value();
	nom_profesional = document.frmprofesional.nombre.value();
	ape_profesional = document.frmprofesional.apellido.value();
	ajax = objectoAjax();
	ajax.open("POST", "../hseledon/registrar.php", true);
	ajax.onreadystatechnge=function() {
		if (ajax.readyState==4) {
			alert('Usuario registrado');
			window.location.reload(true);
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("rut_profesional="+rut+"&nom_profesional"+nombre+"&ape_profesional"+apellido);
}
function Eliminar(idP){
	if(confirm("Desea eliminar")){
	ajax = objetoAjax();
	ajax.open("POST", "../hseledon/eliminar.php", true);
	ajax.onreadystatechnge=function() {
		if (ajax.readyState==4) {
			alert("usuairo eliminado");
			window.location.reload(true);
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("idP="+idP)
	}else{

	}
}