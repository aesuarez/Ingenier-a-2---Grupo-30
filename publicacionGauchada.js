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
	
	// Metodo para validar la fecha minima de un campo tipo date
	$.validator.addMethod("fechaMin", function(value, element) {
    var curDate = new Date();
	var inputDate = value;
    if (moment(inputDate).year() == moment(curDate).year()) {
		if (moment(inputDate).month()+1 == moment(curDate).month()+1) {
			if (moment(inputDate).date() <= moment(curDate).date()) {
				return false;
			} 
		} else if(moment(inputDate).month()+1 < moment(curDate).month()+1) {
			return false;
		}
	} else if (moment(inputDate).year() == moment(curDate).year()) {
		return false;
	}
	return true
	});
	
	//Carga el id de usuario en el campo escondido para ser enviado al servidor junto al resto de la informacion de la gauchada
	
	
	//Reglas de validación de campos junto a los mensajes en caso de que la validación resulte negativa
	$("#publicacionForm").validate({
		rules: {
			titulo: "required",
			fechaVencimiento: {required:true, fechaMin: true},
			ciudad: "required",
			categoria: { required: true},
			descripcion: "required",
		},
		messages: {
			titulo: "Campo obligatorio",
			fechaVencimiento: {required:"Campo obligatorio", fechaMin: "La fecha de vencimiento no puede ser anterior o igual a la fecha de hoy"},
			ciudad: "Campo obligatorio",
			categoria: "Campo obligatorio",
			descripcion:"Campo obligatorio"
		}
	});
	
	//Botón para publicar gauchada
	$("#publicar").click(function(){
		if($("#publicacionForm").valid() == true) {
			var data = $("#publicacionForm").serialize();
			$.post( "insertarGauchada.php", data, function(response) { 
			if(document.getElementById("imagenSubida").files.length != 0) {
				$("#gauchadaId").val(response);
				$aux =$("#gauchadaId").val();
				location.replace("inicioUG.php");
				$("#imagenGauchadaForm").submit();
				
			}
			
			//alert("Gauchada publicada con exito");
		});
		
		}
		
	});
	
	//Botón para intentar publicar sin validar - SERA ELIMINADO LUEGO DE LA DEMO
	$("#sinValidacion").click(function(){
		var data = $("#publicacionForm").serialize();
		$.post( "insertarGauchada.php", data, function(response) { 
			if($("#imagenSubida")!=null) {
				
				$("#gauchadaId").val(response);
				$("#imagenGauchadaForm").submit();
			}
		});
	});
	
	$("#imagenSubida").change(function() {
		readURL(this);
	});

});

function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#imagenGauchada').attr('src', e.target.result);
		}
		
		reader.readAsDataURL(input.files[0]);
	}
}