<?php
include('connect-mysql.php');


$gemail = $_POST['email'];
$guser = $_POST['usuario'];
$sqlSearch = "SELECT * FROM usuarios WHERE (email='$gemail')";
$data = mysqli_query($connection,$sqlSearch) or die ('error getting table');
$num_rows = $data->num_rows;

if ($num_rows > 0) {
	echo "El email ingresado ya posee cuenta registrada, por favor intente con otro email...";
} else {
	
	$sqlSearch = "SELECT * FROM usuarios WHERE (usuario='$guser')";
	$data = mysqli_query($connection,$sqlSearch) or die ('error getting table');
	$num_rows = $data->num_rows;
	if ($num_rows > 0) {
		echo "El usuario ingresado ya está siendo utilizado, por favor intente con otro usuario...";
	} else {

		$ok =false;
		if (strlen($_POST['nombre'])>0) {
			$gnombre = strip_tags(trim($_POST['nombre']));
			if (strlen($_POST['apellido'])>0) {
				$gapellido = strip_tags(trim($_POST['apellido'])>0);
				if (strlen($_POST['telefono'])>0 and is_numeric($_POST['telefono'])) {
					$gtelefono = $_POST['telefono'];
					if (strlen($_POST['email'])>0) {
						if( strpos($_POST['email'], '@')>= 0 and strpos($_POST['email'],'.com') >= 0){
							$gemail = strip_tags(trim($_POST['email']));
							if (strlen($_POST['ciudad'])>0) {
								$gciudad = strip_tags(trim($_POST['ciudad']));
								if (strlen($_POST['usuario'])>0) {
									$gusuario = strip_tags(trim($_POST['usuario']));
									if (strlen($_POST['contrasenia'])>0) {
										$gcontrasenia = strip_tags(trim($_POST['contrasenia']));
										$ok= true;
									}
								}
							}
						}
					}
				}
			}
		}

		if($ok == true) {

			$gnombre = strip_tags(trim($_POST['nombre']));
			$gapellido = strip_tags(trim($_POST['apellido']));
			$gdescripcion = strip_tags(trim($_POST['descripcion']));
			$gtelefono = strip_tags(trim($_POST['telefono']));
			$gemail = strip_tags(trim($_POST['email']));
			$gciudad = strip_tags(trim($_POST['ciudad']));
			$gusuario = strip_tags(trim($_POST['usuario']));
			$gcontrasenia = strip_tags(trim($_POST['contrasenia']));
			$placeholder= "imagenes_gauchos/gaucho_placeholder.jpg";
			$sqlinsert = "INSERT INTO usuarios (nombre,apellido,telefono,email,ciudad,descripcion, usuario,contrasenia,foto) VALUES ('$gnombre','$gapellido','$gtelefono','$gemail','$gciudad', '$gdescripcion','$gusuario','$gcontrasenia','$placeholder')";
			if(!mysqli_query($connection, $sqlinsert)) {
				die('Error registrando nuevo usuario. Intente más tarde.');
			}
			echo mysqli_insert_id($connection);;
		}
	}
}
?>