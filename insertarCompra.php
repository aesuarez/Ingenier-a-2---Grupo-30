<?php
	include('session.php');
	include('connect-mysql.php');

	$ok =false;
	
	$guserId = $_SESSION['user_id'];

	if (strlen($_POST['nombre'])>0) {
		if (strlen($_POST['numero'])==18) {
			if (strlen($_POST['codigoSeguridad'])==3) {
				if (strlen($_POST['fechaDeVencimiento'])>0) {
					if (strlen($_POST['puntosComprados'])>0) {
						if (strlen($_POST['dineroGastado'])>0) {
							$gpuntos = strip_tags(trim($_POST['puntosComprados']));
							$gdinero = strip_tags(trim($_POST['dineroGastado']));
							$gfecha = date("d/m/Y");
							
							$ok= true;
						}
					}
				}
			}
		}
	}

	if($ok == true) {
			$sqlinsert = "INSERT INTO compras (idUsuario,puntosComprados,dineroGastado,fechaDeCompra) VALUES ('$guserId','$gpuntos','$gdinero','$gfecha')";
			if(!mysqli_query($connection, $sqlinsert)) {
				die('Error registrando compra nueva. Intente más tarde.');
			}
			
			$sqlget = "SELECT * FROM usuarios WHERE idUsuario='$guserId'";
			$sqldata=mysqli_query($connection,$sqlget) or die ('error getting table');
			$row = mysqli_fetch_array($sqldata,MYSQLI_ASSOC);
			$total = $row['puntos'] + $_POST['puntosComprados'];
			$sqlinsert = "UPDATE usuarios SET puntos='$total' WHERE (idUsuario='$guserId');";
			if(!mysqli_query($connection, $sqlinsert)) {
				die('Error updateando puntos');
			}
			
			echo "exito";
	}
	?>