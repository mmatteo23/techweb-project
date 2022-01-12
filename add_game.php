<?php

session_start();

require_once("php/UserController.php");
require_once("php/ArticleController.php");
require_once("php/GameController.php");
require_once("php/utilityFunctions.php");

$errors = '';

$htmlPage = file_get_contents("html/add_game.html");
$username = $_SESSION['username'];
$userData = getUser($username);
$userRole = $userData['role'];

if(!isset($username) || $username == '' || $userRole != 1){    // the user is not authorized
    header("location: login.php");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // POST the comment in db

    // USER input for article
    $name = $_POST['name'];
    $description = $_POST['description'];
    $releaseDate = $_POST['releaseDate'];
    $developer = $_POST['developer'];
    $genre_id = $_POST['genre'];
    $default_article_img = NULL;
    $game_img = NULL;

    $username = $_SESSION['username'];
    $userData = getUser($username);
    $userRole = $userData['role'];

    $errorsImage = checkImageToUpload($game_img, "images/games/", "cover", $name, "");
    #if ($name == "")
    #    $errorsImage = "";
    $game_id = storeGame($name, $description, $releaseDate, $developer, $game_img, $userRole);
    $errorsImage .= checkImageToUpload($default_article_img, "images/article_covers/Default/", "default-article-img", $game_id."-cover-1080", "");
    #echo("IMAGE 2: ".$errorsImage);
    $result = storeGameGenre($game_id, $genre_id);

    if(is_int($game_id) && $errorsImage == "" && is_int($result)) {
        header("Location: games.php");
    } else {
        if (is_int($game_id))
            $errors = "<ul>" . $errorsImage . "</ul>";
        else 
            $errors = "<ul>" . $errorsImage . $game_id . "</ul>";
    }

    
}

$genres = getGenres();

if(isset($genres)){
    $selectOptions="";
    foreach($genres as $genre){
        $selectOptions .= "<option value='" . $genre['id'] . "'>" . $genre['name'] . "</option>";
    }

    $selectbox = "
        <select name='genre' id='genre'>" .
            $selectOptions
        . "</select>
    ";
}

$htmlPage = str_replace('<selectGenre/>', $selectbox, $htmlPage);
$htmlPage = str_replace('<formErrors/>', $errors, $htmlPage);

require_once('php/full_sec_loader.php');

echo $htmlPage;

?>