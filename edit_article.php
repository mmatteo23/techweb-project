<?php

require_once("php/validSession.php");
require_once("php/ArticleController.php");
require_once("php/GameController.php");
require_once("php/utilityFunctions.php");

$tags=array();
$articles = getAuthorArticles($_SESSION['username'], $tags);

$user_output = '';

if($articles){ 
    if(count($articles) > 0){
        $user_output .= '<h1>Your Articles</h1><div id="search-results">';
        $x=0;
        foreach($articles as $art){
            $user_output .= 
                '<a class="card-article-link" href="write_article.php?id='.$art['id'].'">
                <article>
                    <div class="card-article-image">
                        <img src="images/article_covers/'.$art['cover_img'].'"/>
                    </div>
                    <div class="card-article-info">
                        <h3>'.$art['title'].'</h3>
                        <h4>'.$art['subtitle'].'</h4>
                        <p>'.$art['publication_date'].'</p>';
            $user_output .= '<ul id="card-article-tags" class="tag-list">
                                <li class="tag" id="game-tag">'.$art['game'].'</li>';
            if($tags && $tags != "WrongQuery"){
                while($tags[$x]['id']==$art['id']){
                    $user_output .= '<li class="tag">'.$tags[$x]['tag'].'</li>';
                    $x++;
                }
            }   
            $user_output .= '</ul>';
            $user_output .= '</div>
            </article>
            </a>';
        }      
        $user_output .= "</div>"; 
    }
    else{
        $user_output .= genericErrorHTML("No articles found", "Looks like you haven't written anything yet", 
                        array("<a href='write_article.php'>Write Something</a>", "If what you're looking for isn't here don't panic yet, there might be a problem with our server"));
    }
}
else{
    $content=createDBErrorHTML();
}

$htmlPage = file_get_contents("html/edit_article.html");

//header footer and dynamic navbar all at once (^^^ sostituisce il commento qua sopra ^^^)
require_once('php/full_sec_loader.php');

//str_replace finale col conenuto specifico della pagina

$htmlPage = str_replace("<AuthorArticles/>", $user_output, $htmlPage);


echo $htmlPage;

?>