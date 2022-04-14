<?php

require_once("php/UserController.php");
require_once("php/ArticleController.php");
require_once("php/GameController.php");
require_once("php/utilityFunctions.php");
require_once('php/validSession.php');
require_once("php/error_management.php");

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
$breadcrumb = "&gt; Add game";
$button_name = '<input id="submit-btn" class="action-button purple sh-pink" type="submit" value="Add game" />';
$title_name = '<title>Add game - Penta News</title>';
$discard_link = '<a href="profile.php" id="undoBtn"';
$game_img_html = '';
$default_img_html = '';
$formContent = '
<h1>Add a game</h1>
<formErrors/>
<form method="POST" action="add_game.php" id="articleForm" enctype="multipart/form-data">
    <div class="input-wrapper">
        <label for="cover">Game Cover <br>
            <span>285 x 380 image file</span>                    
        </label>
        <figure id="image_preview_1">
            <imgPreview1/>
        </figure>   
        <input type="file" style="color: black;" accept="image/png,image/jpeg,image/bmp" name="cover" id="cover" onchange="showPreview1(event);" />
        <button type="button" id="remove-preview-button-1" class="action-button pink sh-teal" onclick="removePreview1()">Remove Image</button>
        <p class="error"></p>
    </div>
    <div class="input-wrapper">
        <label for="default-article-img">Default article image <br>
            <span>1920 x 1080 image file</span>
        </label>
        <figure id="image_preview_2">
            <imgPreview2/>
        </figure>
        <input type="file" style="color: black;" accept="image/png,image/jpeg,image/bmp" name="default-article-img" id="default-article-img" onchange="showPreview2(event);" />           
        <button type="button" id="remove-preview-button-2" class="action-button pink sh-teal" onclick="removePreview2()">Remove Image</button>
        <p class="error"></p>
    </div>
    <div class="input-wrapper">
        <label for="name">Game name</label>
        <!-- <input onblur="validateName()" type="text" name="name" id="name" value="#Name#" /> -->
        <input type="text" name="name" id="name" value="#Name#" />
        <p class="error"></p>
    </div>
    <div class="input-wrapper">
        <label for="description">Game description</label>
        <!-- <input onblur="validateDescription()" type="text" name="description" id="description" value="#Description#" /> -->
        <input type="text" name="description" id="description" value="#Description#" />
        <p class="error"></p>
    </div>
    <div class="input-wrapper">
        <label for="genre-0">Genre</label>
        <selectGenre/>
        <p class="error"></p>
    </div>
    <div class="input-wrapper">
        <label for="releaseDate">Release date</label>
        <!-- <input onblur="validateReleaseDate()" type="date" name="releaseDate" id="releaseDate" value="#ReleaseDate#" /> -->
        <input type="date" name="releaseDate" id="releaseDate" value="#ReleaseDate#" />
        <p class="error"></p>
    </div>
    <div class="input-wrapper">
        <label for="developer">Software House / Developer</label>
        <!-- <input onblur="validateDeveloper()" type="text" name="developer" id="developer" value="#Developer#" /> -->
        <input type="text" name="developer" id="developer" value="#Developer#" />
        <p class="error"></p>
    </div>   
    <div class="form-buttons">
        <a href="profile.php" id="undoBtn" class="action-button pink sh-teal">Discard</a>
        <input id="submit-btn" class="action-button purple sh-pink" type="submit" value="Add game" />
    </div>
</form>
';

