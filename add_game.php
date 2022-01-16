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
$genre_ids = [1];
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
        for ($i = 0; $i <= 2; $i++) {
            $genre_ids[$i] = $genre_id[$i]['genre_id'];
        }
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

    $genre_errors = "";
    $genre_ids = array();
    $genre_0 = intval($_POST['genre-0']);
    $genre_1 = intval($_POST['genre-1']);
    $genre_2 = intval($_POST['genre-2']);
    if ($genre_0 == $genre_1 || $genre_0 == $genre_2 || $genre_1 == $genre_2) {
        $genre_errors = "Genres must be different each other.";
    } else {
        array_push($genre_ids, $genre_0);
        if ($genre_1) array_push($genre_ids, $genre_1);
        if ($genre_2) array_push($genre_ids, $genre_2);
    }
    
    $default_article_img = NULL;
    $game_img = NULL;

    $username = $_SESSION['username'];
    $userData = getUser($username);
    $userRole = $userData['role'];

    $result = 0;

    if ($userRole == 1) {
        // se è un edit --> vede se modificare le immagini e fa l'update
        if (isset($_GET['id'])) {
            // se l'admin vuole modificare la cover
            if(isset($_FILES["cover"]) && $_FILES["cover"]['name']) {
                $errorsImage = checkImageToUpload($game_img, "images/games/", "cover", $name, "");
            }
            // se vuole modificare quella di default
            if(isset($_FILES["default-article-img"]) && $_FILES["default-article-img"]['name']) {
                $errorsImage .= checkImageToUpload($default_article_img, "images/article_covers/Default/", "default-article-img", $_GET['id']."-cover-1080", "");
            }
            // fa l'update di tutto
            $game_id = updateGame($_GET['id'], $name, $description, $releaseDate, $developer, $game_img);
            if(is_int(intval($game_id)) && $genre_errors == "") {
                deletePreviousGameGenres($_GET['id']);
                foreach($genre_ids as $genre_id)
                   $result += storeGameGenre(intval($_GET['id']), $genre_id);
            }
        } else {
        // se è un add game --> fai tutto (crea immagini da zero + store)
            $errorsImage = checkImageToUpload($game_img, "images/games/", "cover", $name, "");
            $game_id = storeGame($name, $description, $releaseDate, $developer, $game_img);
            if (is_int($game_id)) {
                $errorsImage .= checkImageToUpload($default_article_img, "images/article_covers/Default/", "default-article-img", $game_id."-cover-1080", "");
                if ($genre_errors == "") {
                    foreach($genre_ids as $genre_id)
                        $result += storeGameGenre($game_id, $genre_id);
                }
            } 
        }
        // check errori
        if(is_int(intval($game_id)) && $errorsImage == "" && $genre_errors == "" && is_int(intval($result))) {
            header("Location: games.php");
        } else {
            if (is_int(intval($game_id))) {
                $errors = "<ul>" . $errorsImage . $genre_errors . "</ul>";
            }
            else {
                $errors = "<ul>" . $errorsImage . $game_id . $genre_errors . "</ul>";
            }
        }
    } else {
        header("location: login.php");
    }
}

$genres = getGenres();

if(isset($genres)){
    $selectOptions = array();
    for ($i = 0; $i <= 2; $i++) {
        foreach ($genres as $genre) {
            if($genre['id']==$genre_ids[$i])
                $selectOptions[$i] .= "<option value='" . $genre['id'] . "' selected>" . $genre['name'] . "</option>";
            else
                $selectOptions[$i] .= "<option value='" . $genre['id'] . "'>" . $genre['name'] . "</option>";
        }
    }
    $selectbox = "
        <select name='genre-0' id='genre-0'>" .
            $selectOptions[0]
        . "</select>
    ";
    for ($i = 1; $i <= 2; $i++) {
        $disabled = "disabled";
        if ($genre_ids[$i]) {
            $disabled = "";
        }
        $selectbox .= " <div class='genre-select'>
        <button type='button' onclick='enableDisableGenre(".$i.")' class='action-button pink sh-teal enableGenre'> ENABLE/DISABLE </button>
        <select name='genre-".$i."' id='genre-".$i."' ".$disabled." class='genre-selector'>" .
            $selectOptions[$i]
        . "</select>
        </div>
        ";
    }
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