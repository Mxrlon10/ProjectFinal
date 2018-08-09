<?php 
	session_start();
	include_once "modulos/php_conexion.php";
	include_once "modulos/funciones.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>LOGIN</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	</head>
	<body>
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
<div class="alert alert-info" align="center" style="font-size:19px; font-family:Copperplate Gothic Bold;"><strong>Centro de Salud Panajachel / Derechos Reservados 2017 © <br>
																											</strong></div>
<form name="form1" method="post" action="" class="form col-md-12 center-block">
  <div class="modal-dialog">
  <div class="modal-content">     
      <div class="modal-body">         
      	<center><img src="img/logo.jpg" width="280" height="250"></center>
      	<?php 
	  	if(!empty($_POST['usu']) and !empty($_POST['con'])){ 
			$usu=limpiar($_POST['usu']);
			$con=limpiar($_POST['con']);
			
			$pa=mysql_query("SELECT * FROM usuario WHERE usuario.doc='$usu' and usuario.con='$con' and usuario.estado='s'");				
			if($row=mysql_fetch_array($pa)){
				if($row['estado']=='s'){
					$nombre=$row['nombre'];
					$nombre=explode(" ", $nombre);
					$nombre=$nombre[0];
					$_SESSION['user_name']=$nombre;
					$_SESSION['tipo_user']=$row['tipo'];
					$_SESSION['cod_user']=$usu;
					if($row['tipo']=='Admin'){
						echo mensajes('Bienvenido/a	'.$row['cargo'].'<br>'.$row['nombre'].' ','verde').'<br>';
						echo '<center><img src="img/ajax-loader.gif"></center><br>';
						echo '<meta http-equiv="refresh" content="2;url=principal.php">';
					}else{
						echo mensajes('Bienvenido/a '.$row['cargo'].'<br>'.$row['nombre'].' ','verde').'<br>';
						echo '<center><img src="img/ajax-loader.gif"></center><br>';
						echo '<meta http-equiv="refresh" content="2;url=principal.php">';
					}
				}else{
					echo mensajes('Usted no se encuentra Activo en la base de datos<br>Consulte con su Administrador de Sistema','rojo');	
				}
			}else{
				echo mensajes('Usuario y Contraseña Incorrecto<br>','rojo');
				echo '<center><a href="index.php" class="btn btn-danger btn-lg"><strong>Intentar de Nuevo</strong></a></center>';
			}
		}else{
			echo '	
			<div class="input-group input-group-lg">
			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			<input type="text" name="usu" class="form-control input-lg" placeholder="Usuario" autocomplete="off" required autofocus>
			</div><br>
			<div class="input-group input-group-lg">
			<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			<input type="password" name="con" class="form-control input-lg" placeholder="Password" autocomplete="off" required>
			</div><br>
			<div class="form-group">
			<div align="right"><button class="btn btn-primary btn-lg btn-block" type="submit"><i class="glyphicon glyphicon-log-in"></i> <strong>Conectar</strong></button></div>
			</div>';		
		}
	  ?>
      </form>
      </div> 
  <!--</div><br>
  
</div>-->
	<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
	</body>
</html>