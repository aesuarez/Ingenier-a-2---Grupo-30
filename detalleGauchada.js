$(document).ready(function(){
	
	$("#botonMutable").click(function(){
		if($("#botonMutable").val == "Editar") {
			var data = $("#publicacionForm").serialize();
			$.post( "insertarGauchada.php", data, function(response) { 
			if($("#imagenSubida")!=null) {
				$("#gauchadaId").val(response);
				$("#imagenGauchadaForm").submit();
			}
		});
	});

});