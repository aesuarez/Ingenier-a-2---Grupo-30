<html>
  <head>
	<style type="text/css">

	</style>
  </head>
  <body>
		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css" >
	<!-- Optional theme -->
	<link rel="stylesheet" href="bootstrap\css\bootstrap-theme.min.css">
		<?php
			include('session.php');
			$id = $_GET['id'];
			include('connect-mysql.php');
			$sqlget = "SELECT * FROM gauchadas WHERE idGauchada ='$id'";
			$sqldata = mysqli_query($connection,$sqlget) or die ('error getting table'); 
			$row = mysqli_fetch_array($sqldata,MYSQLI_ASSOC);
		?>
	
	<h3 style="margin-bottom: 25px; text-align: center;">Detalle de  Gauchada</h3>
	
	<section id="campos">
		<div class="container">
			<div class="col-md-6 form-line">
				<div class="panel-body">
					<img src = <?php echo $row['imagen'];?> class="img-rounded" height=200 id="imagenGauchada" name="imagenGauchada"	 />
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-area">  
					<div class="form-group">
						<label for="titulo" class="col-2 col-form-label">Título:</label>
						<br> <?php echo $row['titulo'];?> </br>
					</div>
					<div class="form-group">
						<label for="fechaVencimiento" class="col-2 col-form-label">Fecha de vencimiento</label>
						<br> <?php echo $row['fechaDeVencimiento'];?> </br>
					</div>
					
					<div class="form-group">
						<label for="ciudad" class="col-2 col-form-label">Ciudad</label>
						<br> <?php echo $row['ciudad'];?> </br>
					</div>
					
					<div class="form-group">
						<label for="categoria" class="col-2 col-form-label">Categoria</label>
						<br> <?php echo $row['categoria'];?> </br>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label for="descripcion" class="col-form-label">Descripcion</label>
				<br> <?php echo $row['descripcion'];?> </br>
			</div>
			<input type="hidden" id="userId" name="userId" value= <?php echo $_SESSION['user_id']; ?> >
			<input type="hidden" id="gauchadaId" name="gauchadaId" value= <?php echo $id; ?> >
			</form>
	<a href= "inicioUG.php">
		<button type="button" class="btn btn-primary pull-left">Volver</button>
	</a>
	<button id="botonMutable" name="botonMutable" type="button" class="btn btn-primary pull-right"> 
	<?php 
	if($row['idPropietario']==$_SESSION['user_id']) {
		echo "Ver postulaciones";
	} else {
		echo "Postularme";
	}
	?> 
	</button>
	</a>
	
</body>
</html>