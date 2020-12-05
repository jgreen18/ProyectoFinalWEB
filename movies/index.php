<!DOCTYPE html>
<html>
<head>
	<title>Agregar peliculas</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/movies.css">
</head>
<body style="background: linear-gradient(to bottom, black, gray); width: 100%; height: 657px; margin: 0; padding: 0;">

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

				
			<button type="submit" style="margin-left: 35%; margin-top: 5%; color: white; background-color: #0098cb; border-color: #0098cb; cursor: pointer; padding: 1%;">
				agregar
			</button>
			<button  onclick="edit()" style=" margin-top: 5%; color: white; background-color: #0098cb; border-color: #0098cb; cursor: pointer; padding: 1%;">
				editar
			</button>
			<button  onclick="destroy()" style=" margin-top: 5%; color: white; background-color: #0098cb; border-color: #0098cb; cursor: pointer; padding: 1%;">
				eliminar
			</button>

				<input type="hidden" name="action" value="store">
			</form>


<!-- Edit -->
		<form id="edit" method="POST" action="../app/movieController.php" enctype="multipart/form-data" style="display: none">
			<h2 style="margin-left: 10%;">Editar peliculas</h2>

			<input type="text" name="id" placeholder="id" required="" style="margin-left: 10%; margin-top: 2%; width: 80%; padding: 2%;">
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

			
		<button type="submit" style="margin-left: 35%; margin-top: 5%; color: white; background-color: #0098cb; border-color: #0098cb; cursor: pointer; padding: 1%;">
			editar
		</button>


			<button  onclick="store()" style=" margin-top: 5%; color: white; background-color: #0098cb; border-color: #0098cb; cursor: pointer; padding: 1%;">
				agregar
			</button>

			<button  onclick="destroy()" style=" margin-top: 5%; color: white; background-color: #0098cb; border-color: #0098cb; cursor: pointer; padding: 1%;">
				eliminar
			</button>

			<input type="hidden"  name="action" value="edit">
		</form>
		



<!-- destroy -->
	<form id="destroy" method="POST" action="../app/movieController.php" enctype="multipart/form-data" style="display: none">
		<h2 style="margin-left: 10%;">Eliminar peliculas</h2>

			<input type="text" name="id" placeholder="id" required="" style="margin-left: 10%; margin-top: 2%; width: 80%; padding: 2%;">
			
			

			


			

			
		<button type="submit"  onclick="remove()" style="margin-left: 35%; margin-top: 5%; color: white; background-color: #0098cb; border-color: #0098cb; cursor: pointer; padding: 1%;">
			eliminar
		</button>


			<button  onclick="store()" style=" margin-top: 5%; color: white; background-color: #0098cb; border-color: #0098cb; cursor: pointer; padding: 1%;">
				agregar
			</button>

			<button  onclick="edit()" style=" margin-top: 5%; color: white; background-color: #0098cb; border-color: #0098cb; cursor: pointer; padding: 1%;">
				editar
			</button>

			<input type="hidden"  name="action" value="destroy">
		</form>


<script type="text/javascript">
	function edit()
	{
		document.getElementById('store').style.display="none";
		document.getElementById('destroy').style.display="none";
		document.getElementById('edit').style.display="block";
	}
	function store()
	{
	document.getElementById('edit').style.display="none";	
	document.getElementById('destroy').style.display="none";
	document.getElementById('store').style.display="block";

	}

	function destroy()
	{
	document.getElementById('store').style.display="none";
	document.getElementById('edit').style.display="none";	
	document.getElementById('destroy').style.display="block";

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
	</div>
</body>
</html>