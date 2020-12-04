<!DOCTYPE html>
<html>
<head>
	<title>Agregar peliculas</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/movies.css">
</head>
<body style="background: linear-gradient(to bottom, black, gray); width: 100%; height: 657px; margin: 0; padding: 0;">
	<div id="menu">
		<div id="imagen">
				
			</div>
		<form>
			<input type="file" name="cover" required="" style=" display: block; margin-left: 10%;">
			<input type="text" name="title" placeholder="Titulo" required="" style="margin-left: 10%; margin-top: 2%; width: 80%; padding: 2%;">
			<textarea name="description" rows="5" placeholder="Descripcion" required="" style="margin-left: 10%; margin-top: 2%; width: 80%; padding: 2%;" ></textarea>
			<input type="text" name="minutes" placeholder="Duracion" required="" style="margin-left: 10%; margin-top: 2%; width: 80%; padding: 2%;">
			<input type="text" name="clasification" placeholder="Clasificacion" required="" style="margin-left: 10%; margin-top: 2%; width: 80%; padding: 2%;">
		</form>

		<button style="margin-left: 45%; margin-top: 5%; color: white; background-color: #0098cb; border-color: #0098cb; cursor: pointer; padding: 1%;">
			Aceptar
		</button>
	</div>
</body>
</html>