if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $game_id = $_GET['id'];
    $numOfGames = getNumberOfGames();
    if($game_id <= $numOfGames && $game_id > 0){
        $game_data = getGameData($game_id);
        $name = $game_data['name'];
        $description = $game_data['description'];
        $releaseDate = $game_data['release_date'];
        $developer = $game_data['developer'];
        $genre_id = getGenreIdsFromGameId($game_id);
        for ($i = 0; $i <= 2; $i++) {
            if(isset($genre_id[$i]))
                $genre_ids[$i] = $genre_id[$i]['genre_id'];
        }
        $game_img = $game_data['game_img'];
        $default_article_img = $game_id."-cover-1080.jpg";
        $destination = "add_game.php?id=".$game_id;
        $header = "<h1>Edit game</h1>";
        $breadcrumb = "&gt; <a href='edit_game.php'>Choose a game to edit</a> &gt; Edit game";
        $button_name = '<input id="submit-btn" class="action-button purple sh-pink" type="submit" value="Save changes" />';
        $title_name = '<title>Edit game - Penta News</title>';
        $discard_link = '<a href="edit_game.php" id="undoBtn"';
        $game_img_html = '<img src="images/games/'.$game_img.'"  alt="game cover image preview" id="game_cover_image" />';
        $default_img_html = '<img src="images/article_covers/Default/'.$default_article_img.'" alt="default article cover image preview" id="default_article_cover_image" />';
    } else {
        $formContent = error404("whooooops...", "The game you want to edit doesn't exist. Please select <a href='/edit_game.php'>another one</a>.");
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
    $errorsImage = "";

    $genre_1 = -1;
    $genre_2 = -2;
    
    $genre_0 = intval($_POST['genre-0']);
    if(isset($_POST['genre-1']))
        $genre_1 = intval($_POST['genre-1']);
    if(isset($_POST['genre-2']))
        $genre_2 = intval($_POST['genre-2']);
    if (($genre_0 == $genre_1 || $genre_0 == $genre_2 || $genre_1 == $genre_2)) {
        $genre_errors = "Genres must be different each other.";
    } else {
        $genre_ids = array();
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
    $game_id = 0;
    if ($userRole == 1) {
        // se è un edit --> vede se modificare le immagini e fa l'update
        if (isset($_GET['id'])) {
            // se l'admin vuole modificare la cover
            if(isset($_FILES["cover"]) && $_FILES["cover"]['name']) {
                $errorsImage = checkImageToUpload($game_img, "images/games/", "cover", $_GET['id'], "");
            }
            // se vuole modificare quella di default
            if(isset($_FILES["default-article-img"]) && $_FILES["default-article-img"]['name']) {
                $errorsImage .= checkImageToUpload($default_article_img, "images/article_covers/Default/", "default-article-img", $_GET['id']."-cover-1080", "");
            }
            // fa l'update di tutto
            $game_id = updateGame($_GET['id'], $name, $description, $releaseDate, $developer, $game_img);
            if(is_numeric($game_id) && $genre_errors == "") {
                deletePreviousGameGenres($_GET['id']);
                foreach($genre_ids as $genre_id)
                   $result += storeGameGenre(intval($_GET['id']), $genre_id);
            }
        } else {
        // se è un add game --> fai tutto (crea immagini da zero + store)
            if ($genre_errors == "") {
                $game_id = getNumberOfGames() + 1;
                $errorsImage = checkImageToUpload($game_img, "images/games/", "cover", $game_id, "");
                $game_id = storeGame($name, $description, $releaseDate, $developer, $game_img);
                if (is_int($game_id)) {
                    $errorsImage .= checkImageToUpload($default_article_img, "images/article_covers/Default/", "default-article-img", $game_id."-cover-1080", "");
                    foreach($genre_ids as $genre_id)
                        $result += storeGameGenre($game_id, $genre_id);
                } 
            }
        }
        // check errori
        if($game_id===TRUE && $errorsImage == "" && $genre_errors == "" && is_numeric($result)) {
            header("Location: games.php");
        } else {
            if (is_numeric($game_id)) {
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
        $selectOptions[$i] = '';
        foreach ($genres as $genre) {
            if(isset($genre_ids[$i]) && $genre['id']==$genre_ids[$i])
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
        $disabled = "disabled='disabled'";
        if (isset($genre_ids[$i])) {
            $disabled = "";
        }
        $selectbox .= " <div class='genre-select'>
        <button type='button' onclick='enableDisableGenre(".$i.")' class='action-button pink sh-teal enableGenre'> Enable/Disable </button>
        <select name='genre-".$i."' id='genre-".$i."' ".$disabled." class='genre-selector'>" .
            $selectOptions[$i]
        . "</select>
        </div>
        ";
    }
}

$formContent = str_replace('<imgPreview1/>', $game_img_html, $formContent);
$formContent = str_replace('<imgPreview2/>', $default_img_html, $formContent);

$htmlPage = str_replace('<content/>', $formContent, $htmlPage);
$htmlPage = str_replace('<selectGenre/>', $selectbox, $htmlPage);
$htmlPage = str_replace('<formErrors/>', $errors, $htmlPage);

//if he's coming from edit_article
// $htmlPage = str_replace('<#Cover#>', 'value="'.$game_img.'"', $htmlPage);
// $htmlPage = str_replace('#DefaultArticleImg#', $default_article_img, $htmlPage);
$htmlPage = str_replace('#Name#', $name, $htmlPage);
$htmlPage = str_replace('#Description#', $description, $htmlPage);
$htmlPage = str_replace('#ReleaseDate#', $releaseDate, $htmlPage);
$htmlPage = str_replace('#Developer#', $developer, $htmlPage);
$htmlPage = str_replace("add_game.php", $destination, $htmlPage);
$htmlPage = str_replace("<h1>Add a game</h1>", $header, $htmlPage);
$htmlPage = str_replace("&gt; Add game", $breadcrumb, $htmlPage);
$htmlPage = str_replace('<input id="submit-btn" class="action-button purple sh-pink" type="submit" value="Add game" />', $button_name, $htmlPage);
$htmlPage = str_replace('<title>Add game - Penta News</title>', $title_name, $htmlPage);
$htmlPage = str_replace('<a href="profile.php" id="undoBtn"', $discard_link, $htmlPage);

require_once('php/full_sec_loader.php');

echo $htmlPage;

?>