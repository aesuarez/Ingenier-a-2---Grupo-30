<?php
   include("config.php");
   session_start();
   
   if(strlen($_POST['usuario'])>0 and  !is_numeric($_POST['usuario'])){
   // username and password sent from form 
      $myusername = mysqli_real_escape_string($db,$_POST['usuario']);
      if(strlen($_POST['contrasenia'])>0) {
		  $mypassword = mysqli_real_escape_string($db,$_POST['contrasenia']); 
		  $sql = "SELECT idUsuario FROM usuarios WHERE usuario = '$myusername' and contrasenia= '$mypassword'";
		  $result = mysqli_query($db,$sql);
		  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		  $active = $row['idUsuario'];
		  
		  $count = mysqli_num_rows($result);
		  
		  // If result matched $myusername and $mypassword, table row must be 1 row
			
		  if($count == 1) {
			 //session_register("myusername");
			 
			 $_SESSION['login_user'] = $myusername;
			 $_SESSION['user_id'] = $active;
			 echo "exito";
			 
		  }else {
			 echo "Tu usuario o contraseña no es válido";
		  }
	  } else { echo "ERROR: Campo contraseña vacio";}
   } else { echo "ERROR: Campo usuario vacio o contiene valor numerico"; }
?>