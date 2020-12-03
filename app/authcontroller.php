<?php 
include "app.php";
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

			case'login':
			$email = strip_tags($_POST['email']);
			$password = strip_tags($_POST['password']);
			$authController->acces($email,$password);
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
				 	$this->acces($email, $originalpassword);
				 	
				 	
				 	
				 }else{
				 	$_SESSION['error'] = 'verifique los datos envíados';

					header("Location:". $_SERVER['HTTP_REFERER'] );
					
				 }
			}else{
				$_SESSION['error'] = 'verifique la información del formulario';

				header("Location:". $_SERVER['HTTP_REFERER'] );
			}

		}else{
			$_SESSION['error'] = 'verifique la conexión a la base de datos';

			header("Location:". $_SERVER['HTTP_REFERER'] );
		}

	}
	public function acces($email,$password)
	{
		$conn = connect();
		if (!$conn->connect_error) {
			if ($email!="" && $password!="") {
				$password = md5($password.'iphone');

				$query = "select * from users where email = ? and password = ?";
				$prepared_query = $conn->prepare($query);
				$prepared_query->bind_param('ss',$email,$password);

				if ($prepared_query->execute()) {
					
					$results = $prepared_query->get_result(); 

					$user = $results->fetch_all(MYSQLI_ASSOC);

					if (count($user)>0) {
						
						$user = array_pop($user);

						$_SESSION['id'] = $user['id'];
						$_SESSION['nombre'] = $user['nombre'];
						$_SESSION['email'] = $user['email'];  


						header("Location:../peliculas" );
					}else{
						$_SESSION['error'] = 'verifique los datos envíados'; 
						header("Location:". $_SERVER['HTTP_REFERER'] );
					}


				}else{
					$_SESSION['error'] = 'verifique los datos envíados';

					header("Location:". $_SERVER['HTTP_REFERER'] );
				}
			}else{
				$_SESSION['error'] = 'verifique la información del formulario';

				header("Location:". $_SERVER['HTTP_REFERER'] );
			}
		}else{
			$_SESSION['error'] = 'verifique la conexión a la base de datos'; 

			header("Location:". $_SERVER['HTTP_REFERER'] );
		}  

	}


	public function logout()
	{

	}
};
 ?>
