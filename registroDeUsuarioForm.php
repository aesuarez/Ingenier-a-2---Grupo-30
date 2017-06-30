<!DOCTYPE html>
<html>
<head>
	<title>Una Gauchada</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="registroDeUsuarioForm.css">
	<script src="jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="registroDeUsuario.js"></script>
	<script src="jquery_validation\dist\jquery.validate.min.js"></script>
	<script src="jquery_validation\dist\additional-methods.min.js"></script>
<script src="bootstrap\js\bootstrap.min.js"></script>	
</head>
<body>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css" >
	<!-- Optional theme -->
	<link rel="stylesheet" href="bootstrap\css\bootstrap-theme.min.css">
	
	<h3 style="margin-bottom: 25px; text-align: center;">  </h3>
	<div class="container" >
	<div class="col-md-5">
		<div class="form-area" style= "text-align">  
			<form enctype="multipart/form-data" action="subirImagenGaucho.php"  id="imagenGaucho" name="imagenGaucho" method="POST">
				<div class="form-group">
					<img src="imagenes_gauchos/gaucho_placeholder.jpg" class="img-rounded" height=50 id="imagenGaucho" name="imagenGaucho"	 />
					<label for="imagenSubida" class="col-2 col-form-labe">Imagen:</label>
					<input type="file" name="imagenSubida" id="imagenSubida">
					<input type="hidden" id="gauchoId" name="gauchoId" >
				</div>
			</form>
			
			<form role="form" id="registroForm" name="registroForm">
			<br style="clear:both">
						<h3 style="margin-bottom: 25px; text-align: center;">Registro de gauchos</h3>
						<div class="form-group">
							<label for="nombre" class="col-2 col-form-label">Nombre:</label>
							<input type="text" class="form-control" id="nombre" name="nombre" required>
						</div>
						<div class="form-group">
							<label for="apellido" class="col-2 col-form-label">Apellido:</label>
							<input type="text" class="form-control" id="apellido" name="apellido" required>
						</div>
						<div class="form-group">
							<label for="descripcion" class="col-2 col-form-labe">Descripcion</label>
							<textarea class="form-control " type="textarea" id="descripcion" name="descripcion" ></textarea>
						</div>
						<div class="form-group">
							<label for="telefono" class="col-2 col-form-label">Telefono:</label>
							<input type="text" class="form-control" id="telefono" name="telefono" required>
						</div>
						<div class="form-group">
							<label for="email" class="col-2 col-form-label">Email:</label>
							<input type="text" class="form-control" id="email" name="email" required>
						</div>
						<div class="form-group">
									<label for="ciudad" class="col-2 col-form-label">Ciudad</label>
									<select class="custom-select form-control " id="ciudad" name="ciudad" >
										<option value="">Seleccione una ciudad...</option>
										<option value="La Plata">La Plata</option>
										<option value="Berisso">Berisso</option>
										<option value="City Bell">City Bell</option>
										<option value="Bahia Blanca">Bahia Blanca</option>
										<option value="Borja">Borja</option>
										<option value="Rosario">Rosario</option>
									</select>
						</div>
						<div class="form-group">
							<label for="usuario" class="col-2 col-form-label">Usuario:</label>
							<input type="text" class="form-control" id="usuario" name="usuario" required>
						</div>
						<div class="form-group">
							<label for="contrasenia" class="col-2 col-form-label">Contraseña:</label>
							<input type="password" class="form-control" id="contrasenia" name="contrasenia" required>
						</div>
				
			<button type="button" id="registrar" name="registrar" class="btn btn-primary pull-right">Registrar</button>
			<button type="button" id="sinValidacion" name="sinValidacion" class="btn btn-primary pull-left">Sin validar</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>