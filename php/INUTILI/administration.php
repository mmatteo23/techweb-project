<?php

session_start();

require_once("php/validSession.php");
require_once("php/UserController.php");
require_once("php/error_management.php");

$htmlPage = file_get_contents("html/administration.html");

$username = $_SESSION['username'];
$userData = getUser($username);
$userRole = $userData['role'];

if ($userRole == 1) {
    $html = '
        <h1 id="page-title">Welcome Admin <span>'.$username.'</span>!</h1>
        <div class="action-buttons">
            <a href="write_article.php" class="action-button pink sh-teal">Write article</a>
            <a href="edit_article.php" class="action-button pink sh-teal">Edit articles</a>
            <a href="add_game.php" class="action-button pink sh-teal">Add game</a>
            <a href="edit_game.php" class="action-button pink sh-teal">Edit games</a>            
            <a href="edit_user.php" class="action-button pink sh-teal">Edit users</a>
        </div>';
} else {
    // Utente loggato ma non è admin
    $html = accessNotAllowed("admin");
}

$htmlPage = str_replace('<welcome/>', $html, $htmlPage);

require_once('php/full_sec_loader.php');

echo $htmlPage;

?>