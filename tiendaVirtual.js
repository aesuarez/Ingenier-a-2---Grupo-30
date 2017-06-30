$(document).ready(function(){
	
	function popitup(url,windowName) {
       newwindow=window.open(url,windowName,'height=500,width=500');
       if (window.focus) {newwindow.focus()}
       return false;
    }
	
	$("#agregar").click(function(){
		var seleccionado = $("#puntos").val();
		switch(seleccionado){
			case "1":
				window.totalPuntos += 1;
				window.totalGastado += 5;
				break;
			case "5":
				window.totalPuntos += 5;
				window.totalGastado += 25;
				break;
			case "10":
				window.totalPuntos += 10;
				window.totalGastado += 50;
				break;
		}
		
		document.getElementById('totalPuntos').innerHTML = ('Puntos comprados: ').concat(window.totalPuntos);
		document.getElementById('totalGastado').innerHTML = ('Precio de compra: $').concat(window.totalGastado);
	});
	
	$("#pagar").click(function(){
		popitup('http://localhost/unaGauchada/ingresoTarjetaForm.php?', 'Pago con tarjeta');
	});
});