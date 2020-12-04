<!DOCTYPE html>
<html>
<head>
	<title>Getfix</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/index.css?v0.0.12">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

</head>
<body > 
		<div class="is">
			<form method="POST" action="../app/authController.php">
				
				<div class="cir">
					<img src="../assets/imagenes/chico.png" >
					
				</div>
					
				<input type="text" name="email" placeholder="email" required="" height="29px">


				<p style=""><a href="">¿Olvidaste tu usuario ?</a></p>

				<input  required="" type="password" name="password" placeholder="* * * * * * * ">
				
				<p id="subenlace"><a href="../peliculas" >¿Olvidaste tu contraseña ?</a></p>

				<button type="submit" id="iniciar">Iniciar sesion</button>

				<p id="subenlace"><a href="../registro">¿No tienes cuenta?</a></p>

				<input type="hidden" name="action" value="login">

			</form>
			
		</div>
		
	</body > 
</html>

