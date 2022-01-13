<?php

require_once("php/UserController.php");
require_once("php/ArticleController.php");
require_once("php/GameController.php");
require_once("php/utilityFunctions.php");
require_once('php/validSession.php');

$errors = '';

$htmlPage = file_get_contents("html/add_game.html");
$username = $_SESSION['username'];
$userData = getUser($username);
$userRole = $userData['role'];

if(!isset($username) || $username == '' || $userRole != 1){    // the user is not authorized
    header("location: login.php");
}

// DEFAULT VARs FOR STR_REPLACE AT EOF
$name = '';
$description = '';
$releaseDate = '';
$developer = '';
$genre_id = 1;
$game_img = '';
$default_article_img = '';
$destination = "add_game.php";
$header = "<h1>Add a game</h1>";
$breadcrumb = "<a href='administration.php'>Administration</a> &gt; Add game</p>";
$button_name = '<input id="submit-btn" class="action-button" type="submit" value="Add game">';
$title_name = '<title>Add game - Penta News</title>';

if($_GET['id']){
    $game_id = $_GET['id'];
    $game_data = getGameData($game_id);
    if($game_data){
        $name = $game_data['name'];
        $description = $game_data['description'];
        $releaseDate = $game_data['release_date'];
        $developer = $game_data['developer'];
        $genre_id = getGenreIdsFromGameId($game_id);
        $game_img = $game_data['game_img'];
        $default_article_img = $game_id."-cover-1080.jpg";
        $destination = "add_game.php?id=".$game_id;
        $header = "<h1>Edit game</h1>";
        $breadcrumb = "<a href='administration.php'>Administration</a> &gt; <a href='edit_game.php'>Choose a game to edit</a> &gt; Edit game</p>";
        $button_name = '<input id="submit-btn" class="action-button" type="submit" value="Save changes">';
        $title_name = '<title>Edit game - Penta News</title>';
    }
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
    $game_id = storeGame($name, $description, $releaseDate, $developer, $game_img, $userRole);
    if(is_int($game_id)) {
        $errorsImage .= checkImageToUpload($default_article_img, "images/article_covers/Default/", "default-article-img", $game_id."-cover-1080", "");
    } 
    $result = storeGameGenre($game_id, $genre_id);

    if(is_int($game_id) && ($errorsImage == "") && is_int(intval($result))) {
        header("Location: games.php");
    } else {
        if (is_int($game_id)) {
            $errors = "<ul>" . $errorsImage . "</ul>";
        }
        else {
            $errors = "<ul>" . $errorsImage . $game_id . "</ul>";
        }
    }
}

$genres = getGenres();

if(isset($genres)){
    $selectOptions="";
    foreach ($genres as $genre) {
        if($genre['id']==$genre_id)
            $selectOptions .= "<option value='" . $genre['id'] . "' selected>" . $genre['name'] . "</option>";
        else
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

//if he's coming from edit_article
$htmlPage = str_replace('#Cover#', $game_img, $htmlPage);
$htmlPage = str_replace('#DefaultArticleImg#', $default_article_img, $htmlPage);
$htmlPage = str_replace('#Name#', $name, $htmlPage);
$htmlPage = str_replace('#Description#', $description, $htmlPage);
$htmlPage = str_replace('#ReleaseDate#', $releaseDate, $htmlPage);
$htmlPage = str_replace('#Developer#', $developer, $htmlPage);
$htmlPage = str_replace("add_game.php", $destination, $htmlPage);
$htmlPage = str_replace("<h1>Add a game</h1>", $header, $htmlPage);
$htmlPage = str_replace("<a href='administration.php'>Administration</a> &gt; Add game", $breadcrumb, $htmlPage);
$htmlPage = str_replace('<input id="submit-btn" class="action-button" type="submit" value="Add game">', $button_name, $htmlPage);
$htmlPage = str_replace('<title>Add game - Penta News</title>', $title_name, $htmlPage);

require_once('php/full_sec_loader.php');

echo $htmlPage;

?>