<?php 
 
include"../app/app.php";
include_once "connectionController.php";


if (isset($_POST['action'])) 
{
	$userController = new UserController();
	
	switch ($_POST['action']) {
		
		case 'edit':


		$id = strip_tags($_POST['id']);
		$nombre = strip_tags($_POST['nombre']);
		$apellido =strip_tags($_POST['apellido']);
		$nickname =strip_tags($_POST['nickname']);
		$emails =strip_tags($_POST['email']);
		$status = strip_tags($_POST['status']);
		$role = strip_tags($_POST['role']);

	
	$userController->edit($id,$nombre,$apellido,$nickname,$emails,$status,$role);

			
			break;

			case 'destroy':
				$id = strip_tags($_POST['id']);
				$userController->delete($id);

			break;

		
		
		
	}
}

class UserController
{
	

	public function get()
	{
		$conn = connect();
		if ($conn->connect_error==false) {
			
			$query = "select * from users";
			$prepared_query = $conn->prepare($query);
			$prepared_query->execute();

			$results = $prepared_query->get_result();
			$users = $results->fetch_all(MYSQLI_ASSOC);

			if (count($users)>0) {
				return $users;
			}else
				return array();

		}else
			return array();
	}
	
	public function edit($id,$nombre,$apellido,$nickname,$email,$status,$role)
	{
		
			$conn = connect();


			if ($conn->connect_error==false) 
			{
				if ($id!="" && $nombre!=""  ) 
				{
				

					$query = "update users set nombre = ?,apellidos = ?,nick=? , email=?,status=?,role=? where id =? ";

					$prepared_query = $conn->prepare($query);
					$prepared_query->bind_param('ssssssi',$nombre,$apellido,$nickname,$email,$status,$role,$id);
				if ($prepared_query->execute()) {
					header("Location:". $_SERVER['HTTP_REFERER'] );
					
				}else
				{
					header("Location:". $_SERVER['HTTP_REFERER'] );
					// echo "1";
				}
			
			}else{
				header("Location:". $_SERVER['HTTP_REFERER'] );
				
				// echo "2";
			}
			
			}else
			{
				header("Location:". $_SERVER['HTTP_REFERER'] );
				// echo "3";
				
			}
	}

	// public Function delete($id)
	// {
	// 	$conn = connect();
	// 	if ($conn->connect_error==false) {

	// 		if ($id!="") {
				
	// 			$query = "delete from movies where id =?";
	// 			$prepared_query = $conn->prepare($query);
	// 			$prepared_query->bind_param('i',$id);

	// 			if ($prepared_query->execute()) {
	// 				header("Location:". $_SERVER['HTTP_REFERER'] );
				
	// 			}else
	// 			{
	// 				header("Location:". $_SERVER['HTTP_REFERER'] );
					
	// 			}
	// 		}else{
	// 			header("Location:". $_SERVER['HTTP_REFERER'] );
				
	// 		}
			
	// 	}else
	// 	{
	// 		header("Location:". $_SERVER['HTTP_REFERER'] );
			
	// 	}
	// }
}
?>