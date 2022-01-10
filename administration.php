<?php

session_start();

require_once("php/UserController.php");

$htmlPage = file_get_contents("html/administration.html");
$username = $_SESSION['username'];

if (isset($username) && $username != '') {
    $userData = show($username);
    $userRole = $userData['role'];
    if ($userRole == 1) {
        $html = '<h1 id="page-title">Welcome Admin <span>'.$username.'</span>!</h1>';
    } else {
        $html = '<h1 id="page-title">You\'r not admin! Come back <a href="/">Home</a>!</h1>';
    }
} else {
    $html = '<h1 id="page-title">What are you doing here? Go <a href="login.php">Log in</a>!</h1>';
}

$htmlPage = str_replace('<welcome/>', $html, $htmlPage);

require_once('php/full_sec_loader.php');

echo $htmlPage;

?>