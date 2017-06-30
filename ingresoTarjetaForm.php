<!DOCTYPE html>

<html>
  <head>
	<meta charset="utf-8"/>
	<script src="jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="ingresoTarjeta.js"></script>
	<script src="moment.js"></script>
	<script type="text/javascript" src="publicacionGauchada.js"></script>
	<script src="jquery_validation\dist\jquery.validate.min.js"></script>
	<script src="jquery_validation\dist\additional-methods.min.js"></script>	
	</style>
  </head>
  <body>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css" >
	<!-- Optional theme -->
	<link rel="stylesheet" href="bootstrap\css\bootstrap-theme.min.css">
	<h3> Total a pagar: </h3>
	<div class="form-group">
		<label name="total" id="total" ></label>
	</div>
	<h3> Información de tarjeta: </h3>
	<form name="compra" id="compra">
		<div class="form-group">
			<label for="nombre" >Nombre del propietario de la tarjeta:</label>
			<input type="text" class="form-control " id="nombre" name="nombre" placeholder="Nombre que figura en tarjeta">
		</div>
		<div class="form-group">
			<label for="numero">Numero de tarjeta:</label>
			<input type="text" class="form-control " id="numero" name="numero">
		</div>
		<div class="form-group">
			<label for="codigoSeguridad">Numero de seguridad:</label>
			<input type="text" class="form-control " id="codigoSeguridad" name="codigoSeguridad">
		</div>
		<div class="form-group">
			<label for="fechaDeVencimiento" class="col-2 col-form-label">Fecha de Vencimiento(ej: 01/08/2017):</label>
			<input type="date" class="form-control " id="fechaDeVencimiento" name="fechaDeVencimiento" onkeydown="return false">
		</div>
		<input type="hidden" id="puntosComprados" name="puntosComprados" >
		<input type="hidden" id="dineroGastado" name="dineroGastado">
	</form>
	<button type="button" id="confirmar" name="confirmar">Confirmar pago</button>
	<button type="button" id="cancelar" name="cancelar">Cancelar pago</button>
	</body>
</html>