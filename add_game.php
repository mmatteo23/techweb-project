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

    $errorsImage = checkImageToUpload($game_img, "images/games/", "cover", $name, "");

    $username = $_SESSION['username'];
    $userData = getUser($username);
    $userRole = $userData['role'];

    $game_id = storeGame($name, $description, $releaseDate, $developer, $game_img, $userRole);

    if(is_int($game_id)){
        $result = checkImageToUpload($default_article_img, "images/article_covers/Default/", "default-article-img", $game_id."-cover-1080", "");
        if(is_int($result) || $result == "" || $result == 1 || $result == "1"){
            $result = storeGameGenre($game_id, $genre_id);
            if(is_int($result) || $result == "" || $result == 1 || $result == "1"){
                header("Location: games.php");
            } else {
                $errors = "<ul>" . $result . "</ul>";
            }
        } else {
            $errors = "<ul>" . $result . "</ul>";
        }
    } else {
        $errors = "<ul>" . $result . "</ul>";
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