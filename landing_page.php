<?php
require_once('php/validSession.php');
require_once("php/UserController.php");

$htmlPage = file_get_contents("html/landing_page.html");

$htmlPage = str_replace('<userName/>', '<span>'. $_SESSION['username'] . '</span>', $htmlPage);

if(isset($_SESSION['username'])){
    $userData = getUser($_SESSION['username']);
    $userRole = $userData['role'];
}

//header footer and dynamic navbar all at once (^^^ sostituisce il commento qua sopra ^^^)
require_once('php/full_sec_loader.php');

//str_replace finale col conenuto specifico della pagina
echo $htmlPage;

?>