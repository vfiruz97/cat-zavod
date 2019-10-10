<?php 
session_start();
$base = __DIR__.'/';
$auth = false;
$page = 'list';
include $base."db/main_query.php";

if(isset($_SESSION['AUTH'])) $auth = true;
if(isset($_GET['p']))
 if (file_exists($base.'pages/'.$_GET['p'].'.php')) $page = $_GET['p'];

if($auth) {
  require_once($base.'header.php'); /* header */
  require_once($base.'pages/'.$page.'.php');
  require_once($base.'footer.php'); /* footer */
} else {
  require_once($base.'auth.php');
}
