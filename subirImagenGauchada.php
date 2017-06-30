<?php
include('connect-mysql.php');
$target_dir = "imagenes_gauchadas/";
$imageFileType = pathinfo($_FILES["imagenSubida"]["name"],PATHINFO_EXTENSION);
$target_file = $target_dir . uniqid( $prefix = $_POST['userId'],$more_entropy = false).'.'.$imageFileType;
$uploadOk = 1;
// Check if image file is a actual image or fake image
if(isset($_POST['imagenSubida'])) {
    $check = getimagesize($_FILES["imagenSubida"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "El archivo no es una imagen.";
        $uploadOk = 0;
    }
}
/*/ Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Unicamente se puede subir imagenes del tipo: JPG, JPEG & PNG.";
    $uploadOk = 0;
}*/
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "El archivo no pudo ser submitido.";
// if everything is ok, try to upload file
} else {
    if (!move_uploaded_file($_FILES["imagenSubida"]["tmp_name"], $target_file)) {
        echo "Error de conexión tratando se submitir imagen, intente submitir mas tarde.";
    } else {
		$id= $_POST['gauchadaId'];
		$sqlinsert = "UPDATE gauchadas SET imagen='$target_file' WHERE (idGauchada='$id');";
		if(!mysqli_query($connection, $sqlinsert)) {
			die('Error insertando imagen de gauchada');
		}
		echo '<script type="text/javascript">',
		'location.replace("inicioUG.php");',
		'</script>';
;
	}
}



?>