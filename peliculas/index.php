<?php 

include"../app/app.php";

include "../app/movieController.php";

	$movieController = new MovieController();
	$movies = $movieController->get(); 


if(!isset($_SESSION) || !isset($_SESSION['id']))
{
	header("Location:../");
}

	
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Peliculas</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../assets/css/peliculas.css?v0.0.2">

</head>
<body style=" margin: 0px; padding: 0px; font-family: 'Roboto', sans-serif;">

<form id="logout" method="POST" action="../app/authController.php">
<button type="submit">cerrar sesion</button>
<input type="hidden"  name="action" value="logout">

</form>


	<div style="width: 100%; background-color: rgb(121 120 120); margin: 0px; height: 550px; position: relative; z-index: 4; padding: 0px;">
		<img width="100%" src="../assets/imagenes/spiderman.png">
		<div style="position: absolute; left: 70%; top: 7%;">
			<img src="../assets/imagenes/spidermantitle.png" width="70%">
		</div>

		<a href="../vistap" style="font-style: normal;">

			
<div id="botones" style="position: absolute; left: 5%; top: 85%; width: 10%; height: 50px; background-color: rgb(228 228 228 / 65%);">
				<p style="color: black; text-align: center; font-size: 100%;">Reproducir</p>

			</div>
		</a>

		<a href="" style="font-style: normal;">
			<div style="position: absolute; left: 16%; top: 85%; width: 10%; height: 50px; background-color: rgb(228 228 228 / 65%);">
				<p style="color: black; text-align: center; font-size: 100%;">Informacion</p>

			</div>
		</a>

	</div>

	 <div style="position: relative; background: linear-gradient(to bottom, gray, black); width: 100%; height: 100%; min-height: 700px; margin: 0px; padding: 0px;">
	
<?php foreach ($movies as $movie): ?>
			
					<a href="#openModal<?=$movie['id']?>">
						
						<div id="catalogo" style="padding-top: 5%;margin-top: 3%; margin-left: 5%; display: inline-block; width: 18%; height: 40px;">

						<img style="background-color: red;" width="100%" src="../assets/imgpeli/<?= $movie['cover'] ?>">
					


					<a href="details/?id=<?= $movie['Descripcion'] ?>">
						
					</a> 

					</div>
					</a> 
				 
			
				<div id="openModal<?=$movie['id']?>" class="modalDialog">
	<div>
		<a href="#close" title="Close" onclick="" class="close">X</a>
		<div class="centro">
			
			
					

			<div style="" class="imge">
				<img style="" width="100%" src="../assets/imgpeli/<?= $movie['cover'] ?>">
			</div>
				
				
			
			<h1 style="text-align: center; font-weight: lighter; padding-top: 2%;"><?= $movie['title']?></h1>
			<h4><?= $movie['minutes']." minutos"?></h4>
			<h4><?="Clasificacion ". $movie['clasification']?></h4>
			<p><?= $movie['description']?></p>
			
			<form style="margin-left: 40%; margin-top: 3%;" method="POST" action="../app/movieController.php" enctype="multipart/form-data" >

			<input type="hidden" name="id" value=" <?= $movie['id']?>  ">
			<button type="">Reproducir</button>


			<input type="hidden"  name="action" value="vista">

			</form>
	</div>

	</div>
</div>
				
			<?php endforeach ?> 



</div>

<script type="text/javascript">

	 function obtenerDatos()
	 {

	 }

		 
	

</script>
</body>
</html>