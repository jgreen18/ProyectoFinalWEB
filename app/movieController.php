<?php 
 
include"../app/app.php";
include_once "connectionController.php";


if (isset($_POST['action'])) 
{
	$movieController = new MovieController();
	
	switch ($_POST['action']) {
		case 'store':

$title =strip_tags($_POST['title']);
$description =strip_tags($_POST['description']);
$minutes =strip_tags($_POST['minutes']);
$clasification = strip_tags($_POST['clasification']);
		$movieController->store($title,$description,$minutes,$clasification);

			break;

		case 'edit':
		$id = strip_tags($_POST['id']);
	$title =strip_tags($_POST['title']);
	$description =strip_tags($_POST['description']);
	$minutes =strip_tags($_POST['minutes']);
	$clasification = strip_tags($_POST['clasification']);
	
	$movieController->edit($id,$title,$description,$minutes,$clasification);

			
			break;

			case 'destroy':
		$id = strip_tags($_POST['id']);
		$movieController->delete($id);

		break;

		case 'vista':

		$id = strip_tags($_POST['id']);

			$movieController->vista($id);

			break;
		
		
	}
}

class MovieController
{
	public function vista($id){
		$conn = connect();
		if ($conn->connect_error==false) 
		{
			
			if ($id!="")
			{
				$query = "update movies set vistas= vistas+1 where id=?";

					$prepared_query = $conn->prepare($query);
					$prepared_query->bind_param('i',$id);
				if ($prepared_query->execute()) 
				{
					header("Location:../vistap");
					
				}else
				{
					header("Location:". $_SERVER['HTTP_REFERER'] );
					// echo "1";
				}
			} else{
				header("Location:". $_SERVER['HTTP_REFERER'] );
				
				// echo "2";
			}

		}else{
				header("Location:". $_SERVER['HTTP_REFERER'] );
				
				// echo "2";
			}
			

	}

	public function get()
	{
		$conn = connect();
		if ($conn->connect_error==false) {
			
			$query = "select * from movies";
			$prepared_query = $conn->prepare($query);
			$prepared_query->execute();

			$results = $prepared_query->get_result();
			$movies = $results->fetch_all(MYSQLI_ASSOC);

			if (count($movies)>0) {
				return $movies;
			}else
				return array();

		}else
			return array();
	}
	public function store($title,$description,$minutes,$clasification)
	{
		$conn = connect();
		if ($conn->connect_error==false) 
		{
			if ($title != "" &&$description != "" && $minutes != "" &&$clasification != "") 
			{
				// SUBIR ARCHIVO COVER
				$target_path = "../assets/imgpeli/";
				$original_name = basename($_FILES['cover']['name']);
				$new_file_name = $target_path.basename($_FILES['cover']['name']);
				if (move_uploaded_file($_FILES['cover']['tmp_name'], $new_file_name)) {
				// SUBIR ARCHIVO COVER
					
					$query = "insert into movies (title,description,cover,minutes,clasification) values(?,?,?,?,?)";
					$prepared_query = $conn->prepare($query);
					$prepared_query->bind_param('sssis',$title,$description,$original_name,$minutes,$clasification);

					if ($prepared_query->execute()) {
						
						$_SESSION['success'] = "el registro se ha guardado correctamente";
						
						header("Location:". $_SERVER['HTTP_REFERER'] );

					}else{
					
						$_SESSION['error'] = 'verifique los datos envíados';

						header("Location:". $_SERVER['HTTP_REFERER'] );
					}


				}  

			}else{
				$_SESSION['error'] = 'verifique la información del formulario';echo "que pedo1231";

				header("Location:". $_SERVER['HTTP_REFERER'] );
			}

		}else{

			$_SESSION['error'] = 'verifique la conexión a la base de datos';
			header("Location:". $_SERVER['HTTP_REFERER'] );
		}
	}

	public function edit($id,$title,$description,$minutes,$clasification)
	{
			$conn = connect();


			if ($conn->connect_error==false) 
			{
				if ($id!="" && $title!="" && $description!="" && $minutes!="" && $clasification!="") 
				{
					// SUBIR ARCHIVO COVER
				$target_path = "../assets/imgpeli/";
				$original_name = basename($_FILES['cover']['name']);
				$new_file_name = $target_path.basename($_FILES['cover']['name']);
				if (move_uploaded_file($_FILES['cover']['tmp_name'], $new_file_name)) {
				// SUBIR ARCHIVO COVER
					


					$query = "update movies set title = ?, description=?,cover=?,minutes = ?, clasification =? where id =? ";

					$prepared_query = $conn->prepare($query);
					$prepared_query->bind_param('sssisi',$title,$description,$original_name,$minutes,$clasification,$id);
				if ($prepared_query->execute()) {
					header("Location:". $_SERVER['HTTP_REFERER'] );
					
				}else
				{
					header("Location:". $_SERVER['HTTP_REFERER'] );
					// echo "1";
				}
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

	public Function delete($id)
	{
		$conn = connect();
		if ($conn->connect_error==false) {

			if ($id!="") {
				
				$query = "delete from movies where id =?";
				$prepared_query = $conn->prepare($query);
				$prepared_query->bind_param('i',$id);

				if ($prepared_query->execute()) {
					header("Location:". $_SERVER['HTTP_REFERER'] );
				
				}else
				{
					header("Location:". $_SERVER['HTTP_REFERER'] );
					
				}
			}else{
				header("Location:". $_SERVER['HTTP_REFERER'] );
				
			}
			
		}else
		{
			header("Location:". $_SERVER['HTTP_REFERER'] );
			
		}
	}
}
?>