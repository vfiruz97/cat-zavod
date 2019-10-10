<?php 
$Name = "";
$Age = "";
$Poroda = "";
$userId = -1;

if(isset($_SESSION['USER_ID'])) $userId = $_SESSION['USER_ID'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
	$ERROR = array();

	if( $_POST["Name"]) {
		$Name = htmlspecialchars($_POST["Name"]);
		$Name = trim($Name);
		if(empty($Name) || strlen($Name) == 0) $ERROR[] = "Поле Имя - пустое!";
		if(strlen($Name) < 2) $ERROR[] = "Поле Имя - слишком мало букв!";
		if(strlen($Name) > 29) $ERROR[] = "Поле Имя - слишком много букв!";
	}
	if( $_POST["Age"]) {
		$Age = htmlspecialchars($_POST["Age"]);
		$Age = trim($Age);
		if(empty($Age) || strlen($Age) == 0) $ERROR[] = "Поле Возраст - пустое!";
		if(strlen($Age) > 3) $ERROR[] = "Поле Возраст - слишком много числа!";
		if (!is_numeric($Age)) $Age = 1;
		if($Age > 20) $ERROR[] = "Поле Возраст - слишком большое число";
	}
	if( $_POST["Poroda"]) {
		$Poroda = htmlspecialchars($_POST["Poroda"]);
		$Poroda = trim($Poroda);
		if(empty($Poroda) || strlen($Poroda) == 0) $ERROR[] = "Поле Порода - пустое!";
		if(strlen($Poroda) < 2) $ERROR[] = "Поле Порода - слишком мало букв!";
		if(strlen($Poroda) > 29) $ERROR[] = "Поле Порода - слишком много букв!";
	}   
}

if(empty($ERROR) && isset($ERROR)) {

	$res = $db->createCat($Name, $Age, $Poroda, $userId);

	if($res) {
		header('Location: /index.php');
		exit();
	}
}

function getValue($name){
	if(isset($name)) echo " value = '".$name."' ";
	else echo '';
} ?>