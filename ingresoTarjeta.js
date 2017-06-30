$(document).ready(function(){
	var totalPuntos = window.opener.totalPuntos;
	var totalGastado = window.opener.totalGastado;
	
	document.getElementById('total').innerHTML = ('Total a pagar: $').concat(totalGastado);
	
	
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
		if (moment(inputDate).month()+1 <= moment(curDate).month()+1) {
			return false;
		}
	} else if (moment(inputDate).year() < moment(curDate).year()) {
		return false;
	}
	return true;
	});
	
	//Reglas de validación de campos junto a los mensajes en caso de que la validación resulte negativa
	$("#compra").validate({
		rules: {
			nombre: "required",
			fechaDeVencimiento: {required:true, fechaMin: true},
			numero: {required:true, creditcard:true},
			codigoSeguridad: { required: true, maxlength: 3, number: true, min: 3},
		},
		messages: {
			nombre: "Campo obligatorio",
			fechaDeVencimiento: {required:"Campo obligatorio", fechaMin: "La fecha de vencimiento no puede ser anterior o igual a este mes"},
			numero: {required:"Campo obligatorio", creditcard: "Por favor ingresar un numero de tarjeta válido"},
			codigoSeguridad: {required:"Campo obligatorio",maxlength: "El valor debe poseer 3 digitos", min: "El valor debe poseer 3 digitos",number:"El valor debe ser numerico"}
			
		}
	});
	 
	$("#confirmar").click(function(){
		$("#puntosComprados").val(totalPuntos);
		$("#dineroGastado").val(totalGastado);
		if($("#compra").valid() == true) {
			var data = $("#compra").serialize();
			$.post( "insertarCompra.php", data, function(response) {
				alert(response);
				close();
			});
			
		}
	}); 
	
	$("#cancelar").click(function(){
		close();
	});
});