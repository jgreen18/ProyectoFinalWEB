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
$password = strip_tags($_POST['password']);
	$authController->register($nombre,$apellidos,$nick,$email,$password);
			break;
		
	
	}
}
class AuthController
{

	public function register($nombre,$apellidos,$nick,$email,$password)
	{
		
		$conn = connect();
		if (!$conn->connect_error) {
			if ($nombre != "" && $apellidos != "" && $nick != "" && $email != "" && $password!=""  ) {

				$originalpassword = $password;
				$password = md5($password."iphone");
				 
				 $query = "insert into users(nombre, apellidos, nick, email, password) value (?,?,?,?,?)";

				

				 $prepared_query = $conn->prepare($query);
				 $prepared_query->bind_param('sssss',$nombre,$apellidos,$nick,$email,$password);
				 $execute = $prepared_query->execute();

				 var_dump($execute);
				 if ($execute) {
				 	
				 	
				 }else{
				 	$_SESSION['error'] = 'verifique la conexion a la base de datos';
					header("location". $_SERVER['HTTP_REFERER']);
					
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
