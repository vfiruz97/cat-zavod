<?php 
$Email = "";
$Password = "";
$checked = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
	$ERROR = array();

	if( $_POST["Email"]) {
		$Email = htmlspecialchars($_POST["Email"]);
		$Email = trim($Email);
		if(empty($Email) || strlen($Email) == 0) $ERROR[] = "Поле Email - пустое!";
		if(strlen($Email) < 3) $ERROR[] = "Поле Email - слишком мало букв!";
		if(strlen($Email) > 29) $ERROR[] = "Поле Email - слишком много букв!";
	}
	if( $_POST["Password"]) {
		$Password = htmlspecialchars($_POST["Password"]);
		$Password = trim($Password);
		if(empty($Password) || strlen($Password) == 0) $ERROR[] = "Поле Пароль - пустое!";
		if(strlen($Password) < 3) $ERROR[] = "Поле Пароль - слишком мало букв!";
		if(strlen($Password) > 29) $ERROR[] = "Поле Пароль - слишком много букв!";
		$Password = md5($Password);
	}
	if( isset($_POST["check"])) {
		$checked = true;
	}
	
}

if(empty($ERROR) && isset($ERROR)) {
	$auth =false;

	$isIssetUser = "SELECT COUNT(Email) as count FROM users WHERE Email = '$Email';";
	$isCorrectPass = "SELECT Password FROM users WHERE Email = '$Email';";

	$userEmail =  $db->get_result_query($isIssetUser); /* Email is isset */
	if($userEmail[0]['count'] > 0) {

		$userPass =  $db->get_result_query($isCorrectPass); /* Email is isset */
		if($userPass[0]['Password'] == $Password) $auth = true;
		else $ERROR[] = "Не правельный пароль!";

	}	else { $ERROR[] = "Такой Email не существует!"; }

	if($auth) {

		$query = "SELECT ID FROM users WHERE Email = '$Email'";
		$user = $db->get_result_query($query);

		$_SESSION["USER"] = $Email;
		$_SESSION["USER_ID"] = $user[0]['ID'];
		$_SESSION["AUTH"] = true;

		header('Location: /index.php');
		exit();	
	}
}

function getValue($name){
	if(isset($name)) echo " value = '".$name."' ";
	else echo '';
} ?>