<!DOCTYPE html>
<!--
   include("config.php");
   session_start();
   
   $error = '';
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['usuario']);
      $mypassword = mysqli_real_escape_string($db,$_POST['contrasenia']); 
      
      $sql = "SELECT idUsuario FROM usuarios WHERE usuario = '$myusername' and contrasenia= '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("myusername");
         
		 $_SESSION['login_user'] = $myusername;
		 $_SESSION['user_id'] = $active;
         
         header("location: inicioUG.php");
      }else {
         $error = "Tu usuario o contrasenia no es valido";
      }
   }
 -->
<html>
<head>
	<title>Una Gauchada</title>
	<link rel="stylesheet" href="landing-page.css" >
	<meta charset="utf-8"/>
	<script src="jquery-3.2.1.min.js"></script>
	<script src="moment.js"></script>
	<script type="text/javascript" src="unaGauchada.js"></script>
	<script src="jquery_validation\dist\jquery.validate.min.js"></script>
	<script src="jquery_validation\dist\additional-methods.min.js"></script>	
	
</head>
<body>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css" >
	<!-- Optional theme -->
	<link rel="stylesheet" href="bootstrap\css\bootstrap-theme.min.css">
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-7">
            <div class="panel panel-default">
				
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-lock"></span> Inicio de sesión</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" name= "inicioForm" id = "inicioForm">
                    <div class="form-group">
                        <label for="usuario" class="col-sm-3 control-label">
                            Usuario</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contrasenia" class="col-sm-3 control-label">
                            Contraseña</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="contrasenia" name="contrasenia" placeholder="Contraseña">
                        </div>
                    </div>
                    <div class="form-group last">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="entrar" id="ingresar" name="ingresar" class="btn btn-success btn-sm">Ingresar</button>
                        </div>
						<br/>
						<div class="col-sm-offset-3 col-sm-9">
                            <button type="entrar" id="sinValidacion" name="sinValidacion" class="btn btn-success btn-sm">sinValidacion</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="panel-footer"> No estas registrado? <a href="registroDeUsuarioForm.php">Registrate aqui</a></div>
				
            </div>
        </div>
    </div>
</div>
</body>
</html>