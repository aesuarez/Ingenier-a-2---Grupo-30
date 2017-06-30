$(document).ready(function(){
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
	
	jQuery.validator.addMethod("notNumber", function(value, element, param) {
	   var reg = /[0-9]/;
	   if(reg.test(value)){
			 return false;
	   }else{
			   return true;
	   }
    });
	
	$("#registroForm").validate({
		rules: {
			nombre: { required: true, notNumber: true},
			apellido: { required: true, notNumber: true},
			descripcion: "required",
			telefono: {required:true, digits: true},
			email: { required: true, email: true},
			ciudad: { required: true},
			usuario: { required: true, notNumber: true},
			contrasenia: "required"
		},
		messages: {
			nombre:  { required: "Campo obligatorio", notNumber: "No se permiten números"},
			apellido: { required: "Campo obligatorio", notNumber: "No se permiten números"},
			descripcion: "Campo obligatorio",
			telefono: { required:"Campo obligatorio", digits: "El telefono debe estar formado solo por números."},
			email: { required: "Campo obligatorio", email: "Debe ingresar un email válido (ej: abc@def.com)"},
			ciudad: "Campo obligatorio",
			usuario: { required: "Campo obligatorio", notNumber: "No se permiten números"},
			contrasenia: "Campo obligatorio"
			
		}
	});
	$("#registrar").click(function(){
		if($("#registroForm").valid() == true) {
			var data = $("#registroForm").serialize();
			$.post( "registroUsuario.php", data, function(response) { 
				var isnum = /^\d+$/.test(response);
				console.log(isnum);
				if(isnum== true){
					$("#gauchoId").val(response);
					$("#imagenGaucho").submit();
					alert("Usuario registrado con exito.");
				} else {
					alert(response);
				}
			});
		}		
	});
	
	$("#imagenSubida").change(function() {
		readURL(this);
	});

});

function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#imagenGaucho').attr('src', e.target.result);
		}
		
		reader.readAsDataURL(input.files[0]);
	}
}