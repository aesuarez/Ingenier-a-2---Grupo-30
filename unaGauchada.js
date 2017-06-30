$(document).ready(function(){
	
	// Mejora compatibilidad entre boostrap y validator
	$.validator.setDefaults({
    errorElement: "span",
    errorClass: "help-block",
    highlight: function (element, errorClass, validClass) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    errorPlacement: function (error, element) {
        if (element.parent('.input-group').length || element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
	});
	
	//Reglas de validación de campos junto a los mensajes en caso de que la validación resulte negativa
	$("#inicioForm").validate({
		rules: {
			usuario: "required",
			contrasenia: "required"
		},
		messages: {
			usuario: "Campo obligatorio",
			contrasenia: "Campo obligatorio"	
		}
	});
	
	//Botón para publicar gauchada
	$("#ingresar").click(function(){
		if($("#inicioForm").valid() == true) {
			var data = $("#inicioForm").serialize();
			$.post( "unaGauchadaInicio.php", data, function(response) {
				if(response == "exito") {
					location.replace("inicioUG.php");
				} else {
					alert(response);
				}
			});
			
		}
	});
	
	//BORRAR LUEGO DE LA DEMO
	$("#sinValidacion").click(function(){
		var data = $("#inicioForm").serialize();
		$.post( "unaGauchadaInicio.php", data, function(response) {
			if(response == "exito") {
				alert(response);
			} else {
				alert(response);
			}
		});
	});
	
});