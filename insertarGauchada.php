<?php
include('connect-mysql.php');


$ok =false;

if (strlen($_POST['titulo'])>0) {
	$gtitulo = strip_tags(trim($_POST['titulo']));
	if (strlen($_POST['descripcion'])>0) {
		$gdescripcion = strip_tags(trim($_POST['descripcion']));
		if (strlen($_POST['fechaVencimiento'])>0) {
			$gfechaVencimiento = strip_tags(trim($_POST['fechaVencimiento']));
			if (strlen($_POST['ciudad'])>0) {
				$gciudad = strip_tags(trim($_POST['ciudad']));
				if (strlen($_POST['categoria'])>0) {
					$gcategoria = strip_tags(trim($_POST['categoria']));
					$idPropietario = $_POST['userId'];
					$ok= true;
				}
			}
		}
	}
}

if($ok == true) {
		$estado = "pendiente";
		$placeholderIMG = "imagenes_gauchadas/gauchada_placeholder.png";
		$sqlinsert = "INSERT INTO gauchadas (idPropietario,titulo,descripcion,ciudad,categoria,fechaDeVencimiento,imagen,estado) VALUES ('$idPropietario','$gtitulo','$gdescripcion','$gciudad','$gcategoria','$gfechaVencimiento','$placeholderIMG','$estado')";
		if(!mysqli_query($connection, $sqlinsert)) {
			die('Error registrando gauchada nueva. Intente más tarde.');
		}
		echo mysqli_insert_id($connection);
}



?>