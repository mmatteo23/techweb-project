<?php

require_once("php/validSession.php");
require_once("php/ArticleController.php");
require_once("php/GameController.php");
require_once("php/utilityFunctions.php");

$errors = '';

/* controlli sul ruolo dell'utente */
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $userData = getUser($username);
    $userRole = $userData['role'];
}
if(!isset($username) || $username == '' || $userRole > 2){    // the user is not authorized
    header("location: login.php");
}

$games = getGames(true,false,false,false,false);


$title='';
$subtitle='';
$read_time='1';
$gameName = 'Apex Legends';
$text = '<p>This is the initial editor content.</p>';
$destination = "write_article.php";
$tagString = '';
$alt_image = '';
$header = "<h1>Write an article</h1>";
$breadcrumb = '<a href="profile.php">Private Area</a> &gt; Write article';
$button_name = '<input id="submit-btn" class="action-button purple sh-pink" type="submit" value="Post article">';
$title_name = '<title>Write Article - Penta News</title>';
$discard_link = '<a href="profile.php" id="undoBtn"';

if(isset($_GET['id'])){
    $art_id = $_GET['id'];
    $tags = array();
    $art_data = getArticleData($art_id, $_SESSION['username'], $tags);
    if($art_data){
        $title = $art_data['title'];
        $subtitle = $art_data['subtitle'];
        $read_time = $art_data['read_time'];
        $gameName = $art_data['game'];
        $text = $art_data['text'];
        $destination = "write_article.php?id=".$art_id;
        foreach($tags as $tag){
            $tagString .= $tag['tag'].',';
        }
        $tagString = trim($tagString, ',');
        $alt_image = $art_data['alt_cover_img'];
        $header = "<h1>Edit article</h1>";
        $breadcrumb = '<a href="profile.php">Private Area</a> &gt; <a href="edit_article.php"> Manage articles </a> &gt; Edit article';
        $button_name = '<input id="submit-btn" class="action-button purple sh-pink" type="submit" value="Save changes">';
        $title_name = '<title>Edit Article - Penta News</title>';
        $discard_link = '<a href="edit_article.php" id="undoBtn"';
    }
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    // POST the comment in db

    // USER input for article
    $title              = $_POST['title'];
    $subtitle           = $_POST['subtitle'];
    $read_time          = $_POST['minutes'];
    $article_text       = $_POST['articleText'];
    

    $author             = $_SESSION['username'];
    $game_id            = $_POST['game'];
    $tags               = $_POST['tags'];
    $alt_image          = $_POST['alt-image'];
    if(!isset($alt_image) || $alt_image==""){
        $alt_image = "article cover image";
    }
    $article_img = NULL;    
    $idImg="";
    if(isset($_GET['id']))
        $idImg = $_GET['id'];
    else 
        $idImg = getNewId() + 1;
    $errorsImage = checkImageToUpload($article_img, "images/article_covers/", "cover", $idImg, "Default/" . $game_id . "-cover-1080.jpg");

    // system params for storing an article
    $publication_date = date('Y-m-d');
    if($errorsImage == ""){
        if(isset($_GET['id'])){
            /* se un articolo è stato impostato con un'immagine di default, quando si cambia il gioco viene aggiornata anche l'immagine di default automaticamente*/ 
            if($article_img=="Default/" . $game_id . "-cover-1080.jpg" && isset($art_data['cover_img']) && explode('/', $art_data['cover_img'])[0]!='Default')
                $article_img = $art_data['cover_img'];

            $result = updateArticle($title, $subtitle, $article_text, $publication_date, $article_img, $read_time, $author, $game_id, $tags, $alt_image, $idImg);
            if($result == "NotTheAuthor")
                header("location: index.php");
        }
        else
            $result = storeArticle($title, $subtitle, $article_text, $publication_date, $article_img, $read_time, $author, $game_id, $tags, $alt_image, $idImg);
        
        if(is_int($result)){
            header("Location: article.php?id=".$result);
        }
    }

    if($errorsImage || $result)
        $errors = "<ul>" . $errorsImage . $result . "</ul>";
    
}

if(isset($games)){
    $selectOptions="";
    foreach($games as $game){
        if($game['name']==$gameName)
            $selectOptions .= "<option value='" . $game['id'] . "' selected>" . $game['name'] . "</option>";
        else
            $selectOptions .= "<option value='" . $game['id'] . "'>" . $game['name'] . "</option>";
    }
    $selectbox = "
        <select name='game' id='game'>" .
            $selectOptions
        . "</select>
    ";
}



////////////////CAMBIA LINK DEL POST

// paginate the content
// page structure
$htmlPage = file_get_contents("html/write_article.html");

$htmlPage = str_replace('<selectGame/>', $selectbox, $htmlPage);
$htmlPage = str_replace('<formErrors/>', $errors, $htmlPage);


//if he's coming from edit_article
$htmlPage = str_replace('#TitleValue#', $title, $htmlPage);
$htmlPage = str_replace('#SubitleValue#', $subtitle, $htmlPage);
$htmlPage = str_replace('#ReadTimeValue#', $read_time, $htmlPage);
$htmlPage = str_replace('#TagValues#', $tagString, $htmlPage);
$htmlPage = str_replace('#AltImage#', $alt_image, $htmlPage);
$htmlPage = str_replace('<p>This is the initial article content.</p>', $text, $htmlPage);
$htmlPage = str_replace("write_article.php", $destination, $htmlPage);
$htmlPage = str_replace("<h1>Write an article</h1>", $header, $htmlPage);
$htmlPage = str_replace('<a href="profile.php">Private Area</a> &gt; Write article</p>', $breadcrumb, $htmlPage);
$htmlPage = str_replace('<input id="submit-btn" class="action-button purple sh-pink" type="submit" value="Post article">', $button_name, $htmlPage);
$htmlPage = str_replace('<title>Write Article - Penta News</title>', $title_name, $htmlPage);
$htmlPage = str_replace('<a href="profile.php" id="undoBtn"', $discard_link, $htmlPage);



//header footer and dynamic navbar all at once (^^^ sostituisce il commento qua sopra ^^^)
require_once('php/full_sec_loader.php');

echo $htmlPage;

?>