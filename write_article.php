<?php

require_once("php/validSession.php");
require_once("php/ArticleController.php");
require_once("php/GameController.php");

$errors = '';

$games = getGames(true,false,false,false,false);

if($_SERVER['REQUEST_METHOD'] == "POST"){
    // POST the comment in db

    // USER input for article
    $title              = $_POST['title'];
    $subtitle           = $_POST['subtitle'];
    $read_time          = $_POST['minutes'];
    $article_text       = $_POST['articleText'];

    // system params for storing an article
    $publication_date   = date('Y-m-d');
    $isApproved         = FALSE;
    $author             = $_SESSION['username'];

    $result = storeArticle($title, $subtitle, $article_text, $publication_date, NULL, $read_time, $isApproved, $author);
    if(is_int($result)){
        header("Location: article.php?id=".$result);
    } else {
        $errors = "<ul>" . $result . "</ul>";
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


// paginate the content
// page structure
$htmlPage = file_get_contents("html/write_article.html");

$htmlPage = str_replace('<selectGame/>', $selectbox, $htmlPage);
$htmlPage = str_replace('<formErrors/>', $errors, $htmlPage);

//header footer and dynamic navbar all at once (^^^ sostituisce il commento qua sopra ^^^)
require_once('php/full_sec_loader.php');

echo $htmlPage;

?>