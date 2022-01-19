<?php

session_start();
require_once('php/db.php');
require_once('php/error_management.php');

use DB\DBAccess;

$db = new DBAccess();

$connection = $db->openDBConnection();

$user_output="";
$tagsForKeywords = "";

if($connection){
    $idArticle = $_GET['id']; ///codice per leggere get
    if(isset($_SESSION['username']))
        $username = $_SESSION['username'];

    $articleData = $db->getArticleData($idArticle);
    if($articleData != "WrongQuery"){   
        $tags = $db->getArticleTags($idArticle);
        $numOfLikes = $db->getNumberOfLikes($idArticle);
        if(isset($username) && $username != ''){
            $liked = $db->getUserLikedArticle($username, $idArticle);
            $saved = $db->getUserSavedArticle($username, $idArticle);
        }
        $db->closeDBConnection();
        $user_output =             
            '<header id="article-header">
                <h1 id="article-title">'.$articleData['title'].'</h1>
                <h2 id="article-subtitle">'.$articleData['subtitle'].'</h2>
                <div id="article-info">
                    <p id="article-author"><i class="material-icons" aria-hidden="true">person_outline</i><span >'.$articleData['author'].'</span></p>
                    <p id="article-date"><i class="material-icons" aria-hidden="true">today</i><span>'.$articleData['publication_date'].'</span></p>
                    <p id="article-read-time"><i class="material-icons" aria-hidden="true">schedule</i><span>'.$articleData['read_time'].' minutes</span></p> 
                    <p id="article-likes"><i class="material-icons" aria-hidden="true">favorite_border</i><span>'.$numOfLikes.' likes</span></p> 
                </div>';
        //sono sicuro che esiste game perché è NOT NULL nel DB
        $user_output .= '<ul id="article-tags" class="tag-list">
                            <li><a href="search.php?game='.urlencode($articleData['name']).'" class="game-tag">'.$articleData['name'].'</a></li>';
        $tagsForKeywords .= $articleData['name'];
        if(isset($tags) && count($tags)>0){
            foreach($tags as $tag){
                $user_output .= '<li><a href="search.php?tag='.urlencode($tag['name']).'">'.$tag['name'].'</a></li>';
                $tagsForKeywords .= ','.$tag['name'];
            }
        }
        $user_output .= '</ul>';
        
        $user_output .= '
                    </header>
                    <img class="cover" src="images/article_covers/'.$articleData['cover_img'].'" id="article-cover" alt="'.$articleData['alt_cover_img'].'">
                    <article id="article-body" class="cover-linguetta" aria-label="article text">
                    <p>'.$articleData['text'].'</p>';

        if(isset($username) && $username != ''){
            if ($liked != 1) $liked = 0; // se non è 1 è undefined --> lo correggo in 0
            if ($liked) {
                $user_output .= '
                <span id="likeContainer">
                    <button id="likeBtn" onclick=LikeThisArticle("'.$username.'",'.$idArticle.','.$liked.')><span class="material-icons md-36">favorite</span></button>
                </span>';
            } else {
                $user_output .= '
                <span id="likeContainer">
                    <button id="likeBtn" onclick=LikeThisArticle("'.$username.'",'.$idArticle.','.$liked.')><span class="material-icons md-36">favorite_border</span></button>
                </span>';
            }
            if ($saved) {
                $user_output .= '
                <span id="saveContainer">
                    <button id="saveBtn" onclick=SaveThisArticle("'.$username.'",'.$idArticle.','.$saved.')><span class="material-icons md-36">bookmark</span></button>
                </span>';
            } else {
                $user_output .= '
                <span id="saveContainer">
                    <button id="saveBtn" onclick=SaveThisArticle("'.$username.'",'.$idArticle.','.$saved.')><span class="material-icons md-36">bookmark_border</span></button>
                </span>';
            }       
        }

        $user_output .= '   </article>';
    } 
    else {
        $user_output = genericErrorHTML("Error while loading the article", "Looks like something went wrong", 
                        array("Refresh the page, it might work.", "go back to <a href='index.php'>our home</a> and read other articles."));
    }
} else {
    $user_output = createDBErrorHTML();;
}

$htmlPage = file_get_contents("html/article.html");

//header footer and dynamic navbar all at once (^^^ sostituisce il commento qua sopra ^^^)
require_once('php/full_sec_loader.php');

$htmlPage = str_replace("<theArticle/>", $user_output, $htmlPage);
$htmlPage = str_replace("#secret-keywords#", $tagsForKeywords, $htmlPage);

echo $htmlPage;

?>
