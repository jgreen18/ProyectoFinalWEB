
<?php 
define("HOST", "localhost");
define("USER", "root");
define("PSWD", "green321");
define("DB", "pfweb");
  
function connect(){
$conn = new mysqli(HOST,USER,PSWD,DB);
if ($conn) {
	return $conn;
}
return null;

}
 ?>
