<!DOCTYPE html>
<html>
<head>
	<title>Una Gauchada</title>
	<meta charset="utf-8"/>
	<script src="jquery-3.2.1.min.js"></script>
	<script src="moment.js"></script>
	<script type="text/javascript" src="publicacionGauchada.js"></script>
	<script src="jquery_validation\dist\jquery.validate.min.js"></script>
	<script src="jquery_validation\dist\additional-methods.min.js"></script>	
</head>
<body>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css" >
	<!-- Optional theme -->
	<link rel="stylesheet" href="bootstrap\css\bootstrap-theme.min.css">
	<?php
		include('session.php');
	?>		
	<h3 style="margin-bottom: 25px; text-align: center;">Publicación de gauchada</h3>
	<section id="campos">
		<div class="container">
			<form enctype="multipart/form-data" action="subirImagenGauchada.php" id="imagenGauchadaForm" method="POST" name="imagenGauchadaForm">
				<div class="col-md-6 form-line">
						<div class="panel-body">
							<h4>Selecciona una imagen para la gauchada</h4>
							<img src="imagenes_gauchadas/gauchada_placeholder.png" class="img-rounded" height=200 id="imagenGauchada" name="imagenGauchada"	 />
							<input type="file" name="imagenSubida" id="imagenSubida">
						</div>
						<input type="hidden" id="gauchadaId" name="gauchadaId" >
						<input type="hidden" id="userId" name="userId" value=<?php echo $_SESSION['user_id'];?> >
				</div>
			</form>
			<form enctype="multipart/form-data" role="form" class="cmxform" id="publicacionForm">
				<div class="col-md-6">
					<div class="form-area">  
						<div class="form-group">
							<label for="titulo" class="col-2 col-form-label">Título</label>
							<input type="text" class="form-control " id="titulo" name="titulo" placeholder="Título de gauchada">
						</div>
						
						<div class="form-group">
							<label for="fechaVencimiento" class="col-2 col-form-label">Fecha de vencimiento</label>
							<input type="date" class="form-control" id="fechaVencimiento" name = "fechaVencimiento" value="" onkeydown="return false">
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
							<label for="categoria" class="col-2 col-form-label">Categoria</label>
							<select class="custom-select form-control " id="categoria" name= "categoria" >
								<option value="">Seleccione una categoria...</option>
								<option value="Pintor">Pintor</option>
								<option value="Viajes">Viajes</option>
								<option value="Cocina">Cocina</option>
								<option value="Guarderia">Guarderia</option>
								<option value="Restauracion">Restauracion</option>
								<option value="Viajes">Viajes</option>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="descripcion" class="col-form-label">Descripcion</label>
					<textarea class="form-control " type="textarea" id="descripcion" name="descripcion" placeholder="Descripción de gauchada"></textarea>
					<!-- <span class="help-block"><p id="characterLeft" class="help-block ">Has alcanzado el limite de caracteres disponibles</p></span> -->
				</div>
				<input type="hidden" id="userId" name="userId" value= <?php echo $_SESSION['user_id']; ?> >
			</form>
		
			<button type="button" id="publicar" name="publicar"	 class="btn btn-primary pull-right">Publicar gauchada</button>
			<button type="button" id="sinValidacion" name="sinValidacion"	 class="btn btn-primary pull-left">Publicar gauchada sin validacion</button>
		
		</div>
	</section>
	<!-- Latest compiled and minified JavaScript  -->


</body>
</html>