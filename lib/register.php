<?php 
$FirstName = "";
$LastName = "";
$Email = "";
$Password = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
	$date = date('Y-m-d H:m:d');
	$ERROR = array();

	if( $_POST["FirstName"]) {
		$FirstName = htmlspecialchars($_POST["FirstName"]);
		$FirstName = trim($FirstName);
		if(empty($FirstName) || strlen($FirstName) == 0) $ERROR[] = "Поле Имя - пустое!";
		if(strlen($FirstName) < 3) $ERROR[] = "Поле Имя - слишком мало букв!";
		if(strlen($FirstName) > 29) $ERROR[] = "Поле Имя - слишком много букв!";
	}
	if( $_POST["LastName"]) {
		$LastName = htmlspecialchars($_POST["LastName"]);
		$LastName = trim($LastName);
		if(empty($LastName) || strlen($LastName) == 0) $ERROR[] = "Поле Фамилия - пустое!";
		if(strlen($LastName) < 3) $ERROR[] = "Поле Фамилия - слишком мало букв!";
		if(strlen($LastName) > 29) $ERROR[] = "Поле Фамилия - слишком много букв!";
	}
	if( $_POST["Email"]) {
		$Email = htmlspecialchars($_POST["Email"]);
		$Email = trim($Email);
		if(empty($Email) || strlen($Email) == 0) $ERROR[] = "Поле Email - пустое!";
		$query = "SELECT COUNT(Email) as count FROM users WHERE Email = '$Email';";
		$res =  $db->get_result_query($query); /* Email is uniq */
		if($res[0]['count'] > 0) $ERROR[] = "Такой Email существует!";
	}
	if( $_POST["Password"]) {
		$Password = htmlspecialchars($_POST["Password"]);
		$Password = trim($Password);
		if(empty($Password) || strlen($Password) == 0) $ERROR[] = "Поле Пароль - пустое!";
		if(strlen($Password) < 3) $ERROR[] = "Поле Пароль - слишком мало букв!";
		if(strlen($Password) > 29) $ERROR[] = "Поле Пароль - слишком много букв!";
		$Password = md5($Password);
	}    
}

if(empty($ERROR) && isset($ERROR)) {
	$query = "INSERT INTO users (LastName, FirstName, Email, Password, reg_date) VALUES ( '$FirstName', '$LastName', '$Email', '$Password', '$date');";

	$res =  $db->query($query); /* Adding user */
	if($res) {
		header('Location: /index.php');
		exit();
	}
}

function getValue($name){
	if(isset($name)) echo " value = '".$name."' ";
	else echo '';
}
?>