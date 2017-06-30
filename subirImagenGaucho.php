<?php
include('connect-mysql.php');
$target_dir = "imagenes_gauchos/";
$imageFileType = pathinfo($_FILES["imagenSubida"]["name"],PATHINFO_EXTENSION);
$target_file = $target_dir . uniqid( $prefix = $_POST['gauchoId'],$more_entropy = false).'.'.$imageFileType;
$uploadOk = 1;
$mensaje= "Usuario registrado con exito.";
// Check if image file is a actual image or fake image
if(isset($_POST['imagenSubida'])) {
    $check = getimagesize($_FILES["imagenSubida"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo $mensaje." pero el archivo no fue submitido ya que no es una imagen (solo se admite .png, .jpg o .jpeg).";
        $uploadOk = 0;
    }
}
/*/ Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Unicamente se puede subir imagenes del tipo: JPG, JPEG & PNG.";
    $uploadOk = 0;
}*/
// Check if $uploadOk is set to 0 by an error
if ($uploadOk != 0) {
    if (!move_uploaded_file($_FILES["imagenSubida"]["tmp_name"], $target_file)) {
        echo $mensaje. ". Lamentablemente ocurrio un error tratando se submitir imagen, por favor intente más tarde";
	} else {
		$id= $_POST['gauchoId'];
		$sqlinsert = "UPDATE usuarios SET foto='$target_file' WHERE (idUsuario='$id');";
		if(!mysqli_query($connection, $sqlinsert)) {
			die($mensaje.'. Pero hubo un error submitiendo imagen de usuario.');
		}
	}
}
?>