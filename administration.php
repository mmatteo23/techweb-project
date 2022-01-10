<?php

session_start();

require_once("php/validSession.php");
require_once("php/UserController.php");

$htmlPage = file_get_contents("html/administration.html");

$username = $_SESSION['username'];
$userData = show($username);
$userRole = $userData['role'];

if ($userRole == 1) {
    $html = '
        <h1 id="page-title">Welcome Admin <span>'.$username.'</span>!</h1>
        <div class="action-buttons">
            <a href="add_game.php" class="action-button">Add game</a>
            <a href="edit_game.php" class="action-button">Edit game</a>
            <a href="edit_article.php" class="action-button">Edit article</a>
            <a href="edit_user.php" class="action-button">Edit user</a>
        </div>
    ';
} else {
    // Utente loggato ma non è admin
    $html = '<h1 id="page-title">You\'r not admin! Come back <a href="/">Home</a>!</h1>';
}

$htmlPage = str_replace('<welcome/>', $html, $htmlPage);

require_once('php/full_sec_loader.php');

echo $htmlPage;

?>