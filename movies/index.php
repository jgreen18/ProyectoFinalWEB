<?php 
 	include "../layouts/alerts.template.php";

	include"../app/app.php";

		if(!isset($_SESSION) || !isset($_SESSION['id'] )|| $_SESSION['role'] == '1'   ) 
		{
			header("Location:../peliculas");
			
		}

include "../app/movieController.php";
$movieController = new MovieController();
	$movies = $movieController->get();  

	?>
<!DOCTYPE html>
<html>
<head>
	<title>Agregar peliculas</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/movies.css?v0.0.1">
</head>
<body style="background: linear-gradient(to bottom, black, gray); width: 100%; height: 760px; margin: 0; padding: 0;">

	<div id="menu">
<!-- STOREEE -->
		<form id="store" method="POST" action="../app/movieController.php" enctype="multipart/form-data" >
		<h2 style="margin-left: 10%;">Agregar peliculas</h2>
			
				<input type="text" name="title" placeholder="Titulo" required="" style="margin-left: 10%; margin-top: 2%; width: 80%; padding: 2%;">
				<textarea  name="description" rows="5" placeholder="Descripcion" required="" style="margin-left: 10%; margin-top: 2%; width: 80%; padding: 2%; resize: none;" ></textarea>

				<input type="file" name="cover" accept="image/*" required="" style=" display: block; margin-left: 10%;">



				<input type="number" name="minutes" placeholder="80" required="" style="margin-left: 10%; margin-top: 2%; width: 80%; padding: 2%;">

				<select name="clasification" style="margin-left: 10%; margin-top: 2%; width: 80%; padding: 2%;">
					<option>B</option>
					<option>B15</option>
					<option>C</option>
					<option>D</option>
					<option>A</option>
					<option>AA</option>
				</select>

				
			<button type="submit" style="width: 25%; margin-left: 35%; margin-top: 5%; color: white; background-color: #0098cb; border-color: #0098cb; cursor: pointer; padding: 1%;">
				agregar
			</button>
			<!-- <button  
				editar
			</button>
			<button  
				eliminar
			</button> -->

				<input type="hidden" name="action" value="store">
			</form>


<!-- Edit -->
		<form id="edit" method="POST" action="../app/movieController.php" enctype="multipart/form-data" style="display: none">
			<h2 style="margin-left: 10%;">Editar peliculas</h2>

			<input type="text" name="id" id="id" placeholder="id" required="" style="margin-left: 10%; margin-top: 2%; width: 80%; padding: 2%;">
			<input type="text" name="title" id="title" placeholder="Titulo" required="" style="margin-left: 10%; margin-top: 2%; width: 80%; padding: 2%;">
			<textarea  name="description" id="description" rows="5" placeholder="Descripcion" required="" style="margin-left: 10%; margin-top: 2%; width: 80%; padding: 2%; resize: none;" ></textarea>

			<input type="file" name="cover" id="cover" accept="image/*" required="" style=" display: block; margin-left: 10%;">



			<input type="number" name="minutes" id="minutes" placeholder="80" required="" style="margin-left: 10%; margin-top: 2%; width: 80%; padding: 2%;">

			<select name="clasification" id="clasification" style="margin-left: 10%; margin-top: 2%; width: 80%; padding: 2%;">
				<option>B</option>
				<option>B15</option>
				<option>C</option>
				<option>D</option>
				<option>A</option>
				<option>AA</option>
			</select>

		
			
		<button type="submit" style=" width:25%; margin-left: 5%; margin-top: 5%; color: white; background-color: #0098cb; border-color: #0098cb; cursor: pointer; padding: 1%;">
			editar
		</button>


		

			<input type="hidden"  name="action" value="edit">
		</form>
		

	</div>
	<div id="menu2" style="vertical-align: top;">
<table>
		<thead>
			
			<th>
				Title
			</th>
			<th>
				Cover
			</th>
			<th>
				Duration
			</th>
			
			<th>
				Clasification
			</th>
			
			<th>
				Actions
			</th>
		</thead>
		<tbody>
			<?php foreach ($movies as $movie): ?>
				<tr>
					
					<td>
						<?= $movie['title'] ?>
					</td>
					<td>
						<img  src="../assets/imgpeli/<?= $movie['cover']?>" style="width: 100%;">
					</td>
					<td>
						<?= $movie['minutes'] ?> minutes
					</td>
					
					<td>
						<?= $movie['clasification'] ?>
					</td>
					 
					 <td>
						 <button style="width: 100%" onclick="edit('<?= $movie['id'] ?>','<?= $movie['title'] ?>','<?= $movie['description'] ?>','<?= $movie['minutes'] ?>','<?= $movie['clasification'] ?>')" >Editar
						 </button>
						 <button style="width: 100%" onclick="destroy()" style="width: 100%;">Eliminar</button>
					</td> 
				</tr>
			<?php endforeach ?>
		</tbody>
		</table>	

	</div>

	<script type="text/javascript">
	function edit(id,title,description,minutes,clasification)
	{
		document.getElementById('store').style.display="none";

		document.getElementById('edit').style.display="block";

		document.getElementById('id').value= id;
		document.getElementById('title').value= title;
		document.getElementById('description').value= description;
		
		document.getElementById('minutes').value= minutes;
		document.getElementById('clasification').value= clasification;
	}
	function store()
	{
	document.getElementById('edit').style.display="none";	
	document.getElementById('store').style.display="block";
	}

	function destroy(){

	}
	
	function remove(id){
		var confirm = prompt("Si quiere eliminar el registro, escriba "+ id);
		if (confirm == id) 
		{
			document.getElementById('id_destroy').value= id;
			document.getElementById('destroyForm').submit();
		}
				}
			</script>
</body>
</html>