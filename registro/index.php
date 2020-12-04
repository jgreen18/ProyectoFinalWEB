<!DOCTYPE html>
<html style="scroll-behavior: smooth;">
<head>
	<title>Registro</title>
</head>
<link rel="stylesheet" type="text/css" href="../assets/css/registro.css?v0.0.2">
<body style=" margin: 0px; padding: 0px; background-repeat: no-repeat; background-size: 100%"
background="../assets/imagenes/idea2.jpg">	

	<div id="inicio" style="box-shadow:6px 7px 7px 0px rgba(50, 50, 50, 0.42);">
		<img width="25%" src="../assets/imagenes/chico.png" id="user"> 
		<div id="nombre">
			
			<form method="POST" action="../app/authController.php">
				<input type="text" name="nombre" size="37%" required="" placeholder="Nombre " style="margin-bottom:5%;">

				<input type="text" name="apellidos" size="37%" required="" placeholder="apellidos" style="margin-bottom:5%;">

				<input type="text" name="nick" size="37%" required="" placeholder="Nombre de usuario" style="margin-bottom:5%;">
				<input type="text" name="email" size="37%" required="" placeholder="email " style="margin-bottom:5%;">

				<input type="password" name="password" required="" size="37%" placeholder="Contraseña" style="margin-bottom:5%;">

				

			<button type="submit" style="margin-left: 35%;">
				Registrar
			</button>

			<input type="hidden" name="action" value="register" >
			</form>
		</div>
	</div>

</body>
</html>