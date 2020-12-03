<!DOCTYPE html>
<html>
<head>
	<title>Getfix</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/index.css?v0.0.12">
</head>
<body > 
		<div class="is">
			<form method="POST" action="../app/authController.php">
				
				<div class="cir">
					<img src="../assets/imagenes/chico.png" >
					
				</div>
					
				<input type="text" name="email" placeholder="email" required="" height="29px">

				<p><a href="">olvidaste tu usuario ?</a></p>

				<input  required="" type="password" name="password" placeholder="* * * * * * * ">
				
				<p><a href="../peliculas" >olvidaste tu contraseña ?</a></p>

				<button type="submit">Iniciar sesion</button>

				<p><a href="../registro">¿no tienes cuenta?</a></p>
				<input type="hidden" name="action" value="login">

			</form>
			
		</div>
		
	</body > 
</html>

