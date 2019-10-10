<?php 
$userId = -1;

if(isset($_SESSION['USER_ID'])) $userId = $_SESSION['USER_ID'];
$cats = $db->getCatsForList($userId);
?>