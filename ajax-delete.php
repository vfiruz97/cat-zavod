<?php
session_start();
$base = __DIR__.'/';
include $base."db/main_query.php";

$idCata = -1;
$userId = -1;
$answer = "";

if(isset($_SESSION['USER_ID'])) $userId = $_SESSION['USER_ID'];

if( isset($_POST['id'])) {
	$idCata = htmlspecialchars($_POST["id"]);
	if (!is_numeric($idCata)) $idCata = -1;
}

$res = $db->deleteCat($idCata, $userId);

if($res) $answer = "Успешно!";
else $answer = "Возникла ошибка!";

?>
<?=$answer;?>