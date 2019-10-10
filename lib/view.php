<?php 
$userId = -1;
$idCat = -1;

if(isset($_SESSION['USER_ID'])) $userId = $_SESSION['USER_ID'];

if(isset($_GET['id'])) {
	$idCat = htmlspecialchars($_GET["id"]);
	if (!is_numeric($idCat)) $idCat = -1;
}
$cat = $db->getCatForView($idCat, $userId);
?>