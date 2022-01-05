<?php

session_start();
require_once('php/db.php');

use DB\DBAccess;

$db = new DBAccess();

$connection = $db->openDBConnection();

$user_output="";

if($connection){
    $idArticle = $_GET['id']; ///codice per leggere get

    $articleData = $db->getArticleData($idArticle);
    $tags = $db->getArticleTags($idArticle);
    $numOfLikes = $db->getNumberOfLikes($idArticle);
    $db->closeDBConnection();
    $user_output = 
        '<article id="content">
            <div id="article-header">
                <h1 id="article-title">'.$articleData['title'].'</h1>
                <h2 id="article-subtitle">'.$articleData['subtitle'].'</h2>
                <div id="article-info">
                    <p id="article-author"><i class="material-icons" aria-hidden="true">person_outline</i><span>'.$articleData['author'].'</span></p>
                    <p id="article-date"><i class="material-icons" aria-hidden="true">today</i><span>'.$articleData['publication_date'].'</span></p>
                    <p id="article-read-time"><i class="material-icons" aria-hidden="true">schedule</i><span>'.$articleData['read_time'].' minutes</span></p> 
                    <p id="article-read-time"><i class="material-icons" aria-hidden="true">favorite_border</i><span>'.$numOfLikes.' likes</span></p> 
                </div>';
    if(count($tags)>0){
        $user_output .= '<ul id="article-tags" class="tag-list">';
        foreach($tags as $tag)
            $user_output .= '<li>'.$tag['name'].'</li>';
        $user_output .= '</ul>';
    }
    $articleData['text']=str_replace("\n", "<br><br>", $articleData['text']);
    
    $user_output .= '
                </div>
                <img class="cover" src="images/article_covers/'.$articleData['cover_img'].'" id="article-cover" alt="article cover picture">
                <div id="article-body" class="cover-linguetta">
                <p>'.$articleData['text'].'</p>';
    if(isset($_SESSION['username']) && $_SESSION['username'] != ''){
        $user_output .= '
                <span id="likeBtn" onclick=LikeThisArticle()><i class="material-icons" aria-hidden="true">favorite_border</i></span>
                <span id="saveBtn" onclick=SaveThisArticle()><i class="material-icons" aria-hidden="true">bookmark_border</i></span>';
    }
    $user_output .= '   </div>
        </article>';
} else {
    $user_output = "<p>Something went wrong while loading the page, try again or contact us.</p>";
}

$htmlPage = file_get_contents("html/article.html");

//header footer and dynamic navbar all at once (^^^ sostituisce il commento qua sopra ^^^)
require_once('php/full_sec_loader.php');

$htmlPage = str_replace("<theArticle/>", $user_output, $htmlPage);

echo $htmlPage;

?>
