<!DOCTYPE html>

<html>
  <head>
	<meta charset="utf-8"/>
	<script src="jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="tiendaVirtual.js"></script>
	<script>
	var totalPuntos = 0;
	var totalGastado = 0;
	</script>
	</style>
  </head>
  <body>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css" >
	<!-- Optional theme -->
	<link rel="stylesheet" href="bootstrap\css\bootstrap-theme.min.css">
	<h3> Opciones de compra: </h3>
	<form name="compra" id="compra">
	  <select id="puntos" name="puntos" >
			<option value="">Seleccione una cantidad...</option>
			<option value="1">1 - Punto ($5)</option>
			<option value="5">5 - Puntos ($25)</option>
			<option value="10">10 - Puntos ($50)</option>
	  </select>

	  <button type="button" id="agregar" name="agregar" class="btn btn-primary">Agregar al carrito</button>
	</form>
	<h3> Total: </h3>
	<label id= "totalPuntos" name= "totalPuntos">Puntos comprados: - </label></br>
	<label id= "totalGastado" name= "totalGastado">Precio de compra: - </label></br></br>
	<button type="button" id="pagar" name="pagar" class="btn btn-primary">Pagar orden de compra</button></a>
	<a href= "inicioUG.php">
		<button type="button" class="btn btn-primary">Volver</button>
	</a>
	</body>
</html>