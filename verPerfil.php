<html>
  <head>
	<style type="text/css">
  	<meta charset="utf-8"/>
	</style>
  </head>
  <body>

		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css" >
	<!-- Optional theme -->
	<link rel="stylesheet" href="bootstrap\css\bootstrap-theme.min.css">
		<?php
			include('session.php');
			$usr = $_SESSION['user_id'];
			include('connect-mysql.php');
			$sqlget = "SELECT * FROM usuarios WHERE idUsuario ='$usr'";
			$sqldata = mysqli_query($connection,$sqlget) or die ('error getting table'); 
			$row = mysqli_fetch_array($sqldata,MYSQLI_ASSOC);
		?>
	
	<h3 style="margin-bottom: 25px; text-align: center;">Perfil de Usuario</h3>
	
	<section id="campos">
		<div class="container">
			<div class="col-md-6 form-line">
				<div class="panel-body">
					<img src = <?php echo $row['foto'];?> class="img-rounded" height=200 id="foto" name="foto"	 />
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-area">  
					<div class="form-group">
						<label for="nombre" class="col-2 col-form-label">Nombre:</label>
						<br> <?php echo $row['nombre'];?> </br>
					</div>
					<div class="form-group">
						<label for="apellido" class="col-2 col-form-label">Apellido:</label>
						<br> <?php echo $row['apellido'];?> </br>
					</div>
					<div class="form-group">
						<label for="apellido" class="col-2 col-form-label">Email</label>
						<br> <?php echo $row['email'];?> </br>
					</div>
					<div class="form-group">
						<label for="telefono" class="col-2 col-form-label">Telefono</label>
						<br> <?php echo $row['telefono'];?> </br>
					</div>
					<div class="form-group">
						<label for="ciudad" class="col-2 col-form-label">Ciudad</label>
						<br> <?php echo $row['ciudad'];?> </br>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label for="descripcion" class="col-form-label">Descripcion</label>
				<br> <?php echo $row['descripcion'];?> </br>
			</div>

			</form>
	<a href= "inicioUG.php">
		<button type="button" class="btn btn-primary pull-left">Volver</button>
	</a>
	<button id="botonMutable" name="botonMutable" type="button" class="btn btn-primary pull-right"> 
	<?php 
	if($row['idUsuario']==$_SESSION['user_id']) {
		echo "Ver postulaciones";
	} else {
		echo "Postularme";
	}
	?> 
	</button>
	</a>
		<h2>  <-- </h2>	
	<h2>Lista de gauchadas </h2>	
<?php 	
	$usr = $_SESSION['user_id'];
	$sqlget2 = "SELECT * FROM gauchadas WHERE idUsuario='$usr'";
	$sqldata2 = mysqli_query($connection,$sqlget2) or die ('error getting table');
	echo "<table>";	
	echo "<tr><th>ID</th><th>Categoría</th><th>Título</th><th>Ciudad</th><th>Fecha de Vencimiento</th></tr>";
	while($row = mysqli_fetch_array($sqldata2,MYSQLI_ASSOC)) {
		echo "<tr><td>";
		echo '<a href="detalleGauchada.php?id='.$row['idGauchada'].'">'.$row['idGauchada'].'</a>';
		echo "</td><td>";
		echo $row['categoria'];
		echo "</td><td>";
		echo $row['titulo'];
		echo "</td><td>";
		echo $row['ciudad'];
		echo "</td><td>";
		echo $row['fechaDeVencimiento'];
		echo "</td></tr>";
	}
	echo "</table>";
?> 	

	<h2>Historial de calificaciones </h2>	
<?php 	
	$usr = $_SESSION['user_id'];
	$sqlget3 = "SELECT * FROM calificaciones WHERE idUsuario='$usr'";
	$sqldata3 = mysqli_query($connection,$sqlget3) or die ('error getting table');
	echo "<table>";	
	echo "<tr><th>ID Usuario Calificador</th><th>Calificación</th><th>Comentario</th></tr>";
	while($row = mysqli_fetch_array($sqldata3,MYSQLI_ASSOC)) {
		echo "<tr><td>";
		echo $row['idUsuarioC'];
		echo "</td><td>";
		echo $row['calificacion'];
		echo "</td><td>";
		echo $row['comentario'];
		echo "</td><td>";
	}
	echo "</table>";
?> 	
</body>
</html>