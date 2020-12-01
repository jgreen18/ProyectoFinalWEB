<?php 

include_once "connectionController.php";


if (isset($_POST['action']) )
{
	$authController = new AuthController();
	switch ($_POST['action']) {
		case 'register':
$nombre = strip_tags($_POST['nombre']) ;
$apellidos = strip_tags($_POST['apellidos']);
$nick = strip_tags($_POST['nick']);
$email = strip_tags($_POST['email']);
$contraseña = strip_tags($_POST['contraseña']);
	$authController->register($nombre,$apellidos,$nick,$email,$contraseña);
			break;
		
		
	}
}
class AuthController
{

	public function register($nombre,$apellidos,$nick,$email,$contraseña)
	{
		$conn = connect();
		if (!$conn->connect_error) {
			if ($nombre != "" && $apellidos != "" && $nick != "" && $email != "" && $contraseña!=""  ) {
				$originalpassword = $contraseña;
				$password = md5($contraseña."iphone");
				 
				 $query = "insert into users(nombre, apellidos, nick, email, contraseña) value (?,?,?,?,?)";
				 $prepared_query = $conn->prepare($query);
				 $prepared_query->bind_param('sssss',$name,$apellidos,$nick,$email,$contraseña);

				 if ($prepared_query->execute()) {
				 	echo "gola";
				 	
				 }else{
				 	$_SESSION['error'] = 'verifique la conexion a la base de datos';
					header("location". $SERVER['HTTP_REFERER']);
					echo "no se hizo carnal";
				 }
			}
		}else{
			$_SESSION['error'] = 'verifique la conexion a la base de datos';
			header("location". $_SERVER['HTTP_REFERER']);

		}

	}
	public function acces($email,$password)
	{
		// "select * from users where email = ? and password = ?"

		// if($user){
		// 	$_SESSION['id'] = $user['id'];
		// 	$_SESSION['name'] = $user['name'];
		// 	$_SESSION['email'] = $user['email'];
		// 	$_SESSION['role'] = $user['role'];
			

		// }
	}
	public function logout()
	{

	}
};
 ?>
