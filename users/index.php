<?php 
 	include "../layouts/alerts.template.php";

	include"../app/app.php";
		
		if(!isset($_SESSION) || !isset($_SESSION['id'] )|| $_SESSION['role'] == '1'   ) 
		{
			header("Location:../peliculas");
			
		}

include "../app/userController.php";


$userController = new UserController();
$users = $userController->get();  

	?>
<!DOCTYPE html>
<html>
<head>
	<title>Gestion de Usuarios</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/users.css?v0.0.3">
</head>
<body style="background: linear-gradient(to bottom, black, gray); width: 100%; height: 1000px; margin: 0; padding: 0;">

	<form id="logout" method="POST" action="../app/authController.php">
	<button type="submit" style="margin-left: 85%; width: 10%; display: inline-block;">cerrar sesion</button>
	<input type="hidden"  name="action" value="logout">
	</form>

	<form id="logout" method="POST" action="../movies">
	<button type="submit" style="margin-left: 85%; width: 10%; display: inline-block;">to movies</button>
	<input type="hidden"  name="action" value="logout">
	</form>

	<div id="menu">



<!-- Edit -->
		<form id="edit" method="POST" action="../app/userController.php" >
			<h2 style="margin-left: 10%;">Editar usuarios</h2>

			<input type="text" name="id" id="id" placeholder="id" required="" style="margin-left: 10%; margin-top: 2%; width: 70%; padding: 2%; -webkit-border-radius: 50px;-moz-border-radius: 50px;
				border-radius: 50px;" >

			<input type="text" name="nombre" id="nombre" placeholder="nombre" required="" style="margin-left: 10%; margin-top: 2%; width: 70%; padding: 2%; -webkit-border-radius: 50px;-moz-border-radius: 50px;
				border-radius: 50px;">

			<input type="text" name="apellido" id="apellido" placeholder="apellido" required="" style="margin-left: 10%; margin-top: 2%; width: 70%; padding: 2%; -webkit-border-radius: 50px;-moz-border-radius: 50px;border-radius: 50px;">

			<input type="text" name="nickname" id="nickname"  placeholder="nickname" required="" style="margin-left: 10%; margin-top: 2%; width: 70%; padding: 2%;-webkit-border-radius: 50px;-moz-border-radius: 50px;border-radius: 50px;">

			<input type="text" name="email" id="email"  placeholder="email" required="" style="margin-left: 10%; margin-top: 2%; width: 70%; padding: 2%;-webkit-border-radius: 50px;-moz-border-radius: 50px;border-radius: 50px;">
			
		

			<select name="status" id="status" style="margin-left: 10%; margin-top: 2%; width: 35%; padding: 2%;">
				<option>active</option>
				<option>inactive</option>
				
			</select>

			<select name="role" id="role" style="margin-left: 10%; margin-top: 2%; width: 35%; padding: 2%;">
				<option value="2">admin</option>
				<option value="1">user</option>
				
			</select>

		
			
		<button type="submit" style=" width:25%; margin-left: 37%; margin-top: 5%; color: white; background-color: #0098cb; border-color: #0098cb; cursor: pointer; padding: 1%;">
			editar
		</button>
			<input type="hidden"  name="action" value="edit">
		</form>
		

	</div>
<div id="menu2"> 
	<table>
		<thead>

			
			<th>
				Nombre
			</th>
			<th>
				apellidos
			</th>
			<th>
				nick
			</th>
			
			<th>
				email
			</th>
			<th>
				roles
			</th>
			
			<th>
				Actions
			</th>

			
		</thead>
		<tbody>
			<?php foreach ($users as $user): ?>
				<tr>
					
					<td>
						
						<?= $user['nombre'] ?> 
					</td>
					<td>
						<?= $user['apellidos'] ?> 
					</td>
					<td>
						<?= $user['nick'] ?>
					</td>
					
					<td>
						<?= $user['email'] ?>
					</td>
					<td>
						<?= $user['role'] ?>
					</td>
					 
					 <td>
						 <button style="width: 100%" onclick="edit('<?= $user['id'] ?>','<?= $user['nombre'] ?>','<?= $user['apellidos'] ?>','<?= $user['nick'] ?>','<?= $user['email'] ?>','<?= $user['status'] ?>',
						 '<?= $user['role'] ?>')" >Editar
						 </button>
						 <button style="width: 100%" onclick="destroy()" style="width: 100%;">Eliminar</button>
					</td> 
					
				</tr>
			<?php endforeach ?>
		</tbody>
		</table>	

</div>

<script type="text/javascript">
	
	function edit(id,nombre,apellidos,nick,email,status,role)
	{
		document.getElementById('id').value= id;
		document.getElementById('nombre').value= nombre;
		document.getElementById('apellido').value= apellidos;
		document.getElementById('nickname').value= nick;
		document.getElementById('email').value= email;
		document.getElementById('status').value= status;
		document.getElementById('role').value= role;

	}
</script>

</body>
</html>