<html>
  <head>
	<link rel="stylesheet" href="save.css" >
	<meta charset="utf-8"/>
	<script src="jquery-3.2.1.min.js"></script>
	<script src="moment.js"></script>
  </head>
  <body>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css" >
	<!-- Optional theme -->
	<link rel="stylesheet" href="bootstrap\css\bootstrap-theme.min.css"> 
	<h1 >Una Gauchada</h1>
	 <ul >
		<li> <a href="unaGauchadaPostForm.php">Ver Perfil</a></li>
		<li> <a href="unaGauchadaPostForm.php">Publicar Gauchada</a></li>
		<li> <a href="logout.php">Cerrar sesión</a></li>
	</ul>
	<p class="lead">Bienvenido Gaucho, ahora estas un paso mas cerca de resolver tus problemas. Aro aro aro!</p>    

	<h2>Lista de gauchadas </h2>	
<?php
include('session.php');
$usr = $_SESSION['user_id'];
include('connect-mysql.php');
$sqlget = "SELECT * FROM gauchadas WHERE idUsuario NOT IN (SELECT idUsuario FROM gauchadas WHERE idUsuario='$usr')";
$sqldata = mysqli_query($connection,$sqlget) or die ('error getting table');
echo "<table>";
echo "<tr><th>ID</th><th>Categoría</th><th>Título</th><th>Ciudad</th><th>Fecha de Vencimiento</th></tr>";
while($row = mysqli_fetch_array($sqldata,MYSQLI_ASSOC)) {
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
	<div class="well-searchbox">
	<form class="form-horizontal" role="form" method="POST">
		<div class="form-group">
			<label class="col-md-4 control-label">Título</label>
			<div class="col-md-8">
			<input type="text" class="form-control" placeholder="Título" name="titulo" id="titulo">
			</div>
		</div>
	<div class="form-group">
		<label class="col-md-4 control-label">Categoría</label>
		<div class="col-md-8">
			<select class="form-control" name="categoria" id="categoria">
			<option value="">Seleccione una categoria...</option>
			<option value="Pintor">Pintor</option>
			<option value="Viajes">Viajes</option>
			<option value="Cocina">Cocina</option>
			<option value="Guarderia">Guarderia</option>
			<option value="Restauraciones">Restauraciones</option>
			<option value="Viajes">Viajes</option>
			<option value="Busqueda">Busqueda</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 control-label">Ciudad</label>
		<div class="col-md-8">
			<select class="form-control" name="ciudad" id="ciudad">
			<option value="">Seleccione una ciudad...</option>
			<option value="La Plata">La Plata</option>
			<option value="Berisso">Berisso</option>
			<option value="City Bell">City Bell</option>
			<option value="Bahia Blanca">Bahia Blanca</option>
			<option value="Borja">Borja</option>
			<option value="Rosario">Rosario</option>
			</select>
		</div>
	</div>
	<div class="col-sm-offset-4 col-sm-5">
		<button name="submit" id="submit" type="submit" class="btn btn-success">Search</button>
	</div>
	</form>
	</div>
<?php

$sqlget2 = "SELECT * FROM gauchadas WHERE idUsuario NOT IN (SELECT idUsuario FROM gauchadas WHERE idUsuario='$usr') AND fechaDeVencimiento>=CURDATE()";
	if(isset($_POST['submit'])){
		if($_POST['titulo']!=""){
			$titulo=$_POST['titulo'];
			$sqlget2 = $sqlget2 . " AND titulo LIKE '%$titulo%'";
		}
		if($_POST['ciudad']!=""){
			$ciudad=$_POST['ciudad'];
			/*if($long>0)
			$sqlget2 = $sqlget2 . " ciudad='$ciudad'";*/
			$sqlget2 = $sqlget2 . "AND ciudad='$ciudad'";
		}
		if($_POST['categoria']!=""){
			$categoria=$_POST['categoria'];
			$sqlget2 .=" AND categoria='$categoria'";
			}

		echo "<h2> Resultado de la búsqueda </h2>";
		$sqldata2 = mysqli_query($connection,$sqlget2) or die ('error getting table');
		echo "<table>";
		echo "<tr><th>ID</th><th>Categoría</th><th>Título</th><th>Ciudad</th><th>Fecha de Vencimiento</th></tr>";
		while($row = mysqli_fetch_array($sqldata2,MYSQLI_ASSOC)){
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
	}

?>
  </body>
</html>