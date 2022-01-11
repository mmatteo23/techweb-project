<?php
require_once("php/validSession.php");
require_once("php/utilityFunctions.php");
require_once("php/GameController.php");
require_once("php/UserController.php");

// variables
$content = "";  // html code to send to the page
$errors = "";

$games = getGames(true,true,true,true,true);

if($_SERVER['REQUEST_METHOD'] == "POST"){
    // take the data
    // USER input for article
    $name = $_POST['name'];
    $description = $_POST['description'];
    $releaseDate = $_POST['releaseDate'];
    $developer = $_POST['developer'];
    $genres = $_POST['tags'];
    $game_img = NULL;
    
    $errorsImage = checkImageToUpload($profile_img, "images/user_profiles/", "profile_img", $_SESSION['username']);

    $username = $_SESSION['username'];
    $userData = show($username);
    $userRole = $userData['role'];
    
    if(!$errors){
        $result = update($_SESSION['username'], $firstname, $lastname, $email, $password, $rep_password, $profile_img);
        if($result === TRUE){
            redirect('../profile.php', false, 201);
        } else {
            $errors = $result;
        }
    }

}

if(isset($games)){
    $selectOptions="";
    foreach($games as $game){
        $selectOptions .= "<option value='" . $game['id'] . "'>" . $game['name'] . "</option>";
    }

    $selectbox = "
        <select name='game' id='game'>" .
            $selectOptions
        . "</select>
    ";
}

// TAKE OLD GAME INFO
$oldGameData = show($_SESSION['username']);

$content = '
    <form method="POST" action="add_game.php" id="articleForm" enctype="multipart/form-data">
    <div class="input-wrapper">
        <label for="game">Game</label>
        <selectGame/>
        <p class="error"></p>
    </div>
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
        <label for="tags">Game genres</label>
        <ul class="tag-list tag-container" id="article-tags">
        </ul>
        <input type="text" name="tags" id="tags">  
    </div>
    <div class="input-wrapper">
        <label for="releaseDate">Release date</label>
        <input type="date" name="releaseDate" id="releaseDate">
        <p class="error"></p>
    </div>
    <div class="input-wrapper">
        <label for="developer">Software House / Developer</label>
        <input type="text" name="developer" id="developer">
        <p class="error"></p>
    </div>   
    <div class="form-buttons">
        <a href="../profile.php" id="undoBtn" class="action-button">Discard</a>
        <input id="submit-btn" class="action-button" type="submit" value="Add game">    
    </div>
    </form>'
;


// paginate the content
// page structure
$htmlPage = file_get_contents("html/edit_game.html");

//header footer and dynamic navbar all at once (^^^ sostituisce il commento qua sopra ^^^)
require_once('php/full_sec_loader.php');

$htmlPage = str_replace('<editForm/>', $content, $htmlPage);
$htmlPage = str_replace('<selectGame/>', $selectbox, $htmlPage);
$htmlPage = str_replace('<formErrors/>', $errors, $htmlPage);

echo $htmlPage;

?>