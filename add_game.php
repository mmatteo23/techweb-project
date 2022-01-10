<?php

session_start();

require_once("php/validSession.php");
require_once("php/UserController.php");
require_once("php/ArticleController.php");
require_once("php/GameController.php");
require_once("php/utilityFunctions.php");

$errors = '';
$htmlPage = file_get_contents("html/add_game.html");
$username = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // POST the comment in db

    // USER input for article
    $name = $_POST['name'];
    $description = $_POST['description'];
    $releaseDate = $_POST['releaseDate'];
    $articleText = $_POST['articleText'];
    $game_img = NULL;

    $errorsImage = checkImageToUpload($game_img);

    $username = $_SESSION['username'];
    $userData = show($username);
    $userRole = $userData['role'];


    $result = storeGame($name, $description, $releaseDate, $articleText, $game_img, $userRole);
    if(is_int($result)){
        header("Location: games.php");
    } else {
        $errors = "<ul>" . $result . "</ul>";
    }
}

$form = '
    <form method="POST" action="add_game.php" id="articleForm" enctype="multipart/form-data">
    <div class="input-wrapper">
        <label for="cover">Game Cover</label>
        <input type="file" style="color: black;" name="cover" id="cover">
        <p class="error"></p>
    </div>
    <div class="input-wrapper">
        <label for="name">Game name</label>
        <input type="text" name="name" id="name">
        <p class="error"></p>
    </div>
    <div class="input-wrapper">
        <label for="description">Game description</label>
        <input type="text" name="description" id="description">
        <p class="error"></p>
    </div>    
    <div class="input-wrapper">
        <label for="releaseDate">Release date</label>
        <input type="date" name="releaseDate" id="releaseDate">
        <p class="error"></p>
    </div>
    <div class="input-wrapper">
        <label for="subtitle">Software House / Developer</label>
        <input type="text" name="subtitle" id="subtitle">
        <p class="error"></p>
    </div>   
    <div class="form-buttons">
        <a href="../profile.php" id="undoBtn" class="action-button">Discard</a>
        <input id="submit-btn" class="action-button" type="submit" value="Add game">    
    </div>
    </form>
';

$userData = show($username);
$userRole = $userData['role'];
if ($userRole == 1) {
    $html = '
        <h1>Add a game</h1>
        <formErrors/>
    ';
    $html .= $form;
} else {
    // Utente loggato ma non è admin
    $html = '<h1 id="page-title">You\'r not admin! Come back <a href="/">Home</a>!</h1>';
}

$htmlPage = str_replace('<content/>', $html, $htmlPage);

require_once('php/full_sec_loader.php');

echo $htmlPage;

?>